<?php
if(!isset($_SESSION['admin'])) {
   header('location: ../');
}

$id   = strip_tags(mysqli_real_escape_string($con, $_GET['id_user']));

$sql  = $con->prepare("SELECT * FROM t_user WHERE id_user = ?") or die($con->error);
$sql->bind_param('s', $id);
$sql->execute();
$sql->store_result();
$sql->bind_result($id_user, $namalengkap, $username, $password, $level);
$sql->fetch();
?>

<head>
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script>
            
            $(document).ready(function() {
  //focusin berfungsi ketika cursor berada di dalam textbox modal langsung aktif
  $(".pencarian").focusin(function() {
    $("#myModal").modal('show'); // ini fungsi untuk menampilkan modal
  });
  $('#example').DataTable(); // fungsi ini untuk memanggil datatable
  $('#terpilih').DataTable();
  
});

// function in berfungsi untuk memindahkan data kolom yang di klik menuju text box
function masuk(txt, data) {
  document.getElementById('textbox').value = data; // ini berfungsi mengisi value  yang ber id textbox
  $("#myModal").modal('hide'); // ini berfungsi untuk menyembunyikan modal
}
            
</script>



<h3>Edit Pengguna</h3>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        
            
        <form action="./penilai/update.php" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Satker</label>
                <div class="col-md-8">
                    <input class="form-control" name="namalengkap" value="<?php echo "$namalengkap"; ?>" type="text" placeholder="Nama Pegawai"/>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-md-8">
                    <input class="form-control" name="jk" value="<?php
                              if($data['jk'] == 'L') {
                                    echo 'Laki - laki';
                              } else {
                                    echo 'Perempuan';
                              }
                              ?>" type="text" placeholder="Nama Pegawai"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Divisi</label>
                <div class="col-md-8">
                    <input class="form-control" name="kelas" value="<?php echo $data['nama_kelas']; ?>" type="text" placeholder="Nama Pegawai" />
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Hak Akses</label>
            <div class="col-md-6">
                    <select name="akses" required="akses" class="form-control">
                        <option value="Y" <?php if($akses == 'Y') { echo 'selected';} ?>>Aktif</option>
                        <option value="N" <?php if($akses == 'N') { echo 'selected';} ?>>Tidak</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
               
                <div class="col-md-8">
                    <input class="form-control" name="password" value="1234" type="hidden" placeholder="Password"/>
                </div>
            </div><div class="form-group">
               
                <div class="col-md-8">
                    <input class="form-control" name="nis" value="<?php echo $data['id_user']; ?>" type="hidden" placeholder="Password"/>
                </div>
            </div>
            </div><div class="form-group">
               
                <div class="col-md-8">
                    <input class="form-control" name="username" value="<?php echo $username; ?>" type="hidden" placeholder="Password"/>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <input type="submit" name="update" value="Ganti Penilai" class="btn btn-success" class="btn btn-success" onchange="this.form.submit();">
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                </div>
            </div>
        </form>
        
    </div>
</div>

<!-- Trigger the modal with a button -->
         <!-- Modal -->
         <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">DAFTAR KANDIDAT</h4>
                  </div>
                  <div class="modal-body">
                     <table id="example" class="table table-bordered" class="table table-striped table-bordered">
                        <thead>
                           <tr>
                               <th>NO</th>
                              <th>NAMA</th>
                              <th>DIVISI</th>
                              <th>OPSI</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                  require('../include/connection.php');
                  $no = 1;
                  $sql = mysqli_query($con, "SELECT * FROM t_user JOIN t_kelas ON t_user.id_kelas = t_kelas.id_kelas ORDER BY nama_kelas ASC");
                  if (mysqli_num_rows($sql) > 0) {
                  $i = 1;
                  while($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                            <td style="text-align:center;">
                              <?php echo $no++; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['fullname']; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['nama_kelas']; ?>
                        </td>
                        <td style="text-align:center;">
                              <a href="javascript:void(0)" onClick="masuk(this,'<?php echo $data['id_user']; ?>')" class="btn btn-warning btn-sm">PILIH</a>
                        </td>
                        </tr>
                        <?php
                  }

                  } else {
                  echo "<tr>
                              <td style='text-align:center;'><h4>Belum ada data</h4></td>
                        </tr>";
                  }
                  ?>
                           
                        </tbody>
                     </table>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>

