<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "verify_librarian.php";
	require "header_librarian.php";
?>
<?php
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
		<title>Add book</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css" />
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css" />
		<link rel="stylesheet" href="css/insert_book_style.css">
		<link rel="stylesheet" type="text/css" href="css/navigation.css" />
		<div class="topnav">
  					<a class="active" href="insert_book.php">Add book</a>
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
			<legend>Enter book details</legend>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				
				<div class="icon">
					<input class="b-isbn" id="b_isbn" type="number" name="b_isbn" placeholder="ISBN" required />
				</div>
				
				<div class="icon">
					<input class="b-title" type="text" name="b_title" placeholder="Title" required />
				</div>
				
				<div class="icon">
					<input class="b-author" type="text" name="b_author" placeholder="Author" required />
				</div>
				
				<div>
				<h4>Category</h4>
				
					<p class="cd-select icon">
						<select class="b-category" name="b_category">
						<?php
							while($row = $result->fetch_assoc()) {
							echo "<option>" . $row["category_name"]."</option>";
							}
						?>
						</select>
					</p>
				</div>
				
				<div class="icon">
					<input class="b-price" type="number" name="b_price" placeholder="Price" required />
				</div>
				
				<div class="icon">
					<input class="b-copies" type="number" name="b_copies" placeholder="Copies" required />
				</div>
				
				<br />
				<input style="background-color: #FF8000;" class="b-isbn" type="submit" name="b_add" value="Add book" />
		</form>
	<body>
	
	<?php
		if(isset($_POST['b_add']))
		{
			$query = $con->prepare("SELECT isbn FROM book WHERE isbn = ?;");
			$query->bind_param("s", $_POST['b_isbn']);
			$query->execute();
			
			if(mysqli_num_rows($query->get_result()) != 0)
				echo error_with_field("A book with that ISBN already exists", "b_isbn");
			else
			{
				$query = $con->prepare("INSERT INTO book VALUES(?, ?, ?, ?, ?, ?);");
				$query->bind_param("ssssdd", $_POST['b_isbn'], $_POST['b_title'], $_POST['b_author'], $_POST['b_category'], $_POST['b_price'], $_POST['b_copies']);
				
				if(!$query->execute())
					die(error_without_field("ERROR: Couldn't add book"));
				echo success("Successfully added book");
			}
		}
	?>
</html>