<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "../verify_logged_out.php";
	require "../header.php";
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
			.cd-form input[type=submit]{
				
			}
		</style>
		<title>Librarian Login</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css">
		<link rel="stylesheet" type="text/css" href="css/index_style.css">
	</head>
	<body class="bg">
		<form class="cd-form" method="POST" action="#">
		
		<legend>Librarian Login</legend>
		
			<div class="error-message" id="error-message">
				<p id="error"></p>
			</div>
			
			<div class="icon" >
				<input class="l-user" type="text" name="l_user" placeholder="Username" required />
			</div>
			
			<div class="icon">
				<input class="l-pass" type="password" name="l_pass" placeholder="Password" required />
			</div>
			
			<input style="background-color: #FF8000;" type="submit" value="Login" name="l_login"/>
			
		</form>
	</body>
	
	<?php
		if(isset($_POST['l_login']))
		{
			$query = $con->prepare("SELECT id FROM librarian WHERE username = ? AND password = ?;");
			$query->bind_param("ss", $_POST['l_user'], $_POST['l_pass']);
			$query->execute();
			if(mysqli_num_rows($query->get_result()) != 1)
				echo error_without_field("Invalid username/password combination");
			else
			{
				$_SESSION['type'] = "librarian";
				$_SESSION['id'] = 1;
				$_SESSION['username'] = $_POST['l_user'];
				header('Location: view.php');
			}
		}
	?>
	
</html>