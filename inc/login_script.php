<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trainsystem";

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
         $password = $_POST['password'];

         $query = "SELECT email, password from users where email=? AND password=? LIMIT 1";

         $stmt = $conn->prepare($query);
         $stmt->bindParam(1, $email);
         $stmt->bindParam(2, $password);
         $stmt->execute();
         if ($stmt->fetch(PDO::FETCH_ASSOC))
            // Initializing Session
            $_SESSION['login_user'] = $email;

         header("location: index.php");

      } catch (PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
      }
   }
   $conn = null;
}
?>
<div id="login">
   <h2>Login Form</h2>
   <form action="" method="post">
      <label>Email :</label>
      <input id="name" name="email" placeholder="email" type="text">
      <label>Password :</label>
      <input id="password" name="password" placeholder="**********" type="password"><br><br>
      <input name="submit" type="submit" value=" Login ">
      <span><?php echo $error; ?></span>
   </form>
</div>