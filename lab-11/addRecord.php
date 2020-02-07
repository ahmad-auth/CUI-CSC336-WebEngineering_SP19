<h4><a href='index.php'>Main Page</a></h4>

<form method="post">
    <b>HERO or VILLIAN</b>
    <select name="tableName">
        <option value="Hero">Hero</option>
        <option value="Villian">Villian</option>
    </select><br>
    Enter Real Name: <input type="text" name="realName"><br>
    Enter Code Name: <input type="text" name="codeName"><br>
    Enter Super Power: <input type="text" name="superPower"><br>
    <input type="submit" name"submit>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $connection = mysqli_connect("localhost", "id9182096_leo", "nopass", "id9182096_marvel");
    if (!$connection) {
        die("Connection Failed: " . mqsqli_connect_error());
    }

    $realName = $_POST['realName'];
    $codeName = $_POST['codeName'];
    $superPower = $_POST['superPower'];

    $sqlQuery;
    $tableName = $_POST['tableName'];
    if ($tableName == "Hero") {
        $sqlQuery = "INSERT INTO heroes VALUES(null,'" . $realName . "','" . $codeName . "','" . $superPower . "')";
    } elseif ($tableName == "Villian") {
        $sqlQuery = "INSERT INTO villians VALUES(null,'" . $realName . "','" . $codeName . "','" . $superPower . "')";
    }

    if (mysqli_query($connection, $sqlQuery)) {
        echo "You have now a " . $tableName . " in your squad.";
        echo "<h4><a href='index.php'>Main Page</a></h4>";
        header("refresh:5;url=index.php");
    } else {
        echo "ERROR <br>" . mysqli_error($connection);
    }
}
?>