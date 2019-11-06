<?php
if (session_status() != PHP_SESSION_NONE && !(isset($_SESSION['message']))) {
   session_destroy();
}
require_once('auth/auth.php');
session_start();
$error = '';
if (isset($_POST['submit'])) {
   if (empty($_POST['email']) || empty($_POST['password'])) {
      $error = "Email or Password is invalid";
   } else {

      try {

         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $email = $_POST['email'];
         $password = md5($_POST['password']);

         $query = "SELECT uid, email, password from Users where email=? AND password=? LIMIT 1";

         $stmt = $conn->prepare($query);
         $stmt->bindParam(1, $email);
         $stmt->bindParam(2, $password);
         $stmt->execute();
         if ($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['login_user'] = $arr['uid'];
            $_SESSION['login_user_email'] = $arr['email'];
            header("location: index.php");
         } else {
            $error = "Wrong credentials! If you don't have an account, please register.";
         }
      } catch (PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
      }
   }
   $conn = null;
}
?>
