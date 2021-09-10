<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "verify_librarian.php";
	require "header_librarian.php";	
?>

<html>
	<head>
	<style>
			.bg{
				background-color:#FFFFCC;
			}
			.icon{
				background-color:white;
			}
	.button1 {
		border: none;
  		background: #d75069;
  		border-radius: .25em;
  		padding: 16px 20px;
  		color: #ffffff;
  		font-family: "Open Sans", sans-serif;
  		font-weight: bold;
  		float: right;
  		cursor: pointer;
  		-webkit-font-smoothing: antialiased;
  		-moz-osx-font-smoothing: grayscale;
  		-webkit-appearance: none;
  		-moz-appearance: none;
  		-ms-appearance: none;
  		-o-appearance: none;
  		appearance: none;
}
	</style>
		<title>Add Categories</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css" />
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css" />
		<link rel="stylesheet" href="add_catogories.css">
		<script>	
		function Delete(a)
	{
		document.getElementById('hid_id').value=a;
		document.getElementById('f1').submit();
	
	}
</script>
	</head>
	<body class="bg">
		<form class="cd-form" method="POST" action="#">
			<legend>Enter the details</legend>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				<div class="icon">
					<input class="b-isbn" type='text' name='c_name' id="c_name" placeholder="categoriess" required />
				</div>
						
				<input style="background-color: #FF8000;" type="submit" name="b_add" value="Add Categories" />
		</form>
	</body>
	
	<?php
	
		if(isset($_POST['b_add']))
		{
			$name=$_POST['c_name'];
			$sql = "SELECT category_name FROM categories WHERE category_name = $name;";
			$result = $con->query($sql);
				$query = "INSERT INTO categories (category_name) VALUES('$name');";
				mysqli_query($con, $query);
				echo success("Successfully added category");
		}
		$sql = "SELECT category_name FROM categories";
		$result = $con->query($sql);
		$i=1;
		if ($result->num_rows > 0) {
			echo "<form id='f1' name='f1' class='cd-form' method='POST' action=".$_SERVER['PHP_SELF'].">";
			echo "<input type='hidden' name='hide' id='hid_id'>";
		echo "<table width='80%' cellpadding='10' cellspacing='10' align='center'>
		<tr style='background-color: #f18973;color: white;'>
		<th>No<hr></th>
		<th>Category<hr></th>
		<th>Action<hr></th>
		</tr>";
		// output data of each row
		while($row = $result->fetch_array()) {

			echo "<tr style='background-color: #f4e1d2;'><th>$i</th><td>" . $row["category_name"]. "</td><td> ";
			?><button style="background-color: #FF8000;" class="button button1" onclick='Delete("<?php echo $row[0];?>")'>Delete</button> </td></tr>
			<?php 
			$i++;
		}
		echo "</table></form>";
	}
	if(isset($_POST['hide']))
	{
			$id1=$_POST["hide"];
			$query = "DELETE FROM categories where category_name='$id1';";
			mysqli_query($con, $query);
			echo success("Successfully deleted category");
	}
	
		
	?>
</html>