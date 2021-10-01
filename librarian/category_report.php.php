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
		<link rel="stylesheet" type="text/css" href="css/navigation.css" />
		<div class="topnav">
  					<a href="insert_book.php">Add book</a>
  					<a href="update_copies.php">Update copies</a>
  					<a href="add_catogories.php">Add categories</a>
  					<a href="search.php">Search books</a>
					<a href="view.php">View books</a>
  					<a href="book_report.php">Books Report</a>
  					<a class="active" href="category_report.php.php">Category Report</a>
		</div>
	</head>
	<body class="bg">
		<form class="cd-form" method="POST" action="#">
			<legend>Enter Category Report details</legend>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
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
			header('location: categoryReportImpl.php');
		}
	?>
</html>