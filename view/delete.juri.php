<?php

$page_title = "Delete Juri";
include_once "../template/header.php";
include_once '../classes/database.php';
include_once '../classes/juri.class.php';
include_once '../initial.php';

$user = new Juri($db);

if (isset($_POST['del-btn']))
{
    $id = $_GET['id'];
    $user->delete();
    header("Location: delete.juri.php?deleted");
}
      if(isset($_GET['deleted'])){
        echo "<div class=\"alert alert-success alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                    &times;
              </button>";
        echo "Sukses! Data berhasil Dihapus.";
        echo "</div>";
      }
?>

<?php
    if (isset($_GET['id'])) {
        echo "<form method='post'>";
            echo "<table class='table table-hover table-responsive table-bordered'>";
                echo "<input type='hidden' name='id' value='id' />";
                    echo"<div class='alert alert-warning'>";
                        echo"Are you sure to delete?";
                    echo"</div>";
                echo"<button type='submit' class='btn btn-danger' name='del-btn'>";
                    echo"Yes";
                echo"</button>";
                    echo str_repeat('&nbsp;', 2);
                echo"<a href='index.php' class='btn btn-default' role='button'>";
                    echo" No";
                echo"</a>";
            echo"</table>";
        echo"</form>";
    }
else {  
        echo"<a href='../view.juri.php' class='btn btn-large btn-success'><span class='glyphicon glyphicon-backward'></span> Home </a>";
     }
?>

<?php
include_once "../template/footer.php";
?>