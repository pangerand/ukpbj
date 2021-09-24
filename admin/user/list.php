<?php
if(!isset($_SESSION['admin'])) {
   header('location: ../');
}
?>


<html>
   <head>
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
      <link rel="stylesheet" href="../assets/css/notiflix-2.4.0.min.css" />
      <script src="../assets/js/notiflix-2.4.0.min.js"></script>
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


<div class="row">
   
   <div class="col-md-3 col-sm-3" style="padding-top:10px;">
      <a class="btn btn-primary" href="?page=user&action=tambah">Tambah Pengguna</a>
   </div>
   <div style="clear:both"></div>
   <hr />
   


            
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">DAFTAR PENGGUNA</h4>
                  </div>
                  <div class="modal-body">
                     <table id="example" class="table table-bordered" class="table table-striped table-bordered">
                        <thead>
                  <tr>
                  <th>No</th>
                  <th>NAMA SATKER</th>
                  <th>USERNAME</th>
                  <th>LEVEL</th>
                  <th width="200px" style="text-align:center;">OPSI</th>
                  </tr>
            </thead>
            <tbody>
                  <?php
                  require('../include/connection.php');

                  if (isset($_GET['hlm'])) {
                              $hlm = $_GET['hlm'];
                              $no  = (5*$hlm) - 4;
                        } else {
                              $hlm = 1;
                              $no  = 1;
                        }
                  $start  = ($hlm - 1) * 5;

                  $sql = mysqli_query($con, "SELECT * FROM t_user order by id_user ");

                  if (mysqli_num_rows($sql) > 0) {

                  $i = 1;
                  while($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $no++; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['namalengkap']; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                             <?php echo $data['username']; ?>
                        </td>
                         <td style="padding-left:25px;vertical-align:middle;">
                              <?php
                              
                              if($data['level'] == '1') {
                                    echo 'Admin';
                              } else {
                                    echo 'Operator';
                              }
                              ?>
                        </td>
                        
                       
                       <td width='250px' align='center'>
                           <?php
                           $nip = $data['nip'];
                           $nama = $data['nama_pegawai'];
                           ?>
							<a href="?page=user&action=reset&id_user=<?php echo $data['id_user']; ?>" onclick="return confirm('Yakin ingin mereset Password User ini ?');" class="btn btn-warning btn-sm">Reset Password</a>
							<a href="?page=user&action=hapus&id=<?php echo $data['id_user']; ?>" onclick="return confirm('Yakin ingin menghapus user ini ?');" class="btn btn-danger btn-sm">Hapus</a>
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
