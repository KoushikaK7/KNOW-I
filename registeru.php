<?php
        error_reporting(E_ERROR);
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;
            $sql = "INSERT INTO user_master(flat_no,area,city,state,pin,email_id,phone_no,password)VALUES('{$_POST['flat']}','{$_POST['area']}','{$_POST['city']}','{$_POST['state']}','{$_POST['pin']}','{$_POST['mailid']}','{$_POST['phnno']}','{$_POST['password']}')";

	        $retval = mysql_query($sql);
            if(! $retval ) 
			{
               die('Could not enter data: ' . mysql_error());
            }
            else
			{
              header('Location: homepage.html');
              exit;
            }             
 ?>