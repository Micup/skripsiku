<?php

ini_set('display_errors', 1); // see an error when they pop up
error_reporting(E_ALL); // report all php errors
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $page_title; ?></title>

        <!-- Bootstrap CSS -->
        <link rel="icon" type="image/png" href="../library/images/logo1.png">
        <link href="../library/css/bootstrap.css" rel="stylesheet" media="screen" />
        <link href="../library/css/bootstrap.min.css" rel="stylesheet">
        <link href="../library/css/style.css" rel="stylesheet">
        <script src="../library/js/bootstrap.min.js"></script>

        <!-- some custom CSS -->
        <style>
            .left-margin{
                margin:0 .5em 0 0;
            }

            .right-button-margin{
                margin: 0 0 1em 0;
                overflow: hidden;
            }
        </style>
    </head>

    <body>

        <ul class="nav nav-tabs navbar-fixed-top">
          <li role="presentation"><a href="../index.php">Home</a></li>
          <li role="presentation"><a href="../view/view.peserta.php">Peserta</a></li>
          <li role="presentation"><a href="../view/view.juri.php">Juri</a></li>
          <li role="presentation"><a href="../view/view.pertandingan.php">Pertandingan</a></li>
          <li role="presentation"><a href="#">Penilaian</a></li>
          <li role="presentation"><a href="#">Hasil</a></li>
        </ul>

        <!-- container -->
        <div class="container">
            <?php
                 // show page header
                 echo "<div class='page-header'>";
                 echo "<br>";
                 echo "<h1><img src='../library/images/logo1.png'> {$page_title} </h1>";
                 //echo "";
                 echo "</div>";
            ?>

         <!-- For the following code look at footer.php -->


