<?php

include_once '../classes/database.php';
include_once '../classes/sudut.class.php';
include_once '../classes/pertandingan.class.php';
include_once '../initial.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 100;
$from_record_num = ($records_per_page * $page) - $records_per_page; 

$user = new Pertandingan($db);
$sudut = new Sudut($db);

$page_title = "Jadwal Pertandingan";
include_once "../template/header.php";

echo "<div class='content'>";
echo "<div class='col-md-12'>";
echo "<div class='right-button-margin'>";
echo "<a href='create.pertandingan.php' class='btn btn-primary pull-right'>";
echo "<span class='glyphicon glyphicon-plus'></span> Tambah Data Pertandingan";
echo "</a>";
echo "</div>";

$prep_state = $user->getAllUsers($from_record_num, $records_per_page);
$num = $prep_state->rowCount();

$no= ($page - 1) + ($page - 1) * ($records_per_page - 1);

if($num>=0){

    echo "<div class='table-responsive'>";
    echo "<table class='table table-hover data-table table-striped tablesorter'>";
    echo "<thead>";
    echo "<th>Partai</th>";
    echo "<th>Kelas</th>";
    echo "<th>Jekel</th>";
    echo "<th>Sudut Merah</th>";
    echo "<th>VS</th>";
    echo "<th>Sudut Biru</th>";
    echo "<th>Actions</th>";
    echo "</thead>";

    
    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){
        $no++;
        extract($row); 

        echo "<tr>";
        echo "<td>$no.</td>";
        echo "<td>$row[kelas]</td>";
        echo "<td>$row[jekel]</td>";

        echo "<td>";
                    $sudut->id = $sudut_merah;
                    $sudut->getName();
                    echo $sudut->nama_pesilat;
        echo "</td>";

        echo "<td>VS</td>";

        echo "<td>";
                    $sudut->id = $sudut_biru;
                    $sudut->getName();
                    echo $sudut->nama_pesilat;
        echo "</td>";

        echo "<td>";
        
        echo "<a href='edit.peserta.php?id=" . $id_pertandingan . "' class='btn btn-warning left-margin'>";
        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
        echo "</a>";

        echo "<a href='delete.peserta.php?id=" . $id_pertandingan . "' class='btn btn-danger delete-object'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
        echo "</a>";

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";

    //include_once '../pagination.php';
    
}

else{
    echo "<div> No User found. </div>";
    }

    //echo "</div>";
    echo "</div>";
    //
?>


<?php
include_once "../template/footer.php";
?>