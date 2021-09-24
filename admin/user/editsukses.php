<?php
if(!isset($_SESSION['login'])) {
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
      <a class="btn btn-primary" href="?page=user&action=tambah">Tambah Pegawai</a>
   </div>
   <div style="clear:both"></div>
   <hr />
   


            
               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">DAFTAR PEGAWAI</h4>
                  </div>
                  <div class="modal-body">
                     <table id="example" class="table table-bordered" class="table table-striped table-bordered">
                        <thead>
                  <tr>
                  <th>#</th>
                  <th>NIP</th>
                  <th>NAMA</th>
                  <th>PANGKAT</th>
                  <th>JABATAN</th>
                  <th>INSTANSI</th>
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

                  $sql = mysqli_query($con, "SELECT * FROM mahasiswa order by id ");

                  if (mysqli_num_rows($sql) > 0) {

                  $i = 1;
                  while($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $no++; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <a href='temp/<?php echo $data['nip']; ?>.png'><?php echo $data['nip']; ?></a>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                             <a href='?page=user&action=edit&id=<?php echo $data['id']; ?>'> <?php echo $data['nama_pegawai']; ?></a>
                        </td>
                         <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['pangkat']; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['jabatan']; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['instansi']; ?>
                        </td>
                       
                       <td width='250px' align='center'>
                           <?php
                           $nip = $data['nip'];
                           $nama = $data['nama_pegawai'];
                           ?>
								<a class="btn btn-primary btn-sm" href="?page=user&action=qrcode&nip=<?php echo $nip; ?>&nomor=<?php echo $nama; ?>">Buat Kode QR</a>
								<a class='btn btn-success btn-sm' href='user/cetak_info.php?id=<?php echo $data['id']; ?>' target='_blank'>Cetak</a>
								    <a href="?page=user&action=hapus&id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin ingin menghapus user ini ?');" class="btn btn-danger btn-sm">
                              Hapus
                              </a>
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
<script type="text/javascript">
Notiflix.Notify.Init({
  width: '350px',
  position: 'center-bottom', // 'right-top' - 'right-bottom' - 'left-top' - 'left-bottom' && v2.2.0 and the next versions => 'center-top' - 'center-bottom' - 'center-center'
  distance: '10px',
  opacity: 1,
  borderRadius: '10px',
  rtl: false,
  timeout: 4000,
  messageMaxLength: 110,
  backOverlay: false,
  backOverlayColor: 'rgba(0,0,0,0.5)',
  plainText: true,
  showOnlyTheLastOne: false,
  clickToClose: false,
  ID: 'NotiflixNotify',
  className: 'notiflix-notify',
  zindex: 4001,
  useGoogleFont: false, // v2.2.0 and the next versions => has been changed as "false"
  fontFamily: 'Quicksand',
  fontSize: '13px',
  cssAnimation: true,
  cssAnimationDuration: 500,
  cssAnimationStyle: 'zoom', // 'fade' - 'zoom' - 'from-right' - 'from-top' - 'from-bottom' - 'from-left'
  closeButton: false,
  useIcon: true,
  useFontAwesome: false,
  fontAwesomeIconStyle: 'shadow', // 'basic' - 'shadow'
  fontAwesomeIconSize: '34px',
  success: {
    background: '#32c682',
    textColor: '#fff',
    childClassName: 'success',
    notiflixIconColor: 'rgba(0,0,0,0.2)',
    fontAwesomeClassName: 'fas fa-check-circle',
    fontAwesomeIconColor: 'rgba(0,0,0,0.2)',
    backOverlayColor: 'rgba(50,198,130,0.2)', // v2.2.0 and the next versions
  },
  failure: {
    background: '#ff5549',
    textColor: '#fff',
    childClassName: 'failure',
    notiflixIconColor: 'rgba(0,0,0,0.2)',
    fontAwesomeClassName: 'fas fa-times-circle',
    fontAwesomeIconColor: 'rgba(0,0,0,0.2)',
    backOverlayColor: 'rgba(255,85,73,0.2)', // v2.2.0 and the next versions
  },
  warning: {
    background: '#eebf31',
    textColor: '#fff',
    childClassName: 'warning',
    notiflixIconColor: 'rgba(0,0,0,0.2)',
    fontAwesomeClassName: 'fas fa-exclamation-circle',
    fontAwesomeIconColor: 'rgba(0,0,0,0.2)',
    backOverlayColor: 'rgba(238,191,49,0.2)', // v2.2.0 and the next versions
  },
  info: {
    background: '#26c0d3',
    textColor: '#fff',
    childClassName: 'info',
    notiflixIconColor: 'rgba(0,0,0,0.2)',
    fontAwesomeClassName: 'fas fa-info-circle',
    fontAwesomeIconColor: 'rgba(0,0,0,0.2)',
    backOverlayColor: 'rgba(38,192,211,0.2)', // v2.2.0 and the next versions
  }
});

// or


Notiflix.Notify.Success('UPDATE PEGAWAI SUKSES, DATA TERSIMPAN');
</script>