<?php

include_once '../classes/database.php';
include_once '../classes/peserta.class.php';
include_once '../initial.php';

$page_title = "IPSI Kota Magelang";
include_once "../template/header.php";
//echo "<img src='../library/images/ipsi.png'>";
echo "<div class='content'>";
echo "<div class='col-md-12'>";
echo "<h3 align='center'>
        <strong> Selamat Datang di Sistem Penilaian Pertandingan Pencak Silat </strong>
      </h3>";
echo "</div>";
echo "<div class='content'>";
echo "<div class='col-md-12'>";
echo "<div class='isi'>";
echo "Sebuah sistem penilaian digital pertandingan Pencak Silat yang telah terkomputerisasi<br>";
echo "Sistem ini mampu melakukan pengolahan data pertandingan Pencak Silat, antara lain:<br>";
echo "1. Mengolah data <strong>Peserta</strong> pertandingan Pencak Silat<br>";
echo "2. Mengolah data <strong>Juri</strong> pertandingan Pencak Silat<br>";
echo "3. Mengolah data <strong>Partai</strong> pertandingan Pencak Silat<br>";
echo "4. Mengolah data <strong>Hasil</strong> pertandingan Pencak Silat<br>";
echo "5. Menampilkan data <strong>Penilaian</strong> pertandingan Pencak Silat<br>";
echo "</div>";
echo "</div>";
?>

<?php
include_once "../template/footer.php";
?>