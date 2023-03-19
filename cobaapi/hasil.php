<?php
echo "<h1>Hasil Pencarian</h1>";



if(isset($_POST['cari'])){
    $judul = $_POST['judul'];

    

    $url = 'http://www.omdbapi.com/?apikey=202bed7d&s="'.$judul.'"';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($output, TRUE);
    $data = $data['Search'];

    // var_dump($data);
    foreach ($data as $movie) {
        
        echo "\n <p>Judul: ".$movie["Title"]."</p>";
        echo "<p>Tahun: ".$movie["Year"]."</p>";
        echo '<img src= "'.$movie['Poster'].'">';
    }    
}
?>