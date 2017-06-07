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

<html>
  <head>
    <title>Biology</title>
    <link rel="stylesheet" type="text/css" href="homeStyle.css">
     <style>
      .contentA{
		  background-image:url(images/skulls.png);
		  margin:0 auto;
	      width:850px;
	      padding:5px;  
		  }


	  .show{
		    margin:0 auto;
			width:800px;
			height:160px;
			border-radius:8px;
			overflow:hidden;
			/*background:#d9dad9;*/
			padding:2px;
			margin-top:10px;
			color:#3F6;
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
	  .page{
		  background:#3C6;
		  text-align:center;
		  text-shadow:#F00;
		  text-decoration:blink;
		  height:50px;
          width:697;
          margin:0 auto;
	      margin-top:0px;
   
          border-style:inset;
    
		  }
	
	  table td{
			color:#000;
			font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
			font-size:20px;
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
      
        <div class="contentA">
          <h2 class="page"><marquee behavior="alternate">Here You Are in Biology Section</marquee></h2>
          
           <?php
            $show=mysql_query("select * from biology");
			while($get=mysql_fetch_array($show)){
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
              
                </div>
                <?php
				}
		  ?>
        </div> <!-------content-------->
        
        <div class="footer">
        </div> <!--------footer-------->
    </div> <!-------main div--------->
  </body>
</html>