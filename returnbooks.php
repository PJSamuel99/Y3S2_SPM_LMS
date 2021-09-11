<html>
<head>
<title>Return Books</title>
<link rel="stylesheet" href="stylesheet1.css">
<div class="topnav">
<a href="issuebooks.php">Issue Books</a>
<a class="active" href="returnbooks.php">Return Books</a>
<a href="extendduedates.php">Extend Due Dates</a>
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
<label margin-left = "20px" for="bookID">Book ID:</label>
<input class="i5" type="text" id="bookID" name="bookID"><br><br>

<input class="s2" type="submit" name="return" value="Return Book">

</form>
<?php
$con = mysqli_connect('localhost', 'root', '', 'library_db');
if(!$con)
die("ERROR: Couldn't connect to database");
if(isset($_POST['return']))
{

  $id1=$_POST["bookID"];
  if($id1=='BM876'|| $id1=='C0234')
  {
  echo "<script>alert('Your book is overdue. You have to pay a fine of Rs. 300')</script>";
  }
  
  
  $query = "DELETE FROM issuedbooks where BookID='$id1';";
  mysqli_query($con, $query);
  
  
  
}


?>

 </body>
</html>