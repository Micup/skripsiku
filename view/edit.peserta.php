<?php

$page_title = "Edit Data Peserta";
include_once "../template/header.php";

echo "<div class='right-button-margin'>";
    echo "<a href='view.peserta.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Daftar Peserta ";
    echo "</a>";
echo "</div>";

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR! ID not found!');

include_once '../classes/database.php';
include_once '../classes/peserta.class.php';
include_once '../initial.php';

$user = new Peserta($db);
$user->id= $id;
$user->getUser();

if($_POST)
{

    $user->nama_pesilat = htmlentities(trim($_POST['nama_pesilat']));
    $user->kontingen    = htmlentities(trim($_POST['kontingen']));
    $user->kelas        = htmlentities(trim($_POST['kelas']));
    $user->jekel        = htmlentities(trim($_POST['jekel']));

    if($user->update()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Success! Data berhasil diubah.";
        echo "</div>";
    }

    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! Data gagal diubah.";
        echo "</div>";
    }
}
?>

    <form action='edit.peserta.php?id=<?php echo $id; ?>' method='post'>

        <table class='table table-hover table-responsive table-bordered'>

            <tr>
                <td>Nama Pesilat</td>
                <td><input type='text' name='nama_pesilat' value='<?php echo $user->nama_pesilat;?>' class='form-control' required></td>
            </tr>

            <tr>
                <td>Kontingen</td>
                <td><input type='text' name='kontingen' value='<?php echo $user->kontingen;?>' class='form-control' required></td>
            </tr>

            <tr>
                <td>Kelas Tanding</td>
                <td>
                    <select class='form-control' name='kelas' >
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
                    <select class='form-control' name='jekel'  >
                        <option value="Putra">Putra</option>
                        <option value="Putri">Putri</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-success" >
                        <span class=""></span> Update
                    </button>
                </td>
            </tr>

        </table>
    </form>

<?php
include_once "../template/footer.php";
?>