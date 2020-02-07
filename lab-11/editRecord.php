<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id;
    $realName;
    $codeName;
    $superPower;

    $connection = mysqli_connect("localhost", "root", "usbw", "marvel");
    if (!$connection) {
        die("Connection Failed: " . mqsqli_connect_error());
    }

    $id = $_GET['id'];
    $tableName = $_GET['value'];
    $sqlQuery;

    if ($tableName == "heroTable") {
        $sqlQuery = "SELECT * FROM heroes WHERE Hero_ID=" . $id;
        if (mysqli_query($connection, $sqlQuery)) {
            $heroes = mysqli_query($connection, $sqlQuery);
            if (mysqli_num_rows($heroes) > 0) {
                while ($hero = mysqli_fetch_assoc($heroes)) {
                    $id = $hero['Hero_ID'];
                    $realName = $hero['Hero_RealName'];
                    $codeName = $hero['Hero_CodeName'];
                    $superPower = $hero['Hero_SuperPower'];
                }
            }
        } else {
            echo "ERROR" . mysqli_error($connection);
        }
    } elseif ($tableName == "villianTable") {
        $sqlQuery = "SELECT * FROM villians WHERE Villian_ID=" . $id;
        if (mysqli_query($connection, $sqlQuery)) {
            $villians = mysqli_query($connection, $sqlQuery);
            if (mysqli_num_rows($villians) > 0) {
                while ($villian = mysqli_fetch_assoc($villians)) {
                    $id = $villian['Villian_ID'];
                    $realName = $villian['Villian_RealName'];
                    $codeName = $villian['Villian_CodeName'];
                    $superPower = $villian['Villian_SuperPower'];
                }
            }
        } else {
            echo "ERROR" . mysqli_error($connection);
        }
    }

    echo "<h4><a href='index.php'>Main Page</a></h4>";
    echo "<form method='post' name='heroTable'>";
    echo    "<b>HERO or VILLIAN</b>";
    echo    "<select name='tableName'><option value='Hero'>Hero</option><option value='Villian'>Villian</option></select><br>";
    echo    "ID: <input type='text' name='id' value=" . $id . " readonly><br>";
    echo    "Enter Real Name: <input type='text' name='realName' value=\"" . $realName . "\"><br>";
    echo    "Enter Code Name: <input type='text' name='codeName' value=\"" . $codeName . "\"><br>";
    echo    "Enter Super Power: <input type='text' name='superPower' value=\"" . $superPower . "\"><br>";
    echo    "<input type='submit' name='submit'>";
    echo "</form>";
}
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $connection = mysqli_connect("localhost", "root", "usbw", "marvel");
    if (!$connection) {
        die("Connection Failed: " . mqsqli_connect_error());
    }

    $id = $_POST['id'];
    $realName = $_POST['realName'];
    $codeName = $_POST['codeName'];
    $superPower = $_POST['superPower'];

    $sqlQuery;
    $tableName = $_POST['tableName'];
    if ($tableName == "Hero") {
        $sqlQuery = "UPDATE heroes SET Hero_RealName='" . $realName . "', Hero_CodeName='" . $codeName . "', Hero_SuperPower='" . $superPower . "' WHERE Hero_ID=$id";
    } elseif ($tableName == "Villian") {
        $sqlQuery = "UPDATE villians SET Villian_RealName='" . $realName . "', Villian_CodeName='" . $codeName . "', Villian_SuperPower='" . $superPower . "' WHERE Villian_ID=$id";
    }

    if (mysqli_query($connection, $sqlQuery)) {
        echo "Your " . $tableName . " has been updated.";
        header("refresh:5;url=index.php");
    } else {
        echo "ERROR <br>" . mysqli_error($connection);
    }
}
?>