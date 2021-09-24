<?php
if(!isset($_SESSION['login'])) {
   header('location: ../');
}

include "../include/connection.php";

// jika ada get act
if(isset($_GET['action'])){

	//proses simpan data
	if($_GET['action']=='simpan'){
		//variabel dari elemen form
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
		
		if($nip=='' || $nama_pegawai=='' || $tmpt_lahir=='' || $tgl_lahir=='' || $jenis_kelamin=='' || $alamat==''|| $pangkat==''||$jabatan==''|| $tmt_gol==''|| $tmt_jabatan==''|| $tmt_berkala==''|| $telp==''|| $email==''||  $pensiun==''|| $hukdis==''){
			
			
			header('location:?page=user&action=sukses');
		}else{			
			//proses simpan data admin
			$simpan = mysqli_query($con, "INSERT INTO mahasiswa(nip,nama_pegawai,tmpt_lahir,tgl_lahir,jenis_kelamin,alamat,pangkat,jabatan,instansi,tmt_gol,tmt_jabatan,tmt_berkala,telp,email,pensiun,hukdis) 
							VALUES ('$nip','$nama_pegawai','$tmpt_lahir','$tgl_lahir','$jenis_kelamin','$alamat','$pangkat','$jabatan','$instansi','$tmt_gol','$tmt_jabatan','$tmt_berkala','$telp','$email','$pensiun','$hukdis')");
			
			if($simpan){
				// BUAT QRCODE
				// tampung data kiriman
				$nomor = $nip;
			
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

				header('location:?page=user&action=sukses');
			}else{
				header('location:?page=user&action=sukses');
			}
		}
	} // akhir proses simpan data

	else{
		header('location:?page=user&action=sukses');
	}

} // akhir get act

else{
	header('location:?page=user&action=sukses');
}
?>