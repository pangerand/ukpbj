<?php
if(!isset($_SESSION['satker'])) {
   header('location: ../');
}
?>


<html>
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
<div class="row">
   
   <div class="col-md-3 col-sm-3" style="padding-top:10px;">
      <a class="btn btn-primary" href="?page=paket&action=tambah">Tambah Paket</a>
   </div>
   <div style="clear:both"></div>
   <hr />
   


            
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">DAFTAR PAKET</h4>
                  </div>
                  <div class="modal-body">
                     <table id="example" class="table table-bordered" class="table table-striped table-bordered">
                        <thead>
                  <tr>
                  <th style="text-align:center;">NO</th>
                  <th style="text-align:center;">NAMA PAKET</th>
                  <th style="text-align:center;">KODE RUP</th>
                  <th style="text-align:center;">PAGU</th>
                  <th style="text-align:center;">HPS</th>
                  <th style="text-align:center;">STATUS</th>
                  <th width="200px" style="text-align:center;">OPSI</th>
                  </tr>
            </thead>
            <tbody>
                <script>
      // The function below will start the confirmation dialog
      function confirmAction() {
        let confirmAction = confirm("Yakin ingin membatalkan Paket ini ?");
        if (confirmAction) {
          alert("Action successfully executed");
        } else {
          alert("Action canceled");
        }
      }
    </script>
                  <?php
                  require('../include/connection.php');
                $id_user = $_SESSION['id'];
                  if (isset($_GET['hlm'])) {
                              $hlm = $_GET['hlm'];
                              $no  = (5*$hlm) - 4;
                        } else {
                              $hlm = 1;
                              $no  = 1;
                        }
                  $start  = ($hlm - 1) * 5;

                  $sql = mysqli_query($con, "SELECT * FROM t_paket where id_user='$id_user' order by id_paket");

                  if (mysqli_num_rows($sql) > 0) {

                  $i = 1;
                  while($data = mysqli_fetch_array($sql)) {
                        ?>
                        
                        
                        <tr>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $no++; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['nama_paket']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $data['kode_rup']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <i><?php echo "Rp. " . number_format($data['pagu'], 2, ".", ","); ?></i>
                        </td>
                         <td style="text-align:center;vertical-align:middle;">
                              <i><?php echo "Rp. " . number_format($data['hps'], 2, ".", ","); ?></i>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <i><?php echo $data['status']; ?></i>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <a href="?page=paket&action=datail&id_paket=<?php echo $data['id_paket']; ?>" class="btn btn-warning btn-sm">
                              Detail Paket
                              </a>
                              <?php 
                              $status=$data['status'];
                              $id_user =$_SESSION['satker'];
                              if ($status == 'Draft'){
                                echo "<a href='?page=paket&action=hapuspaket&id_paket=$data[id_paket]' onclick='confirmAction()' class='btn btn-danger btn-sm'>
                              Batal
                              </a>";
                            }else if($status == 'Surat Telah Dikirim') {
                              echo "<a href='?page=paket&action=download&id_paket=$data[id_paket]' onclick='return confirm('Yakin ingin membatalkan Paket ini ?');' class='btn btn-success btn-sm' >
                              Download
                              </a>";  
                            }else {
                              echo "<a href='?page=paket' onclick='return confirm('Yakin ingin membatalkan Paket ini ?');' class='btn btn-danger btn-sm' disabled>
                              Batal
                              </a>";  
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
