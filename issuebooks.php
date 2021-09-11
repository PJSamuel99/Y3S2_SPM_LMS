<html>
<head>
<title>Issue Books</title>
<link rel="stylesheet" href="stylesheet1.css">
<div class="topnav">
<a class="active" href="issuebooks.php">Issue Books</a>
<a href="returnbooks.php">Return Books</a>
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



<form class="cd-form" method="POST" action="#">
<br><br>



Book Id<input class="i1" type='text' name='bookID' id='bookID' required /><br><br><br>
Member Id<input class="i2" type='text' name='memberID' id='memberID' required /><br><br><br>
Due Date<input class="i3" type='date' name='duedate' id='duedate' required /><br><br><br>
<input class="s1" type="submit" name="b_add" value="Issue Book" />
</form>
</body>

<?php
$con = mysqli_connect('localhost', 'root', '', 'library_db');
if(!$con)
die("ERROR: Couldn't connect to database");
if(isset($_POST['b_add']))
{
$bId=$_POST['bookID'];
$mId=$_POST['memberID'];
$date=$_POST['duedate'];
$cdate=date('Y-m-d H:i:s');
$query = "INSERT INTO issuedbooks (BookID, MemberID, DueDate,BorrowedDate) VALUES('$bId','$mId','$date','$cdate');";
mysqli_query($con, $query);
echo "Successfully Issued Book";
}


?>