<?php
echo "<h1>Membaca file .json</h1>";
/* $data = file_get_contents('data.json');
$a = json_decode($data, true);
var_dump($a);
echo "<br>";
echo $a['mahasiswa'][2]['alamat']; */

echo "<br><br>";
echo "<h1>Membaca file json dari database server</h1>";
$pdo = new PDO('mysql:host=localhost;dbname=db_siakad_2018','root','');
$db = $pdo->prepare('select * from v_info_mhs_lengkap');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($mahasiswa);
