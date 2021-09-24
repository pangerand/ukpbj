<?php
if (!isset($_SESSION['admin'])) {
   header('location: ../');
}

if (isset($_GET['action'])) {

   switch ($_GET['action']) {
      case 'tambah':
         include('./user/add.php');
         break;

      case 'edit':
         include('./user/edit.php');
         break;
    case 'simpanedit':
         include('./user/simpanedit_pegawai.php');
         break;
     case 'simpan':
         include('./user/simpan_pegawai.php');
         break;
         
    case 'sukses':
         include('./user/list2.php');
         break;
         case 'editsukses':
         include('./user/editsukses.php');
         break;
        
        case 'qrcode':
         include('./user/buatQRCode.php');
         break;
         
        case 'cetak':
         include('./user/cetak_info.php');
         break;
         
    case 'reset':
        include('./user/reset.php');
         break;
    
    case 'hapus':

         if (isset($_GET['id'])) {

            $nis   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

            $sql   = $con->prepare("DELETE FROM t_user WHERE id_user = ?");
            $sql->bind_param('s', $nis);
            $sql->execute();

            header('location: ?page=user');

         } else {

            header('location: ./');

         }

         break;
      default:
         include('./user/list.php');
         break;
   }

} else {

   include('./user/list.php');

}
?>
