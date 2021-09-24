<?php
if(!isset($_SESSION['login'])) {
   header('location: ../');
}



if(isset($_GET['nomor']) && $_GET['nomor'] !=''){
    //tampung data kiriman
    $nip=$_GET['nip'];
    $nomor = $_GET['nip'];

    // include file qrlib.php
    include "phpqrcode/qrlib.php";

    //Nama Folder file QR Code kita nantinya akan disimpan
    $tempdir = "temp/";

    //jika folder belum ada, buat folder 
    if (!file_exists($tempdir)){
        mkdir($tempdir);
    }

    #parameter inputan
    $isi_teks = $nomor;
    $namafile = $nip.".png";
    $quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
    $ukuran = 5; //batasan 1 paling kecil, 10 paling besar
    $padding = 2;

    QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

    header('location:dashboard.php?page=user');

}else{
    header('location:dashboard.php?page=user');
}
?>