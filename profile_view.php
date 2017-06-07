<?php
include('connect.php'); 
?>
<?php

	  $id4=$_REQUEST['id2'];
	  $id=$_REQUEST['id3'];
	 
	
?>
<html>
  <head>
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="homeStyle.css">
    
    <style>
	  .contentA{
		  margin:0 auto;
	      width:700px;
		  height:400px;
	      padding:5px;
		  background:linear-gradient(#9540c1,#6044a1,#23a67c,#25ccca);
		  }
		  
	 table td{
		 font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
		 font-size:20px;
		 color:orange;
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
        
        <?php
          $result=mysql_query("select * from reg where id='$id4'");
		  while($row=mysql_fetch_array($result)){
		  
		?> 
        <table align="center" cellpadding="20px" cellspacing="5px">
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
		?>
        </div> <!-------content-------->
        
        <div class="footer">
        </div> <!--------footer-------->
    </div> <!-------main div--------->
  </body>
</html>