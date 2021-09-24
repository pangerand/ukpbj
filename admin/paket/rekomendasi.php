<?php
if(!isset($_SESSION['admin'])) {
   header('location: ../');
}

include '../include/connection.php';

 $id_paket =$_GET['id_paket'];
    $sql = mysqli_query($con, "SELECT * FROM t_paket where id_paket ='$id_paket'");
    if (mysqli_num_rows($sql) > 0) {
      while($data = mysqli_fetch_array($sql)) {


//$user = $_SESSION['namalengkap'];
//$id_paket =$_GET['id_paket'];


 echo "<div class='alert alert-success alert-dismissible' role='alert'>KIRIM SURAT REKOMENDASI POKJA/PEJABAT PENGADAAN </div>";

?>


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
                    <input class="form-control" name="pagu" type="number" value="<?php echo $data['pagu']; ?>" placeholder="Pagu Anggaran" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">TOTAL HPS</label>
                <div class="col-md-4">
                    <input class="form-control" name="hps" type="number" value="<?php echo $data['hps']; ?>" placeholder="Total Hps" required/>
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
            
            
        </form>

<?php
							  $pesan = $_GET['pesan'];
							  if($pesan < 1){
							      echo "<div class='alert alert-success alert-dismissible' role='alert'>SILAHKAN UPLOAD SURAT PENUNJUKAN POKJA/PEJABAT PENGADAAN </div>";
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
                                                <td>File Ter-Upload</td>
                                                <td>Opsi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php require('../include/connection.php');
                                          $id_paket =$_GET['id_paket'];
                                          $sql = mysqli_query($con, "SELECT * FROM t_user INNER JOIN t_paket ON t_user.id_user = t_paket.id_user INNER JOIN t_file ON t_paket.id_paket = t_file.id_paket where t_file.id_paket='$id_paket'");
                                          if (mysqli_num_rows($sql) > 0) {

                                         $i = 1;
                                         while($data = mysqli_fetch_array($sql)) {
                                         ?>
                                            <tr>
                                                <td><?php echo $data['judul']; ?></td>
                                                <td>
                                                    
                                                    <?php
                              $folder = $data['namalengkap'];
							  $berkas= $data['file'];
							  
							  
							  if($berkas == ''){
							      echo "<b target='_blank' class='badge badge'>DATA TIDAK DIUPLOAD</b>";
							  }else {
							      echo "<a href='../operator/paket/upload/$folder/$berkas' target='_blank' class='badge badge-primary'>Lihat Berkas</a>";
							  }
							  
							  ?>
            
                                                </td>
                                                <td>
                              <?php
                              $folder = $data['namalengkap'];
							  $status= $data['status'];
							  $id_file=$data['id_file'];
							  
							  if($status == '4'){
							      echo "<b target='_blank' class='btn btn-success btn-sm'>DATA VALID</b>";
							  }else if($status =='3') {
							      echo "<b target='_blank' class='btn btn-danger btn-sm'>DATA TIDAK VALID</b>";
							  }else {
							      $idfile = $id_file;
							      echo "
							    <a href='?page=paket&action=valid&id_paket=$data[id_paket]&id_file=$data[id_file]' class='btn btn-warning btn-sm'>VALID</a>
							    <a href='?page=paket&action=tdkvalid&id_paket=$data[id_paket]&id_file=$data[id_file]' class='btn btn-danger btn-sm'>TIDAK VALID</a>
                                ";
							  }
							       
							  ?>
                                                    
                                                    
                                                    
                                                    
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
                                         <tr>
                                                <td>Surat Penunjukan POKJA/PEJABAT PENGADAAN </td>
                                                <td>
                                                    <?php require('../include/connection.php');
                
                                          $sql = mysqli_query($con, "SELECT * FROM t_surat where id_paket='$id_paket'");
                                          if (mysqli_num_rows($sql) > 0) {

                                         $i = 1;
                                         while($data = mysqli_fetch_array($sql)) {
                                         ?>
                                                <?php 
                                                        $surat=$data['surat'];
                                                        
                                                        if($surat == ''): ?>    
                                                    <form name="upload" id="upload" method="post" action="?page=paket&action=prosesupload" enctype="multipart/form-data">        
                                                            <input type="hidden" name="idFile" value="<? echo $data['id_file']; ?>">
                                                            <input type="hidden" name="idPaket" value="<? echo $id_paket; ?>">
                                                            <input type="file" name="attachment" id="fileToUpload" onchange="javascript:this.form.submit();">
                                                        </form>
                                                        <?php else : 
                                                            //$guru = $this->db->get_where('guru',['id' => $f->guru_id])->row(); ?>

                                                            <a href="paket/upload/<?php 
                                                            $user = $_SESSION['namalengkap'];
                                                            echo "$user"; ?>/<?php echo "$data[surat]" ?>" target="_blank" class="badge badge-primary">Lihat Berkas</a>

                                                            <a href="?page=paket&action=hapussurat&id_paket=<?php echo "$data[id_paket]" ?>" class="badge badge-danger">Hapus</a>

                                                        <?php endif ?>
                                                        <?php
                                              }

                                             } else {?>

                                             <form name="upload" id="upload" method="post" action="?page=paket&action=prosesupload" enctype="multipart/form-data">        
                                                            <input type="hidden" name="idFile" value="<? echo $data['id_file']; ?>">
                                                            <input type="hidden" name="idPaket" value="<? echo $id_paket; ?>">
                                                            <input type="file" name="attachment" id="fileToUpload" onchange="javascript:this.form.submit();">
                                                        </form>
                                             <?
                                             }
                  ?>
                                                        
                                                        
                                                        </td>
                                                <td></td>
                                            </tr>
                                    </table>
                                    
<div>
    
                             <?php 
                              $status=$data['status'];
                              
                              $status = $_GET['status'];
                              if ($status == 'Permohonan Diproses'){
                                echo "";
                            }else {
                              echo "
                              
                              <a href='?page=paket&action=terkirim&id_paket=$id_paket' class='btn btn-success btn-sm' >PROSES</a>
                              ";  
                            }
                        
                            ?>
    
    
    <?php echo $data['status']; ?>
    <button type='button' onclick='window.history.go(-2)' class='btn btn-info btn-sm' >KEMBALI</button>
    
    </div>
    <?php
                                              }

                                             } else {

                                             echo "<tr>
                                               <td colspan='5' style='text-align:center;'><h4>Belum ada data</h4></td>
                                             </tr>";
                                             }
                  ?>
    
