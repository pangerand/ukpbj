<?php require('../include/connection.php');
                $id_paket = $_GET['id_paket'];
                                          $sql = mysqli_query($con, "SELECT * FROM t_surat where id_paket='$id_paket'");
                                          if (mysqli_num_rows($sql) > 0) {

                                         $i = 1;
                                         while($data = mysqli_fetch_array($sql)) {
                                             
                                            // echo $data['surat'];
                                             //echo $id_paket;
                                             
                                             header("location:../admin/paket/upload/Administrator/$data[surat]");
                                         ?>
                                            
                                             

                                            <?php
                                              }

                                             } else {

                                             echo "<tr>
                                               <td colspan='5' style='text-align:center;'><h4>Belum ada data</h4></td>
                                             </tr>";
                                             }
                  ?>