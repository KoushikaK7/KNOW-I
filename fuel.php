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
<title>FUEL CONSUMPTION</title>
</head>
<body>
<h1>FUEL CONSUMPTION</h1>
<form name="view_cab" action="" align="middle">
<table>
                <tr>
                    <th><FONT COLOR="white">CAB TYPE</FONT></th>
                    <th><FONT COLOR="white">INITIAL AMOUNT OF FUEL(LITRES)</FONT></th>
                    <th><FONT COLOR="white">BALANCE AMOUNT OF FUEL(LITRES)</FONT></th>
                    <th><FONT COLOR="white">TOTAL COST</FONT></th>
                </tr>
	  <?php
        session_start();
		
		error_reporting(E_ERROR);
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;
			
			$sql = "select cab_type,initial,balance,cost from fuel";
			$result = mysql_query($sql);
               // output data of each row
               while($row = mysql_fetch_assoc($result)) {
               echo "<tr><td>". $row["cab_type"]."</td><td>" . $row["initial"]. "</td><td>" . $row["balance"]. "</td><td>" . $row["cost"]. "</td></tr>";
			   }  
		    echo "</table>";

		$new_connect->close();
	?>
</table>
</form>
</body>
</html>