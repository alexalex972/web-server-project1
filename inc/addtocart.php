<form action='inc/addfunc.php' method='POST'>
	<table class='table table-striped table-hover'>
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
			<th></th>
			<th></th>
		</tr>
		<?php
		require_once('auth/auth.php');
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$sql = $conn->prepare("SELECT * FROM Catalogue");
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		$data = $sql->fetchAll();
		$fc = 0;
		foreach ($data as $i)
			echo <<<"CAT"
	<tr>
		<label>
		<td>$i[pid]</td>
		<td>$i[name]</td>
		<td>$i[dstart]</td>
		<td>$i[dfinish]</td>
		<td>$i[tstart]</td>
		<td>$i[tfinish]</td>
		<td>$i[number]</td>
		<td>$i[price]</td>
		<td>$i[desc]</td>
		<td><input type='radio' name='field$fc' value='$i[pid]'></td>
		</label>
	</tr>
CAT;
		?>
	</table>
	<div align="center" class="row justify-content-center" style="margin: 0; margin-bottom: 15px">
		<input type="number" style="max-width: 400px; margin-right: 12px" name='number' class="form-control" required placeholder='input number of tickets' min="1" step="1" />
		<input type='Submit' class="btn btn-secondary" value='Add to cart'>
	</div>
</form>
<hr class="my-4" style="background-color: white">
<p align="center" style="margin-top: 3px;">Web Server Technologies &copy; 2019 | <a href="">Alex</a> x <a href="">Azim</a> x <a href="">Lyubo</a> | All rights reserved &reg;</p>