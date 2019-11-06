<?php
session_start();
require_once('../auth/auth.php');
$a[0]=$servername;
$a[1]=$username;
$a[2]=$password;
$a[3]=$dbname;

	function addtocart($uid,$pid,$number,$auth){
		$conn=new PDO("mysql:host=$auth[0];dbname=$auth[3]", $auth[1], $auth[2]);
		$sql=$conn->prepare("INSERT INTO `Cart` (`uid`, `pid`, `number`) VALUES (?, ?, ?);UPDATE `Catalogue` SET `number` = `number`- ? WHERE `Catalogue`.`pid` = ?");
		$sql->bindValue(1, $uid, PDO::PARAM_INT);
		$sql->bindValue(2, $pid, PDO::PARAM_INT);
		$sql->bindValue(3, $number, PDO::PARAM_INT);
		$sql->bindValue(4, $number, PDO::PARAM_INT);
		$sql->bindValue(5, $pid, PDO::PARAM_INT);
		$sql->execute();
	}
function checknum($pid,$number=1,$auth){
		$conn=new PDO("mysql:host=$auth[0];dbname=$auth[3]", $auth[1], $auth[2]);
		$sql=$conn->prepare("SELECT number FROM Catalogue WHERE pid = ?");
		$sql->bindValue(1, $pid, PDO::PARAM_INT);
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		$dbnum=$sql->fetchAll();
		$dbnum=$dbnum[0]['number'];
		if($number<$dbnum)return true;
		return false;
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$number=intval($_POST['number']);
	unset($_POST['number']);
	var_dump($_POST);
	echo $number;
	foreach($_POST as $i){
		if(checknum($i,$number,$a))
			addtocart($_SESSION['login_user'],$i,$number,$a);
		else{
			echo '<script language="javascript">';
			echo 'alert("Error occured")';
			echo '</script>';
		}
	}
	header("Location: ../index.php");
}
?>
