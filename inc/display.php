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
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$sql = $conn->prepare("SELECT * FROM Catalogue");
	$sql->execute();
	$sql->setFetchMode(PDO::FETCH_ASSOC);
	$data = $sql->fetchAll();
	if(isset($_SESSION['login_admin'])) {
		$var = '<td><a href="edit_form.php?id=$i[pid]">Edit</a></td>';
		
	} else {
		$var = '';
	}
	foreach ($data as $i)
		echo <<<"CAT"
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
		<td>$i[desc]</td>
		$var
	</tr>
CAT;
	?>
</table>
