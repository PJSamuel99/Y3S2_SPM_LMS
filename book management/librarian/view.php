<?php
	require "../db_connect.php";
	require "../message_display.php";
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
		<title>View book</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css" />
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css" />
		<link rel="stylesheet" href="css/delete_books.css">
	</head>
	<body class="bg"    >
    <?php
		$sql = "SELECT * FROM book";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        echo "<table  width='100%' cellpadding='10' cellspacing='10' border='1'>
        <tr style='background-color: #bc5a45;color: white;'>
        <th>ISBN<hr></th>
        <th>Title<hr></th>
        <th>Author<hr></th>
        <th>Category<hr></th>
        <th>Price<hr></th>
        <th>copies<hr></th>
        </tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr style='background-color: #f18973;'><td>" . $row["isbn"]. "</td><td>" . $row["title"]. "</td><td> " . $row["author"]. "</td><td> " . $row["category"]. "</td><td> " . $row["price"]. "</td><td> " . $row["copies"]."</td></tr>";
        }
        echo "</table>";
        } else {
        echo "0 results";
        }       
    ?>]
	<body>
</html>