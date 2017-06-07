<?php
  ob_start();
  session_start();
  if($_SESSION['name'] != 'Book'){
	    header('location:login.php');
	  }
?>

<?php
include('connect.php'); 
 $id=$_REQUEST['id'];
?>

 <?php
          $result=mysql_query("select * from reg where id='$id'");
		  while($row=mysql_fetch_array($result)){
			    $password=$row['pass'];
			  }  
 ?> 

<?php
	  
	  if(isset($_POST['submit'])){
		  
		    try{
				  if(empty($_POST['old_pass'])){
					    throw new Exception("Please Input your old Password");
					  }
				  if(empty($_POST['new_pass'])){
					    throw new Exception("Please Input your new Password");
					  }
				  if(empty($_POST['confirm'])){
					    throw new Exception("Please confirm your new Password");
					  }
				 if($password != $_POST['old_pass']){
					    throw new Exception("Your Old Password does not match !");
					 }
				 if($_POST['new_pass'] != $_POST['confirm']){
					    throw new Exception("Your new Password does not match !");
					 }
				  $update=mysql_query("update reg set pass='$_POST[new_pass]' where id='$id'");
				        throw new Exception("Your Password has been changed successfully.");
				  
				}
				
			catch(Exception $e){
				  $error=$e->getMessage();
				}
		  
		  }
	 
?>
<html>
  <head>
    <title>Change Password</title>
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
	 table{
		 margin-top:90px;
		 
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
       
        
        <form method="post" action="">
            <table align="center" cellpadding="10px" cellspacing="5px">
                <tr>
                    <td>Enter Old Password : </td>
                    <td><input type="password" name="old_pass" value=""></td>
                </tr>
                <tr>
                    <td>Enter New Password : </td>
                    <td><input type="password" name="new_pass" value=""></td>
                </tr>
                <tr>
                    <td>Confirm Password : </td>
                    <td><input type="password" name="confirm" value=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Change"></td>
                </tr>
            </table>
        </form>
       
        </div> <!-------content-------->
        
        <div class="footer">
        </div> <!--------footer-------->
    </div> <!-------main div--------->
  </body>
</html>