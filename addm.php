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
						
			$sql = "select balance from money_bank where user_id=$user_id";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			$original=$row['balance'];
			return $original;
        }  		
?>	
<head>
<title>ADD DIGITAL MONEY</title>
</head>
<body>
<h1>ADD MONEY</h1>
<form method="post" action="addmphp.php" align="middle">
<p class="home" align="center">
DIGITAL MONEY IN ACCOUNT:Rs.&nbsp <font color="black"><input type="text" id="current" name="current" value=<?php echo sql_entry();?>></font></br></br>
ADD DIGITAL MONEY:Rs.&nbsp <input type="text" id="digital" name="digital"></br></br>
<form action="addmphp.php" align="middle">
<font color="black"><input type="submit" id="submit" value="SUBMIT"></font>
</form>
</form>
</p>
</body>
</html>