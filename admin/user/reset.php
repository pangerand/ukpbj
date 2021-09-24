<?php

	// query SQL untuk insert data
	        
	        $id_user = $_GET['id_user'];
	        $password = md5('1234');
            $query="UPDATE t_user SET password='$password' where id_user='$id_user'";
            mysqli_query($con, $query);
            // mengalihkan ke halaman index.php
            
            //echo "$password";
            //echo "$id_user";
          header("location:?page=user");
?>