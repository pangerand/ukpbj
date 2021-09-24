<?php
if(!isset($_SESSION['satker'])) {
   header('location: ../');
}

include '../include/connection.php';

$user = $_SESSION['namalengkap'];
$id_paket =$_GET['id_paket'];
$a='Surat permohonan';
$b='KAK atau Spesifikasi Teknis dan Gambar';
$c='Rancangan Kontrak';
$d='RKAKL';
$e='HPS yang sudah ditandatangani KPA/PPK';
$f='Bukti Pengumuman pada SIRUP';

                        $sqlfile = mysqli_query($con, "SELECT * FROM t_file WHERE id_paket='$id_paket'");
						$jml=mysqli_num_rows($sqlfile);
						$data=mysqli_fetch_array($sqlfile);
						if($jml == 0){
						

$sql = "INSERT INTO t_file (judul, file, id_paket, status) VALUES ('$a', '', '$id_paket','1'),('$b', '', '$id_paket','1'),('$c', '', '$id_paket','1'),('$d', '', '$id_paket','1'),('$e', '', '$id_paket','1'),('$f', '', '$id_paket','1')";
if (mysqli_query($con, $sql)) {
     // echo "New record created successfully";
} 
							
						}else{
						?>
							
						<?php
						}
						?>



							 
							  <?php
							  $pesan = $_GET['pesan'];
							  if($pesan < 1){
							      echo "<div class='alert alert-success alert-dismissible' role='alert'>SILAHKAN UPLOAD DATA DUKUNG </div>";
							  }else if($pesan == 1){
							      echo "<div class='alert alert-danger alert-dismissible' role='alert'>DATA YANG DIUPLOAD TIDAK BOLEH LEBIH DARI 2MB </div>";
							  }
							  else {
							      echo "<div class='alert alert-danger alert-dismissible' role='alert'>FORMAT FILE YANG DIIZINKAN HANYA PDF, DOC, DOCX </div>";
							  }
							  
							  ?>
							
<table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Berkas</td>
                                                <td>Upload</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php require('../include/connection.php');
                
                                          $sql = mysqli_query($con, "SELECT * FROM t_file where id_paket='$id_paket'");
                                          if (mysqli_num_rows($sql) > 0) {

                                         $i = 1;
                                         while($data = mysqli_fetch_array($sql)) {
                                         ?>
                                            <tr>
                                                <td><?php echo $data['judul']; ?></td>
                                                <td>
                                                    <?php
                                                    $status=$data['status'];
                                                    if($status == 1): ?>
                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                                                        <form name="upload" id="upload" method="post" action="?page=paket&action=prosesupload" enctype="multipart/form-data">        
                                                            <input type="hidden" name="idFile" value="<? echo $data['id_file']; ?>">
                                                            <input type="hidden" name="idPaket" value="<? echo $data['id_paket']; ?>">
                                                            <input type="file" name="attachment" id="fileToUpload" onchange="javascript:this.form.submit();">
                                                        </form>
                                                    
                                                    <?php else : ?>
                                                        <!-- ubah isi dari field nya dengan tidak_valid agar gambar tidak terdeteksi -->

                                                        <?php 
                                                        $status=$data['status'];
                                                        if($status == 3): ?>
                                                        
                                                            <div class='alert alert-warning'>Berkas Sebelumnya tidak valid, Upload ulang...</div>
                                                            <form name="form1" id="myForm" method="post" action="upload.php" enctype="multipart/form-data">        
                                                                <input type="hidden" name="idFile" value="<?= $f->id ?>">
                                                                <input type="file" class="gambar" name="file" id="fileInput">
                                                            </form>

                                                        <?php else : 
                                                            //$guru = $this->db->get_where('guru',['id' => $f->guru_id])->row(); ?>

                                                            <a href="paket/upload/<?php 
                                                            $user = $_SESSION['namalengkap'];
                                                            echo "$user"; ?>/<?php echo "$data[file]" ?>" target="_blank" class="badge badge-primary">Lihat Berkas</a>

                                                            <a href="?page=paket&action=hapus&id_file=<?php echo "$data[id_file]" ?>&id_paket=<?php echo "$data[id_paket]" ?>" class="badge badge-danger">Hapus</a>

                                                        <?php endif ?>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>

                                            <?php
                                              }

                                             } else {

                                             echo "<tr>
                                               <td colspan='5' style='text-align:center;'><h4>Belum ada data</h4></td>
                                             </tr>";
                                             }
                  ?>
                                        </tbody>
                                    </table>

<hr>
            <h5><B>KONFIRMASI :</B></h5>
            <div>
    <form action="?page=paket&action=konfirmasi&id_paket=<? echo "$id_paket"; ?>" onsubmit="return validateForm(this)" method="post" id=<? echo $data['id_paket']; ?> class="form-horizontal" name="hitung">
  <input type="checkbox" name="agree" id="agree" value="yes" />
  <label for="agree">Saya Menyatakan data yang diinput dan Upload adalah benar (data yang sudah dikirim tidak bisa dirubah lagi)</label>
  <div style="visibility:hidden; color:red" id="agree_chk_error">
  Data tidak akan dikirm sebelum anda ceklist Konfirmasi diatas !!
  </div>
  </div>
    <div>
    <input type="submit" name="update" value="KIRIM PAKET" class="btn btn-success"/>
    
    <button type="button" onclick="window.history.go(-2)" class="btn btn-danger">BATAL</button>
    </div>
        </form>
 <script>       
        function validateForm(form)
{
    console.log("checkbox checked is ", form.agree.checked);
    if(!form.agree.checked)
    {
        document.getElementById('agree_chk_error').style.visibility='visible';
        return false;
    }
    else
    {
        document.getElementById('agree_chk_error').style.visibility='hidden';
        return true;
    }
}
        </script>
        