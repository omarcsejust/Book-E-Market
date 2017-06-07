<?php 
 
  include('connect.php');
  
  if(isset($_REQUEST['id']))
  {
	  
	  $id1=$_REQUEST['id'];
	  
	   $userid=mysql_query("select * from engineering where id='$id1'");
	  while($row=mysql_fetch_array($userid)){
		    $id=$row['user_id'];
		  }
	  $result=mysql_query("delete from engineering where id='$id1'");
	  header('location:profile.php?id='.$id);
	  
	  }
	  
	  else
	  {
		  header('location:profile.php?id='.$id);
		  
		  }

?>

<html>

  <head>
    <title>
      Delete Information from Database.
    </title>
  </head>
   
  <body>
     
  </body>
</html>