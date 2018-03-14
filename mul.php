<html>
<head>
 <title> assignment 9.1</title>
</head>
<body>
<?php

$table_no=7;
$upto=10;
echo "<table border="\3\"style='border-collapse:collapse'>";
for($row=1;$row<=$upto;++$row)
{
$ans=$table_no*$row;
echo "<tr>";
echo "<td> $table_no</td>"."<td>*</td>"."<td>$row</td>"."<td>=</td>"."<td>$ans</td>";
echo "</tr>";
}
echo "</table>";
$dt=new DateTime();
echo $dt->format('Y-m-d H:i:s');
?>
</body>
</html>
