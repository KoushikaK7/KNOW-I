		<?php
        session_start();
		
		error_reporting(E_ERROR);
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;

		function sql_entry()
		{
			$name=$_SESSION['name'];

			$sql = "select id from user_master where email_id='$name'";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			$user_id=$row['id'];
			
			$sql = "select ename,econtact,emailid from emergency_contats where user_id='$user_id'";
			$result = mysql_query($sql);
			echo $result->num_rows;
			//$row = mysql_fetch_assoc($result);
			
			//echo "<table>";
			while($row = mysql_fetch_assoc($result))
			{
				//echo "<tr>";
                echo "name".$row['ename']."<br>";
                echo "<td>" . $row['econtact'] . "</td>";
				echo "<td>" . $row['emailid'] . "</td>";
                echo "</tr>";
			}
			//echo "</table>";
		}
        sql_entry();
?>	
