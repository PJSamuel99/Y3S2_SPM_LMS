<html>
<head>
<title>View Overdue Fines</title>
<link rel="stylesheet" href="stylesheet6.css">
<div class="topnav">
<a href="issuebooks.php">Issue Books</a>
<a  href="returnbooks.php">Return Books</a>
<a href="extendduedates.php">Extend Due Dates</a>
<a href="booksborrowed.php">Books Borrowed</a>
  
  <div class="dropdown">
    <button class="dropbtn">Fines 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="payoverduefines.php">Pay Overdue Fines</a>
      <a class="active" href="viewoverduefines.php">View Overdue Fines</a>
        </div>
  </div>
  <a href="reports.php">Reports</a>
</div>

</head>
<body class = "body">

<?php
$con = mysqli_connect('localhost', 'root', '', 'library_db');
if(!$con)
die("ERROR: Couldn't connect to database");
$sql = "SELECT * FROM memberfines ";
$result = $con->query($sql);
echo "<table width='60%' cellpadding='10' cellspacing='10' align='center'>
<tr>
<th>Member ID<hr></th>
<th>Member Name<hr></th>
<th>Due Amount<hr></th>

</tr>";
// output data of each row
while($row = $result->fetch_array()) {



echo "<tr><td>" . $row["MemberID"]. "</td><td> ". $row["MemberName"]. "</td><td> ". $row["Amount"].  "</td></tr> ";
}

?>

</body>
</html>