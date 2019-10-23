<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trains</title>
  <meta charset="utf-8">
<?php
	require_once('inc/head.php');
?>
</head>
<body>
<?php
	require_once('inc/jumbotron.php');
	require_once('inc/nav.php');
?>
<div>
<pre>
<?php
	$conn=new PDO("mysql:host=db;dbname=trainsystem", 'user', 'test');
	$sql=$conn->prepare("SELECT * FROM Users");
	$sql->execute();
	$sql->setFetchMode(PDO::FETCH_ASSOC);
	$data=$sql->fetchAll();
	var_dump($data);
?>
</pre>
</div>
</body>
</html> 
