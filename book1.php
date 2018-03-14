<!DOCTYPE html>
<html>
<?php
        session_start();
		
		error_reporting(E_ERROR);
	    include 'DBConnection.php';
		$new_connect = new ICanDbConnection;
		
        function cab_cost()
		{
			switch($_POST['cab'])
			{
				case "micro":
                $cost=20;
                break;
                case "mini":
                $cost=25;
                break;
                case "prime_play":
                $cost=35;
                break;
				case "prime_sedan":
                $cost=40;
                break;
				case "prime_suv":
                $cost=50;
                break;
				case "lux":
                $cost=60;
                break;
                default:
                echo "Cannot calculate cab cost!";
			}
		 return $cost;
		}
		
		function total_cost($distance,$cost)
		{
			if($distance <= 5)
			{
				$total=30+$cost;
				$_SESSION['total']=$total;
			}
			elseif($distance >= 6 && $distance <= 12)
			{
				$dist=$distance-5;
				$total=30+($dist*12)+$cost;
				$_SESSION['total']=$total;
			}
			else
			{
				$dist=$distance-12;
				$total=30+72+($dist*8)+$cost;
				$_SESSION['total']=$total;
			}
			return $total;
		}
		
		function litres($distance)
		{
			if($distance<10)
			{
				$litre=0;
			}
			else
			{
				$litre=$distance/10;
			}
             return $litre;
		}
		
		function litres_cost($litre)
		{
			$litre_cost=70*$litre;
			return $litre_cost;	
		}
		
		
		function sql_entry($distance,$total,$litre,$litre_cost)
		{
			$name=$_SESSION['name'];
			$sql = "select id from user_master WHERE email_id='$name'";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			$_SESSION['total']=$total;
			
			$sql = "INSERT INTO ride_details(source,destination,distance,cost,user_id,cab_type)VALUES('{$_POST['from']}','{$_POST['to']}','{$distance}','{$total}','{$row['id']}','{$_POST['cab']}')";
	        $retval = mysql_query($sql);
            if(! $retval ) 
			{
               die('Could not enter data: ' . mysql_error());
            }       
			
			$type=$_POST['cab'];
			
			$sql = "UPDATE fuel SET balance=balance-'{$litre}', cost=cost+'{$litre_cost}' where cab_type='{$type}'";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			if(! $retval ) 
			{
               die('Could not update data: ' . mysql_error());
            }       
			
			
		}
		
/*
*  Dijkstra's algorithm in PHP
*/

//set the distance array
$_distArr = array();
$_distArr['T.nagar']['Shollinganallur'] = 20;
$_distArr['T.nagar']['Pallavaram'] = 14;
$_distArr['T.nagar']['Sriperumbudur'] = 39;
$_distArr['Shollinganallur']['T.nagar'] = 20;
$_distArr['Shollinganallur']['Pallavaram'] = 18;
$_distArr['Shollinganallur']['Guindy'] = 17;
$_distArr['Pallavaram']['T.nagar'] = 15;
$_distArr['Pallavaram']['Shollinganallur'] = 18;
$_distArr['Pallavaram']['Guindy'] = 10;
$_distArr['Pallavaram']['Sriperumbudur'] = 30;
$_distArr['Guindy']['Shollinganallur'] = 17;
$_distArr['Guindy']['Pallavaram'] = 10;
$_distArr['Guindy']['Poonamalle'] = 16;
$_distArr['Poonamalle']['Guindy'] = 16;
$_distArr['Poonamalle']['Sriperumbudur'] = 20;
$_distArr['Sriperumbudur']['T.nagar'] = 39;
$_distArr['Sriperumbudur']['Pallavaram'] = 30;
$_distArr['Sriperumbudur']['Poonamalle'] = 20;

//the start and the end
$a = $_POST['from'];
$b = $_POST['to'];

//initialize the array for storing
$S = array();//the nearest path with its parent and weight
$Q = array();//the left nodes without the nearest path
foreach(array_keys($_distArr) as $val) $Q[$val] = 99999;
$Q[$a] = 0;
/*echo "<pre>"; 
print_r($Q); 
echo "/<pre>"; 
*/
//start calculating
while(!empty($Q)){
    $min = array_search(min($Q), $Q);//the most min weight
    if($min == $b) break;
    foreach($_distArr[$min] as $key=>$val) if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
        $Q[$key] = $Q[$min] + $val;
        $S[$key] = array($min, $Q[$key]);
    }
    unset($Q[$min]);
}

//list the path
$path = array();
$pos = $b;
while($pos != $a){
	$path[] = $pos;
	$pos = $S[$pos][0];
}

$path[] = $a;
$path = array_reverse($path);

$distance=$S[$b][1];		
		
		/*if($_POST['from']=="T.Nagar")
		{
			switch($_POST['to'])
			{
				case "Guindy":
                $distance=6;
                break;
                case "Chrompet":
                $distance=17;
                break;
                case "Saidapet":
                $distance=4;
                break;
				case "Shollinganallur":
                $distance=21;
                break;
				case "Velachery":
                $distance=9;
                break;
                default:
                echo "Cannot find destination!";
			}
		}
		elseif($_POST['from']=="Pallavaram")
		{
			switch($_POST['to'])
			{
				case "Guindy":
                $distance=10;
                break;
                case "Chrompet":
                $distance=3;
                break;
                case "Saidapet":
                $distance=11;
                break;
				case "Shollinganallur":
                $distance=19;
                break;
				case "Velachery":
                $distance=13;
                break;
                default:
                echo "Cannot find destination!";
			}
		}
		elseif($_POST['from']=="Porur")
		{
			switch($_POST['to'])
			{
				case "Guindy":
                $distance=10;
                break;
                case "Chrompet":
                $distance=15;
                break;
                case "Saidapet":
                $distance=9;
                break;
				case "Shollinganallur":
                $distance=27;
                break;
				case "Velachery":
                $distance=15;
                break;
                default:
                echo "Cannot find destination!";
			}
		}
		elseif($_POST['from']=="Adayar")
		{
			switch($_POST['to'])
			{
				case "Guindy":
                $distance=7;
                break;
                case "Chrompet":
                $distance=16;
                break;
                case "Saidapet":
                $distance=7;
                break;
				case "Shollinganallur":
                $distance=16;
                break;
				case "Velachery":
                $distance=7;
                break;
                default:
                echo "Cannot find destination!";
			}
		}
		elseif($_POST['from']=="Teynampet")
		{
			switch($_POST['to'])
			{
				case "Guindy":
                $distance=10;
                break;
                case "Chrompet":
                $distance=21;
                break;
                case "Saidapet":
                $distance=7;
                break;
				case "Shollinganallur":
                $distance=20;
                break;
				case "Velachery":
                $distance=11;
                break;
                default:
                echo "Cannot find destination!";
			}
		}*/
		
		$date = date('Y-m-d H:i:s');
        mysql_query("INSERT INTO `table` (`date`) VALUES ('$date')");
		
		$cost=cab_cost();
		$total=total_cost($distance,$cost);
		$litre=litres($distance);
		$litre_cost=litres_cost($litre);
        sql_entry($distance,$total,$litre,$litre_cost);		
 ?>
 

<head>
<title>FARE ESTIMATOR</title> 
<body>
	<center>
    <form method="post" align="middle"></p>
        <p class="hype10">
        FARE ESTIMATOR
        </p>
        <p class="hype11">
		<link rel="stylesheet" type="text/css" href="Bootstrap\css\bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="Bootstrap\css\fare_estimator.css">
		
		FASTEST ROUTE:&nbsp<?php echo implode('->', $path);?><br /><br /> 
		DISTANCE:&nbsp <input type="text" id="dist" name="dist" value=<?php echo $distance?>><br /><br />
		COST:Rs.&nbsp <input type="text" id="cost" name="cost" value=<?php echo $total?>><br /><br />
		
		<a href="pay.html" id="pay">BOOK MY RIDE</a></br></br></br>
        <a href="userpage.html" id="cancel">CANCEL</a></br></br></br>
		
		
		</p><br/><br/>
	</form>
	</center>
</body>
</html>