<?php
if(!isset($_SESSION['admin'])) {
   header('location: ../');
}

include '../include/connection.php';

//$user = $_SESSION['namalengkap'];
//$id_paket =$_GET['id_paket'];


							  
							      echo "<div class='alert alert-success alert-dismissible' role='alert'>CEK DATA DUKUNG </div>";

							  
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
                                    </table>
                                    
<div>
    
                             <?php 
                              $status=$data['status'];
                              
                              $status = $_GET['status'];
                              if ($status == 'Permohonan Diproses'){
                                echo "";
                            }else {
                              echo "
                              <a href='?page=paket&action=tolak&id_paket=$id_paket' class='btn btn-danger btn-sm' >TOLAK</a>
                              <a href='?page=paket&action=terima&id_paket=$id_paket' class='btn btn-success btn-sm' >PROSES</a>
                              ";  
                            }
                        
                            ?>
    
    
    <?php echo $data['status']; ?>
    <button type='button' onclick='window.history.go(-2)' class='btn btn-info btn-sm' >KEMBALI</button>
    
    </div>
    
    
