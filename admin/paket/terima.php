<?php

	// query SQL untuk insert data
	        
	        $id_file = $_GET['id_file'];
	        $id_paket = $_GET['id_paket'];
            $query="UPDATE t_paket SET status='Permohonan Diproses' where id_paket='$id_paket'";
            mysqli_query($con, $query);
            // mengalihkan ke halaman index.php
            
           // echo "$id_paket";
           // echo "$id_file";
           header("location:?page=paket");
?>