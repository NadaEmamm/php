<?php


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
        <form action="../handlers/user-data.php" method="POST">

            <!-- firstName -->
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" placeholder="First Name"
                    name="firstName"
                    value='<?php echo $old_data["firstName"] ? $old_data["firstName"] : ""; ?>'>
                <div class="text-danger  font-weight-bold">
                    <?php echo $errors["firstName"] ? "{$errors['firstName']}" : ""; ?>
                </div>
            </div>

            <!-- lastName -->
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName"
                    value='<?php echo $old_data["lastName"] ? $old_data["lastName"] : ""; ?>'>

                <div class="text-danger  font-weight-bold">
                    <?php echo $errors["lastName"] ? "{$errors['lastName']}" : ""; ?>
                </div>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" placeholder="Address" name="address"
                    value='<?php echo $old_data["address"] ? $old_data["address"] : ""; ?>'></textarea>

                <div class="text-danger  font-weight-bold">
                    <?php echo $errors["address"] ? "{$errors['address']}" : ""; ?>
                </div>
            </div>

            <!-- Skills -->
            <div class="mb-3">
                <label class="form-label">Skills</label>
                <div>
                    <input type="checkbox" id="php" name="skills[]" value="PHP"
                        <?php echo (isset($old_data["skills"]) && is_array($old_data["skills"]) && in_array("PHP", $old_data["skills"])) ? 'checked="checked"' : ''; ?>>
                    <label for="php">PHP</label>
                </div>
                <div>
                    <input type="checkbox" id="mysql" name="skills[]" value="MySQL"
                        <?php echo (isset($old_data["skills"]) && is_array($old_data["skills"]) && in_array("MySQL", $old_data["skills"])) ? 'checked="checked"' : ''; ?>>
                    <label for="mysql">MySQL</label>
                </div>
                <div>
                    <input type="checkbox" id="java" name="skills[]" value="Java"
                        <?php echo (isset($old_data["skills"]) && is_array($old_data["skills"]) && in_array("Java", $old_data["skills"])) ? 'checked="checked"' : ''; ?>>
                    <label for="java">Java</label>
                </div>
                <div>
                    <input type="checkbox" id="cpp" name="skills[]" value="C++"
                        <?php echo (isset($old_data["skills"]) && is_array($old_data["skills"]) && in_array("C++", $old_data["skills"])) ? 'checked="checked"' : ''; ?>>
                    <label for="cpp">C++</label>
                </div>


                <div class="text-danger  font-weight-bold">
                    <?php echo isset($errors["skills"]) ? $errors["skills"] : ""; ?>
                </div>
            </div>

            <!-- Country -->
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <select class="form-select" id="country" name="country">
                    <option value="" disabled>Select country</option>
                    <option value="Egypt" <?php echo (isset($old_data["country"]) && $old_data["country"] == "Egypt") ? "selected" : ""; ?>>Egypt</option>
                    <option value="America" <?php echo (isset($old_data["country"]) && $old_data["country"] == "America") ? "selected" : ""; ?>>America</option>
                    <option value="India" <?php echo (isset($old_data["country"]) && $old_data["country"] == "India") ? "selected" : ""; ?>>India</option>
                    <option value="Ghana" <?php echo (isset($old_data["country"]) && $old_data["country"] == "Ghana") ? "selected" : ""; ?>>Ghana</option>
                </select>


                <div class="text-danger  font-weight-bold">
                    <?php echo $errors["country"] ? "{$errors['country']}" : ""; ?>
                </div>
            </div>

            <!-- Gender -->
            <div class="mb-3">
                <label class="form-label">Gender</label>

                <div>
                    <input type="radio" id="male" name="gender" value="Male"
                        <?php echo (isset($old_data["gender"]) && $old_data["gender"] == "Male") ? 'checked="checked"' : ''; ?>>
                    <label for="male">Male</label>
                </div>
                <div>
                    <input type="radio" id="female" name="gender" value="Female"
                        <?php echo (isset($old_data["gender"]) && $old_data["gender"] == "Female") ? 'checked="checked"' : ''; ?>>
                    <label for="female">Female</label>
                </div>


                <div class="text-danger  font-weight-bold">
                    <?php echo $errors["gender"] ? "{$errors['gender']}" : ""; ?>
                </div>
            </div>

            <!-- UserName -->
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" placeholder="User Name" name="username"
                    value='<?php echo $old_data["username"] ? $old_data["username"] : ""; ?>'>

                <div class="text-danger  font-weight-bold">
                    <?php echo $errors["username"] ? "{$errors['username']}" : ""; ?>
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

            <!-- Department -->
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" class="form-control" id="department" placeholder="Department"
                    name="department"
                    value='<?php echo $old_data["department"] ? $old_data["department"] : ""; ?>'>


                <div class="text-danger  font-weight-bold">
                    <?php echo $errors["department"] ? "{$errors['department']}" : ""; ?>
                </div>
            </div>

            <!-- Code -->
            <div class="mb-3">
                <p>FSD578A</p>
                <label for="code" class="form-label">Please insert the code in the below box</label>
                <input type="text" class="form-control" id="code" placeholder="insert code" name="code">

                <div class="text-danger  font-weight-bold">
                    <?php echo $errors["code"] ? "{$errors['code']}" : ""; ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>