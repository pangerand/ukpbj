<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">CATATAN</h4>
      </div>
<div class="modal-body">
          <form action="" method="post"> 
        <div class="form-group">
  <label for="comment">Alasan Penolakan:</label>
  <textarea name="pesan" class="form-control" rows="5" id="pesan"></textarea>
</div>

      </div>
      <div class="modal-footer">
           <input type="submit" class="btn btn-info btn-sm" name="enter" value="KIRIM">  
          <button type='button' onclick='window.history.go(-1)' class='btn btn-warning btn-sm' >KEMBALI</button>  
 </form>  
        
      </div>


<?php
  
  
  
  if(isset($_POST['enter']))   
  {   
   if(empty($_POST['pesan']))  
   {  
   echo "Anda belum mengisi Alsan Penolakan!";  
   }  
   else   
    
   


	// query SQL untuk insert data
	        $pesan = $_POST['pesan'];
	        $id_file = $_GET['id_file'];
	        $id_paket = $_GET['id_paket'];
            $query="UPDATE t_file SET status='3', pesan='$pesan' where id_file='$id_file'";
            mysqli_query($con, $query);
            // mengalihkan ke halaman index.php
            
           //echo "$id_paket";
            //echo "$pesan";
           //echo "$id_file";
           header("location:?page=paket&action=datadukung&id_paket=$id_paket");
  } 
?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">CATATAN</h4>
      </div>
      <div class="modal-body">
          <form action="?page=paket&action=tdkvalid&id_paket=<?php echo $id_paket ?>&id_file=<?php echo $id_file ?>" method="post"> 
        <div class="form-group">
  <label for="comment">Alasan Penolakan:<?php echo $id_paket ?>---<?php echo $idfile ?></label>
  <textarea name="pesan" class="form-control" rows="5" id="pesan"></textarea>
</div>

      </div>
      <div class="modal-footer">
          <input type="submit" class="btn btn-info btn-sm" name="enter" value="KIRIM">  
          <button type='button' onclick='window.history.go(-1)' class='btn btn-warning btn-sm' >KEMBALI</button>
 </form>  
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a href='?page=paket&action=tdkvalid&id_paket=<?php echo $id_paket ?>&id=<?php echo $_GET['id'] ?>' class='btn btn-danger btn-sm'>KIRIM</a>
      </div>
    </div>
  </div>
</div>  