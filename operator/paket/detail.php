<?php
if(!isset($_SESSION['satker'])) {
   header('location: ../');
}
  require('../include/connection.php');
  $id_paket =$_GET['id_paket'];
    $sql = mysqli_query($con, "SELECT * FROM t_paket where id_paket ='$id_paket'");
    if (mysqli_num_rows($sql) > 0) {
      while($data = mysqli_fetch_array($sql)) {

if (!isset($_POST['update'])) {

} else {
   define('BASEPATH', dirname(__FILE__));

      
    $id_user = $_SESSION['id'];
   $nama_paket  = $_POST['nama_paket'];
   $kode_rup = $_POST['kode_rup'];
   $thn_anggaran = $_POST['thn_anggaran'];
   $pagu = $_POST['pagu'];
   $hps = $_POST['hps'];
   $nama_ppk = $_POST['nama_ppk'];
   $sk_ppk = $_POST['sk_ppk'];
   $tgl_sk = $_POST['tgl_sk'];
   $jenis_paket = $_POST['jenis_paket'];
   $status = $_POST['status'];

   if($id_user == '' || $nama_paket == '' || $kode_rup == '' || $thn_anggaran == '' || $pagu == '' || $hps == ''|| $nama_ppk == ''|| $sk_ppk == ''|| $tgl_sk == ''|| $jenis_paket == ''|| $status == '') {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1);</script>';

   } else if(!preg_match("/^[a-zA-z \'.]*$/",$nama)) {

      echo '<script type="text/javascript">alert("Nama hanya boleh mengandung huruf, titik(.), petik tunggal");window.history.go(-1)</script>';

   } else {

      $query="UPDATE t_paket SET id_user = '$id_user' , nama_paket = '$nama_paket' , kode_rup = '$kode_rup' , tahun_anggaran = '$thn_anggaran' , pagu = '$pagu' , hps = '$hps', nama_ppk = '$nama_ppk', sk_ppk = '$sk_ppk', tgl_sk = '$tgl_sk', jenis_paket = '$jenis_paket', status='$status' where id_paket='$id_paket' ";
        mysqli_query($con, $query);

      header("location:./dashboard.php?page=paket&action=datail&id_paket=$_GET[id_paket]");

   }

}

?>


<script>
  // This is an old version, for a more recent version look at
  // https://jsfiddle.net/DRSDavidSoft/zb4ft1qq/2/
  function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
</script>
        
        
        <script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
 
      return false;
    return true;
  }
 </script>

<div class="panel panel-primary">
    <div class="panel-heading">
<h3 class="panel-title"><span></span>Detail Data Paket</h3>
</div>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="" method="post" class="form-horizontal">

            <div class="form-group">
                <label class="col-sm-4 control-label">PILIH JENIS PERMOHONAN</label>
                <div class="col-md-6">
                    <select name="jenis_paket" class="form-control">
                        <option value="<?php echo $data['jenis_paket']; ?>"><?php 
                        $jenis= $data['jenis_paket'];
                        if ($jenis ==1){
                            echo "KELOMPOK KERJA PEMILIHAN";
                            }else {
                              echo "PEJABAT PENGADAAN";  
                            }
                        
                        ?></option>
                        <option value="1">
                        KELOMPOK KERJA PEMILIHAN</option>
                        <option value="2">PEJABAT PENGADAAN</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">NAMA PAKET</label>
                <div class="col-md-3">
                    <textarea class="form-control" style="height:100px; width:450px;" name="nama_paket" type="textarea" value="<?php echo $data['nama_paket']; ?>" placeholder="Nama Paket" required><?php echo $data['nama_paket']; ?> </textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">KODE RUP</label>
                <div class="col-md-3">
                    <input class="form-control" name="kode_rup" type="number" value="<?php echo $data['kode_rup']; ?>" placeholder="Kode RUP" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">TAHUN ANGGARAN</label>
                <div class="col-md-4">
                    <select name="thn_anggaran" required="Tahun Anggaran" class="form-control">
                        <option value="<?php echo $data['tahun_anggaran']; ?>"><?php echo $data['tahun_anggaran']; ?></option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">TOTAL PAGU</label>
                <div class="col-md-4">
                    <input class="form-control" name="pagu" type="number" value="<?php echo $data['pagu']; ?>" placeholder="Pagu Anggaran" step='0.01' maxlength = "3"  onkeypress="return hanyaAngka (event)" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">TOTAL HPS</label>
                <div class="col-md-4">
                    <input class="form-control" name="hps" type="number" value="<?php echo $data['hps']; ?>" placeholder="Total Hps" step='0.01' maxlength = "3"  onkeypress="return hanyaAngka (event)" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NAMA PPK</label>
                <div class="col-md-4">
                    <input class="form-control" name="nama_ppk" type="text" value="<?php echo $data['nama_ppk']; ?>" placeholder="Nama PPK" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NOMOR SK PPK</label>
                <div class="col-md-4">
                    <input class="form-control" name="sk_ppk" type="text" value="<?php echo $data['sk_ppk']; ?>" placeholder="Nomor SK PPK" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">TANGGAL SK PPK</label>
                <div class="col-md-4">
                    <input class="form-control" name="tgl_sk" type="date" value="<?php echo $data['tgl_sk']; ?>" placeholder="Tanggal SK PPK" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">STATUS PAKET</label>
                <div class="col-md-4">
                    <input class="form-control" name="" type="text" value="<?php echo $data['status']; ?>" disabled/>
                </div>
            </div>
            
            <input class="form-control" name="id_paket" type="hidden" value="<?php echo $data['id_paket']; ?>"  placeholder="Tanggal SK PPK" required/>
            <input class="form-control" name="status" type="hidden" value="<?php echo $data['status']; ?>" />
            
            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <?php 
                              $status=$data['status'];
                              $id_user =$_SESSION['satker'];
                              if ($status == 'Draft'){
                                echo "<button type='submit' name='update' value='Update' class='btn btn-success'>Update Paket</button>";
                            }else {
                              echo "";  
                            }
                        
                        ?>
                    
                    <?php 
                              $status=$data['status'];
                              $id_user =$_SESSION['satker'];
                              if ($status == 'Draft'){
                                echo "<a href='?page=paket&action=upload&id_paket=$data[id_paket]' class='btn btn-warning'>Upload Data Dukung</a>";
                            }else if($status == 'Permohonan Ditolak') {
                              echo "<a href='?page=paket&action=upload&id_paket=$data[id_paket]' class='btn btn-warning'>Upload Data Dukung</a>";  
                            }else {
                              echo "<a href='?page=paket&action=datadukung&id_paket=$data[id_paket]' class='btn btn-warning'>Lihat Data Dukung</a>";  
                            }
                        
                        ?>
                    
                    <a href="?page=paket" type="button"  class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<?php
                  }

                  } else {

                  echo "<tr>
                              <td colspan='5' style='text-align:center;'><h4>Belum ada data</h4></td>
                        </tr>";
                  }
                  ?>