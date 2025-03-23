<?php
session_start();
if (isset($_SESSION["name"])) {
    header("Location: home.php");
    exit();
}

$errors = [];
$old_data = [];

if (isset($_GET["errors"])) {
    $errors = $_GET["errors"];
    echo "<br>";

    $errors = json_decode($errors, true);
}

if (isset($_GET["old"])) {
    $old_data = $_GET["old"];
    $old_data = json_decode($old_data, true);
}


?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Register form</h2>
        <form action="../handlers/register-handler.php" method="POST" enctype="multipart/form-data">

            <!-- firstName -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="firstName" placeholder="name"
                    name="name"
                    value='<?php echo $old_data["name"] ? $old_data["name"] : ""; ?>'>
                <div class="text-danger  font-weight-bold">
                    <?php echo $errors["name"] ? "{$errors['name']}" : ""; ?>
                </div>
            </div>

            <!-- email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="email"
                    name="email"
                    value='<?php echo $old_data["email"] ? $old_data["email"] : ""; ?>'>


                <div class="text-danger  font-weight-bold">
                    <?php echo $errors["email"] ? "{$errors['email']}" : ""; ?>
                </div>
            </div>


            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password"
                    name="password"
                    value='<?php echo $old_data["password"] ? $old_data["password"] : ""; ?>'>

                <div class="text-danger  font-weight-bold">
                    <?php echo $errors["password"] ? "{$errors['password']}" : ""; ?>
                </div>

            </div>


            <!--confirm Password -->
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" placeholder="confirmPassword"
                    name="confirmPassword"
                    value='<?php echo $old_data["confirmPassword"] ? $old_data["confirmPassword"] : ""; ?>'>

                <div class="text-danger  font-weight-bold">
                    <?php echo $errors["confirmPassword"] ? "{$errors['confirmPassword']}" : ""; ?>
                </div>

            </div>


            <!-- room -->
            <div class="mb-3">
                <label for="room" class="form-label">Room no</label>
                <select class="form-select" id="room" name="room">
                    <option value="" disabled>Select room</option>
                    <option value="Application1" <?php echo (isset($old_data["room"]) && $old_data["room"] == "Application1") ? "selected" : ""; ?>>Application1</option>
                    <option value="Application2" <?php echo (isset($old_data["room"]) && $old_data["room"] == "Application2") ? "selected" : ""; ?>>Application2</option>
                    <option value="Cloud" <?php echo (isset($old_data["room"]) && $old_data["room"] == "Cloud") ? "selected" : ""; ?>>Cloud</option>
                </select>


                <div class="text-danger  font-weight-bold">
                    <?php echo $errors["room"] ? "{$errors['room']}" : ""; ?>
                </div>
            </div>

            <!--Img  -->
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02" name="img">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>

            </div>
            <div class="text-danger  font-weight-bold">
                <?php echo $errors["img"] ? "{$errors['img']}" : ""; ?>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>