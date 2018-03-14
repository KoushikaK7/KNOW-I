<?php
        session_start();
		
		error_reporting(E_ERROR);
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;

		$name=$_POST['del_name'];
		$number=$_POST['del_cab'];
		
		$sql = "delete from driver_master WHERE name='$name' and cab_no='$number'";
		$retval = mysql_query($sql);
	    if(! $retval ) 
			{
               die('Could not delete data: ' . mysql_error());
            }       
?>