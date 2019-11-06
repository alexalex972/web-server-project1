<?php

require_once('../auth/auth.php');
try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    session_start(); // Starting Session
    // Storing Session
    $email_check = $_SESSION['login_user'];
    // SQL Query To Fetch Complete Information Of User
    $query = "SELECT uid from users where email = '$email_check'";
    $ses_sql = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    $login_session = $row['uid'];

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
