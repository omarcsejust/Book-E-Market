<?php
  ob_start();
  session_start();
  if($_SESSION['name'] != 'Book'){
	    header('location:login.php');
	  }
?>

<?php
include('connect.php'); 
?>
<?php

	  $id=$_REQUEST['id'];
	  
	  if(isset($_POST['submit'])){
		  
		    try{
				  if(empty($_POST['u_name'])){
					    throw new Exception("Please Input your name");
					  }
				  if(empty($_POST['u_dept'])){
					    throw new Exception("Please Input your Department");
					  }
				  if(empty($_POST['u_session'])){
					    throw new Exception("Please Input your Session");
					  }
				  if(empty($_POST['u_email'])){
					    throw new Exception("Please Input your Email");
					  }
				  if(empty($_POST['u_phone'])){
					    throw new Exception("Please Input your Phone Number");
					  }
					  
				  $update=mysql_query("update reg set name='$_POST[u_name]',dept='$_POST[u_dept]',session='$_POST[u_session]',email='$_POST[u_email]',phn='$_POST[u_phone]' where id='$id'");
				  throw new Exception("Your Profile has been updated successfully.");
				
				}
				
			catch(Exception $e){
				  $error=$e->getMessage();
				}
		  
		  }
	 
?>
<html>
  <head>
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="homeStyle.css">
    
    <style>
	  .contentA{
		  margin:0 auto;
	      width:700px;
		  height:400px;
	      padding:5px;
		  background-image:url(images/skulls.png);
		  }
		  
	 table td{
		 font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
		 font-size:20px;
		 color:orange;
		 }
		 
	.error{
		color:#F00;
		}
    .takeCenter{
		 margin-left:450px;
		 }
    </style>
  </head>
  
  <body background="images/retina_wood.png">
    <div class="main">
      <div class="head">
       
      </div> <!--------head----------->
      <div class="marquees">
       <div class="takeCenter">
       <ul id="coolMenu">
         <li><a href="home.php?id=<?php echo $id; ?>">Home</a></li>
         <li><a href="myProfile.php?id=<?php echo $id; ?>">Profile</a></li>
         <li><a href="profile.php?id=<?php echo $id; ?>">Add Post</a></li>
         <li>
            <a href="">View Post</a>
           <ul>
             <li><a href="engineering.php?id=<?php echo $id; ?>">Engineering</a></li>
             <li><a href="biology.php?id=<?php echo $id; ?>">Biology</a></li>
             <li><a href="applied.php?id=<?php echo $id; ?>">Applied Science</a></li>
           </ul>
         </li>
         <li><a href="Registration.php?id=<?php echo $id; ?>">Sign Up</a></li>
       </ul>
     </div>      
      </div> <!--------marquee--------->
      
        <div class="contentA">
       <h2 align="center" class="error"> <?php 
		  if(isset($error)){
			    echo $error;
			  }
		 ?> </h2>
        <?php
          $result=mysql_query("select * from reg where id='$id'");
		  while($row=mysql_fetch_array($result)){
			    $name=$row['name'];
				$department=$row['dept'];
				$session=$row['session'];
				$email=$row['email'];
				$phone=$row['phn'];
			  }
		  
		?> 
        
        <form method="post" action="">
            <table align="center" cellpadding="10px" cellspacing="5px">
                <tr>
                    <td>Name : </td>
                    <td><input type="text" name="u_name" value="<?php echo $name?>"></td>
                </tr>
                <tr>
                    <td>Dept : </td>
                    <td><input type="text" name="u_dept" value="<?php echo $department?>"></td>
                </tr>
                <tr>
                    <td>Session : </td>
                    <td><input type="text" name="u_session" value="<?php echo $session?>"></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="text" name="u_email" value="<?php echo $email?>"></td>
                </tr>
                <tr>
                    <td>Phone : </td>
                    <td><input type="text" name="u_phone" value="<?php echo $phone?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Update"></td>
                </tr>
            </table>
        </form>
       
        </div> <!-------content-------->
        
        <div class="footer">
        </div> <!--------footer-------->
    </div> <!-------main div--------->
  </body>
</html>