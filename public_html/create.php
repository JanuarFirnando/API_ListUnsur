<?php
require("koneksi.php");
$response = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
$SimbolAtom = $_POST["SimbolAtom"];
$NamaAtom = $_POST["NamaAtom"];
$MassaAtom = $_POST["MassaAtom"];
$NomorAtom = $_POST["NomorAtom"];
$Keterangan = $_POST["Keterangan"];

$perintah = "INSERT INTO UnsurKimia (SimbolAtom, NamaAtom, MassaAtom, NomorAtom, Keterangan) VALUES('$SimbolAtom', '$NamaAtom', '$MassaAtom', '$NomorAtom', '$Keterangan')";
$eksekusi = mysqli_query($connect, $perintah);
$cek = mysqli_affected_rows($connect);

    if($cek>0)
    {
         $response["kode"] = 1;
         $response["pesan"] = "Sukses Menyimpan Data";
    }
    else
    {
         $response["kode"] = 0;
         $response["pesan"] = "Ada Kesalahan. Gagal Menyimpan Data";
    }
}

else
{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($connect);
