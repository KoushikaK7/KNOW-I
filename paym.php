<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="Bootstrap\css\bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Bootstrap\css\addm.css">
<html>
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
			
			$tot=$_SESSION['total'];
			echo "total:";
			echo $tot;
			
			$sql = "select balance from money_bank where user_id=$user_id";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			$original=$row['balance'];
			echo "original:";
			echo $original;

			$balance = $original-$tot;
			
			$sql="update money_bank set balance = $balance where user_id='$user_id'";
			$retval = mysql_query($sql);
			if(! $retval ) 
			{
				   die('Could not enter data: ' . mysql_error());
			}       

		}
        sql_entry();
?>		
<head>
<title>PAY_MONEYBANK</title>
</head>
<body>
<h1>AVENTURA</h1>
<p class="home" align="center">
Thank you for booking with AVENTURA,hope you had a safe and comfortable journey!!! </br></br>
<form action="userpage.html" align="middle">
<font color="black"><input type="submit" id="submit" value="BACK"></font>
</form>
</p>
</body>
</html>




