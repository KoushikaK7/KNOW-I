<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="Bootstrap\css\bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Bootstrap\css\view.css">
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: white;
}
	
</style>
<title>VIEW</title>
</head>
<body>
<h1>VIEW CONTACTS</h1>
<form name="view_table" action="view.php" align="middle">
<table>
                <tr>
                    <th><FONT COLOR="white">NAME</FONT></th>
                    <th><FONT COLOR="white">CONTACT NUMBER</FONT></th>
                    <th><FONT COLOR="white">MAIL ID</FONT></th>
                </tr>
				
		<?php
        session_start();
		
		error_reporting(E_ERROR);
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;

			$name=$_SESSION['name'];
			$sql = "select id from user_master WHERE email_id='$name'";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			$id=$row['id'];
			
			$sql = "select ename,econtact,emailid from emergency_contacts where user_id='$id'";
			$result = mysql_query($sql);
               // output data of each row
               while($row = mysql_fetch_assoc($result)) {
               echo "<tr><td>" . $row["ename"]. "</td><td>" . $row["econtact"]. "</td><td>" . $row["emailid"]. "</td></tr>";
			   }  
		    echo "</table>";

		$new_connect->close();
		?>
</table>
</form>
</body>
</html>