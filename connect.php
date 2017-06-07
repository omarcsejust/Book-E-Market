<?php

   mysql_connect('localhost','root','') or die('Can not connect to the database.');
   
   mysql_select_db('book_sell') or die('Database Can not be found.');
  
  $dbhost='localhost';
  $dbname='book_sell';
  $dbusername='root';
  $dbpassword='';
  
  try{
	    $db=new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbusername,$dbpassword);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	  }
  
  catch(PDOException $e){
	    echo "Connection error: ".$e->getMessage();
	  }

?>