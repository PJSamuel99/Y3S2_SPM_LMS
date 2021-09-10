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
	<title>Member report</title>
	<link rel="stylesheet" type="text/css" href="css/global_styles.css" />
	<link rel="stylesheet" type="text/css" href="css/form_styles.css" />
	<link rel="stylesheet" href="css/search_style.css">
</head>

<body>
	<?php include 'header.php'; ?>

	<form class="cd-form" method="POST" action="#">
		<legend>Generate report</legend>

		<div class="error-message" id="error-message">
			<p id="error"></p>
		</div>

		<div class="icon">
			<input class="b-isbn" id="b_isbn" type="number" name="student_marks" placeholder="student marks" required />
		</div>

		<br />
		<input class="b-isbn" type="submit" name="b_search" value="Generate Report" />
	</form>

	<body>

		<?php
		if (isset($_POST['b_search'])) {
			$id = $_POST['student_marks'];
			$sql = "SELECT `name`,`memberId`,`Address`,`phoneNumber`,`email` FROM `student` WHERE  mark = $id" ;
			$result = $con->query($sql);

			if ($result->num_rows > 0) {
				echo "<table width='100%' cellpadding='10' cellspacing='10'>
				<tr>
				<th></th>
				<th>student name<hr></th>
				<th>StudentId<hr></th>
				<th>Address<hr></th>
				<th>phoneNumber<hr></th>
				<th></th>
				</tr>";
				// output data of each row
				while ($row = $result->fetch_assoc()) {
					echo "<tr><th></th><td>" . $row["name"] . "</td><td>" . $row["StudentId"] . "</td><td> " . $row["Address"] . "</td><td> " . $row["phoneNumber"] . "</td><td> " . $row["email"] . "</td><td> <form class='cd-form' method='POST' action=" . $_SERVER['PHP_SELF'] . "><input type='hidden' name='hide' value='" . $row["memberId"] . "'/><input class='b-isbn' type='submit' name='b_delete' value='Delete' /></form> </td></tr>";
					// echo "<tr><th></th><td>" . $row["name"] . "</td><td>" . $row["memberId"] . "</td><td> " . $row["Address"] . "</td><td> " . $row["phoneNumber"] . "</td><td> " . $row["email"] . "</td><td> <form class='cd-form' method='POST' action=" . $_SERVER['PHP_SELF'] . "><input type='hidden' name='hide' value='" . $row["memberId"] . "'/><input class='b-isbn' type='submit' name='b_delete' value='Delete' /><input class='b-isbn' type='submit' name='b_update' value='Update' /></form> </td></tr>";

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
			//echo success("Successfully deleted book");
		}

		?>

</html>