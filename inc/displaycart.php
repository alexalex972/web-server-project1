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
require_once('auth/auth.php');
	$conn=new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$sql=$conn->prepare("SELECT * 
FROM Cart INNER JOIN Catalogue ON(Cart.pid = Catalogue.pid) WHERE Cart.uid = ?");
	$sql->bindValue(1,$_SESSION['login_user']);
	$sql->execute();
	$sql->setFetchMode(PDO::FETCH_ASSOC);
	$data=$sql->fetchAll();
	$total=0;
	foreach($data as $i){
		$total+=$i['price'];
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
	}
?>
</table>
<button onclick="myFunction()">Buy now</button>

<script>
function myFunction() {
confirm("Are you sure you want to buy it?");
}
</script>
