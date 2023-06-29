<?php
require("koneksi.php");
$response = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
$id = $_POST["id"];
$SimbolAtom = $_POST["SimbolAtom"];
$NamaAtom = $_POST["NamaAtom"];
$MassaAtom = $_POST["MassaAtom"];
$NomorAtom = $_POST["NomorAtom"];
$Keterangan = $_POST["Keterangan"];

$perintah = "UPDATE UnsurKimia SET SimbolAtom='$SimbolAtom', NamaAtom='$NamaAtom', MassaAtom='$MassaAtom', 
NomorAtom='$NomorAtom', Keterangan='$Keterangan' WHERE id='$id'";
$eksekusi = mysqli_query($connect, $perintah);
$cek = mysqli_affected_rows($connect);

    if($cek>0)
    {
         $response["kode"] = 1;
         $response["pesan"] = "Sukses Mengubah Data";
    }
    else
    {
         $response["kode"] = 0;
         $response["pesan"] = "Ada Kesalahan. Gagal Mengubah Data";
    }
}

else
{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($connect);
