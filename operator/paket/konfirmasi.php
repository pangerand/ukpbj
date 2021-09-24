<?php

	// query SQL untuk insert data
	        
	        $id_paket = $_GET['id_paket'];
            $query="UPDATE t_paket SET status='Proses Reviu' where id_paket='$id_paket'";
            mysqli_query($con, $query);
            // mengalihkan ke halaman index.php
            
           // echo "$id_paket";
           header("location:?page=paket");
?>