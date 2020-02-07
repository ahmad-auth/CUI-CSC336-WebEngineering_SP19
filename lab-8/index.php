<!DOCTYPE html>
<html>
<head>
	<title>Lab Task 8 - Web Engineering</title>
</head>
<body>
	<form action="index.php" method="Get">
		<input type="number" name="counter" value="5">
		<input type="submit" name="submit">
	</form>
</body>
</html>

<?php 

echo "<h2>Form Activity</h2>";
if (isset($_GET['counter'])) {
	$loop = $_GET['counter'];
	echo "<table border=1>";
	echo "<tr> <th> Subject </th> <th> Total Marks </th> <th> Obtained Marks </th> </tr>";
    for ($x=0; $x <$loop ; $x++) { 
        echo "<tr>
            <td> Web Engineering </td>
            <td> 100 </td>
            <td> 80 </td> 
        </tr>";
    }
    echo "</table>";


echo "<h2>Activity-1</h2>"."<br>";
echo "
<table border=1>
      <tr>
        <th>Subject</th>
        <th>Total Marks</th>
        <th>Obtained Marks</th>
      </tr>
      <tr>
        <td>Web Engineering</td>
        <td>100</td>
        <td>80</td>
      </tr>
      <tr>
        <td>Database Systems</td>
        <td>100</td>
        <td>90</td>
      </tr>
    </table>
";
echo "<br><br>";


echo "<h2>Activity-2</h2>"."<br>";
$list = array(123, 160, 62, 153, 345, 128, 387, 825, 666, 614, 723, 163, 811, 176, 732, 628, 722, 733, 755, 765, 794, 613, 627);
$sum = 0;
foreach ($list as $value) {
    $sum += $value;    
}
echo "Sum = ".$sum."<br>";
$average = $sum / count($list);
echo "Average = ".$average."<br>";
sort($list);
echo "Five Lowest: ";
for ($i=0; $i < 5; $i++) { 
    echo $list[$i].", ";
}
echo "<br>";
echo "Five Highest: ";
for ($i=(count($list)-1); $i > (count($list)-6); $i--) { 
    echo $list[$i].", ";
}
echo "<br>";
echo "<br><br>";


echo "<h2>Activity-3</h2>";
echo "<table border=1>";
for ($i=1; $i <= 10; $i++) { 
    echo "<tr>";
    for ($j=1; $j <= 5; $j++) { 
        echo "<td>";
        echo $i." + ".$j." = ".($i+$j);
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "<br><br>";

?>