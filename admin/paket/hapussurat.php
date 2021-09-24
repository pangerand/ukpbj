<?php

	// query SQL untuk insert data
	        
	        $id_paket = $_GET['id_paket'];
            $query="DELETE FROM t_surat WHERE id_paket='$id_paket'";
            mysqli_query($con, $query);
            // mengalihkan ke halaman index.php
            header("location:?page=paket&action=rekomendasi&id_paket=$id_paket");
?>