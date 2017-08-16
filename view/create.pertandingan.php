<?php

$page_title = "Tambah Data Pertandingan";
include_once "../template/header.php";

echo "<div class='right-button-margin'>";
    echo "<a href='view.pertandingan.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Jadwal Pertandingan ";
    echo "</a>";
echo "</div>";

include_once '../classes/database.php';
include_once '../classes/sudut.class.php';
include_once '../initial.php';


if ($_POST){

    include_once '../classes/pertandingan.class.php';
    $user = new Pertandingan($db);

    $user->sudut_merah = $_POST['sudut_merah'];
    $user->sudut_biru = $_POST['sudut_biru'];
    $user->kelas = $_POST['kelas'];
    $user->jekel = $_POST['jekel'];
    

    if($user->create()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Sukses, data Pertandingan berhasil ditambahkan.";
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

<form action='create.pertandingan.php' role="form" method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Kelas Tanding</td>
            <td>
                <select class="form-control" name="kelas" >
                    <option value="">-- PILIH KELAS PERTANDINGAN --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                    <option value="I">I</option>
                    <option value="J">J</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <select class="form-control" name="jekel" >
                    <option value="">-- PILIH JENIS KELAMIN --</option>
                    <option value="Putra">Putra</option>
                    <option value="Putri">Putri</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Sudut Merah</td>
            <td>
                <?php
                    // choose user categories
                    include_once '../classes/sudut.class.php';

                    $sudut = new Sudut($db);
                    $prep_state = $sudut->getAll();
                    echo "<select class='form-control' name='sudut_merah'>";

                        echo "<option>--- Select Category ---</option>";

                        while ($row_sudut = $prep_state->fetch(PDO::FETCH_ASSOC)){

                            extract($row_sudut);

                            echo "<option value='$id_pesilat'> $nama_pesilat [$kelas] </option>";
                        }
                    echo "</select>";
                ?>
            </td>
        </tr>

        <tr>
            <td>Sudut Biru</td>
            <td>
                <?php
                    // choose user categories
                    include_once '../classes/sudut.class.php';

                    $sudut = new Sudut($db);
                    $prep_state = $sudut->getAll();
                    echo "<select class='form-control' name='sudut_biru'>";

                        echo "<option>--- Select Category ---</option>";

                        while ($row_sudut = $prep_state->fetch(PDO::FETCH_ASSOC)){

                            extract($row_sudut);

                            echo "<option value='$id_pesilat'> $nama_pesilat [$kelas]</option>";
                        }
                    echo "</select>";
                ?>
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

