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
			
			$sql = "select * from ride_details where user_id=$user_id";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			$source=$row['source'];
			$destination=$row['destination'];
			$distance=$row['distance'];
			$cost=$row['cost'];
			
			$sql = "select  from user_master where user_id=$user_id";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			$sql="update money_bank set balance = $balance where user_id='$user_id'";
			$retval = mysql_query($sql);
			if(! $retval ) 
			{
				   die('Could not enter data: ' . mysql_error());
			}       

		}
        sql_entry();
?>