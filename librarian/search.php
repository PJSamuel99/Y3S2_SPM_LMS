<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "verify_librarian.php";
	require "header_librarian.php";
?>

<html>
	<head>
		<style>
			.b-isbn{
    				margin-left:10px;
			}
			.bg{
				background-color:#FFFFCC;
			}
			.icon{
				background-color:white;
			}
		</style>
		<title>Search book</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css" />
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css" />
		<link rel="stylesheet" href="css/search_style.css">
		<link rel="stylesheet" type="text/css" href="css/navigation.css" />
		<div class="topnav">
  					<a href="insert_book.php">Add book</a>
  					<a href="update_copies.php">Update copies</a>
  					<a href="add_catogories.php">Add categories</a>
  					<a class="active" href="search.php">Search books</a>
					<a href="view.php">View books</a>
  					<a href="book_report.php">Books Report</a>
  					<a href="category_report.php.php">Category Report</a>
		</div>
	</head>
	<body class="bg">
		<form class="cd-form" method="POST" action="#">
			<legend>Enter book details</legend>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				
				<div class="icon">
					<input class="b-isbn" id="b_isbn" type="number" name="b_isbn" placeholder="ISBN" required />
				</div>
				
				<br />
				<input style="background-color: #FF8000;" class="b-isbn" type="submit" name="b_search" value="Search books" />
		</form>
	<body>
	
	<?php
		if(isset($_POST['b_search']))
		{
				$id = $_POST['b_isbn'];
				$sql = "SELECT isbn,title,author,price,copies FROM book where isbn=$id";
				$result = $con->query($sql);
		
				if ($result->num_rows > 0) {
				echo "<table width='100%' cellpadding='10' cellspacing='10'>
				<tr style='background-color: #f18973;color: white;' >
				<th>ISBN<hr></th>
				<th>Title<hr></th>
				<th>Author<hr></th>
				<th>Price<hr></th>
				<th>copies<hr></th>
				<th>action<hr></th>
				</tr>";
				// output data of each row
				$row = $result->fetch_assoc();
				echo "<tr  style='background-color: #f4e1d2;color: black;'><td>" . $row["isbn"]. "</td><td>" . $row["title"]. "</td><td> " . $row["author"]. "</td><td> " . $row["price"]. "</td><td> " . $row["copies"]. "</td><td> <form class='cd-form' method='POST' action='#'><input type='hidden' name='hide' value='".$row["isbn"]."'/><input style='background-color: #FF8000;' class='b-isbn' type='submit' name='b_delete' value='Delete' /><input style='background-color: #FF8000;' class='b-isbn' type='submit' name='b_update' value='Update' /></form> </td></tr>";
				echo "</table>";
				} else {
					echo success("Search not found");
				} 
		}
		if(isset($_POST['b_delete']))
		{
				$id1=$_POST["hide"];
				$query = "DELETE FROM book where isbn=$id1;";
				mysqli_query($con, $query);
				echo success("Successfully deleted book");
		}
		if(isset($_POST['b_update']))
		{
				$id1=$_POST["hide"];
				$_SESSION['id'] = $id1;
				header('location: edit_book.php');
		}
		
	?>
</html>