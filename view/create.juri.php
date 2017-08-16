<?php

$page_title = "Tambah Data Juri";
include_once "../template/header.php";

echo "<div class='right-button-margin'>";
    echo "<a href='view.juri.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Daftar Juri ";
    echo "</a>";
echo "</div>";

include_once '../classes/database.php';
include_once '../initial.php';


if ($_POST){

    include_once '../classes/juri.class.php';
    $user = new Juri($db);

    $user->nama_pesilat = htmlentities(trim($_POST['nama_juri']));
    $user->kontingen = htmlentities(trim($_POST['asal_daerah']));
    $user->jekel = htmlentities(trim($_POST['jekel']));
    

    if($user->create()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Sukses, data Juri berhasil ditambahkan.";
        echo "</div>";
    }

    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! Gagal menambah data.";
        echo "</div>";
    }
}
?>

<form action='create.juri.php' role="form" method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Nama Juri</td>
            <td><input type='text' name='nama_juri'  class='form-control' required></td>
        </tr>

        <tr>
            <td>Asal Daerah</td>
            <td><input type='text' name='kontingen' class='form-control' required></td>
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <select class="form-control" name="jekel" >
                    <option value="Putra">Putra</option>
                    <option value="Putri">Putri</option>
                </select>
            </td>
        </tr>

        

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Create
                </button>
            </td>
        </tr>

    </table>
</form>

<?php
include_once "../template/footer.php";
?>

