<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $connection = mysqli_connect("localhost", "id9182096_leo", "nopass", "id9182096_marvel");
    if (!$connection) {
        die("Connection Failed: " . mqsqli_connect_error());
    }

    $id = $_GET['id'];
    $tableName = $_GET['value'];
    $sqlQuery;
    if ($tableName == "heroTable") {
        $sqlQuery = "DELETE FROM heroes WHERE Hero_ID=" . $id;
        $tableName = "hero";
    } elseif ($tableName == "villianTable") {
        $sqlQuery = "DELETE FROM villians WHERE Villian_ID=" . $id;
        $tableName = "villian";
    }

    if (mysqli_query($connection, $sqlQuery)) {
        echo "One " . strtoupper($tableName) . " Down";
        echo "<h4><a href='index.php'>Main Page</a></h4>";
        header("refresh:5;url=index.php");
    } else {
        echo "ERROR" . mysqli_error($connection);
    }
}
