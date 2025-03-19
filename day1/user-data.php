<?php
require_once "./utils.php";

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$address = $_POST["address"];
$skills = $_POST["skills"];
$gender = $_POST["gender"];
$userName = $_POST["username"];
$password = $_POST["password"];
$department = $_POST["department"];
$code = $_POST["code"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div id="resultCard" class="mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <?php
                    if ($code !== "FSD578A") {
                        header("Location:register.html");
                        exit();
                    }
                    ?>
                    <h4 class="card-title">Submitted Data</h4>

                    <div class="list-group">
                        <p class="list-group-item"><span>Thank You <?php if ($gender === "Female") {
                                                                        echo "Ms.";
                                                                    } else {
                                                                        echo "Mr.";
                                                                    }
                                                                    echo $firstName . ' ' . $lastName ?> here is your data</span></p>


                        <p class="list-group-item"><strong>First Name:</strong> <span><?php echo $firstName; ?></span></p>
                        <p class="list-group-item"><strong>Last Name:</strong> <span><?php echo $lastName; ?></span></p>
                        <p class="list-group-item"><strong>Address:</strong> <span><?php echo $address; ?></span></p>

                        <p class="list-group-item"><strong>Skills:</strong>
                            <br>
                            <span>
                                <?php
                                if (!empty($skills)) {
                                    foreach ($skills as $skill) {
                                        echo '<span class="badge bg-primary">' . $skill . '</span> ';
                                    }
                                } else {
                                    echo "<span class='text-muted'>No skills selected.</span>";
                                }
                                ?>
                            </span>
                        </p>

                        <p class="list-group-item"><strong>Gender:</strong> <span><?php echo $gender; ?></span></p>
                        <p class="list-group-item"><strong>Username:</strong> <span><?php echo $userName; ?></span></p>
                        <p class="list-group-item"><strong>Password:</strong> <span><?php echo $password; ?></span></p>
                        <p class="list-group-item"><strong>Department:</strong> <span><?php echo $department; ?></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>