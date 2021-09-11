<html>
<head>
<title>Pay Overdue Fines</title>
<link rel="stylesheet" href="stylesheet1.css">
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
      <a class="active" href="payoverduefines.php">Pay Overdue Fines</a>
      <a href="viewoverduefines.php">View Overdue Fines</a>
        </div>
  </div>
  <a href="reports.php">Reports</a>
</div>

</head>
<body class = "body">
<form  method="POST" action="#">

<br><br>
<label margin-left = "20px" for="memberID">Member ID:</label>
  <input class="i5" type="text" id="memberID" name="memberID"> <br><br>
  <input class="s2" type="submit" name="paynow" value="Pay Now" >
  <!-- <input class="s3" type="submit" name="cancelfine" value="Cancel Fine"> -->
  <input class="s3" type="reset" name="paylater" value="Pay Later">

</form>

<?php
$con = mysqli_connect('localhost', 'root', '', 'library_db');
if(!$con)
die("ERROR: Couldn't connect to database");
if(isset($_POST['paynow'] ))
{

  $id1=$_POST["memberID"];
  echo "<script>alert('Your fine has been paid!')</script>";
  
  $query = "DELETE FROM memberfines where MemberID='$id1';";
  mysqli_query($con, $query);
  
  
  
}


?>


 </body>
</html>