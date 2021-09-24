<?php

	// query SQL untuk insert data
	        
	        $id_file = $_GET['id_file'];
	        $id_paket = $_GET['id_paket'];
            $query="UPDATE t_file SET status='4' where id_file='$id_file'";
            mysqli_query($con, $query);
            // mengalihkan ke halaman index.php
            
           // echo "$id_paket";
           // echo "$id_file";
           header("location:?page=paket&action=datadukung&id_paket=$id_paket");
?>