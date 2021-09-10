<?php
require "db_connect.php";
?>
<html>
<head>
	<style>
		.b-isbn {
			margin-left: 10px;
		}
	</style>
	<title>Search Member</title>
	<link rel="stylesheet" type="text/css" href="css/global_styles.css" />
	<link rel="stylesheet" type="text/css" href="css/form_styles.css" />
	<link rel="stylesheet" href="css/search_style.css">
	
	<style>
		body{
			background-color:#fff5cc
		}
	</style>
</head>
<body>
	<?php include 'header.php'; ?>

	<form class="cd-form" method="POST" action="#">
		<legend>Enter member details</legend>

		<div class="error-message" id="error-message">
			<p id="error"></p>
		</div>

		<div class="icon">
			<input class="b-isbn" id="b_isbn" type="number" name="member_id" placeholder="member id" required />
		</div>

		<br />
		<input class="b-isbn" type="submit" name="b_search" value="Search members" />
	</form>

	<body>

		<?php
		if (isset($_POST['b_search'])) {
			$id = $_POST['member_id'];
			$sql = "SELECT `name`,`memberId`,`Address`,`phoneNumber`,`email` FROM `librarian` WHERE  memberId = $id" ;
			$result = $con->query($sql);

			if ($result->num_rows > 0) {
				echo "<table width='100%' cellpadding='10' cellspacing='10'>
				<tr>
				<th></th>
				<th>name<hr></th>
				<th>memberId<hr></th>
				<th>Address<hr></th>
				<th>phoneNumber<hr></th>
				<th>Email<hr></th>
				<th></th>
				</tr>";
				// output data of each row
				while ($row = $result->fetch_assoc()) {
					echo "<tr><th></th><td>" . $row["name"] . "</td><td>" . $row["memberId"] . "</td><td> " . $row["Address"] . "</td><td> " . $row["phoneNumber"] . "</td><td> " . $row["email"] . "</td><td> <form class='cd-form' method='POST' action=" . $_SERVER['PHP_SELF'] . "><input type='hidden' name='hide' value='" . $row["memberId"] . "'/><input class='b-isbn' type='submit' name='b_delete' value='Delete' /> <input class='b-isbn' type='submit' name='b_update' value='Update' /></form> </td></tr>";
					echo "</table>";
				}
			} else {
				echo "<script> alertify.alert('Search not found'); </script>";
			}
		}
		if (isset($_POST['b_delete'])) {
			$id1 = $_POST["hide"];
			$query = "DELETE FROM librarian where memberId=$id1;";
			mysqli_query($con, $query);
			echo "<script> alertify.alert('member Successfully deleted'); </script>";
		}
		?>
</html>