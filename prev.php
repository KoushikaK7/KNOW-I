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
                    <th><FONT COLOR="white">CAB TYPE</FONT></th>
                    <th><FONT COLOR="white">LAST MAINTENANCE</FONT></th>
                    <th><FONT COLOR="white">NEXT MAINTENANCE</FONT></th>
                    <th><FONT COLOR="white">LEFT DAYS</FONT></th>
                </tr>
	  <?php
        session_start();
		
		error_reporting(E_ERROR);
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;
			
			$sql = "select cab_type,last_maintenance,next_maintenance,left_days from maintenance";
			$result = mysql_query($sql);
               // output data of each row
               while($row = mysql_fetch_assoc($result)) {
               echo "<tr><td>". $row["cab_type"]."</td><td>" . $row["last_maintenance"]. "</td><td>" . $row["next_maintenance"]. "</td><td>" . $row["left_days"]."</td></tr>";
			   }  
		    echo "</table>";

		$new_connect->close();
	?>
</table>
</form>
</body>
</html>