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
	
?>

<?php

	  $id=$_REQUEST['id'];
	  
	  if(isset($_POST['submit'])){
		  
		    try{
				  if(empty($_POST['u_name'])){
					    throw new Exception("Please Input your name");
					  }
				 if(empty($_POST['u_varsity'])){
					    throw new Exception("Please Input your varsity name");
					  }
				if(empty($_POST['u_faculty'])){
					    throw new Exception("Please Input your faculty name");
					  }
				  if(empty($_POST['u_dept'])){
					    throw new Exception("Please Input your Department");
					  }
				  if(empty($_POST['u_roll'])){
					    throw new Exception("Please Input your roll number");
					  }
				  if(empty($_POST['u_session'])){
					    throw new Exception("Please Input your Session");
					  }
				  if(empty($_POST['u_email'])){
					    throw new Exception("Please Input your Email");
					  }
					 
				 if(!(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$_POST['u_email']))){
                       throw new Exception('You have entered an Invalid email');
                      }
					 
				  if(empty($_POST['u_pr_address'])){
					    throw new Exception("Please Input your present address");
					  }
				 if(empty($_POST['u_par_address'])){
					    throw new Exception("Please Input your parmanent address");
					  }
				  if(empty($_POST['u_phone'])){
					    throw new Exception("Please Input your Phone Number");
					  }
					  
				  $update=mysql_query("update reg set name='$_POST[u_name]',uni_name='$_POST[u_varsity]',faculty='$_POST[u_faculty]',dept='$_POST[u_dept]',id_no='$_POST[u_roll]',session='$_POST[u_session]',email='$_POST[u_email]',present_address='$_POST[u_pr_address]',parmanent_address='$_POST[u_par_address]',phn='$_POST[u_phone]' where id='$id'");
				  throw new Exception("Your Profile has been updated successfully.");
				
				}
				
			catch(Exception $e){
				  $errorProfile=$e->getMessage();
				}
		  
		  }
?>
<!--------Change Password------------------>

 <?php
          $result=mysql_query("select * from reg where id='$id'");
		  while($row=mysql_fetch_array($result)){
			    $password=$row['pass'];
			  }  
 ?> 

<?php
	  
	  if(isset($_POST['submitPass'])){
		  
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
				  $errorPass=$e->getMessage();
				}
		  
		  }
		  
		  
		  /* Upload Image*/
		  if(isset($_POST['img_upload'])){
	   try{
			  $uploaded_file=$_FILES['p_img']['name'];       
              $file_basename=substr($uploaded_file, 0,strripos($uploaded_file, '.'));
			  if(empty($file_basename)){
				    throw new Exception('Please select a file !');
				  }
              $file_extension=substr($uploaded_file, strripos($uploaded_file, '.'));
			  
			  $f1=$id.$file_extension;	
			  move_uploaded_file($_FILES['p_img']['tmp_name'], 'profile_images/'.$f1);
			  
			  //$img=mysql_query("insert into images (user_id,profile_img) values('$id','$f1')");
			  $update=mysql_query("update images set profile_img='$f1' where user_id='$id'");
	      }
	   catch(Exception $er){
		   $img_error=$er->getMessage();
		   
		   }
	}
	 
?>

<html>
  <head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="homeStyle.css">
    
       <!-- Add jQuery library -->
	<script type="text/javascript" src="../lib/jquery-1.10.1.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="../source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="../source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="../source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="../source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="../source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    
    
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
    
    
    
    
    
    <style>
     .contentA{
		  background-image:url(images/skulls.png);
		  margin:0 auto;
	      width:850px;
	      padding:5px; 
		  height:500px;
		  position:relative; 
		  }
		  
    .takeCenter{
		 margin-left:450px;
		 }
		 
	.img{
		margin:0px;
		width:800px;
		height:206px;
		position:relative;
		}
	.imgA{
		margin:1px;
		width:200px;
		height:200px;
		position:relative;
		float:left;
		}
	.imgB{
		margin:2px;
		width:580px;
		height:200px;
		text-align:left;
		position:relative;
		float:right;
		}
	.menuBar{
		margin:opx;
		width:800px;
		height:35px;
		position:relative;
		background:#15e7c2;
		}
	.editProfileButton{
		margin:0px;
		width:200px;
		height:30px;
		position:relative;
		border-radius:5px;
		background:#649029;
		overflow:hidden;
		float:left;
		padding:2px;
		}
	.changePassButton{
		margin:0px;
		margin-left:2px;
		width:200px;
		height:30px;
		position:relative;
		border-radius:5px;
		background:#649029;
		overflow:hidden;
		float:left;
		padding:2px;
		}
	.error{
		color:#F00;
		}
	 .hintA{
		 margin:2px;
		 text-align:left;
		  border-bottom:2px solid #1E9CD5;
		  }
	.hint{
		margin:2px;
		margin-top:6px;
		width:800px;
		}
	.myData{
			 margin:0 auto;
			width:800px;
			/*height:130px;
			border:1px solid #FC6;*/
			border-radius:8px;
			height:auto;
			overflow:hidden;
			padding:2px;
			margin-top:10px;
			color:#3F6;
			background:#d9dad9;
		}
	.myDataA{
		 margin:0px;
		 padding:2px;
		 float:left;
		 width:390px;
		 /*height:95px;*/
		 height:auto;
		}
	.mydataB{
		 margin:0px;
		 padding:2px;
		 float:right;
		 width:390px;
		 /*height:95px;*/
		 height:auto;
		}
	table.tb12 tr:nth-child(2n+1) td{
		/*background:#d9dad9;*/
		background:#15d4cd;
		}	
	 table.tb12 tr:nth-child(2n) td{
		/*background:#d2d3d1;*/
		background:#15e7c2;
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
      
        <div class="contentA" align="center">
        
         <div class="img" align="center">
           <div class="imgA">
           
            <?php
		  $sho=mysql_query("select * from images where user_id='$id'");
			while($ge=mysql_fetch_array($sho)){
				  $get_img=$ge['profile_img'];
				}
		  if(isset($get_img)){
			  ?>
            <img src="profile_images/<?php echo $get_img?>" width="200px" height="200px"/>
            <?php
		  }
		  ?>
           
           </div>
           
           <div class="imgB">
           <div>
             <h4 class="hintA">Upload/Change profile Image</h4>
          <form action="" method="post" enctype="multipart/form-data">
          <table>
             <tr>
                <td><input type="file" name="p_img"></input><td>
               <td> </td>
             </tr>
             <tr>
                <td><input type="submit" name="img_upload" value="Upload"></input><td>
               <td> </td>
             </tr>
          </form>
          </table>
          <?php
		    if(isset($img_error)){
			    echo $img_error;
			  }
          ?>
           <h2 align="center" class="error"> <?php 
		  if(isset($errorProfile)){
			    echo $errorProfile;
			  }
		 ?> </h2>
         <h2 align="center" class="error"> <?php 
		  if(isset($errorPass)){
			    echo $errorPass;
			  }
		 ?> </h2>
           </div>
           </div>
         </div>
         
         <div class="menuBar">
         
          <?php
          $result=mysql_query("select * from reg where id='$id'");
		  while($row=mysql_fetch_array($result)){
			    $name=$row['name'];
				$uni_name=$row['uni_name'];
				$faculty=$row['faculty'];
				$department=$row['dept'];
				$roll=$row['id_no'];
				$session=$row['session'];
				$email=$row['email'];
				$pr_address=$row['present_address'];
				$par_address=$row['parmanent_address'];
				$phone=$row['phn'];
			  }
		  
		?> 
       
           <a class="fancybox" href="#inline1" title="You are going to edit profile"> <div class="editProfileButton">Edit Profile </div></a>
        <div id="inline1" style="width:400px;display: none;">
		<h3 align="center">Edit Your Profile</h3>
		<p>
              <form method="post" action="">
            <table align="center" cellpadding="5px" cellspacing="2px">
                <tr>
                    <td>Name : </td>
                    <td><input type="text" name="u_name" value="<?php echo $name;?>"></td>
                </tr>
                 <tr>
                    <td>Varsity Name : </td>
                    <td><input type="text" name="u_varsity" value="<?php echo $uni_name;?>"></td>
                </tr>
                 <tr>
                    <td>Faculty Name : </td>
                    <td><input type="text" name="u_faculty" value="<?php echo $faculty;?>"></td>
                </tr>
                <tr>
                    <td>Dept : </td>
                    <td><input type="text" name="u_dept" value="<?php echo $department;?>"></td>
                </tr>
                 <tr>
                    <td>Roll No : </td>
                    <td><input type="text" name="u_roll" value="<?php echo $roll;?>"></td>
                </tr>
                <tr>
                    <td>Session : </td>
                    <td><input type="text" name="u_session" value="<?php echo $session;?>"></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="text" name="u_email" value="<?php echo $email;?>"></td>
                </tr>
                 <tr>
                    <td>Present Address : </td>
                    <td><input type="text" name="u_pr_address" value="<?php echo $pr_address;?>"></td>
                </tr>
                 <tr>
                    <td>Parmanent Address : </td>
                    <td><input type="text" name="u_par_address" value="<?php echo $par_address;?>"></td>
                </tr>
                <tr>
                    <td>Phone : </td>
                    <td><input type="text" name="u_phone" value="<?php echo $phone;?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Update"></td>
                </tr>
            </table>
        </form>
       
        </p>
        </div>
           <a class="fancybox" href="#inline2" title="You are going to change Password"> <div class="changePassButton">Change Password </div><a>
         <div id="inline2" style="width:400px;display: none;">
		<h3 align="center">Change Your Password</h3>
		<p>
              <form method="post" action="">
            <table align="center" cellpadding="5px" cellspacing="2px">
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
                    <td><input type="submit" name="submitPass" value="Change"></td>
                </tr>
            </table>
        </form>
        </p>
        </div>
         </div> <!----------Menu-------------->
         
         <div class="hint">
          <h3 class="hintA">Informations Available</h3>
          </div>
         <div class="myData">
           <div class="myDataA">
           <?php
           $result=mysql_query("select * from reg where id='$id'");
		  while($row=mysql_fetch_array($result)){
		  
		?> 
        <table cellpadding="5px" cellspacing="2px" class="tb12" width="390px">
          <tr>
            <td>Name : </td>
            <td> <?php echo $row['name']?></td>
          </tr>
           <tr>
            <td>University Name : </td>
            <td> <?php echo $row['uni_name']?></td>
          </tr>
           <tr>
            <td>Faculty Name : </td>
            <td> <?php echo $row['faculty']?></td>
          </tr>
           <tr>
            <td>Department Name : </td>
            <td> <?php echo $row['dept']?></td>
          </tr>
           <tr>
            <td>Session : </td>
            <td> <?php echo $row['session']?></td>
          </tr>
          </table>
          <?php
		  }
		  ?>
           </div>
           <div class="myDataB">
           <?php
          $result=mysql_query("select * from reg where id='$id'");
		  while($row=mysql_fetch_array($result)){
		  ?> 
        <table cellpadding="5px" cellspacing="2px" class="tb12" width="390px">

           <tr>
            <td>E-mail : </td>
            <td> <?php echo $row['email']?></td>
          </tr>
           <tr>
            <td>Present Address : </td>
            <td> <?php echo $row['present_address']?></td>
          </tr>
           <tr>
            <td>Parmanent Address : </td>
            <td> <?php echo $row['parmanent_address']?></td>
          </tr>
           <tr>
            <td>Contact No. : </td>
            <td> <?php echo $row['phn']?></td>
          </tr>
        </table>
        <?php
		  }
		?> 
           </div>
         </div>
        
      <!-------  <?php
          $result=mysql_query("select * from reg where id='$id'");
		  while($row=mysql_fetch_array($result)){
		  
		?> 
        <table cellpadding="5px" cellspacing="2px">
          <tr>
            <td>Name : </td>
            <td> <?php echo $row['name']?></td>
          </tr>
           <tr>
            <td>Dept. Name : </td>
            <td> <?php echo $row['dept']?></td>
          </tr>
           <tr>
            <td>Session : </td>
            <td> <?php echo $row['session']?></td>
          </tr>
           <tr>
            <td>E-mail : </td>
            <td> <?php echo $row['email']?></td>
          </tr>
           <tr>
            <td>Contact No. : </td>
            <td> <?php echo $row['phn']?></td>
          </tr>
        </table>
        <?php
		  }
		?>  ----------->
        </div> <!-------content-------->
        
        <div class="footer">
        </div> <!--------footer-------->
    </div> <!-------main div--------->
  </body>
</html>