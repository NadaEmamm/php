<?php
require_once "../includes/utils.php";
require_once "../includes/helpers.php";
require_once "../validation/valid.php";


$formDataIssues = validatePostData($_POST);
$formErrors = $formDataIssues["errors"];
$oldData = $formDataIssues["valid_data"];

if (count($formErrors)) {

    $errors = json_encode($formErrors);

    $queryString = "errors={$errors}";
    $old_data = json_encode($oldData);

    if ($old_data) {
        $queryString .= "&old={$old_data}";
    }

    header("location:../app/register.php?{$queryString}");
    exit();
} else {

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["address"];
    $skills = $_POST["skills"];
    $gender = $_POST["gender"];
    $userName = $_POST["username"];
    $password = $_POST["password"];
    $department = $_POST["department"];
    $code = $_POST["code"];
    $id = generateID();

    echo '<h1 class="text-center mt-5 fw-bold text-primary">🎉 User Data! 🎉</h1>';
}
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
                        header("Location:../app/register.php");
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


    <?php
    $skillsStr = is_array($skills) ? implode("  -  ", $skills) : $skills;
    $table  = "{$id}:{$firstName}:{$lastName}:{$userName}:{$gender}:{$password}:{$address}:{$skillsStr}:{$department}\n";
    $saved = appendDataTofile("../includes/users-data.txt", $table);

    if ($saved) {
        echo '<h1 class="mt-5 fw-bold text-primary">🎉 Data Saved! 🎉</h1>';

        echo '<a class="btn btn-primary btn-lg shadow-lg rounded-pill px-4 py-2 fw-bold" href="./users-table.php">
                🚀 Display All users
              </a>';
    } else {
        echo '<h1 class="mt-5 fw-bold text-danger">Error:somthing wrong happend</h1>';
    }

    ?>
</body>

</html>