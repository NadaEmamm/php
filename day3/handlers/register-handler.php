<?php
require_once "../includes/utils.php";
require_once "../includes/helper.php";
require_once "../validation/validation.php";


$formDataIssues = validatePostData($_POST, $_FILES);
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

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $room = $_POST["room"];
    $confirmPassword = $_POST["confirmPassword"];
    $id = generateID();

    $ext = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);

    $img = $_FILES["img"]['tmp_name'];
    
    $imgName = explode("/", $img);

    $imgName = end($imgName) . "." . $ext;


    $uploadPath = "../uploads/{$imgName}";

    $uploaded = move_uploaded_file($img, $uploadPath);

    if (!$uploaded) {
        echo '<h1 class="mt-5 fw-bold text-danger">Error:somthing wrong happend</h1>';
        exit();
    }

    echo '<h1 class="text-center mt-5 fw-bold text-primary">🎉 User Data! 🎉</h1>';
}

$table  = "{$id}:{$name}:{$email}:{$password}:{$confirmPassword}:{$room}\n";
$saved = appendDataTofile("../includes/users-data.txt", $table);

if ($saved) {
    echo '<h1 class="mt-5 fw-bold text-primary">🎉 Data Saved! 🎉</h1>';
} else {
    echo '<h1 class="mt-5 fw-bold text-danger">Error:somthing wrong happend</h1>';
}
