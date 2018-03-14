<!DOCTYPE html>
<html>

<?php 
 
session_start();
 
error_reporting(E_ERROR);
include 'DBConnection.php';
$new_connect = new ICanDbConnection;

$source_no=rand(1,6);

if ($source_no==1)
{
	$source="T.nagar";
}
else if($source_no==2)
{
	$source="Shollinganallur";
}
else if($source_no==3)
{
	$source="Pallavaram";
}	
else if($source_no==4)
{
	$source="Guindy";
}	
else if($source_no==5)
{
	$source="Poonamalle";
}
else if($source_no==6)
{
	$source="Sriperumbudur";
} 
 
?>

<head>
<title>BOOK</title>
</head> 
<body>
    <center>
		<form method="post" action="book1.php" align="middle">
		<p class="hype4">
        BOOK YOUR RIDE
        </p>
        <p class="hype5">

<link rel="stylesheet" type="text/css" href="Bootstrap\css\bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Bootstrap\css\book.css">


		FROM ADDRESS:&nbsp <input type="text" id="from" name = "from" placeholder="Enter From Address" value=<?php echo $source ?>><br /><br />	
       
	   <div class="dropdown">
	   <font color="white">TO ADDRESS:&nbsp;</font>
	   <select id="to" name="to" style="width: 150px">
                        <option value="T.nagar"><font color="black">T.nagar</font></option>
                        <option value="Shollinganallur"><font color="black">Shollinganallur</font></option>
                        <option value="Pallavaram"><font color="black">Pallavaram</font></option>
                        <option value="Guindy"><font color="black">Guindy</font></option>
                        <option value="Poonamalle"><font color="black">Poonamalle</font></option>
						<option value="Sriperumbudur"><font color="black">Sriperumbudur</font></option>
                    </select><br /><br /></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		
		<div class="dropdown">
		<font color="white">CHOOSE A CAB:&nbsp;</font>
		<select id="cab" name="cab" style="width: 150px">
                        <option value="micro"><font color="black">Micro</font></option>
                        <option value="mini"><font color="black">Mini</font></option>
                        <option value="prime_play"><font color="black">Prime Play</font></option>
                        <option value="prime_sedan"><font color="black">Prime Sedan</font></option>
                        <option value="prime_suv"><font color="black">Prime SUV</font></option>
                        <option value="lux"><font color="black">LUX</font></option>
                    </select><br /><br /></div>
        </br></br></br></br></br></br></br></br></br></br></br>
		<form action="book1.php">
		<input type="submit" id="submit" value="SUBMIT">
		</form>
		</p><br/><br/>
	</form>
	</center>
</body>
</html>

