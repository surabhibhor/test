<html>
	<head>
		<title>admin page</title> 
		<link rel="stylesheet" type="text/css" href="style.css">
		</head>
	<body>
		<form action="" method="POST" enctype="multipart/data-from">
			<br>
			<h3 class="gill">Admin Login</h3>
			<div class="good">
			<input type="text" name="aname" placeholder="enter admin name">
		</div>
		<div class="good">
			<input type="password" name="pass" placeholder="password">
		</div>
		<div class="good">
			<input type="submit" name="submit" value="submit">
		</div>
		<div class="chill">
			<a href="admin.php">admin registeration</a>
		</div>
		</form>
		<?php
		   require 'adminconn.php';
		   if(isset($_POST['submit']))
		   {
		   	 $aname=$_POST['aname'];
		   	 $pass=$_POST['pass'];
				$accept=mysqli_query($conn,"SELECT * FROM adminr WHERE aname='$aname' AND password='$pass'");
			    $number=mysqli_num_rows($accept);
			    if($number==1)
			    {
			      session_start();
			      $row=mysqli_fetch_assoc($accept);
			      $userid=$row['id'];

			      echo"<script>";
			      echo "document.location.replace('./publish.php')";
			      echo"</script>";

		     	}
		   }
		?>
	</body>
</html>