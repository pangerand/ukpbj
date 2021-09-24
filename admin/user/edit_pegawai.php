
<?php
if(!isset($_SESSION['login'])) {
   header('location: ../');
}

$id        = $_GET['id'];
$pegawai 			= mysqli_query($con, "select * from mahasiswa where id='$id'");
$row        		= mysqli_fetch_array($pegawai);
?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Update Data Pegawai</h3>
			</div>
			<div class="panel-body">
				
				<form method="post" action="?page=user&action=simpanedit">
				<input type="hidden" value="<?php echo $row['id'];?>" name="id">
					<table class="table">
						<tr>
							<td width="160">NIP</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="number_format" value="<?php echo $row['nip'];?>" name="nip" required maxlength="18" /></div>
							</td>
						</tr>
						<tr>
							<td>Nama Pegawai</td>
							<td><div class="col-md-6"><input class="form-control" type="text" value="<?php echo $row['nama_pegawai'];?>" name="nama_pegawai" required /></div></td>
						</tr>
						<tr>
							<td>Tempat lahir</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="text" value="<?php echo $row['tmpt_lahir'];?>" name="tmpt_lahir" required /></div>
								
							</td>
						</tr>
						<tr>
							<td>Tanggal lahir</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="date" value="<?php echo $row['tgl_lahir'];?>" name="tgl_lahir" required /></div>
								
							</td>
							</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>
								<div class="col-md-4">
									<select name="jenis_kelamin" value="<?php echo $row['jenis_kelamin'];?>" class="form-control">
									<option value="<?php echo $row['jenis_kelamin'];?>"><?php echo $row['jenis_kelamin'];?></option>
									<option value="Pria">Pria</option>
									<option value="Wanita">Wanita</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>
								<div class="col-md-8"><input class="form-control" type="text" value="<?php echo $row['alamat'];?>" name="alamat" required /></div>
								
							</td>
						<tr>
						<tr>
							<td>Pangkat</td>
							<td>
								<div class="col-md-4">
									<select name="pangkat" value="<?php echo $row['pangkat'];?>" class="form-control">
									<option value="<?php echo $row['pangkat'];?>"><?php echo $row['pangkat'];?></option>
									<option value="Pengatur Muda (II/a)">Pengatur Muda (II/a)</option>
									<option value="Pengatur Muda Tk.I (II/b)">Pengatur Muda (II/a)</option>
									<option value="Pengatur (II/c)">Pengatur (II/c)</option>
									<option value="Pengatur Tk.I (II/d)">Pengatur Tk.I (II/d)</option>
									<option value="Penata Muda (III/a)">Penata Muda (III/a)</option>
									<option value="Penata Muda Tk.I(III/b)">Penata Muda Tk.I(III/b)</option>
									<option value="Penata (III/c)">Penata (III/c)</option>
									<option value="Penata Tk.I (III/d)">Penata Tk.I(III/d)</option>
									<option value="Pembina (IV/a)">Pembina (IV/a)</option>
									<option value="Pembina Tk.I (IV/b)">Pembina Tk.I (IV/b)</option>
									<option value="Pembina Utama Muda (IV/b)">Pembina Utama Muda (IV/b)</option>
									<option value="Pembina Utama Madya (IV/c)">Pembina Utama Madya (IV/c)</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>TMT Golongan</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="date" value="<?php echo $row['tmt_gol'];?>" name="tmt_gol" required /></div>
								
							</td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td><div class="col-md-6"><input class="form-control" type="text" value="<?php echo $row['jabatan'];?>" name="jabatan" required /></div></td>
						</tr>
						<tr>
							<td>TMT Jabatan</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="date" value="<?php echo $row['tmt_jabatan'];?>" name="tmt_jabatan" required /></div>
								
							</td>
						</tr>
						<tr>
							<td>TMT Berkala Terakhir</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="date" value="<?php echo $row['tmt_berkala'];?>" name="tmt_berkala" required /></div>
								
							</td>
						</tr>
						<tr>
							<td>Instansi</td>
							<td>
								<div class="col-md-6">
									<select name="instansi" value="<?php echo $row['instansi'];?>" class="form-control">
									<option value="<?php echo $row['instansi'];?>"><?php echo $row['instansi'];?></option>
									<option value="DIVISI ADMINISTRASI">DIVISI ADMINISTRASI</option>
									<option value="DIVISI PEMASYARAKATAN">DIVISI PEMASYARAKATAN</option>
									<option value="DIVISI KEIMIGRASIAN">DIVISI KEIMIGRASIAN</option>
									<option value="DIVISI PELAYANAN HUKUM DAN HAM">DIVISI PELAYANAN HUKUM DAN HAM</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td><div class="col-md-4"><input class="form-control" type="text" value="<?php echo $row['telp'];?>" name="telp" required /></div></td>
						</tr>
						
						<tr>
							<td>email</td>
							<td><div class="col-md-4"><input class="form-control" type="text" value="<?php echo $row['email'];?>"  name="email" required /></div></td>
						</tr>
						<tr>
							<td>TMT Pensiun</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="date" value="<?php echo $row['pensiun'];?>" name="pensiun" required /></div>
								
							</td>
						</tr>
							<tr>
							<td>Riwayat HUKDIS</td>
							<td><div class="col-md-4"><textarea rows = "5" cols = "60" name ="hukdis"> <?php echo $row['hukdis'];?></textarea></div></td>
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



</div>

