<?php

function validatePostData($postData)
{
    $errors = [];
    $valid_data = [];

    $requiredFields = ["firstName", "lastName", "address", "country", "department", "gender", "username", "password", "code"];

    foreach ($requiredFields as $field) {
        if (!isset($postData[$field]) || trim($postData[$field]) === "") {
            $errors[$field] = ucfirst($field) . " is required";
        } else {
            $valid_data[$field] = trim($postData[$field]);
        }
    }

    if (!isset($postData["skills"]) || !is_array($postData["skills"]) || count($postData["skills"]) === 0) {
        $errors["skills"] = "At least one skill is required";
    } else {
        $valid_data["skills"] = $postData["skills"];
    }

    return ["errors" => $errors, "valid_data" => $valid_data];
}


