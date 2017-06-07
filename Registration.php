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
			  if(empty($_POST['f_name'])){
				    throw new Exception('Please enter your name !');
				  }
			  if(empty($_POST['varsity_name'])){
				    throw new Exception('Please enter your Varsity Name !');
				  }
			 if(empty($_POST['faculty_name'])){
				    throw new Exception('Please enter your Faculty Name !');
				  }
			  if(empty($_POST['f_dept'])){
				    throw new Exception('Please enter your Dept. Name !');
				  }
			 if(empty($_POST['roll_no'])){
				    throw new Exception('Please enter your Roll No. !');
				  }
			  if(empty($_POST['f_session'])){
				    throw new Exception('Please enter your session !');
				  }
			  if(empty($_POST['f_email'])){
				    throw new Exception('Please enter your Email !');
				  }
				  
			 if(!(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$_POST['f_email']))){
                   throw new Exception('You have entered an Invalid email');
                 }
				  
			 if(empty($_POST['f_pr_address'])){
				    throw new Exception('Please enter your present address !');
				  }
			 if(empty($_POST['f_par_address'])){
				    throw new Exception('Please enter your parmanent address !');
				  }
			  if(empty($_POST['f_phn'])){
				    throw new Exception('Please enter your Phone Number !');
				  }
			  if(empty($_POST['f_user_name'])){
				    throw new Exception('Please enter your User name !');
				  }
			  if(empty($_POST['f_password'])){
				    throw new Exception('Please enter your Password !');
				  }
				  $passlen=strlen($_POST['f_password']);
				  if($passlen<5){
					    throw new Exception('Your password is too short,use minimum six character !');
					  }
			  if(empty($_POST['f_con_password'])){
				    throw new Exception('Please confirm your Password !');
				  }
			  if(($_POST['f_password']) !=($_POST['f_con_password']) ){
				    throw new Exception('Your Password does not match !');
				  } 
				  
            $show=mysql_query("select pass from reg");
			while($get=mysql_fetch_array($show)){
				if($get['pass']==$_POST['f_password']){
					  throw new Exception('Please choose another password !');
					}
				}
			  
			  $result=mysql_query("insert into reg (name,uni_name,faculty,dept,id_no,session,email,phn,present_address,parmanent_address,user_name,pass) values('$_POST[f_name]','$_POST[varsity_name]','$_POST[faculty_name]','$_POST[f_dept]','$_POST[roll_no]','$_POST[f_session]','$_POST[f_email]','$_POST[f_phn]','$_POST[f_pr_address]','$_POST[f_par_address]','$_POST[f_user_name]','$_POST[f_password]')");
			  
			   $img="blank-profile.png"; 
			 $statement=$db->prepare("SHOW TABLE STATUS LIKE 'reg'");
             $statement->execute();
             $result1=$statement->fetchAll();
             foreach($result1 as $rows)
                 $new_id=$rows[10];
				 $new_id=$new_id-1;
			  $imgs=mysql_query("insert into images (user_id,profile_img) values('$new_id','$img')");
			  
			  throw new Exception('Registration completed successfully');
			
			}
			
		catch(Exception $e){
			$error=$e->getMessage();
			}
	  }

?>

<html>
  <head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="homeStyle.css">
    <style>
	.writ{
	      background-image:url(images/skulls.png);
		  margin:0 auto;
	      width:850px;
	      padding:5px;
		  height:auto;  
	 
	}
	
		  .show{
		    margin:0 auto;
			width:800px;
			height:480px;
			border-radius:8px;
			overflow:hidden;
			padding:2px;
			margin-top:15px;
			color:#3F6;
			/*background:#d9dad9;*/
		  }
		  
	 .showA{
		 margin:2px;
		 padding:2px;
		 float:left;
		 width:390px;
		 height:470px;
		 }
	 .showB{
		 margin:2px;
		 padding:2px;
		 float:right;
		 width:390px;
		 height:470px;
		 }
	table tr td input{
		width:350px;
		}
	#submit{
		width:100px;
		height:30px;
		margin-left:250px;
		background:#390;
		overflow:hidden;
		}
    .error{
		background:#999;
		color:#F00;
		width:400px;
		text-align:center;
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
         <form method="post">
         <?php
          if(isset($error)){
			    echo "<h2 class=error>".$error."</h2>";
			  }
			   
		?>
        <div class="show">
          <div class="showA">
           
             <table>
              <tr><td>Name</td></tr>
              <tr><td><input type="text" name="f_name"></input></td></tr> 
              <tr><td>University Name</td></tr>
              <tr><td><input type="text" name="varsity_name"></input></td></tr> <br>
              <tr><td>Faculty Name</td></tr>
              <tr><td><input type="text" name="faculty_name"></input></td></tr>
              <tr><td>Department Name</td></tr>
              <tr><td><input type="text" name="f_dept"></input></td></tr>
              <tr><td>Roll No.</td></tr>
              <tr><td><input type="text" name="roll_no"></input></td></tr>
              <tr><td>Session</td></tr>
              <tr><td><input type="text" name="f_session"></input></td></tr>
              <tr><td>Email</td></tr>
              <tr><td><input type="text" name="f_email"></input></td></tr>
             </table>
          
          </div>
          
          <div class="showB">
             <table>
              <tr><td>Present Address</td></tr>
              <tr><td><input type="text" name="f_pr_address"></input></td></tr>
              <tr><td>Parmanent Address</td></tr>
              <tr><td><input type="text" name="f_par_address"></input></td></tr> <br>
              <tr><td>Phone Number</td></tr>
              <tr><td><input type="text" name="f_phn"></input></td></tr>
              <tr><td>User Name</td></tr>
              <tr><td><input type="text" name="f_user_name"></input></td></tr>
              <tr><td>Password</td></tr>
              <tr><td><input type="text" name="f_password"></input></td></tr>
              <tr><td>Cnofirn Password</td></tr>
              <tr><td><input type="text" name="f_con_password"></input></td></tr>
              <tr>
              
              <td><input type="submit" name="f_submit" value="Submit" id="submit"></input></td>
            </tr>
             </table>
          </div>
        </show>
       <!------- <form action="" method="post" enctype="multipart/form-data">
          <table align="center" cellpadding="5px" cellspacing="2px" class="table">
            <tr>
              <td><label>Name : </label></td>
              <td><input type="text" name="f_name"></input></td>
            </tr>
            
            <tr>
              <td><label>Dept. Name : </label></td>
              <td><input type="text" name="f_dept"></input></td>
            </tr>
            
            <tr>
              <td><label>Session : </label></td>
              <td><input type="text" name="f_session"></input></td>
            </tr>
            
            <tr>
              <td><label>Email : </label></td>
              <td><input type="email" name="f_email"></input></td>
            </tr>
            
            <tr>
              <td><label>Phone Number : </label></td>
              <td><input type="text" name="f_phn"></input></td>
            </tr>
            
            <tr>
              <td><label>User Name : </label></td>
              <td><input type="text" name="f_user_name"></input></td>
            </tr>
            
            <tr>
              <td><label>Password : </label></td>
              <td><input type="passsword" name="f_password"></input></td>
            </tr>
            
            <tr>
              <td><label>Confirm Password : </label></td>
              <td><input type="password" name="f_con_password"></input></td>
            </tr>
            
            <tr>
              <td></td>
              <td id="submit"><input type="submit" name="f_submit" value="Submit"></input></td>
            </tr>
          </table>
        </form>  ---------->
       </form>
        </div> <!-------content-------->
        
        <div class="footer">
        </div> <!--------footer-------->
    </div> <!-------main div--------->
  </body>
</html>