<?php include "header.php"; ?>

<div class="container">

<?php
$view = isset($_GET['view']) ? $_GET['view'] : null;

switch($view){
	default:
	?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Data Pegawai</h3>
			</div>
			<div class="panel-body">
				<a class="btn btn-danger" style="margin-bottom: 10px" href="data_pegawai.php?view=tambah">Tambah Data</a>
				<form action="data_pegawai.php" method="get" align="right">
 <label>Cari :</label>
 <input type="text" name="cari">
 <input type="submit" value="Cari">
</form>
<?php 
if(isset($_GET['cari'])){
 $cari = $_GET['cari'];
 //echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
				<table class="table table-bordered table-striped">
					<tr>
						<th>No</th>
						<th>NIP</th>
						<th>Nama </th>
					    <th>Pangkat</th>
					  <th>Jabatan</th>
					   <th>Aksi</th>
					</tr>
					<?php
					
 if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  
  $sql = mysqli_query($konek,"select * from mahasiswa where nama_pegawai like '%".$cari."%' or nip like '%".$cari."%'");    
 }else{
					$halaman = 10;
					$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
					$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
					$result=mysqli_query($konek, "SELECT * FROM mahasiswa ");
					$total = mysqli_num_rows($result);
					$pages = ceil($total/$halaman);
						
					$sql=mysqli_query($konek, "SELECT * FROM mahasiswa LIMIT $mulai, $halaman")or die(mysqli_error);
					//$pages = ceil($total/$halaman);
 
 }			
					$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
					$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
 
					$no=$mulai+1;
 
					while($d=mysqli_fetch_array($sql)){
						?>
						<?php echo "<tr>
							<td width='40px' align='center'>$no</td>
							<td><a href='temp/$d[nip].png'>$d[nip]</a></td>
							<td><a href='edit_pegawai.php?id=$d[id]'>$d[nama_pegawai]</a></td>
							<td>$d[pangkat]</td>
							<td>$d[jabatan]</td>
							<td width='250px' align='center'>
								<a class='btn btn-primary btn-sm' href='buatQRCode.php?nip=$d[nip]&nomor=$d[nama_pegawai]'>Buat Kode QR</a>
								<a class='btn btn-success btn-sm' href='cetak_info.php?id=$d[id]' target='_blank'>Cetak</a>
								    <a class=\"btn btn-danger btn-sm\" href=\"delete_pegawai.php?id=$d[id]\" onclick=\"return confirm('Anda yakin mau menghapus item ini ?')\">Hapus</a>
							</td>
						</tr>";
						$no++;
						?>
						
<?php
}
?>
				</table>
				
				<div class="">
  <?php 
  $halaman = 10;
					$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
					$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $result=mysqli_query($konek, "SELECT * FROM mahasiswa ");
  $total = mysqli_num_rows($result);
  $pages = ceil($total/$halaman);
  
  for ($i=1; $i<=$pages ; $i++){ ?>

  <ul class="pagination">
      
    <?php echo "
        <li class='page-item'><span class='page-link'><a class='page-link' href='?halaman=$i'>$i</a><span class='sr-only'>(current)</span>
      </span></li>
        <li class='page-item active' aria-current='page'>
      "; ?>
  </ul>

 
  <?php } ?>
			</div>
		</div>
	</div>

<?php
	break;
	case "tambah":

?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Data Pegawai</h3>
			</div>
			<div class="panel-body">
				
				<form method="post" action="aksi_pegawai.php?act=insert">
					<table class="table">
						<tr>
							<td width="160">NIP</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="number_format" name="nip" required maxlength="18" /></div>
							</td>
						</tr>
						<tr>
							<td>Nama Pegawai</td>
							<td><div class="col-md-6"><input class="form-control" type="text" name="nama_pegawai" required /></div></td>
						</tr>
						<tr>
							<td>Tempat lahir</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="text" name="tmpt_lahir" required /></div>
								
							</td>
						</tr>
						<tr>
							<td>Tanggal lahir</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="date" name="tgl_lahir" required /></div>
								
							</td>
							</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>
								<div class="col-md-4">
									<select name="jenis_kelamin" class="form-control">
									<option value="">--PILIH JENIS KELAMIN--</option>
									<option value="Pria">Pria</option>
									<option value="Wanita">Wanita</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>
								<div class="col-md-8"><input class="form-control" type="text" name="alamat" required /></div>
								
							</td>
						<tr>
						<tr>
							<td>Pangkat</td>
							<td>
								<div class="col-md-4">
									<select name="pangkat" class="form-control">
									<option value="">--PILIH PANGKAT--</option>
									<option value="Pengatur Muda (II/a)">Pengatur Muda (II/a)</option>
									<option value="Pengatur Muda Tk.I (II/b)">Pengatur Muda (II/a)</option>
									<option value="Pengatur (II/c)">Pengatur (II/c)</option>
									<option value="Pengatur Tk.I (II/d)">Pengatur Tk.I (II/d)</option>
									<option value="Penata Muda (III/a)">Penata Muda (III/a)</option>
									<option value="Penata Muda Tk.I(III/b)">Penata Muda Tk.I(III/b)</option>
									<option value="Penata(III/c)">Penata (III/c)</option>
									<option value="Penata Tk.I (III/d)">Penata Tk.I(III/d)</option>
									<option value="Pembina (IV/a)">Pembina (IV/a)</option>
									<option value="Pembina Tk.I (IV/b)">Pembina Tk.I (IV/b)</option>
									<option value="Pembina Utama Muda(IV/b)">Pembina Utama Muda (IV/b)</option>
									<option value="Pembina Utama Madya(IV/c)">Pembina Utama Madya (IV/c)</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>TMT Golongan</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="date" name="tmt_gol" required /></div>
								
							</td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td><div class="col-md-6"><input class="form-control" type="text" name="jabatan" required /></div></td>
						</tr>
						<tr>
							<td>TMT Jabatan</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="date" name="tmt_jabatan" required /></div>
								
							</td>
						</tr>
						<tr>
							<td>TMT Berkala Terakhir</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="date" name="tmt_berkala" required /></div>
								
							</td>
						</tr>
						<tr>
							<td>Instansi</td>
							<td>
								<div class="col-md-6">
									<select name="instansi" class="form-control">
									<option value="">Pilih salah satu</option><option value="DIVISI ADMINISTRASI">DIVISI ADMINISTRASI</option>
									<option value="DIVISI PEMASYARAKATAN">DIVISI PEMASYARAKATAN</option>
									<option value="DIVISI KEIMIGRASIAN">DIVISI KEIMIGRASIAN</option>
									<option value="DIVISI PELAYANAN HUKUM DAN HAM">DIVISI PELAYANAN HUKUM DAN HAM</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td><div class="col-md-4"><input class="form-control" type="text"  name="telp" required /></div></td>
						</tr>
						
						<tr>
							<td>email</td>
							<td><div class="col-md-4"><input class="form-control" type="text"  name="email" required /></div></td>
						</tr>
						<tr>
							<td>TMT Pensiun</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="date" name="pensiun" required /></div>
								
							</td>
						</tr>
							<tr>
							<td>Riwayat HUKDIS</td>
							<td><div class="col-md-4"><textarea rows = "5" cols = "60" name ="hukdis"> Isi dengan Riwayat Hukdis Bila Ada..</textarea></div></td>
							</tr>
						<tr>
							<td></td>
							<td>
							<div class="col-md-6">
								<input class="btn btn-primary" type="submit" value="Simpan" />
								<a class="btn btn-danger" href="data_pegawai.php">Kembali</a>
								</div>
							</td>
						</tr>
					</table>
				</form>

			</div>
		</div>
	</div>

<?php
	break;
}
?>

</div>
</div>

<?php include "footer.php"; ?>
