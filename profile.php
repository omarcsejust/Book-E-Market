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
  $post_date=date('d-m-Y');
  $E=0;
  $B=10000;
  $Ap=20000;
  
?>

<?php

  if(isset($_POST['submit'])){
	    try{
			if(empty($_POST['book_name'])){
				throw new Exception('Please Enter Book Name.');
				}
			if(empty($_POST['writer_name'])){
				throw new Exception('Please Enter Book Writer Name.');
				}
			if(empty($_POST['book_edition'])){
				throw new Exception('Please Enter Book Edition.');
				}
			if(empty($_POST['book_price'])){
				throw new Exception('Please Enter the amount of Book price.');
				}
			if(empty($_POST['contact'])){
				throw new Exception('Please Enter Contact Number.');
				}
				
				$name=$_POST['category'];
				
			if(empty($name)){
				throw new Exception('Please choose a Category.');
				}
			$search=mysql_query("select * from reg where id='$id'");
			while($row=mysql_fetch_array($search)){
				$u_name=$row['name'];
				}
			if($name=='Engineering'){
				$result=mysql_query("insert into Engineering (user_id,post_date,user_name,book,writer,edition,price,contact) values('$id','$post_date','$u_name','$_POST[book_name]','$_POST[writer_name]','$_POST[book_edition]','$_POST[book_price]','$_POST[contact]')");
			}
			elseif($name=='Biology'){
				$result=mysql_query("insert into biology (user_id,post_date,user_name,book,writer,edition,price,contact) values('$id','$post_date','$u_name','$_POST[book_name]','$_POST[writer_name]','$_POST[book_edition]','$_POST[book_price]','$_POST[contact]')");
				}
			elseif($name=='Applied'){
				$result=mysql_query("insert into applied_science (user_id,post_date,user_name,book,writer,edition,price,contact) values('$id','$post_date','$u_name','$_POST[book_name]','$_POST[writer_name]','$_POST[book_edition]','$_POST[book_price]','$_POST[contact]')");
				}
				
			
			}
			
		catch(Exception $e){
			  $errom_message=$e->getMessage();
			}
	  }
	  
	  // Update Engineering Posts//
	  
	  if(isset($_POST['submitEngineering'])){
		  try{
			  if(empty($_POST['book_name'])){
				throw new Exception('Please Enter Book Name.');
				}
			if(empty($_POST['writer_name'])){
				throw new Exception('Please Enter Book Writer Name.');
				}
			if(empty($_POST['book_edition'])){
				throw new Exception('Please Enter Book Edition.');
				}
			if(empty($_POST['book_price'])){
				throw new Exception('Please Enter the amount of Book price.');
				}
			if(empty($_POST['contact'])){
				throw new Exception('Please Enter Contact Number.');
				}
			if(empty($_POST['getEID'])){
				throw new Exception('Book ID Not found.');
				}
			//$e_book_id=$_POST['getEID'];
			
			$e_update=mysql_query("update engineering set book='$_POST[book_name]',writer='$_POST[writer_name]',edition='$_POST[book_edition]',price='$_POST[book_price]',contact='$_POST[contact]' where id='$_POST[getEID]'");
			throw new Exception('Data updated');	
				
			  }
		  catch(Exception $e){
			    $errom_message=$e->getMessage();
			  }
		  }
		  
	  // Update Biology Posts//
	  
	  if(isset($_POST['submitBiology'])){
		  try{
			  if(empty($_POST['book_name'])){
				throw new Exception('Please Enter Book Name.');
				}
			if(empty($_POST['writer_name'])){
				throw new Exception('Please Enter Book Writer Name.');
				}
			if(empty($_POST['book_edition'])){
				throw new Exception('Please Enter Book Edition.');
				}
			if(empty($_POST['book_price'])){
				throw new Exception('Please Enter the amount of Book price.');
				}
			if(empty($_POST['contact'])){
				throw new Exception('Please Enter Contact Number.');
				}
			if(empty($_POST['getEID'])){
				throw new Exception('Book ID is Not found!');
				}
			//$e_book_id=$_POST['getEID'];
			
			$e_update=mysql_query("update biology set book='$_POST[book_name]',writer='$_POST[writer_name]',edition='$_POST[book_edition]',price='$_POST[book_price]',contact='$_POST[contact]' where id='$_POST[getEID]'");
			throw new Exception('Data updated');	
			  }
		  catch(Exception $e){
			    $errom_message=$e->getMessage();
			  }
		  }
		  
	 // Update Applied Science Posts//
	  
	  if(isset($_POST['submitApplied'])){
		  try{
			  if(empty($_POST['book_name'])){
				throw new Exception('Please Enter Book Name.');
				}
			if(empty($_POST['writer_name'])){
				throw new Exception('Please Enter Book Writer Name.');
				}
			if(empty($_POST['book_edition'])){
				throw new Exception('Please Enter Book Edition.');
				}
			if(empty($_POST['book_price'])){
				throw new Exception('Please Enter the amount of Book price.');
				}
			if(empty($_POST['contact'])){
				throw new Exception('Please Enter Contact Number.');
				}
			if(empty($_POST['getEID'])){
				throw new Exception('Book ID is Not found!');
				}
			//$e_book_id=$_POST['getEID'];
			
			$e_update=mysql_query("update applied_science set book='$_POST[book_name]',writer='$_POST[writer_name]',edition='$_POST[book_edition]',price='$_POST[book_price]',contact='$_POST[contact]' where id='$_POST[getEID]'");
			throw new Exception('Data updated');
			  }
		  catch(Exception $e){
			    $errom_message=$e->getMessage();
			  }
		  }
?>

<html>
  <head>
    <title>Admin Panel</title>
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
		  }
	 .postButton{
		 margin:0px;
		 padding:2px;
		 margin-top:5px;
		 height:30px;
		 width:100px;
		 border-radius:5px;
		 overflow:hidden;
		 background:#649029;
		 margin-left:700px;
		 text-decoration:none;
		 }
	  a{
		 text-decoration:none;
		 font-size:2opx;
		 color:fff;
		 }
	 .postButton:hover{
		 color:#0FAFEB;
		 }
	 .hintA{
		 margin:0px;
		 margin-left:2px;
		 padding:3px;
		 text-align:left;
		  border-bottom:2px solid #1E9CD5;
		  }
	  .show{
		    margin:0 auto;
			width:800px;
			height:160px;
			/*border:1px solid #FC6;*/
			border-radius:8px;
			overflow:hidden;
			padding:2px;
			margin-top:10px;
			color:#3F6;
			/*background:#d9dad9;*/
		  }
	 .date{
		 margin:0 auto;
		 padding:0px;
		 /*background:#649029;*/
		 background:#706868;
		 widows:800px;
		 }
	 .showA{
		 margin:0px;
		 padding:2px;
		 float:left;
		 width:390px;
		 height:95px;
		 }
	 .showB{
		 margin:0px;
		 padding:2px;
		 float:right;
		 width:390px;
		 height:95px;
		 }
	table.tb12 tr:nth-child(2n+1) td{
		/*background:#d9dad9;*/
		/*background:#15d4cd;*/
		background:#dfefef;
		}	
	 table.tb12 tr:nth-child(2n) td{
		/*background:#d2d3d1;*/
		/*background:#15e7c2;*/
		background:#c4ecc7;
		}
	.deleteButton{
		margin:0px;
		padding:2px;
		margin-right:3px;
		width:100px;
		height:30px;
		background:#649029;
		border-radius:5px;
		float:right;
		}
	.deleteButton a{
		text-decoration:none;
		}
	

	p{
		margin:0px;
		color:#060;
		text-align:center;
	}
	#count{
		background:#000;
		color:#FFF;
		}
   .showError{
	   text-align:center;
	   color:#F00;
	   font-family:Baskerville, "Palatino Linotype", Palatino, "Century Schoolbook L", "Times New Roman", serif;
	   font-size:40px;
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
    
    <script type="text/javascript">
      function deleteEngineering(){
		    return confirm("Do you want to Delete this?");
		  }
    </script>
    
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
   </div>   
      </div> <!--------marquee--------->
     
        <div class="contentA" align="center">
          
          <a class="fancybox" href="#inline100" title="You are going to add a post"><div class="postButton">Add New Post </div></a>
         
       <div id="inline100" style="width:400px;display: none;">
		<h3 align="center">Please fill up the form</h3>
		<p>
			 <form method="post">
            <table align="" cellpadding="5px" cellspacing="2px" class="">
              <tr>
                <td>Book Name:</td>
                <td><input type="text" name="book_name"></input></td>
              </tr>
              <tr>
                <td>Writer Name:</td>
                <td><input type="text" name="writer_name"></input></td>
              </tr>
              <tr>
                <td>Edition:</td>
                <td><input type="text" name="book_edition"></input></td>
              </tr>
              <tr>
                <td>Price : </td>
                <td><input type="text" name="book_price"></input></td>
              </tr>
              <tr>
                <td>Contact:</td>
                <td><input type="text" name="contact"></input></td>
              </tr>
              <tr>
                <td>Select Category: </td>
                <td>
                
                  <select name="category">
                    
                    <option value="Engineering">Engineering</option>
                    <option value="Biology">Blology</option>
                    <option value="Applied">Applied Science</option>
                    
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Post"></input></td>
              </tr>
            </table>
          </form>
		</p>
	   </div>
         
          <h3 class="hintA">List of my posts</h3>
          <div class="showError">
          <?php 
		  if(isset($errom_message)){
			    echo $errom_message;
			  }
		  ?>
          </div>
          <?php
            $show=mysql_query("select * from engineering where user_id='$id'");
			while($get=mysql_fetch_array($show)){
				$E++;
				?>
                <div class="show">
               <h3 align="center" class="date"> Date of Post: <?php echo $get['post_date'];?> </h3>
               <div class="showA">
                <table cellpadding="4px" cellspacing="2px" class="tb12" width="390px">
                  <tr>
                    <td>Book Owner:</td>
                    <td><?php echo $get['user_name'];?></td>
                  </tr>
                  <tr>
                    <td>Book Name:</td>
                    <td><?php echo $get['book'];?></td>
                  </tr>
                  <tr>
                    <td>Writer Name:</td>
                    <td><?php echo $get['writer'];?></td>
                  </tr>
                 </table>
                </div> <!-------ShowA-------------->
               <div class="showB">
                <table cellpadding="4px" cellspacing="2px" class="tb12" width="390px">
                  <tr>
                    <td>Book Edition:</td>
                    <td><?php echo $get['edition'];?></td>
                  </tr>
                  <tr>
                    <td>Book Price:</td>
                    <td><?php echo $get['price'];?></td>
                  </tr>
                  <tr>
                    <td>Contact No.:</td>
                    <td><?php echo $get['contact'];?></td>
                  </tr>
                 </table>
                </div> <!-------showB----------->
                
                
                <!---------Edit Button Engineerig-------------->
                <a class="fancybox" href="#inline<?php echo $E;?>" title="You are going to edit this post"><div class="deleteButton">Edit Post </div></a>
         
       <div id="inline<?php echo $E;?>" style="width:400px;display: none;">
		<h3 align="center">Please fill up the form</h3>
		<p>
			 <form method="post">
            <table align="" cellpadding="5px" cellspacing="2px" class="">
              <tr>
                <td>Book Name:</td>
                <td><input type="text" name="book_name" value="<?php echo $get['book'];?>"></input></td>
              </tr>
              <tr>
                <td>Writer Name:</td>
                <td><input type="text" name="writer_name" value="<?php echo $get['writer'];?>"></input></td>
              </tr>
              <tr>
                <td>Edition:</td>
                <td><input type="text" name="book_edition" value="<?php echo $get['edition'];?>"></input></td>
              </tr>
              <tr>
                <td>Price : </td>
                <td><input type="text" name="book_price" value="<?php echo $get['price'];?>"></input></td>
              </tr>
              <tr>
                <td>Contact:</td>
                <td><input type="text" name="contact" value="<?php echo $get['contact'];?>"></input></td>
              </tr>
              <tr>
                <td></td>
                <input type="hidden" name="getEID" value="<?php echo $get['id'];?>"/>
                <td><input type="submit" name="submitEngineering" value="Update"></input></td>
              </tr>
            </table>
          </form>
		</p>
	   </div>
                <!---------Edit Button End------------->
                      <a onclick='return deleteEngineering();' href="delete.php?id=<?php echo $get['id']; ?>"> <div class="deleteButton">Delete</div> </a>
                  
                </div> <!---------Show--------------->
                <?php
				}
		  ?>
          
          <?php
            $show=mysql_query("select * from biology where user_id='$id'");
			while($get=mysql_fetch_array($show)){
				$B++;
				?>
                <div class="show">
                <h3 align="center" class="date"> Date of Post: <?php echo $get['post_date'];?> </h3>
               <div class="showA">
                <table cellpadding="4px" cellspacing="2px" class="tb12" width="390px">
                  <tr>
                    <td>Book Owner:</td>
                    <td><?php echo $get['user_name'];?></td>
                  </tr>
                  <tr>
                    <td>Book Name:</td>
                    <td><?php echo $get['book'];?></td>
                  </tr>
                  <tr>
                    <td>Writer Name:</td>
                    <td><?php echo $get['writer'];?></td>
                  </tr>
                 </table>
                </div> <!-------ShowA-------------->
               <div class="showB">
                <table cellpadding="4px" cellspacing="2px" class="tb12" width="390px">
                  <tr>
                    <td>Book Edition:</td>
                    <td><?php echo $get['edition'];?></td>
                  </tr>
                  <tr>
                    <td>Book Price:</td>
                    <td><?php echo $get['price'];?></td>
                  </tr>
                  <tr>
                    <td>Contact No.:</td>
                    <td><?php echo $get['contact'];?></td>
                  </tr>
                 </table>
                </div> <!-------showB----------->
                 
                 
                  <!---------Edit Button Biology-------------->
                <a class="fancybox" href="#inline<?php echo $B;?>" title="You are going to edit this post"><div class="deleteButton">Edit Post </div></a>
         
       <div id="inline<?php echo $B;?>" style="width:400px;display: none;">
		<h3 align="center">Please fill up the form</h3>
		<p>
			 <form method="post">
            <table align="" cellpadding="5px" cellspacing="2px" class="">
              <tr>
                <td>Book Name:</td>
                <td><input type="text" name="book_name" value="<?php echo $get['book'];?>"></input></td>
              </tr>
              <tr>
                <td>Writer Name:</td>
                <td><input type="text" name="writer_name" value="<?php echo $get['writer'];?>"></input></td>
              </tr>
              <tr>
                <td>Edition:</td>
                <td><input type="text" name="book_edition" value="<?php echo $get['edition'];?>"></input></td>
              </tr>
              <tr>
                <td>Price : </td>
                <td><input type="text" name="book_price" value="<?php echo $get['price'];?>"></input></td>
              </tr>
              <tr>
                <td>Contact:</td>
                <td><input type="text" name="contact" value="<?php echo $get['contact'];?>"></input></td>
              </tr>
              <tr>
                <td></td>
                <input type="hidden" name="getEID" value="<?php echo $get['id'];?>"/>
                <td><input type="submit" name="submitBiology" value="Update"></input></td>
              </tr>
            </table>
          </form>
		</p>
	   </div>
                <!---------Edit Button End------------->
                  
                 
                      <a onclick='return deleteEngineering();' href="delete_biology.php?id=<?php echo $get['id']; ?>"><div class="deleteButton">Delete</div> </a>
                  
                </div> <!---------Show--------------->
                <?php
				}
		  ?>
          
          <?php
            $show=mysql_query("select * from applied_science where user_id='$id'");
			while($get=mysql_fetch_array($show)){
				$Ap++;
				$myName=$get['user_name'];
				?>
                <div class="show">
              <h3 align="center" class="date"> Date of Post: <?php echo $get['post_date'];?> </h3>
               <div class="showA">
                <table cellpadding="4px" cellspacing="2px" class="tb12" width="390px">
                  <tr>
                    <td>Book Owner:</td>
                    <td><?php echo $get['user_name'];?></td>
                  </tr>
                  <tr>
                    <td>Book Name:</td>
                    <td><?php echo $get['book'];?></td>
                  </tr>
                  <tr>
                    <td>Writer Name:</td>
                    <td><?php echo $get['writer'];?></td>
                  </tr>
                 </table>
                </div> <!-------ShowA-------------->
               <div class="showB">
                <table cellpadding="4px" cellspacing="2px" class="tb12" width="390px">
                  <tr>
                    <td>Book Edition:</td>
                    <td><?php echo $get['edition'];?></td>
                  </tr>
                  <tr>
                    <td>Book Price:</td>
                    <td><?php echo $get['price'];?></td>
                  </tr>
                  <tr>
                    <td>Contact No.:</td>
                    <td><?php echo $get['contact'];?></td>
                  </tr>
                 </table>
                </div> <!-------showB----------->
                 
                 
                 
                  <!---------Edit Button Applied Science-------------->
                  
                <a class="fancybox" href="#inline<?php echo $Ap;?>" title="You are going to edit this post"><div class="deleteButton">Edit Post </div></a>
         
       <div id="inline<?php echo $Ap;?>" style="width:400px;display: none;">
		<h3 align="center">Please fill up the form</h3>
		<p>
			 <form method="post">
            <table align="" cellpadding="5px" cellspacing="2px" class="">
              <tr>
                <td>Book Name:</td>
                <td><input type="text" name="book_name" value="<?php echo $get['book'];?>"></input></td>
              </tr>
              <tr>
                <td>Writer Name:</td>
                <td><input type="text" name="writer_name" value="<?php echo $get['writer'];?>"></input></td>
              </tr>
              <tr>
                <td>Edition:</td>
                <td><input type="text" name="book_edition" value="<?php echo $get['edition'];?>"></input></td>
              </tr>
              <tr>
                <td>Price : </td>
                <td><input type="text" name="book_price" value="<?php echo $get['price'];?>"></input></td>
              </tr>
              <tr>
                <td>Contact:</td>
                <td><input type="text" name="contact" value="<?php echo $get['contact'];?>"></input></td>
              </tr>
              <tr>
                <td></td>
                <input type="hidden" name="getEID" value="<?php echo $get['id'];?>"/>
                <td><input type="submit" name="submitApplied" value="Update"></input></td>
              </tr>
            </table>
          </form>
		</p>
	   </div>
                <!---------Edit Button End------------->
                 
                 
                 
                      <a onclick='return deleteEngineering();' href="delete_applied.php?id=<?php echo $get['id']; ?>"><div class="deleteButton">Delete</div> </a>
                  
                </div> <!---------Show--------------->
                <?php
				}
		  ?>
        
        </div> <!-------content-------->
        
         
       <!-------   <div class="image">
         
          <p align="center" id="count"><?php echo $myName;?></p>
          <p>Engineering : <?php echo $E;?></p>
          <p>Biology : <?php echo $B;?></p>
          <p>Applied Science : <?php echo $Ap;?></p>
          </div>
          ---------->
        
        <div class="footer">
        </div> <!--------footer-------->
    </div> <!-------main div--------->
  </body>
</html>