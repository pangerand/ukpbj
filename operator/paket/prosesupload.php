
<?php 
    $id_paket =$_POST['idPaket'];
    $id_file =$_POST['idFile'];
    $user = $_SESSION['namalengkap'];

error_reporting(0);

	// check the file is uploaded or not
    //    $structure = './ukpbj/operator/paket/';
		if (!is_dir('paket'.'upload/'.$user)) {
            mkdir('paket'.'/upload/'.$user, 0777, TRUE);
        } else {
    echo "The directory  exists.";
    }
	
	if (is_uploaded_file($_FILES['attachment']['tmp_name'])) {   
	

		// Determine the file location
		$basename = basename($_FILES['attachment']['name']);
		$file = $_FILES['attachment']['name'];
		
		$extension  = ".".pathinfo($file, PATHINFO_EXTENSION);
		$namabaru = $id_file.'-'.$id_paket.$extension;
		
		$newname = dirname(__FILE__) . '/upload/'.$user.'/' .$namabaru;
	    
		if($_FILES['attachment']['size'] > 2097152) {
			$errors[]='File size must be excately 2 MB';
			$pesan = 1;
			header("location:?page=paket&action=upload&id_paket=$id_paket&pesan=$pesan");
			
		}
		
		// Check Allowed File Types
		$file_ext=strtolower(end(explode('.',$_FILES['attachment']['name'])));
		$extensions= array("pdf","doc","docx");
		if(in_array($file_ext,$extensions)=== false){
		$errors[]="File extension not allowed, please choose a PDF, DOC, DOCX file.";
		$pesan = 2;
			header("location:?page=paket&action=upload&id_paket=$id_paket&pesan=$pesan");
		}
		
		if(empty($errors)==true){
			// Move the file from temporary location to determined location
			if (!(move_uploaded_file($_FILES['attachment']['tmp_name'], $newname))) {
				echo "<p>ERROR:  A problem occurred during file upload!</p>\n";
			} else {
				echo "<p>The file has been saved as: {$newname}</p>\n";
				echo "<p>The file has been saved as: {$namabaru}</p>\n";
				echo "<p>The file has been saved as: {$user}</p>\n";
				// query SQL untuk insert data
            $query="UPDATE t_file SET file='$namabaru', status='2' where id_file='$id_file'";
            mysqli_query($con, $query);
            // mengalihkan ke halaman index.php
            header("location:?page=paket&action=upload&id_paket=$id_paket");
				
			}
		}
		else{
			print_r($errors);
		}
  }
 ?>