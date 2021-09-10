<?php
require 'db_connect.php'
?>
<html>
<head>
  <title>Add Member</title>
  <link rel="stylesheet" href="alertifyjs/css/alertify.rtl.css">
  <link rel="stylesheet" href="alertifyjs/css/themes/default.rtl.css"">
<!-- include alertify script -->
  <script src=" alertifyjs/alertify.js">
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <style>
	body{
		background-color:#fff5cc
	}
  </style>
</head>
<body>
  <?php include 'header.php'; ?>

  <div style="margin-left:30%;margin-top:100px;max-width:80%">
    <form class="row g-3 needs-validation" style="max-width:100%" method="POST" novalidate>
      <h3>Enter Member Details</h3>

      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Full Name" name="fullName" id="validationCustom03" required>
        <div class="invalid-feedback">
          Please provide a Name.
        </div>
      </div>
      <br>
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Member ID" name="memberId" id="validationCustom03" required>
        <div class="invalid-feedback">
          Please provide a Member ID.
        </div>
      </div>
      <br>
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Address" name="Address" id="validationCustom03" required>
        <div class="invalid-feedback">
          Please provide a Address.
        </div>
      </div>
      <br>
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Phone Number" name="phoneNumber" id="validationCustom03" required>
        <div class="invalid-feedback">
          Please provide a Phone Number.
        </div>
      </div>
      <br>
      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Email" name="email" id="validationCustom03" required>
        <div class="invalid-feedback">
          Please provide a Email.
        </div>
      </div>
      <br>
      <div class="col-md-6">
        <button class="btn btn-outline-warning" name="btnsubmit" style="width:50%;margin-left:50%" type="submit">Submit form</button>
      </div>
    </form>
  </div>
  <?php
  if (isset($_POST['btnsubmit'])) {

    if (isset($_POST["fullName"])) {
      $name = $_POST["fullName"];
    }
    if (isset($_POST["memberId"])) {
      $memberId = $_POST["memberId"];
    }
    if (isset($_POST["Address"])) {
      $Address = $_POST["Address"];
    }

    if (isset($_POST["phoneNumber"])) {
      $phoneNumber = $_POST["phoneNumber"];
    }

    if (isset($_POST["email"])) {
      $email = $_POST["email"];
    }

    $sql = "INSERT INTO librarian(name,memberId,Address,phoneNumber,email) Values ('$name','$memberId','$Address','$phoneNumber','$email')";
    if (!mysqli_query($con, $sql)) {
      echo "<script> alertify.alert('Error member not inserted'); </script>";
    } else {
      echo "<script> alertify.alert('Member inserted'); </script>";
    }
  }

  ?>
  <script>
    (function() {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
  </script>
</body>

</html>