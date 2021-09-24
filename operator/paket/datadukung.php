<?php
if(!isset($_SESSION['satker'])) {
   header('location: ../');
}

include '../include/connection.php';

$user = $_SESSION['namalengkap'];
$id_paket =$_GET['id_paket'];

							  
							      echo "<div class='alert alert-success alert-dismissible' role='alert'>CEK DATA DUKUNG </div>";

							  
							  ?>

<table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Berkas</td>
                                                <td>File Ter-Upload</td>
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
                              $user = $_SESSION['namalengkap'];
							  $berkas= $data['file'];
							  if($berkas == ''){
							      echo "<b target='_blank' class='badge badge'>DATA TIDAK DIUPLOAD</b>";
							  }else {
							      echo "<a href='?page=paket&action=downloaddatadukung&id_file=$data[id_file]&id_paket=$data[id_paket]' target='_blank' class='badge badge-primary'>Lihat Berkas</a>";
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
                                    
<div>
    <button type="button" onclick="window.history.go(-2)" class="btn btn-danger">KEMBALI</button>
    </div>