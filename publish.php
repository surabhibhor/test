<html>
   <head>
   	  <title>publish page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style1.css">
   	  
   </head>
   <body>
   		
   			<div class="fill">
               <a href="home.php">NEWS</a>|
   			<a href="pid.php">MANAGE PUBLICATION</a>|
   			<a href="logout.php">LOGOUT</a>
   	         </div>
         <div class="div1">
            <form action="" method="POST" enctype="multipart/form-data">
               <br>
               <p style="text-align:center;">Make a publication</p>
               <div class="row">
                  <div class="good">
                     <label>Title</label>
                  </div>
                  <div class="good">
                     <input type="text" name="title">
                  </div>
               
               
               
                  <div class="good">
                     <label>Comment</label>
                  </div>
                  <div class="good">
                     <textarea name="Comment" rows="10" cols="30"></textarea>
                  </div>
               
                  <div class="good">
                     <label>image</label>
                  </div>
                  <div class="good">
                     <input type="file" name="image">
                  </div>
               
               
                  <div class="good">
                     <label>Website link or contact</label>
                  </div>
                  <div class="good">
                     <input type="text" name="weblink">
                  </div>
               
               
               
                  <div class="good">
                     <label>email</label>
                  </div>
                  <div class="good">
                     <input type="text" name="email">
                  </div>
               
                 <div class="submit">        
               <input type="submit" name="submit" value="PUBLISH"> 
               </div>            
            </form>
         </div>
         <?php
           require 'adminconn.php';
           if(isset($_POST['submit']))
             {
               $title=$_POST['title'];
               $comment=$_POST['Comment'];
               $email=$_POST['email'];
               $weblink=$_POST['weblink'];
               $image=$_FILES['image']['tmp_name'];
               
               $binary=fread(fopen($image,"r"),filesize($image));
               $picture=base64_encode($binary);
               
               $insert=mysqli_query($conn,"INSERT INTO publish(title,Comment,image,weblink,email)VALUES('$title','$comment','$picture','$weblink','$email')");
               if(!$insert)
               {
                  echo $conn->error;
               }
            
               echo "<script>";
               echo "document.location.replace('./home.php')";
               echo "</script>";
            
          }
         ?>
   </body>
</html>