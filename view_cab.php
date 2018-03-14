<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="Bootstrap\css\bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Bootstrap\css\your_ride.css">
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
<title>VIEW CAB DETAILS</title>
</head>
<body>
<h1>VIEW CAB DETAILS</h1>
<form name="view_cab" action="" align="middle">
<table>
                <tr>
                    <th><FONT COLOR="white">NAME</FONT></th>
                    <th><FONT COLOR="white">CAB TYPE</FONT></th>
                    <th><FONT COLOR="white">CAB NUMBER</FONT></th>
                    <th><FONT COLOR="white">ENTRY TYPE</FONT></th>
                    <th><FONT COLOR="white">PHONE NUMBER</FONT></th>
                    <th><FONT COLOR="white">MAIL ID</FONT></th>
                </tr>
	  <?php
        session_start();
		
		error_reporting(E_ERROR);
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;
			
			$sql = "select name,cab_type,cab_no,type,phone_no,email_id from driver_master";
			$result = mysql_query($sql);
               // output data of each row
               while($row = mysql_fetch_assoc($result)) {
               echo "<tr><td>". $row["name"]."</td><td>" . $row["cab_type"]. "</td><td>" . $row["cab_no"]. "</td><td>" . $row["type"]. "</td><td>". $row["phone_no"]."</td><td>" . $row["email_id"]."</td></tr>";
			   }  
		    echo "</table>";

		$new_connect->close();
	?>
</table>
</form>
</body>
</html>