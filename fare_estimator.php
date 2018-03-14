<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="Bootstrap\css\bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Bootstrap\css\fare_estimator.css">
<html>
<head>
<title>FARE ESTIMATOR</title> 
<body>
	<center>
    <form method="get" action="book1.php" align="middle"></p>
        <p class="hype10">
        FARE ESTIMATOR
        </p>
        <p class="hype11">
		FASTEST ROUTE:&nbsp <input type="text" id="fast" name="fast"><br /><br /> 
		DISTANCE:&nbsp <input type="text" id="dist" name="dist"><br /><br /><?php echo $_GET['distance']; ?>
		COST:Rs.&nbsp <input type="text" id="cost" name = "cost"><br /><br /><?php echo $_GET['total']; ?>
		
		<a href="pay.html" id="pay">BOOK MY RIDE</a></br></br></br>
        <a href="userpage.html" id="cancel">CANCEL</a></br></br></br>
		
		</p><br/><br/>
	</form>
	</center>
</body>
</html>

