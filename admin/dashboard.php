<?php
ob_start();

session_start();
if (!isset($_SESSION['admin'])) {
   header('location: ../index.php');
}
define('BASEPATH', dirname(__FILE__));

include('../include/connection.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../assets/img/logo.png">
    <title>UKPBJ | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../assets/css/skins/_all-skins.min.css">
     
     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
     
     
     <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <style>
      .box {
        padding: 30px;
      }
      img.kandidat {
        width:250px;
        height: 230px;
      }
      .suara {
        position: absolute;
        right: 20px;
        bottom: 120px;
      }
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="./dashboard.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <img src="../assets/img/logos.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" height="42" width="42" style="opacity: .8">
          <!-- logo for regular state and mobile devices -->
          SETWIL UKPBJ JAMBI
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><i class="fa fa-user"></i> Administrator</span> &nbsp;<i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  
                  <li>
                    <a href="?page=change_password">Ganti Password</a>
                  </li>
                  <li>
                    <a data-toggle="modal" href="#myModal2">Sign out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>

<?php 
   
    
    $query = "SELECT * FROM t_paket INNER JOIN t_user ON t_paket.id_user=t_user.id_user where t_paket.status = 'proses Reviu' ";
    $result = mysqli_query($con, $query);
    $jumlah_pesan = mysqli_num_rows($result);
    
    $total=($jumlah_pesan_kp + $jumlah_pesan);
   ?>


<div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"><?php echo $jumlah_pesan; ?></span><span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
                  </i>
                </a>
                <ul class="dropdown-menu">
                  <b>&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-bell" style="font-size:15px;"></span> &nbsp;&nbsp;NOTIFIKASI (<?php echo $jumlah_pesan; ?>)</b>
          <li class="divider"></li>
<?php
          $no=+1;
          	while($d=mysqli_fetch_array($result)){
					    ?>
						
						
						<?php echo " 
							<li><a href='?page=paket&action=datail&id_paket=$d[id_paket]''><b>$no. $d[namalengkap] - $d[kode_rup]</b> <span class='bubble' ></span></a></li>
								
							";
							
					$no++;
					?>
					
<?php
}
?>
                </ul>
              </li>
            </ul>
          </div>

      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"><span><b></b></span></li>
            <hr>
            <li <?php if (!isset($_GET['page'])) { echo 'class="active"'; } ?>>
                <a href="./dashboard.php" ><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <hr>
            <li <?php if (isset($_GET['page']) && $_GET['page'] == 'user') { echo 'class="active"'; } ?>>
                <a href="?page=user"><i class="fa fa-users"></i>  <span>Manajemen Pengguna</span></a>
            </li>
            <li <?php if (isset($_GET['page']) && $_GET['page'] == 'paket') { echo 'class="active"'; } ?>>
                <a href="?page=paket"><i class="fa fa-tasks"></i>  <span>Manajemen Permohonan</span></a>
            </li>
            <hr>
           
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Sign Out</h4>
                </div>
                <div class="modal-body">
                  Apakah anda yakin ingin keluar dari aplikasi ini?
                </div>
                <div class="modal-footer">
                  <a href="?page=logout" class="btn btn-danger">Sign Out</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </nav>
        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box box-success">
              <?php
                  if(isset($_GET['page'])) {
                      switch ($_GET['page']) {
                        case 'user':
                            include('./user/index.php');
                            break;
                        case 'paket':
                            include('./paket/index.php');
                            break;
                        case 'informasi':
                            include('./informasi/index.php');
                            break;
                        case 'absensi':
                            include('./absensi/index.php');
                            break;
                        case 'user':
                            include('./user/index.php');
                            break;
                        case 'penilai':
                            include('./penilai/index.php');
                            break;
                        case 'kriteria':
                            include('./kriteria/index.php');
                            break;
                        case 'waktu':
                            include('./waktu/index.php');
                            break;
                        case 'perolehan':
                            include('./perolehan.php');
                            break;
                        case 'edit_profil':
                            include('./edit.php');
                            break;
                        case 'change_password':
                            include('./ganti_password.php');
                            break;
                        case 'logout':
                            unset($_SESSION['admin']);
                            unset($_SESSION['namalengkap']);

                            header('location:../');
                            break;
                        default:
                            include('./welcome.php');
                            break;
                      }
                  } else {
                      include('welcome.php');
                  }
                  ?>
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.6
        </div>
        <strong>Copyright &copy; 2021 <a href="">KumhamJambi</a>.</strong> All rights reserved. Powered by : <a href="">kemenkumham.go.id</a>
      </footer>

    </div>
    <!-- ./wrapper -->

    <!-- 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/js/app.min.js"></script>
    <?php if (isset($_GET['page']) && $_GET['page'] == 'perolehan') { ?>
    <script type="text/javascript" src="../assets/js/chart-bundle.js"></script>
    <script type="text/javascript" src="../assets/js/utils.js"></script>
    <script type="text/javascript" src="../assets/js/FileSaver.min.js"></script>
    <script type="text/javascript" src="../assets/js/canvas-toBlob.js"></script>
    <?php } ?>
    <script type="text/javascript">
    // slideToggle()
    $(document).ready(function() {
      $(".dropdown-toggle").click(function() {
          $(this).parent().find(".dropdown-menu").slideToggle();
      });
      $("#menu-toggle").click(function() {
          $(this).parent().find(".menu").slideToggle();
      });
    });

    $("#save-img").click(function(){
      $('#canvas').get(0).toBlob(function(blob){
          saveAs(blob, 'chart.png');
      });
    });
    <?php
    if (isset($_GET['page']) && $_GET['page'] == 'kandidat') { ?>
      function tampil() {
          $.ajax({
            url: 'ajax.php',
            method: "GET",
            success: function(data) {
              $('#data').html(data);
            }
          });
      }

      $(document).ready(function(){
          $('#periode').change(function(){
            var periode = $('#periode').val();

            $.ajax({
              url: "ajax.php",
              method: "POST",
              data: {periode : periode},
              success: function(data) {
                $('#data').html(data);
              }
            });
          });
      });

      window.onload = function(){
          tampil();
      };
      <?php
    }
    ?>
    <?php
    if (isset($_GET['page']) && $_GET['page'] == 'perolehan') {
      $thn = date('M');
      $dpn = date('Y');
      $periode = $thn." ".$dpn;
      $kan = $con->prepare("SELECT * FROM t_kandidat WHERE periode = ?") or die($con->error);
      $kan->bind_param('s', $periode);
      $kan->execute();
      $kan->store_result();
      $numb = $kan->num_rows();
      $label = '';
      $data = '';
      for ($i = 1; $i <= $numb; $i++) {
          $kan->bind_result($id, $nama, $foto, $visi, $misi, $suara, $kandidat);
          $kan->fetch();
          $label .= "'".$nama."',";
          $data .= $suara.',';
      }
      $labels = trim($label, ',');
      $datas  = trim($data, ',');
    ?>
    var chartData = {
      labels: [
          <?php
          echo $labels;
          ?>
      ],
        datasets: [{
          type: 'bar',
          label: 'Jumlah Suara',
          borderColor: window.chartColors.green,
          backgroundColor: [
            window.chartColors.blue,
            window.chartColors.red,
            window.chartColors.green,
          ],
          borderWidth: 2,
          fill: false,
          data: [
            <?php
            echo $datas;
            ?>
          ]
        }],
    };
    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myMixedChart = new Chart(ctx, {
          type: 'bar',
          data: chartData,
          options: {
                responsive: true,
                title: {
                  display: true,
                  text: 'Perolehan Suara',
                  fontSize: 30
                },
                legend: {
                    labels: {
                        fontSize: 20
                    }
                },
                scales: {
                  xAxes: [{
                      ticks: {
                          fontSize:15
                      }
                  }],
                  yAxes: [{
                      ticks: {
                          fontSize:14,
                          min:0
                      }
                  }]
                }
            }
        });
    };
    <?php
    }
    ?>
    </script>
  </body>
</html>
<?php ob_flush(); ?>
