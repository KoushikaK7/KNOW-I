<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="Bootstrap\css\bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Bootstrap\css\registerd.css">
<html>
<head>
<title>EDIT DETAILS</title>
<?php
        
	   session_start();
		
	   error_reporting(E_ERROR);
	   include 'DBConnection.php';
	   $new_connect = new ICanDbConnection;
		  	     
	   $_SESSION['id1']=$_GET['id'];
	   
	   echo $_GET['id'];
	   
	   $id=$_GET['id'];
	   
	   echo $_GET['id'];
	   
       $sql= "select * from driver_master where id = '$id'";
       $result = mysql_query($sql);
	   $row = mysql_fetch_assoc($result);
	   
	   $flat_no=$row['flat_no'];
	   $area=$row['area'];
	   $city=$row['city'];
	   $state=$row['state'];
	   $pin=$row['pin'];
	   $mailid=$row['email_id'];
	   $phoneno=$row['phone_no'];
	   $name=$row['name'];
	   $password=$row['password'];
	   $cab_no=$row['cab_no'];
	   $cab_type=$row['cab_type'];
	   
?> 
<body>
    <center>
    <form method="post" action="update.php" align="middle">
        <p class="hype2">
        EDIT DETAILS
        </p>
        <p class="hype3">
		Name:&nbsp <input type="text" id="named" name="named" placeholder="Enter name" value=<?php echo $name?>><br /><br /> 
		Flat no./House no.:&nbsp <input type="text" id="flatd" name="flatd" placeholder="Enter flat no./house no." value=<?php echo $flat_no?>><br /><br /> 
		Area:&nbsp <input type="text" id="aread" name="aread" placeholder="Enter area" value=<?php echo $area?>><br /><br /> 
		City:&nbsp <input type="text" id="cityd" name="cityd" placeholder="Enter city" value=<?php echo $city?>><br /><br /> 
		State:&nbsp <input type="text" id="stated" name="stated" placeholder="Enter state" value=<?php echo $state?>><br /><br /> 
		Pin code:&nbsp <input type="text" id="pind" name="pind" placeholder="Enter pin code" value=<?php echo $pin?>><br /><br /> 
		Phone number:&nbsp <input type="text" id="phnnod" name="phnnod" placeholder="Enter phone number" value=<?php echo $phoneno?>><br /><br /> 
		e-Mailid:&nbsp <input type="text" id="mailidd" name = "mailidd" placeholder="Enter mailid" value=<?php echo $mailid?>><br /><br />
        Password:&nbsp <input type="password" id="passwordd" name ="passwordd" placeholder="Enter password" value=<?php echo $password?>><br /><br />
		Enter Cab Number:&nbsp <input type="text" id="cabidd" name = "cabidd" placeholder="Enter cab number" value=<?php echo $cab_no?>><br /><br />
		<div class="dropdown">
		<font color="white">Enter Cab type:&nbsp;</font>
		<select id="cabd" name="cabd" style="width: 150px">
                        <option value="micro"><font color="black">Micro</font></option>
                        <option value="mini"><font color="black">Mini</font></option>
                        <option value="pp"><font color="black">Prime Play</font></option>
                        <option value="pse"><font color="black">Prime Sedan</font></option>
                        <option value="psu"><font color="black">Prime SUV</font></option>
                        <option value="lux"><font color="black">LUX</font></option>
                    </select><br /><br /></div>
        </br></br></br></br></br></br></br></br></br></br></br>
		<form action="update.php">
		<font color="black"><input type="submit" id=="submit" value="SUBMIT"></font>  
		</form>
		</p><br/><br/>
	</form>
	</center>
</body>
</html>