<html>
   <head>
   	  <title>home page</title>
   	  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
   	  <style>
   	  	
   	  	  	
   	  </style>
   </head>
   <body>
          <div class="contact">
        Contact no:(02425)226509 | email:epay@gamil.com
      </div>
    <h1 >NEWS</h1>

   			<div class="fill">
          <a href="publish.php"> EDITE NEWS</a>|
      	  <a href="pid.php">MANAGE PUBLICATION</a>|
          <a href="logout.php">LOGOUT</a>
      	</div>
   		
   		
   		 
   		<?php
          require 'adminconn.php';
          $accept=mysqli_query($conn,"SELECT * FROM publish");
          $number=mysqli_num_rows($accept);
           if($number)
            {
           	 while($row=mysqli_fetch_assoc($accept))
            {
           	 	$title=$row['title'];
           	 	$comment=$row['comment'];
           	 	$email=$row['email'];
           	 	$weblink=$row['weblink'];
           	 	$image=$row['image'];
           	 	?>
           	 		<div class="div1" style="border:1px;">
           	 		
           	 				<div class="good">
                    <h2>  <?php echo $title;?></h2>

           	 				  <?php                      
           	 				   echo"<img src=data:image/jpg;base64,$image width='50%' height='40%'>";
           	 				   ?>

           	 				</div>
           	 				<div class="jit">
  		           	 			<div><?php echo $comment;?></div>
  		           	 			<div><a href='<?php  echo $weblink ?>'><?php  echo $weblink ?>'</a>
                        </div>
                        <div>
  		           	 			<p><?php  echo $email;?></p>
                        <hr>
                   </div>
           	 		    </div>
           	 		</div>
           	 	<?php
           	 }
           }
           else
           {
           	 echo "no post yet";
           }
   		?>
   </body>
</html>