<?php




function generateID()
{
    if (file_exists("./ids.txt")) {
        $id =  file_get_contents("ids.txt");
        $id = (int)$id + 1;
    } else {
        $id  = 1;
    }
    file_put_contents("ids.txt", $id);

    return $id;
}


function appendDataTofile($filename, $data)
{
    $fileobject = fopen($filename, "a");
    if ($fileobject) {
        fwrite($fileobject, $data);
        fclose($fileobject);
        return true;
    }

    return false;
}

function login($email, $password)
{
    $lines = file("../includes/users-data.txt");
    if ($lines) {
        foreach ($lines as $line) {
            $line = trim($line);
            $line = explode(":", $line);
            if ($line[2] == $email && $line[3] == $password) {
                session_start();
                $_SESSION["name"] = $line[1];
                header("location:../app/home.php");
                exit();
            }
        }
    }
    header("location:../app/login.php?errors=Invalid email or password");
    exit();
}
