<table class='table-striped table-hover'>
<tr>
	<th>Id</th>
	<th>Name</th>
	<th>From</th>
	<th>To</th>
	<th>Departure time</th>
	<th>Arrival time</th>
	<th>Number of tockets left</th>
	<th>Price</th>
	<th>Description</th>
</tr>
<?php
	$conn=new PDO("mysql:host=db;dbname=trainsystem", 'user', 'test');
	$sql=$conn->prepare("SELECT * 
FROM Cart INNER JOIN Catalogue ON(Cart.pid = Catalogue.pid)");
	$sql->execute();
	$sql->setFetchMode(PDO::FETCH_ASSOC);
	$data=$sql->fetchAll();
	foreach($data as $i)
echo<<<"CAT"
	<tr>
		<td>$i[pid]</td>
		<td>$i[name]</td>
		<td>$i[dstart]</td>
		<td>$i[dfinish]</td>
		<td>$i[tstart]</td>
		<td>$i[tfinish]</td>
		<td>$i[number]</td>
		<td>$i[price]</td>
		<td>$i[desc]</td>
	</tr>
CAT;
?>
</table>
