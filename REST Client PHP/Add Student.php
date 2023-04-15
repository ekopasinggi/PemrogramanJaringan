<?php
   
 
    //jika tombol simpan di klik
    if(isset($_POST['simpan'])) {
        //membuat data array data yang kirim
        
        $data=array(
            'nim' => $_POST['nim'],
            'name' => $_POST['name'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address']
        );
 

        $datajson=json_encode($data);

        var_dump($datajson);

        //url untuk tambah data
        $url="http://localhost/apiphp/students";
 
        $ch = curl_init(); 
 
        // set url 
        curl_setopt($ch, CURLOPT_URL, $url);
        // konversi hasil ke string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        //untuk metode POST
        curl_setopt($ch, CURLOPT_POST, true);
        //untuk data yang dikirim
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datajson);

        // eksekusi
        $output = curl_exec($ch); 
 
        // tutup curl 
        curl_close($ch);      
 
        //memunculkan pesan 
        var_dump($output);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data dengan cURL</title>
</head>
<body>
    <h1>Input Data Mahasiswa</h1>
<form method="POST">
    <table>
        <tr>
            <td>ID</td>
            <td><input type="number" name="nim"></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
            <select name="gender">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="address"></td>
        </tr>
        
        <tr>
            <td></td>
            <td>
                <button type="submit" name="simpan">SIMPAN</button>
                <button type="reset">BATAL</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>