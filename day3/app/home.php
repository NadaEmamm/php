<?php
session_start();
$name = $_SESSION["name"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h2>Hello <?php echo $name; ?></h2>
</body>

</html>