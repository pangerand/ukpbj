<?php
if(!isset($_SESSION['admin'])) {
   header('location: ../');
}

if(isset($_POST['add_user'])) {

   //$nis  = $_POST['nis'];
   $namalengkap = $_POST['namalengkap'];
   $username   = $_POST['username'];
    $password = $_POST['password'];
    $p = md5($password);
    $level   = $_POST['level'];
   //cek nis
   $get_id = $con->prepare("SELECT * FROM t_user WHERE id_user = ?");
   $get_id->bind_param('s', $nis);
   $get_id->execute();
   $get_id->store_result();
   $numb = $get_id->num_rows();
   //validasi
   if($namalengkap == '' || $username == '' || $password == '' || $level == '') {

      echo '<script type="text/javascript">alert("Semua form harus terisi");</script>';

   
   } else if($numb > 0){

      echo '<script type="text/javascript">alert("id tidak dapat digunakan");window.history.go(-1);</script>';

   } else {

      $sql = $con->prepare("INSERT INTO t_user( namalengkap, username, password, level) VALUES(?, ?, ?, ?)");
      $sql->bind_param('ssss', $namalengkap, $username, $p, $level);
      $sql->execute();

      header('location: ?page=user');

   }

}
?>
<h3>Tambah Data Pengguna</h3>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="" method="post" class="form-horizontal">

            <div class="form-group">
                
                <div class="col-md-4">
                    <input class="form-control" type="hidden" name="id_user" type="number"/>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Satker</label>
                <div class="col-md-8">
                    <input class="form-control" name="namalengkap" type="text" placeholder="Nama Satker"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-md-8">
                    <input class="form-control" name="username" type="text" placeholder="Username"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Level</label>
                <div class="col-md-10">
                    <label class="radio-inline">
                        <input type="radio" name="level" value="1" id="1"> Admin
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="level" value="2" id="2"> Operator
                    </label>
                </div>
            </div>

           <div class="form-group">
               
                <div class="col-md-8">
                    <input class="form-control" name="password" value="1234" type="hidden" placeholder="Password"/>
                </div>
            </div><div class="form-group">

            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="add_user" value="Tambah User" class="btn btn-success">Tambah Pengguna</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>
