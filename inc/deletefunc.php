<?php
require_once('../auth/auth.php');
$a[0]=$servername;
$a[1]=$username;
$a[2]=$password;
$a[3]=$dbname;


	function deletecat($pid,$auth){
		$conn=new PDO("mysql:host=$auth[0];dbname=$auth[3]", $auth[1], $auth[2]);
		$sql=$conn->prepare("DELETE FROM `Catalogue` WHERE pid = ?");
		$sql->bindValue(1, $pid, PDO::PARAM_INT);
		$sql->execute();
	}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	foreach($_POST as $i){
		deletecat($i,$a);
	}
	header("Location: ../index.php");
}
?>
