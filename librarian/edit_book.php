<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "verify_librarian.php";
	require "header_librarian.php";

	$id=$_SESSION['id'];
	$sql = "SELECT * FROM book WHERE isbn=$id";
	$result = $con->query($sql);
	$row = $result->fetch_array();

	$sql = "SELECT category_name FROM categories";
	$result = $con->query($sql);

?>
<html>
	<head>
	<Style>
			.bg{
				background-color:#FFFFCC;
			}
			.icon{
				background-color:white;
			}
		</style>
		<title>Edit book</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css" />
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css" />
		<link rel="stylesheet" href="css/insert_book_style.css">
		<link rel="stylesheet" type="text/css" href="css/navigation.css" />
		<div class="topnav">
  					<a href="insert_book.php">Add book</a>
  					<a href="update_copies.php">Update copies</a>
  					<a href="add_catogories.php">Add categories</a>
  					<a href="search.php">Search books</a>
					<a href="view.php">View books</a>
  					<a href="book_report.php">Books Report</a>
  					<a href="category_report.php.php">Category Report</a>
		</div>
	</head>
	<body class="bg">
		<form class="cd-form" method="POST" action="#">
			<legend>Update book details</legend>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				
				<div class="icon">
					<input class="b-title" type="text" name="b_title" value="<?php echo $row['1']; ?>" placeholder="Title" required />
				</div>
				
				<div class="icon">
					<input class="b-author" type="text" name="b_author" value="<?php echo $row['2']; ?>" placeholder="Author" required />
				</div>
				
				<div>
				<h4>Category</h4>
				
					<p class="cd-select icon">
						<select class="b-category" name="b_category">
						<?php
							echo "<option>" . $row["category"]."</option>";
							while($row1 = $result->fetch_assoc()) {
							echo "<option>" . $row1["category_name"]."</option>";
							}
						?>
						</select>
					</p>
				</div>
				
				<div class="icon">
					<input class="b-price" type="number" name="b_price" value="<?php echo $row['4'];?>" required />
				</div>
				
				<br />
				<input style="background-color: #FF8000;" class="b-isbn" type="submit" name="u_add" value="Update book" />
		</form>
	<body>
	<?php
	if (isset($_POST['u_add']))
 	{
		
		$title= mysqli_real_escape_string($con, $_POST['b_title']);
		$author= mysqli_real_escape_string($con, $_POST['b_author']);
		$category= mysqli_real_escape_string($con, $_POST['b_category']);
		$price= mysqli_real_escape_string($con, $_POST['b_price']);

		$query = "UPDATE book SET title='$title' , author='$author' , category='$category' , price='$price' WHERE isbn=$id";
		$results = mysqli_query($con,$query);
		echo success("Successfully updated book");
	}
	?>
</html>