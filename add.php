<?php
        session_start();
		
		error_reporting(E_ERROR);
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;

		function sql_entry()
		{
		    $name=$_SESSION['name'];
			$sql = "select id from user_master where email_id='$name'";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			$user_id=$row['id'];
			
			$sql = "INSERT INTO emergency_contacts(user_id,ename,econtact,emailid)VALUES('{$user_id}','{$_POST['name']}','{$_POST['phone']}','{$_POST['mail']}')";

	        $retval = mysql_query($sql);
            if(! $retval ) 
			{
               die('Could not enter data: ' . mysql_error());
            }
            else
			{
              header('Location: userpage.html');
              exit;
            }             			
			
        }
        sql_entry();
?>	