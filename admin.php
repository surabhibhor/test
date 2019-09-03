<html>
	<head>
		<title>admin page</title>
  		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<form action="" method="POST" enctype="multipart/data-from">
			<br>
			<h3 class="gill">Admin Registeration</h3>
		<div class="good">
			<input type="text" name="aname" placeholder="enter your name">
			</div>
		<div>	
			<input type="text" name="email" placeholder="enter email">
			</div>
			<div class="good">
			<input type="password" name="pass" placeholder="password">
			</div>
			<div class="good">
			<input type="submit" name="submit" value="submit">
			</div >
			<div class="chill">
			<a href="adminlogin.php">Admin Registeration</a>
		</div>
		</form>
		<?php
		    error_reporting(0);
			require 'adminconn.php';
			if(isset($_POST['submit']))
			{   $aname=$_POST['aname'];
				$email=$_POST['email'];
				$pass=$_POST['pass'];
				
				//database add value			
				$insert=mysqli_query($conn,"INSERT INTO adminr(aname,email,password)VALUES('$aname','$email','$pass')");
				if(!$insert)
				{
					echo $conn->error;
				}
			
			}
		?>
	</body>
</html>