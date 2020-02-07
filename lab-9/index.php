<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "usbw";

    // Creating connection
    $conn = new mysqli($servername, $username, $password, "web_lab9");

    // Checking connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetching from form
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $name = $firstname . " " . $lastname;
    $email = $_POST["email"];
    $cnic = $_POST["cnic"];
    $phone = $_POST["phone"];
    $comments = $_POST["comments"];

    $picture_name = $_FILES["picture"]["name"];
    $picture_type = $_FILES["picture"]["type"];
    $picture_size = $_FILES["picture"]["size"];
    $picture_tmp_name = $_FILES["picture"]["tmp_name"];

    if ($pic_size < 100000000 && $pic_type == "image/jpeg") {
        $destination = "../uploads/" . rand() . $pic_name;

        move_uploaded_file($pic_tmp_name, $destination);

        $query = "INSERT INTO `records` (user_Name, user_Email, user_CNIC, user_Comments, user_Telephone, user_Picture) 
                        VALUES ('$name', '$email', '$cnic', '$comments', '$telephone', '$destination')";

        if ($conn->query($query) === TRUE) {
            $success = "Record added successfully!";
        } else {
            $error = "Error: " . $query . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="container">
        <?php if (isset($success)) :  ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success; ?>
            </div>
        <?php elseif (isset($error)) :  ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php else : ?>
            <div class="row">
                <form>
                    <div class="jumbotron">
                        <h2 class="">User Registration Form</h2>
                    </div>

                    <div class="form-group row">
                        <label for="firstName" class="col-sm-4 col-form-label">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="firstname" class="form-control" id="firstName" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastName" class="col-sm-4 col-form-label">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="lastname" class="form-control" id="lastName" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="emailAddress" class="col-sm-4 col-form-label">Email Address</label>
                        <div class="col-sm-8">
                            <input type="text" name="email" class="form-control" id="emailAddress" placeholder="email@example.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cnicNumber" class="col-sm-4 col-form-label">CNIC Number</label>
                        <div class="col-sm-8">
                            <input type="number" name="cnic" class="form-control" id="cnicNumber" placeholder="1234567890123">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telNumber" class="col-sm-4 col-form-label">Telephone Number</label>
                        <div class="col-sm-8">
                            <input type="number" name="phone" class="form-control" id="telNumber" placeholder="03331234567">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="yourPicture" class="col-sm-4 col-form-label">Your Picture</label>
                        <div class="col-sm-8">
                            <input type="file" name="picture" id="yourPicture" placeholder="Choose File" value="Choose File">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="yourComment" class="col-sm-4 col-form-label">Comments on yourself</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="comments" rows="5" id="yourComment"></textarea>
                            <!-- <input type="text" id="yourComment" placeholder=""> -->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>