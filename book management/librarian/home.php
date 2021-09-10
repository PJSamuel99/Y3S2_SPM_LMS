<?php
	require "../db_connect.php";
	require "verify_librarian.php";
	require "header_librarian.php";
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
		<title>Welcome</title>
		<link rel="stylesheet" type="text/css" href="css/home_style.css" />
	</head>
	<body class="bg">
		<div id="allTheThings">
			<a href="insert_book.php">
				<input style="background-color: #FF8000;" type="button" value="Add a new book" />
			</a><br />
			<a href="update_copies.php">
				<input style="background-color: #FF8000;" type="button" value="Update copies of a book" />
			</a><br />
			<a href="add_catogories.php">
				<input style="background-color: #FF8000;" type="button" value="Add categories" />
			</a><br />
			<a href="search.php">
				<input style="background-color: #FF8000;" type="button" value="Search books" />
			</a><br />
			<a href="view.php">
				<input style="background-color: #FF8000;" type="button" value="View books" />
			</a><br />
			<a href="book_report.php">
				<input style="background-color: #FF8000;" type="button" value="Generate books report" />
			</a><br />
			<a href="category_report.php.php">
				<input style="background-color: #FF8000;" type="button" value="Generate category report" />
			</a><br />
		</div>
	</body>
</html>