<?php
if (!isset($_SESSION['login'])) {
   header('location:./');
}

if (isset($_POST['update_profil'])) {

   $nama     = $_POST['username'];
   $fullname = $_POST['fullname'];
   $pass     = $_POST['pass'];
    $id     = $_SESSION['login'];
   if($nama == ''  || $pass == '' || $fullname == '') {

      echo '<script type="text/javascript">alert("Semua form harus diisi");</script>';

   } else {

      $get = $con->prepare("SELECT * FROM admin WHERE idadmin = ?") or die($con->error);
      $get->bind_param('i', $id);
      $get->execute();
      $get->store_result();

      if($get->num_rows() > 0) {

         $get->bind_result($id, $nama, $password, $full);
         $get->fetch();

         //validasi password
         if(password_verify($pass, $password)) {

            $sql = $con->prepare("UPDATE admin SET username = ?, fullname = ? WHERE idadmin = ?") or die($con->error);
            $sql->bind_param('ssi',$nama, $fullname, $id);
            $sql->execute();

            $_SESSION['user'] = $fullname;

            header('location: ./');

         } else {

            echo '<script type="text/javascript">alert("Akses Illegal !!");window.location.replace("?page=logout");</script>';

         }

      }

   }

}

$sql = $con->prepare("SELECT * FROM admin WHERE idadmin = ?");
$sql->bind_param('i', $_SESSION['login']);
$sql->execute();
$sql->store_result();
$sql->bind_result($id, $username,  $pass, $fullname);
$sql->fetch();
?>
<h3>Edit Profil</h3>
<hr />
<div class="row">
   <div class="col-md-8 col-md-offset-1">
        <form action="" method="post" class="form-horizontal">
<?php echo "$pass"; ?>
            <div class="form-group">
                <label class="col-sm-3 control-label">Username</label>
                <div class="col-md-4">
                    <input type="text" name="username" value="<?php echo $username; ?>" required placeholder="Username" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Fullname</label>
                <div class="col-md-6">
                  <input type="text" name="fullname" value="<?php echo $fullname; ?>" required placeholder="Fullname" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-md-4">
                  <input type="password" class="form-control" name="pass" required="Password" placeholder="Password">
                  <p class="help-text">Masukkan password anda</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-3">
                    <button type="submit" name="update_profil" class="btn btn-success" value="Update Profil">
                        Update Profil
                    </button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                        Kembali
                    </button>
                </div>
            </div>
         </form>
   </div>
</div>
