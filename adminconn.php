<?php
	$conn=mysqli_connect('localhost','root','','test');
	if(!$conn)
	{
		echo $conn->error;
	}
?>