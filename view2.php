<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
<title>VIEW</title>
</head>
<body>
<h1>VIEW CONTACTS</h1>
<form name="view_table" action="view.php" align="middle">
		<?php
        session_start();
		
		error_reporting(E_ERROR);
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;

			//$name=$_SESSION['name'];
			//echo $name;
			$sql = "select area,phone_no,email_id from user_master";
			$result = mysql_query($sql);
               echo "<table><tr><th>NAME</th><th>CONTACT NUMBER</th><th>MAIL ID</th></tr>";
               // output data of each row
               while($row = mysql_fetch_assoc($result)) {
               echo "<tr><td>" . $row["area"]. "</td><td>" . $row["phone_no"]. "</td><td>" . $row["email_id"]. "</td></tr>";
			   }  
			    echo "</table>";
			//}else {
			//	echo "0 results";
			//}  

		$new_connect->close();
		?>
</table>
</form>
</body>
</html>