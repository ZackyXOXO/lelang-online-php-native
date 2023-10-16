<?php 

include "navbar.php";

// // $curl = curl_init();
// $url = 'https://api-sekolah-indonesia.vercel.app/sekolah/smk?kab_kota=036000';
// // $collection_name = 'products';
// $request_url = $url . '/';
// $curl = curl_init($request_url);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl, CURLOPT_HTTPHEADER, [
//   'Content-Type: application/json'
// ]);
// $response =curl_exec($curl);
// curl_close($curl);
// echo $response;


// construct the query with our apikey and the query we want to make
$endpoint = 'https://api-sekolah-indonesia.vercel.app/sekolah/smk?kab_kota=036000&page=1&perPage=20';
// setup curl to make a call to the endpoint
$session = curl_init($endpoint);
// indicates that we want the response back
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
// exec curl and get the data back
$data = curl_exec($session);
// remember to close the curl session once we are finished retrieveing the data
curl_close($session);
// decode the json data to make it easier to parse the php
$search_results = json_decode($data, true);
if ($search_results === NULL) die('Error parsing json');
// print_r($search_results);


// $json = file_get_contents('https://api-sekolah-indonesia.vercel.app/sekolah/smk?kab_kota=036000');
// $data = json_decode($json);
// print_r ($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="text-white">

        <title class="text-white">Daftar Sekolah</title>

    </div>
</head>
<body>
    <h1 class="text-dark">Daftar Sekolah</h1>
<div class="table text-white">
    <table border="1">
    <thead>
          <tr>
          
            <th>Sekolah</th>
            <th>Alamat Sekolah</th>
            <th>NPSN</th>
          </tr>
        </thead>
       <tbody>
        <?php foreach ($search_results['dataSekolah'] as $school) {
            # code...
            $no = 0; 
            $nama = $school['sekolah'];
            $alamat = $school['alamat_jalan'];
            $npsn = $school['npsn'];
            
            echo '   <tr>

            <td>'.$nama .'</td>
            <td>'. $alamat.' </td>
            <td>'. $npsn. ' </td>
        </tr>';
        }
        ?>

       </tbody>
    </table>
    </div>
</body>
</html>