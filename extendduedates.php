<html>
<head>
<title>Extend Due Dates</title>
<link rel="stylesheet" href="stylesheet1.css">
<div class="topnav">
<a href="issuebooks.php">Issue Books</a>
<a href="returnbooks.php">Return Books</a>
<a class="active" href="extendduedates.php">Extend Due Dates</a>
<a href="booksborrowed.php">Books Borrowed</a>
  
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
<body class = "body">

<form method="POST" action="#">
<label for="bookID">Book ID:</label>
  <input class="i10" type="text" id="bookID" name="bookID"><br><br>
<label for="duedate">Extended Due Date:</label>
  <input class="i11" type="date" id="duedate" name="duedate"><br><br>
  
 
  <input class="s5" type="submit" name="update" value="Extend Due Date">
</form>
<?php
$con = mysqli_connect('localhost', 'root', '', 'library_db');
if(!$con)
die("ERROR: Couldn't connect to database");
if(isset($_POST['update']))
{
$id1=$_POST["bookID"];
$date=$_POST["duedate"];
$query = "UPDATE issuedbooks SET DueDate='$date' where BookID='$id1';";
mysqli_query($con, $query);
}
?>
 </body>
</html>