<?php
require_once "../includes/utils.php";
require_once "../includes/helper.php";


if (isset($_POST["email"]) && isset($_POST["password"])) {
    login($_POST["email"], $_POST["password"]);
} 
