<?php

$page_title = "Edit Jadwal Pertandingan";
include_once "../template/header.php";

echo "<div class='right-button-margin'>";
    echo "<a href='../view.pertandingan.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Data Juri ";
    echo "</a>";
echo "</div>";

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR! ID not found!');

include_once '../classes/database.php';
include_once '../classes/pertandingan.class.php';
include_once '../classes/sudut.class.php';
include_once '../initial.php';

$user = new Pertandingan($db);
$user->id= $id;
$user->getUser();

if($_POST)
{

    $user->nama_juri    = htmlentities(trim($_POST['nama_juri']));
    $user->asal_daerah  = htmlentities(trim($_POST['asal_daerah']));
    $user->jekel        = htmlentities(trim($_POST['jekel']));

    if($user->update()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Success! User is edited.";
        echo "</div>";
    }

    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! Unable to edit user.";
        echo "</div>";
    }
}
?>

    <form action='edit.juri.php?id=<?php echo $id; ?>' method='post'>

        <table class='table table-hover table-responsive table-bordered'>

            <tr>
                <td>Nama Juri</td>
                <td><input type='text' name='nama_juri' value='<?php echo $user->nama_juri;?>' class='form-control' required></td>
            </tr>

            <tr>
                <td>Asal Daerah</td>
                <td><input type='text' name='asal_daerah' value='<?php echo $user->asal_daerah;?>' class='form-control' required></td>
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