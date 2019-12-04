<?php
/* $curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://localhost/rest-server/index.php/mahasiswa");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$field = [
    'nim' => '1718035',
    'nama' => 'Faris',
    'alamat' => 'Kalimantan',
    'prodi' => '010801',
    'dsnwali' => '1086',
    'foto' => 'assets/img/faris.jpg',
    'token' => '12345'

];
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, $field);
$result = curl_exec($curl);
echo $result; */

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
$response = $client->request(
    'POST',
    'http://localhost/rest-server/index.php/mahasiswa',
    ['form_params' => [
        'token' => '12345',
        'nim' => $_POST['nim'],
        'nama' => $_POST['nama'],
        'alamat' => $_POST['alamat'],
        'prodi' => $_POST['prodi'],
        'dsnwali' => '1086',
        'foto' => 'assets/img/no_profile.jpg'
    ]]
);
$result =  $response->getBody()->getContents();
$mhs = json_decode($result, true);
return $mhs;
