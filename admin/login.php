<?php
if (session_status() != PHP_SESSION_NONE) {
    session_destroy();
}
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
<head>
	<title>Trains</title>
	<meta charset="utf-8">
	<?php
	require_once('../inc/head.php');
	?>
</head>

<form action="" method="post">
   <div style="margin: 0 auto; max-width: 500px; margin-top: 50px; margin-bottom: 5px;">
      <table class="form-group">
         <label>Username :</label>
         <input id="name" class="form-control" name="email" placeholder="username" type="text">
         <label style="margin-top: .5rem;">Password :</label>
         <input id="password" style="margin-bottom: 1rem;" class="form-control" name="password" placeholder="**********" type="password">
         <div align="center"><input name="submit" class="btn btn-secondary" type="submit" value="Login"></div>
         <span><?php echo $error; ?></span>
      </table>
   </div>
</form>

