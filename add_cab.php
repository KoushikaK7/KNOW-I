<?php
        error_reporting(E_ERROR);
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;
            $sql = "INSERT INTO driver_master(name,flat_no,area,city,state,pin,email_id,phone_no,password,cab_no,cab_type,type)VALUES('{$_POST['namea']}','{$_POST['flata']}','{$_POST['areaa']}','{$_POST['citya']}','{$_POST['statea']}','{$_POST['pina']}','{$_POST['mailida']}','{$_POST['phnnoa']}','{$_POST['passworda']}','{$_POST['cabida']}','{$_POST['caba']}','a')";

	        $retval = mysql_query($sql);
            if(! $retval ) 
			{
               die('Could not enter data: ' . mysql_error());
            }
            else
			{
              header('Location: admin.html');
              exit;
            }             
 ?>