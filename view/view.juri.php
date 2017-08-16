<?php

include_once '../classes/database.php';
include_once '../classes/juri.class.php';
include_once '../initial.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 5;
$from_record_num = ($records_per_page * $page) - $records_per_page;

$user = new Juri($db);

$page_title = "Juri";
include_once "../template/header.php";

echo "<div class='content'>";
echo "<div class='col-md-12'>";
echo "<div class='right-button-margin'>";
echo "<a href='create.juri.php' class='btn btn-primary pull-right'>";
echo "<span class='glyphicon glyphicon-plus'></span> Tambah Data Juri";
echo "</a>";
echo "</div>";

$prep_state = $user->getAllUsers($from_record_num, $records_per_page);
$num = $prep_state->rowCount();

$no= ($page - 1) + ($page - 1) * ($records_per_page - 1);

if($num>=0){

    echo "<table class='table table-hover'>";
    echo "<thead>";
    echo "<th>No</th>";
    echo "<th>Nama Juri</th>";
    echo "<th>Asal Daerah</th>";
    echo "<th>Jenis Kelamin</th>";
    echo "<th>Actions</th>";
    echo "</thead>";

    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){
    $no++;
        extract($row);

        echo "<tr>";
        echo "<td>$no.</td>";
        echo "<td>$row[nama_juri]</td>";
        echo "<td>$row[asal_daerah]</td>";
        echo "<td>$row[jekel]</td>";


        echo "<td>";
        echo "<a href='edit.juri.php?id=" . $id_juri . "' class='btn btn-warning left-margin'>";
        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
        echo "</a>";

        echo "<a href='delete.juri.php?id=" . $id_juri . "' class='btn btn-danger delete-object'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
        echo "</a>";

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
    // include pagination file
    include_once '../pagination.php';
    
}

else{
    echo "<div> No User found. </div>";
    }

    echo "</div>";
    echo "</div>";
?>

<?php
include_once "../template/footer.php";
?>