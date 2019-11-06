<form action='inc/deletefunc.php' method='POST'>
	<table class='table-striped table table-hover'>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>From</th>
			<th>To</th>
			<th>Departure time</th>
			<th>Arrival time</th>
			<th>Number of tickets left</th>
			<th>Price</th>
			<th>Description</th>
			<th></th>
		</tr>
		<?php
		$conn = new PDO("mysql:host=localhost;dbname=trainsystem", 'root', '');
		$sql = $conn->prepare("SELECT * FROM Catalogue");
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		$data = $sql->fetchAll();
		$fc = 0;
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
		<td><input type='checkbox' name='field$fc' value='$i[pid]'></td>
	</tr>
CAT;
		?>
	</table>
	<div align="center" style="margin-bottom: 10px">
		<input type='Submit' class="btn btn-secondary" value='Delete'>
	</div>

</form>
<hr class="my-4" style="background-color: white">
<p align="center" style="margin-top: 3px;">Web Server Technologies &copy; 2019 | <a href="">Alex</a> x <a href="">Azim</a> x <a href="">Lyubo</a> | All rights reserved &reg;</p>