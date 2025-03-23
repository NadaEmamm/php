<?php


function drawTable($header, $tableData)
{

    echo '<div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-dark">
            <tr>';
    foreach ($header as $value) {
        echo "<th>$value</th>";
    }
    echo "</tr></thead><tbody>";

    foreach ($tableData as $row) {
        echo "<tr>";
        foreach ($row as  $field) {
            echo "<td>{$field}</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table></div> </div>";
}


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
