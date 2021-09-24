<?php
if(!isset($_SESSION['satker'])) {
   header('location: ../');
}

if(isset($_POST['add_paket'])) {
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
   
  $sql = "INSERT INTO t_paket (id_user, nama_paket, kode_rup, tahun_anggaran, pagu, hps, nama_ppk, sk_ppk, tgl_sk, jenis_paket, status) VALUES ('$id_user','$nama_paket', '$kode_rup', '$thn_anggaran', '$pagu', '$hps', '$nama_ppk', '$sk_ppk', '$tgl_sk', '$jenis_paket', '$status')";
    if (mysqli_query($con, $sql)) {
      header('location: ?page=paket');
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);

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

<h3>Tambah Data Paket</h3>

<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="" method="post" class="form-horizontal">

            <div class="form-group">
                <label class="col-sm-4 control-label">PILIH JENIS PERMOHONAN</label>
                <div class="col-md-6">
                    <select name="jenis_paket" class="form-control">
                        <option value="#">-- Pilih Permohonan --</option>
                        <option value="1">KELOMPOK KERJA PEMILIHAN</option>
                        <option value="2">PEJABAT PENGADAAN</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">NAMA PAKET</label>
                <div class="col-md-3">
                    <textarea class="form-control" style="height:100px; width:450px;" name="nama_paket" type="textarea"  placeholder="Nama Paket" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">KODE RUP</label>
                <div class="col-md-3">
                    <input class="form-control" name="kode_rup" type="number" placeholder="Kode RUP" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">TAHUN ANGGARAN</label>
                <div class="col-md-4">
                    <select name="thn_anggaran" required="Tahun Anggaran" class="form-control">
                        <option value="#">-- Pilih Tahun --</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">TOTAL PAGU</label>
                <div class="col-md-4">
                    <input class="form-control" name="pagu" type="number" placeholder="Pagu Anggaran" step='0.01' maxlength = "3"  onkeypress="return hanyaAngka (event)" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">TOTAL HPS</label>
                <div class="col-md-4">
                    <input class="form-control" name="hps" type="number" placeholder="Total HPS"  step='0.01' maxlength = "3"  onkeypress="return hanyaAngka (event)" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NAMA PPK</label>
                <div class="col-md-4">
                    <input class="form-control" name="nama_ppk" type="text" placeholder="Nama PPK"  required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NOMOR SK PPK</label>
                <div class="col-md-4">
                    <input class="form-control" name="sk_ppk" type="text" placeholder="Nomor SK PPK" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">TANGGAL SK PPK</label>
                <div class="col-md-4">
                    <input class="form-control" name="tgl_sk" type="date" placeholder="Tanggal SK PPK" required/>
                </div>
            </div>
            
            <input class="form-control" name="status" type="hidden" value="Draft" required/>
            
            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="add_paket" value="Tambah Paket" class="btn btn-success">Tambah Paket</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>
