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
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="homeStyle.css">
    <link rel="stylesheet" type="text/css" href="css/bar/bar.css">
    <link rel="stylesheet" type="text/css" href="css/dark/dark.css">
    <link rel="stylesheet" type="text/css" href="css/default/default.css">
    <link rel="stylesheet" type="text/css" href="css/light/light.css">
    <link rel="stylesheet" type="text/css" href="css/nivo-slider.css">
    
    <style>
	
	  .head{
		  margin-top:0px;
		  padding:0px;
	  width:100%;
	  height:112px;
	  position:relative;
	}

	
      .content{
		   height:1220px;
		   width:850px;
		   background-image:url(images/skulls.png);
		   position:relative;
		  }
		  
	  .titleImg{
		  margin-top:5px;
		  position:relative;
		  }
		  
	  .contentA{
		  width:334px;
		  height:400px;
		  margin-left:77px;
		  margin-top:5px;
		  float:left;
		  padding:5px;
		  border:1px solid #D1D1D1;
		  position:relative;
		  }
		  
	  .contentB{
		  width:337px;
		  height:404px;
		  margin:5px;
		  float:left;
		  padding:3px;
		  border:1px solid #D1D1D1;
		  position:relative;
		  }
	  .hint{
		  color:#090;
		  }
		  
	  .hintA{
		  border-bottom:2px solid #1E9CD5;
		  }
	  .hintImg{
		  margin:0 auto;
		  width:200px;
		  height:200px;
		  float:left;
		  border-radius:5px;
		  overflow:hidden;
		  position:relative;
		  }
	  .hintPara{
		  margin:0px auto;
		  padding:0px;
		  width:130px;
		  height:200px;
		  float:right;
		  position:relative;
		  }
	  p{
		  margin:0 auto;
		  padding:0px;
		  }
		  
	 .contentC{
		 width:690px;
		 height:270px;
		 float:left;
		 margin-top:3px;
		 margin-left:77px;
		 padding:5px;
		 border:1px solid #D1D1D1;
		 position:relative;
		 }
	 .contentCimg{
		 height:200px;
		 width:200px;
		 border-radius:5px;
		 overflow:hidden;
		 float:left;
		 position:relative;
		 }
	 .contentCpara{
		 width:480px;
		 height:198px;
		 padding:3px;
		 float:right;
		 position:relative;
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
   </div>   
    
        <div class="content">
          <div class="slider-wrapper theme-bar">
					<div class="nivoSlider" id="slider">
						<img src="images/0132923734.jpg" alt="This site developed by Rasel Ahmed" title="This site developed by Omar Hasan"/>
						<img src="images/13239-0309219396-450.jpg" alt=""/>
                        <img src="images/cover_with_border_jumping_into_C++.jpg"/>
						<img src="images/527313_10150805370344224_598161562_n.jpg" alt="" title="#htmlcaption"/>
						<img src="images/8166f0de92ab2c3dce954caef1b6becb.jpg" alt=""/>
                        <img src="images/coverlg.jpg"/>
                        <img src="images/0136085318.jpg"/>
                        <img src="images/framed_cover.jpg"/>
                        <img src="images/unn.jpg"/>
                        <img src="images/ora-pp4e-large.jpg"/>
                        <img src="images/0521194245.MZZZZZZZ.jpg"/>
                        <img src="images/image.jpg"/>
                        <img src="images/covr.jpg"/>
                        <img src="images/9810681348.jpg"/>
                        <img src="images/kS42ZrP.jpg"/>
					</div>
					<div class="nivo-html-caption" id="htmlcaption">
						
					</div>
				</div>
                
         <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
		<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider();
		});
		</script>
        
        <div class="titleImg"><img src="images/title.jpg"/ width="850px"></div>
        
        <h2 class="hint" align="center">You can search for the following category Books here.</h2>
        
        <div class="contentA">
        <h3 class="hintA">Engineering</h3>
        <div class="hintImg"><img src="images/engineering.jpg" width="200px" height="200px"/></div>
        <div class="hintPara">
          <p>Welcome to you in this site.In this site you can <b>search</b> for various types of category books to <b>buy</b>,and make a <b>post</b> to <b>sell</b> . If you want to search for <b>Engineering</b> books</p>
        </div>
        <p>to <b>buy</b> or if you are a <b>Registered</b> user of this site, you can make a <b>post</b> in this <b>Engineering</b> section to <b>sell</b>. <br/>If you are searching <b>Engineering</b> books to buy, Please select <b>Engineering</b> option from <b>Catrgory</b>, located in <b>Main Menu.</b>If you are a <b>Registered</b> user of this site, then while making a post to sell your book belongs to <b>Engineering</b> category, select <b>Engineering</b> option.</p>
        </div> <!--------contentA-------->
        
        <div class="contentB">
        <h3 class="hintA">Biology</h3>
        <div class="hintImg"><img src="images/biology.jpg" width="200px" height="200px"/></div>
        <div class="hintPara">
          <p>Welcome to you in this site.In this site you can <b>search</b> for various types of category books to <b>buy</b>,and make a <b>post</b> to <b>sell</b>. If you want to search for <b>Biological</b> books</p>
        </div> <!--------------------contentA------------------->
        <p>to <b>buy</b> or if you are a <b>Registered</b> user of this site, you can make a <b>post</b> in this <b>Biological</b> section to <b>sell</b>. <br/>If you are searching <b>Biological</b> books to buy, Please select <b>Biological</b> option from <b>Catrgory</b>, located in <b>Main Menu.</b>If you are a <b>Registered</b> user of this site, then while making a post to sell your book belongs to <b>Biological</b> category, select <b>Biological</b> option.</p>
        </div> <!---------contentB------------->
        
        <div class="contentC">
        <h3 class="hintA">Applied Science</h3>
        <div class="contentCimg"><img src="images/kS42ZrP.jpg" width="200px" height="200px"/></div>
        <div class="contentCpara">
          <p>Welcome to you in this site.In this site you can <b>search</b> for various types of category books to <b>buy</b>,and make a <b>post</b> to <b>sell</b>. If you want to search for <b>Applied Science</b> books to <b>buy</b> or if you are a <b>Registered</b> user of this site, you can make a <b>post</b> in this <b>Applied Science</b> section to <b>sell</b>. If you are searching <b>Applied Science</b> books to buy, Please select <b>Applied Science</b> option from <b>Catrgory</b>, located in <b>Main Menu.</b>If you are a <b>Registered</b></br> user of this site, then while making a post to sell your book belongs to <b>Applied Science</b> category, select <b>Applied Science</b> option from post table.</p>
        </div>
        </div> <!----------contentC------------>
        
        </div> <!-------content-------->
        
        <div class="footer">
        </div> <!--------footer-------->
    </div> <!-------main div--------->
  </body>
</html>