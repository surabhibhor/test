<html>
   <head>
   	  <title>home page</title>
   	  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style1.css">
          
   </head>
   <body>
   		
   		
   		 
   		<?php
         session_start();
         if(isset($_SESSION['pid']));
         {
          $pid=$_SESSION['pid'];
          echo $pid;
        
          require 'adminconn.php';

          $accept=mysqli_query($conn,"SELECT * FROM publish WHERE pid='$pid'");
          $number=mysqli_num_rows($accept);
           if($number)
           {
             	 while($row=mysqli_fetch_assoc($accept))
             	 {
                //$pid1=$row['pid'];
             	 	$title=$row['title'];
             	 	$comment=$row['comment'];
             	 	$email=$row['email'];
             	 	$weblink=$row['weblink'];
             	 	$image=$row['image'];


             	 	?>
              	<div class="div1">
                  <form action="" method="POST" enctype="multipart/form-data">
                 <div class="ko">
                 <h3>Make a post</h3>
                 <input type="hidden" name="id" value="<?php echo $pid;?>"><br>
                 <div class="ko">
                       <label>Title</label>
                    </div>
                       <?php 
                          echo"<input type='text' name='title' value='$title'>";
                       ?>
                   
                
                 <div class="ko">
                       <label>Comment</label>
                    </div>
                      <?php
                        echo "<textarea name='comment' value='$comment'>".$comment."</textarea>";
                       ?>
                                              
                 <div class="ko">
                       <label>image</label>
                    </div>
                      <?php
                       echo "<img src=data:image/jpg;base64,$image width='20%'>";
                     ?>
                      <input type='file' name='image'>
                            
                 <div class="ko">
                       <label>Website link or contact</label>
                    </div>
                      <?php
                       echo"<input type='text' name='weblink' value='$weblink'>";
                       ?>
                    
                 
                 <br>
                 <div class="ko">
                       <label>email</label>
                    </div>
                     <?php
                      echo"<input type='text' name='email' value='$email'>";
                       ?>
                  
                 </div>
                              
                 <input type="submit" name="update" value="update">  
                <div class="ko">
                 <input type="submit" name="delete" value="delete"> 
                 </div>           
              </form>
            </div>
            
              <?php

              if(isset($_POST['update']))
                {
                  echo "hellow";
                  $id=$_POST['id'];
                  $title1=$_POST['title'];
                  $comment1=$_POST['comment'];
                  $weblink1=$_POST['weblink'];
                  $email1=$_POST['email'];

                  $image1=$_FILES['image']['tmp_name'];
                  if($image1){
                    $binary1=fread(fopen($image1,"r"),filesize($image1));
                    $picture1=base64_encode($binary1);
                  
                   echo $picture1;

                    $update=mysqli_query($conn,"UPDATE publish SET title='$title1',comment='$comment1',image='$picture1',weblink='$weblink1',email='$email1' WHERE pid='$id'");
                    if($update)
                    {
                      echo"<script>";
                      echo"document.location.replace('./home.php')";
                      echo"</script>";
                    }
                    else
                    {
                      echo $conn->error;
                    }
                  }
                }//isset update
                if(isset($_POST['delete']))
                {
                  $id=$_POST['id'];
                  $delete=mysqli_query($conn,"DELETE FROM publish WHERE pid='$id'");
                      if($delete)
                      {
                        echo"<script>";
                        echo"document.location.replace('./home.php')";
                        echo"</script>";
                      }
                      else
                      {
                        echo $conn->error;
                      }
                }
              
              
           	 }
           }
        
           else
           {
           	 echo "not post id like this";
           }
          }

   		?>
      
   </body>
</html>