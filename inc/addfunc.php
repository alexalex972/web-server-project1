<?php
	function addtocart($uid,$pid,$number=1){
		$conn=new PDO("mysql:host=db;dbname=trainsystem", 'user', 'test');
		$sql=$conn->prepare("INSERT INTO `Cart` (`uid`, `pid`, `number`) VALUES (?, ?, ?)");
		$sql->bindValue(1, $uid, PDO::PARAM_INT);
		$sql->bindValue(2, $pid, PDO::PARAM_INT);
		$sql->bindValue(3, $number, PDO::PARAM_INT);
		$sql->execute();
	}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	var_dump($_POST);
	foreach($_POST as $i){
		addtocart(1,$i);
	}
	//header("Location: index.php");
}
?>
