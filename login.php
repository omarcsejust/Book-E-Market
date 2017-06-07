<?php
include('connect.php'); 
?>
<?php
  if(isset($_REQUEST['id'])){
	    $id=$_REQUEST['id'];
	  }
	   else{
		    $id=0;
		  }
?>


<?php
  if(isset($_POST['f_submit'])){
	    try{
			  if(empty($_POST['f_user_name'])){
				    throw new Exception('Please enter your user name !');
				  }
			  if(empty($_POST['f_password'])){
				    throw new Exception('Please enter your password !');
				  }
		    $test=0;
			$result=mysql_query("select * from reg where user_name='$_POST[f_user_name]' and pass='$_POST[f_password]'");
			while($row=mysql_fetch_array($result)){
				  if($row['user_name']==$_POST['f_user_name'] && $row['pass']==$_POST['f_password']){
					    session_start();
						$id=$row['id'];
						$_SESSION['name']='Book';
					    header('location:myProfile.php?id='.$id);
						$test++;
						//throw new Exception('Your name is'.$row['name']);
					  }
				}
			if($test==0){
				  throw new Exception('Invalid password or user name!');
				}
			
			
			}
			
		catch(Exception $e){
			$error=$e->getMessage();
			}
	  }

?>

<html>
  <head>
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="homeStyle.css">
    <style>
	.writ {
    background-image:url(images/skulls.png);
		  margin:0 auto;
	      width:850px;
	      padding:5px; 
		  height:500px;
		  position:relative; 
	}
	.table td{
		font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
		font-size:23px;
		color:#C90;
		
		}
		
	#submit{
		color:#9F0;
		}
    .error{
		color:#F00;
		width:500px;
		text-align:center;
		height:20px;
		margin-left:180px;
		}
    .takeCenter{
		 margin-left:450px;
		 }
	
		 .loginButton{
		margin:4px;
		padding:2px;
		width:50px;
		height:20px;
		background:#5972A7;
		color:#fff;
		border-radius:5px;
		overflow:hidden;
		float:right;
		}
	.logoutButton{
		margin:4px;
		padding:2px;
		width:60px;
		height:20px;
		background:#5972A7;
		color:#fff;
		border-radius:5px;
		overflow:hidden;
		float:right;
		}
	.loginButton a{
		text-decoration:none;
		color:#fff;
		}
	.logoutButton a{
		text-decoration:none;
		color:#fff;
		}
	.login{
		margin-top:150px;
		margin-left:220px;
		width:400px;
		height:180px;
		border:1px solid #4889F2;
		background:#D6D6D6;
		border-radius:8px;
		}
	table tr td input{
		width:190px;
		height:30px;
		}
	#sign{
		margin-left:86px;
		width:227px;
		height:30px;
		background:#4889F2;
		color:#fff;
		}
	table{
		margin-top:30px;
		}
    </style>
  </head>
  
  <body background="images/retina_wood.png">
    <div class="main">
      <div class="head">
         <div class="loginButton"><a href="login.php?id=<?php echo $id; ?>">Log In</a></div>
        <div class="logoutButton"><a href="logout.php">Log Out</a></div>
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
      
        <div class="writ">
        <div class="error" align="center">
         <?php
          if(isset($error)){
			    echo "<h2>".$error."</h2>";
			  }
		?>
        </div>
        <div class="login">
        <form action="" method="post">
          <table align="center" class="table" cellspacing="3px;">
            <tr>
              <td><img src="images/24949f328e6b21aa6ec21fb31642d2e9.png" width="30px" height="30px"/></td>
              <td><input type="text" name="f_user_name" placeholder="User Name"></td>
            </tr>
            
            <tr>
              <td><img src="images/password.png" width="30px" height="30px"/></td>
              <td><input type="password" name="f_password" placeholder="Password"></td>
            </tr>
            
           
          </table>
          <input type="submit" name="f_submit" value="Sign In" id="sign"></input>
        </form>
       </div>
       
        </div> <!-------content-------->
        
        <div class="footer">
        </div> <!--------footer-------->
    </div> <!-------main div--------->
  </body>
</html>