<?php
require 'db_connect.php'
?>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<style>
		body {
			background-color: #fff5cc
		}
	</style>
	<title>View member</title>
</head>
<body>
	<?php include 'header.php'; ?>
	<div style="margin-top:50px">
		<table class="table table-striped table-hover" style="margin:auto;width:80%">
			<tr>
				<th>Name</th>
				<th>MemberID</th>
				<th>Address</th>
				<th>Phone Number</th>
				<th>Email</th>
				
			</tr>

			<?php
			$sql = "SELECT `name`,`memberId`,`Address`,`phoneNumber`,`email` FROM `librarian`";
			$result = $con->query($sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["name"] . "</td><td>" . $row["memberId"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["phoneNumber"] . "</td><td>" . $row["email"] . "</td></tr>";
				}
				echo "</table>";
			} else {
				echo "0 results";
			}

			?>
	</div>
</body>

</html>