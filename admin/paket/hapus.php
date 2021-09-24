<?php

	// query SQL untuk insert data
	        $id_file = $_GET['id_file'];
	        $id_paket = $_GET['id_paket'];
            $query="UPDATE t_file SET file='', status='1' where id_file='$id_file' and id_paket='$id_paket'";
            mysqli_query($con, $query);
            // mengalihkan ke halaman index.php
            header("location:?page=paket&action=upload&id_paket=$id_paket");
?>