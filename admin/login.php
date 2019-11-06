<?php
require_once('../inc/logout.php');
session_start();
$error = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Email or Password is invalid";
    } else {

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email == 'admin' && $password == 'admin') {
            $_SESSION['login_admin'] = 'admin';
            header("location: ../index.php");
         } else {
            echo "Wrong credentials! Please, try again!";
         }
    }
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