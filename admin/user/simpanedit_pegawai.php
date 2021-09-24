<?php
if(!isset($_SESSION['login'])) {
   header('location: ../');
}

include "../include/connection.php";
// menyimpan data kedalam variabel
		$id   				= $_POST['id'];
		$nip 				= $_POST['nip'];
		$nama_pegawai 		= $_POST['nama_pegawai'];
		$tmpt_lahir  		= $_POST['tmpt_lahir'];
		$tgl_lahir			= $_POST['tgl_lahir'];
		$jenis_kelamin 		= $_POST['jenis_kelamin'];
		$alamat				= $_POST['alamat'];
		$pangkat			= $_POST['pangkat'];
		$jabatan			= $_POST['jabatan'];
		$instansi			= $_POST['instansi'];
		$tmt_gol			= $_POST['tmt_gol'];
		$tmt_jabatan		= $_POST['tmt_jabatan'];
		$tmt_berkala		= $_POST['tmt_berkala'];
		$telp				= $_POST['telp'];
		$email				= $_POST['email'];
		$pensiun			= $_POST['pensiun'];
		$hukdis				= $_POST['hukdis'];

// query SQL untuk insert data
$query="UPDATE mahasiswa SET nip='$nip',nama_pegawai='$nama_pegawai',tmpt_lahir='$tmpt_lahir',tgl_lahir='$tgl_lahir',jenis_kelamin='$jenis_kelamin',alamat='$alamat',pangkat='$pangkat',jabatan='$jabatan',instansi='$instansi',tmt_gol='$tmt_gol',tmt_jabatan='$tmt_jabatan',tmt_berkala='$tmt_berkala',telp='$telp',email='$email',pensiun='$pensiun',hukdis='$hukdis' where id='$id'"; 

mysqli_query($con, $query);

// mengalihkan ke halaman index.php
header("location:?page=user&action=editsukses");
?>