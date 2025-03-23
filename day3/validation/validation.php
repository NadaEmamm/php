<?php

function validatePostData($postData, $fileData)
{
    $errors = [];
    $valid_data = [];

    $requiredFields = ["name", "email", "password", "room", "confirmPassword"];

    $valid_ext = ["jpg", "jpeg", "png", "gif"];

    foreach ($requiredFields as $field) {
        if (!isset($postData[$field]) || trim($postData[$field]) === "") {
            $errors[$field] = ucfirst($field) . " is required";
        } else {
            $valid_data[$field] = trim($postData[$field]);
        }
    }

    // validate img

    if (!isset($fileData["img"]) || $fileData["img"]["error"] !== UPLOAD_ERR_OK || !in_array(pathinfo($fileData["img"]["name"], PATHINFO_EXTENSION), $valid_ext)) {
        $errors["img"] = "Image is required and must be a valid image file";
    } else {
        $valid_data["img"] = $fileData["img"];
    }

    // validate email
    if (isset($postData["email"]) && !filter_var($postData["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format";
    }

    // validate password
    if ($postData["password"] !== $postData["confirmPassword"]) {
        $errors["confirmPassword"] = "Password and confirm password do not match";
    }
    return ["errors" => $errors, "valid_data" => $valid_data];
}
