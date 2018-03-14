<?php
        error_reporting(E_ERROR);
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;
            $sql = "INSERT INTO driver_master(name,flat_no,area,city,state,pin,email_id,phone_no,password,cab_no,cab_type)VALUES('{$_POST['named']}','{$_POST['flatd']}','{$_POST['aread']}','{$_POST['cityd']}','{$_POST['stated']}','{$_POST['pind']}','{$_POST['mailidd']}','{$_POST['phnnod']}','{$_POST['passwordd']}','{$_POST['cabidd']}','{$_POST['cabd']}')";

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