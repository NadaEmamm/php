<?php
require_once "../includes/utils.php";
require_once "../includes/helpers.php";

$lines = file("../includes/users-data.txt");
$table  = [];
if ($lines) {
    foreach ($lines as $line) {
        $line = trim($line);
        $line = explode(":", $line);
        $table[] = $line;
    }
}

echo '<h1 class="text-center mt-5 fw-bold text-primary">🎉 Students Messages ! 🎉</h1>';
$headers = ["ID", "First Name", "Last Name", "User Name", "Gender", "Password", "Address", "Skills", "Department"];
drawTable($headers, $table);
