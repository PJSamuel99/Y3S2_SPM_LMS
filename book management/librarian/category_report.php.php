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
		<title>Category Report</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css" />
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css" />
		<link rel="stylesheet" href="css/insert_book_style.css">
	</head>
	<body class="bg">
		<form class="cd-form" method="POST" action="#">
			<legend>Enter Category Report details</legend>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				
				<div class="icon">
					<input class="b-title" type="text" name="b_title" placeholder="Category Report Duration" required />
				</div>
				
				<div class="icon">
					<input class="b-author" type="text" name="b_author" placeholder="Report title" required />
				</div>
				
				<div>
				
				<br />
				<input style="background-color: #FF8000;" class="b-isbn" type="submit" name="b_add" value="Generate Report" />
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