<?php
        
		session_start();
		
		error_reporting(E_ERROR);
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;
            
		    $id=$_SESSION['id1'];
			
			$sql = "UPDATE driver_master SET name='{$_POST['named']}', flat_no='{$_POST['flatd']}', area='{$_POST['aread']}', city='{$_POST['cityd']}', state='{$_POST['stated']}', pin='{$_POST['pind']}', email_id='{$_POST['mailidd']}', phone_no='{$_POST['phnnod']}', password='{$_POST['passwordd']}', cab_no='{$_POST['cabidd']}',cab_type='{$_POST['cabd']}' where id='{$id}'";

	        $retval = mysql_query($sql);
            if(! $retval ) 
			{
               die('Could not enter data: ' . mysql_error());
            }
            else
			{
              header('Location:edit_cab.php');
              exit;
            }             
 ?>