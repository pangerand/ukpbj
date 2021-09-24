<?php 

session_start();

if(isset($_SESSION['cetak'])) {
   header('location: login.php');
}
	include('../../koneksi.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>INFORMASI KEPEGAWAIAN</title>
	<link rel="icon" href="./assets/img/logo.png">
	<style type="text/css">
		body{
			font-family: Arial;
		}

		@media print{
			.no-print{
				display: none;
			}
		}

		table{
			border-collapse: collapse;
		}
	.style1 {
	font-size: 24px;
	font-weight: bold;
}
    </style>
</head>
<body>
<table border="6" cellpadding="80" cellspacing="0" width="100%">
<tr>
	<td>
	<table width="100%">
		<?php
		$sql=mysqli_query($konek, "SELECT * FROM mahasiswa WHERE id='$_GET[id]'");
		$d=mysqli_fetch_array($sql);
		$kp1 = $d['tmt_gol'];// pendefinisian tanggal awal
		$kp2 = date('d-m-Y', strtotime('+4 year', strtotime($kp1))); //operasi penjumlahan tanggal sebanyak 4 Tahun
		//echo $kp2; //print tanggal
		//berkala
		$berkala1 = $d['tmt_berkala'];// pendefinisian tanggal awal
		$berkala2 = date('d-m-Y', strtotime('+2 year', strtotime($berkala1))); //operasi penjumlahan tanggal sebanyak 2 Tahun
		//Pensiun
		$pensiun = $d['pensiun'];// pendefinisian tanggal awal
		$pensiun2 = date('d-m-Y',strtotime($pensiun));
		
		//
		?>
		<?php
function namaBulan($angka){
	switch ($angka) {
		case '1':
			$bulan = "Januari";
			break;
		case '2':
			$bulan = "Februari";
			break;
		case '3':
			$bulan = "Maret";
			break;
		case '4':
			$bulan = "April";
			break;
		case '5':
			$bulan = "Mei";
			break;
		case '6':
			$bulan = "Juni";
			break;
		case '7':
			$bulan = "Juli";
			break;
		case '8':
			$bulan = "Agustus";
			break;
		case '9':
			$bulan = "September";
			break;
		case '10':
			$bulan = "Oktober";
			break;
		case '11':
			$bulan = "November";
			break;
		case '12':
			$bulan = "Desember";
			break;
		default:
			$bulan = "Tidak ada bulan yang dipilih...";
			break;
	}

	return $bulan;
}

function tglIndonesia($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan = namaBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;		 
}
?>


		
		<tr>
			<td colspan="3">
				<center>
				<img src="../../assets/img/logo.png" width="90px">
				<h1>KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA R.I
				<br>KANTOR WILAYAH JAMBI</h1>Jl. Kapten Sujono Kotabaru Jambi, 36128
				<br>Telepon (0741) 40085- 40127, Faksimili (0741) 444029
<br>Website : http://jambi.kemenkumham.go.id Email : kepegawaiankanwiljambi@gmail.com
				<hr>
				<table width="733" border="0">
                  <tr>
                    <td colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3"><div align="center" class="style1">INFORMASI DATA KEPEGAWIAN</div></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="159">Nama</td>
                    <td width="13">:</td>
                    <td width="547"><?php echo $d['nama_pegawai']; ?></td>
                  </tr>
                  <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td><?php echo $d['nip']; ?>;</td>
                  </tr>
                  <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>:</td>
                    <td><?php echo $d['tmpt_lahir']; ?>, <?php echo $d['tgl_lahir']; ?></td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?php echo $d['jenis_kelamin']; ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $d['alamat']; ?></td>
                  </tr>
                  <tr>
                    <td>Pangkat/ Gol.</td>
                    <td>:</td>
                    <td><?php echo $d['pangkat']; ?></td>
                  </tr>
                  <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td><?php echo $d['jabatan']; ?></td>
                  </tr>
                  <tr>
                    <td>Instansi</td>
                    <td>:</td>
                    <td><?php echo $d['instansi']; ?></td>
                  </tr>
                  <tr>
                    <td>Telp/HP</td>
                    <td>:</td>
                    <td><?php echo $d['telp']; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $d['email']; ?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3"><strong>Periode Kenaikan Pangkat :</strong></td>
                  </tr>
                  <tr>
                    <td colspan="3"><?php echo $kp2; ?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3"><strong>Periode Berkala :</strong></td>
                  </tr>
                  <tr>
                    <td colspan="3"><?php echo $berkala2; ?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3"><strong>Pensiun :</strong></td>
                  </tr>
                  <tr>
                    <td colspan="3"><?php echo $pensiun2; ?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3"><strong>Catatan Hukuman Disiplin :</strong></td>
                  </tr>
                  <tr>
                    <td colspan="3"><?php echo $d['hukdis']; ?></td>
                  </tr>
                </table>
			  </center>
			</td>
		</tr>
		<tr>
			<td><img src="../temp/<?php echo $d['nip'].".png"; ?>"></td>
			<td></td>
			<td width="300px">
				<p>Jambi, <?php echo tglIndonesia(date('Y-m-d')); ?><br/>
				Kepala Kantor Wilayah,</p>
				<br/>
				<br/>
				<br/>
				<p><b>.......................................</b></p>
			</td>
		</tr>
	</table>
	</td>
</tr>
</table>
<br>
<center><a href="#" class="no-print" onClick="window.print();">Cetak/Print</a></center>
</body>
</html>
