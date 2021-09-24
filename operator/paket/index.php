<?php
if (!isset($_SESSION['satker'])) {
   header('location: ../');
}

if (isset($_GET['action'])) {

   switch ($_GET['action']) {
      case 'tambah':
         include('./paket/add.php');
         break;

      case 'edit':
         include('./kegiatan/edit_kegiatan.php');
         break;
     case 'datail':
         include('./paket/detail.php');
         break;
         
    case 'upload':
         include('./paket/upload.php');
         break;
    case 'prosesupload':
         include('./paket/prosesupload.php');
         break;
    case 'hapus':
         include('./paket/hapus.php');
         break;
    case 'konfirmasi':
         include('./paket/konfirmasi.php');
         break;
         case 'datadukung':
         include('./paket/datadukung.php');
         break;
    case 'qrcode':
         include('./kegiatan/buatQRCode_kegiatan.php');
         break;
    case 'download':
         include('./paket/download.php');
         break;
    case 'downloaddatadukung':
         include('./paket/downloaddatadukung.php');
         break;
      case 'hapuspaket':

         if (isset($_GET['id_paket'])) {

            $nis   = strip_tags(mysqli_real_escape_string($con, $_GET['id_paket']));

            $sql   = $con->prepare("DELETE FROM t_paket WHERE id_paket = ?");
            $sql->bind_param('s', $nis);
            $sql->execute();

            header('location: ?page=paket');

         } else {

            header('location: ./');

         }

         break;
      default:
         include('./paket/list.php');
         break;
   }

} else {

   include('./paket/list.php');

}
?>
