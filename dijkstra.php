<?php

/*
*  Dijkstra's algorithm in PHP
*/

//set the distance array
$_distArr = array();
$_distArr['tnagar']['shollinganallur'] = 20;
$_distArr['tnagar']['pallavaram'] = 14;
$_distArr['tnagar']['sriperumbudur'] = 39;
$_distArr['shollinganallur']['tnagar'] = 20;
$_distArr['shollinganallur']['pallavaram'] = 18;
$_distArr['shollinganallur']['guindy'] = 17;
$_distArr['pallavaram']['tnagar'] = 15;
$_distArr['pallavaram']['shollinganallur'] = 18;
$_distArr['pallavaram']['guindy'] = 10;
$_distArr['pallavaram']['sriperumbudur'] = 30;
$_distArr['guindy']['shollinganallur'] = 17;
$_distArr['guindy']['pallavaram'] = 10;
$_distArr['guindy']['poonamalle'] = 16;
$_distArr['poonamalle']['guindy'] = 16;
$_distArr['poonamalle']['sriperumbudur'] = 20;
$_distArr['sriperumbudur']['tnagar'] = 39;
$_distArr['sriperumbudur']['pallavaram'] = 30;
$_distArr['sriperumbudur']['poonamalle'] = 20;

//the start and the end
$a = 'tnagar';
$b = 'poonamalle';

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

//print result
echo "<br />From $a to $b";
echo "<br />The length is ".$S[$b][1];
echo "<br />Path is ".implode('->', $path);
?>