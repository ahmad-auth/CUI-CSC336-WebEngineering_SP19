<?php
$connection = mysqli_connect("localhost", "id9182096_leo", "nopass", "id9182096_marvel");
if (!$connection) {
    die("Connection Failed: " . mqsqli_connect_error());
}

$query = "SELECT * FROM heroes;";
$heroes = mysqli_query($connection, $query);

echo "<div display='inline'>";

echo "<h2>HEROES</h2>";
echo "<table border=0.1>";
echo    "<tr>";
echo        "<th>ID</th>";
echo        "<th>Real Name</th>";
echo        "<th>Code Name</th>";
echo        "<th>Super Power</th>";
echo        "<th>Action</th>";
echo    "</tr>";

if (mysqli_num_rows($heroes) > 0) {
    while ($hero = mysqli_fetch_assoc($heroes)) {
        echo "<tr>";
        echo "<td>" . $hero['Hero_ID'] . "</td>";
        echo "<td>" . $hero['Hero_RealName'] . "</td>";
        echo "<td>" . $hero['Hero_CodeName'] . "</td>";
        echo "<td>" . $hero['Hero_SuperPower'] . "</td>";
        echo "<td>
        <a color='green' href='editRecord.php?value=heroTable&id=" . $hero['Hero_ID'] . "'>Edit</a>
        <a color='red' href='deleteRecord.php?value=heroTable&id=" . $hero['Hero_ID'] . "'>Delete</a>
        </td>";
        echo "</tr>";
    }
}
echo "</table>";

$query = "SELECT * FROM villians;";
$villians = mysqli_query($connection, $query);

echo "<h2>VILLIANS</h2>";
echo "<table border=0.1>";
echo    "<tr>";
echo        "<th>ID</th>";
echo        "<th>Real Name</th>";
echo        "<th>Code Name</th>";
echo        "<th>Super Power</th>";
echo        "<th>Action</th>";
echo    "</tr>";

if (mysqli_num_rows($villians) > 0) {
    while ($villian = mysqli_fetch_assoc($villians)) {
        echo "<tr>";
        echo "<td>" . $villian['Villian_ID'] . "</td>";
        echo "<td>" . $villian['Villian_RealName'] . "</td>";
        echo "<td>" . $villian['Villian_CodeName'] . "</td>";
        echo "<td>" . $villian['Villian_SuperPower'] . "</td>";
        echo "<td>
        <a href='editRecord.php?value=villianTable&id=" . $villian['Villian_ID'] . "'>Edit</a>
        <a href='deleteRecord.php?value=villianTable&id=" . $villian['Villian_ID'] . "'>Delete</a>
        </td>";
        echo "</tr>";
    }
}
echo "</table>";
echo "</div>";
echo "<hr>";

echo "<h3><a href='addRecord.php'>Add a RECORD</a></h3>";
