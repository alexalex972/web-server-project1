<?php
	function deletecat($pid){
		$conn=new PDO("mysql:host=db;dbname=trainsystem", 'user', 'test');
		$sql=$conn->prepare("DELETE FROM `Catalogue` WHERE pid = ?");
		$sql->bindValue(1, $pid, PDO::PARAM_INT);
		$sql->execute();
	}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	foreach($_POST as $i){
		deletecat($i);
	}
	header("Location: index.php");
}
?>
