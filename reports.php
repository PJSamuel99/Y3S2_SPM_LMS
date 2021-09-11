<html>
<head>
<title>Reports</title>
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
      <a href="payoverduefines.php">Pay Overdue Fines</a>
      <a href="viewoverduefines.php">View Overdue Fines</a>
        </div>
  </div>
  <a class="active" href="reports.php">Reports</a>
</div>

</head>
<body class = "body2">

<form >
 
  
  <input class= "i9" type="checkbox" id="report1" name="report1" value="report1">
  <label class="l1" for="report1"> Report On Books Borrowed</label>


  <input class= "i71" type='date' name='fdate' id='fdate' />
  to <input class= "i7" type='date' name='ldate' id='ldate' /><br><br>

  <input class= "i9" type="checkbox" id="report2" name="report2" value="report2">
  <label class="l1"  for="report2"> Report On Overdue Books</label><br><br>

  <input class= "i9" type="checkbox" id="report3" name="report3" value="report3">
  <label class="l1"  for="report3"> Report On Unpaid Fines</label><br><br>

  <input class= "i9" type="checkbox" id="report4" name="report4" value="report4">
  <label class="l1"  for="report4"> Report On Members With Overdue Books</label><br><br>

  <input class="s6" type="submit" value="Generate Reports">
</form>

 </body>
</html>