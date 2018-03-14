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
<title>YOUR RIDE</title>
</head>
<body>
<h1>YOUR RIDES</h1>
<form name="ride_table" action="" align="middle">
<table>
                <tr>
                    <th><FONT COLOR="white">DATE</FONT></th>
                    <th><FONT COLOR="white">START TIME</FONT></th>
                    <th><FONT COLOR="white">ARRIVAL TIME</FONT></th>
                    <th><FONT COLOR="white">FROM ADDRESS</FONT></th>
                    <th><FONT COLOR="white">TO ADDRESS</FONT></th>
                    <th><FONT COLOR="white">DISTANCE COVERED</FONT></th>
					<th><FONT COLOR="white">CAB MODEL</FONT></th>
					<th><FONT COLOR="white">TOTAL COST</FONT></th>
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
			
			$sql = "select source,destination,distance,cost,cab_type,date from ride_details where user_id='$id'";
			$result = mysql_query($sql);
               // output data of each row
               while($row = mysql_fetch_assoc($result)) {
               echo "<tr><td>". $row["date"]."</td><td></td><td></td><td>" . $row["source"]. "</td><td>" . $row["destination"]. "</td><td>" . $row["distance"]. "</td><td>". $row["cab_type"]."</td><td>" . $row["cost"]."</td></tr>";
			   }  
		    echo "</table>";

		$new_connect->close();
	?>
</table>
</form>
</body>
</html>