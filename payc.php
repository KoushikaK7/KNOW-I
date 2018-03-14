<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="Bootstrap\css\bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Bootstrap\css\addm.css">
<html>
<?php
        session_start();
		
		error_reporting(E_ERROR);
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;

			$tot=$_SESSION['total'];

?>
<head>
<title>PAYC</title>
</head>
<body>
<h1>AVENTURA</h1>
<p class="home" align="center">
Thank you for booking with AVENTURA. </br></br>
COST OF RIDE:Rs.&nbsp <input type="text" id="cost" name = "cost" value="<?php echo $tot?>"><br /><br />
<form action="userpage.html" align="middle">
<font color="black"><input type="submit" id="submit" value="BACK"></font>
</form>
</p>
</form>
</body>
</html>