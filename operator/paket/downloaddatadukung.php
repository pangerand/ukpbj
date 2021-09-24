<?php require('../include/connection.php');

                $user = $_SESSION['namalengkap'];
                $id_paket = $_GET['id_paket'];
                $id_file = $_GET['id_file'];
                                          $sql = mysqli_query($con, "SELECT * FROM t_file where id_paket='$id_paket' and id_file='$id_file' ");
                                          if (mysqli_num_rows($sql) > 0) {

                                         $i = 1;
                                         while($data = mysqli_fetch_array($sql)) {
                                             
                                            // echo $data['surat'];
                                             //echo $id_paket;
                                             
                                             header("location:./paket/upload/$user/$data[file]");
                                         ?>
                                            
                                             

                                            <?php
                                              }

                                             } else {

                                             echo "<tr>
                                               <td colspan='5' style='text-align:center;'><h4>Belum ada data</h4></td>
                                             </tr>";
                                             }
                  ?>