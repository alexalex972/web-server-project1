<table class='table table-hover table-striped '>
	<tr>
		<th>Id </th>
		<th>Name </th>
		<th>From </th>
		<th>To </th>
		<th>Departure time </th>
		<th>Arrival time </th>
		<th># of tickets left </th>
		<th>Price </th>
		<th>Description </th>
		<?php
		if (isset($_SESSION['login_admin'])) {
			echo "<th></th>";
		}
		?>
	</tr>
	<?php
	require_once('auth/auth.php');
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$sql = $conn->prepare("SELECT * FROM Catalogue");
	$sql->execute();
	$sql->setFetchMode(PDO::FETCH_ASSOC);
	$data = $sql->fetchAll();

	foreach ($data as $i) {
		if (isset($_SESSION['login_admin'])) {
			$var = "<td><a href='edit_form.php?id=$i[pid]'>Edit</a></td>";
		} else {
			$var = '';
		}
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
		$var
	</tr>
CAT;
	}
	?>
</table>