<?php
       session_start();
	   //error_reporting(E_ERROR);
	   
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;
		
	   //$_POST['username'];
	  // $_POST['password'];
	   
	   $_SESSION['name']=$_POST['username'];
	   
	   $sql= "select count(id) from user_master where email_id = '{$_POST['username']}'";
       $result = mysql_query($sql);
	   $row = mysql_fetch_assoc($result);
	   
		 if($row['count(id)']==0)
			 $sql="select id,email_id,password,type from driver_master where email_id='{$_POST['username']}'";
         else
             $sql="select id,email_id,password,type from user_master where email_id='{$_POST['username']}'";	 
       
	   $result = mysql_query($sql);
	   $row = mysql_fetch_assoc($result);
	   
	   if($_POST['password'] == $row['password'])
	   {
			   if($row['type'] == 'u')
			   {
				   $newURL = 'userpage.html';
				   header('Location: '.$newURL);
			   }
			   elseif($row['type']=='a')
			   {
				  $newURL = 'admin.html';
				  header('Location: '.$newURL); 
			   }
			   elseif($row['type'] == 'd')
			   {
				   $newURL = 'userpage.html';
				   header('Location: '.$newURL);
			   }
			   else
			   {
				   echo "User Type Not Mentioned in Table";
			   }
	   }
	   else
	   {
		  $newURL = 'login.php?Message=Incorrect username or password';
		  header('Location: '.$newURL);
	   }       
 ?>