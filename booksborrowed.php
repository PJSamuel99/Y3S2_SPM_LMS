<html>
<head>
<title>Borrowed Books</title>
<link rel="stylesheet" href="stylesheet4.css">
<div class="topnav">
<a href="issuebooks.php">Issue Books</a>
<a href="returnbooks.php">Return Books</a>
<a href="extendduedates.php">Extend Due Dates</a>
<a class="active" href="booksborrowed.php">Books Borrowed</a>
  
  <div class="dropdown">
    <button class="dropbtn">Fines 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="payoverduefines.php">Pay Overdue Fines</a>
      <a href="viewoverduefines.php">View Overdue Fines</a>
        </div>
  </div>
  <a href="reports.php">Reports</a>
</div>

</head>
<body class="body">



<?php
$con = mysqli_connect('localhost', 'root', '', 'library_db');
if(!$con)
die("ERROR: Couldn't connect to database");
$sql = "SELECT * FROM issuedbooks ";
$result = $con->query($sql);
echo "<table width='80%' cellpadding='10' cellspacing='10' align='center'>
<tr>
<th>Book ID<hr></th>
<th>Member ID<hr></th>
<th>Borrowed Date<hr></th>
<th>Due Date<hr></th>
</tr>";
// output data of each row
while($row = $result->fetch_array()) {



echo "<tr><td>" . $row["BookID"]. "</td><td> ". $row["MemberID"]. "</td><td> ". $row["BorrowedDate"]. "</td><td> ". $row["DueDate"]. "</td></tr> ";
}

?>

</body>
</html>