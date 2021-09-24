<html>
    
    <head>
        <meta charset="utf-8"/>        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="icon" href="assets/img/logo.png">
        <title>
            Halaman Login User      </title>
        <!-- Add to homescreen for Chrome on Android -->
    
        
        <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
        <link rel="stylesheet" href="assets/css/skins/skin-blue.min.css"/>
         <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        
        
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        
        
        <link rel="stylesheet" type="text/css" href="assets/css/particles.css" />
	
		<link rel="stylesheet" type="text/css" href="assets/css/login.css" />
		
		<script>document.documentElement.className="js";var supportsCssVars=function(){var e,t=document.createElement("style");return t.innerHTML="root: { --tmp-var: bold; }",document.head.appendChild(t),e=!!(window.CSS&&window.CSS.supports&&window.CSS.supports("font-weight","var(--tmp-var)")),t.parentNode.removeChild(t),e};supportsCssVars()||alert("Please view this demo in a modern browser that supports CSS Variables.");</script>
	
        
        </head>
    <body class="hold-transition login-page">
        <svg class="hidden">
			<symbol id="icon-arrow" viewBox="0 0 24 24">
				<title>arrow</title>
				<polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
			</symbol>
			<symbol id="icon-drop" viewBox="0 0 24 24">
				<title>drop</title>
				<path d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z"/><path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z"/>
			</symbol>
			<svg id="icon-github" viewBox="0 0 33 33">
				<title>github</title>
				<path d="M16.608.455C7.614.455.32 7.748.32 16.745c0 7.197 4.667 13.302 11.14 15.456.815.15 1.112-.353 1.112-.785 0-.386-.014-1.411-.022-2.77-4.531.984-5.487-2.184-5.487-2.184-.741-1.882-1.809-2.383-1.809-2.383-1.479-1.01.112-.99.112-.99 1.635.115 2.495 1.679 2.495 1.679 1.453 2.489 3.813 1.77 4.741 1.353.148-1.052.569-1.77 1.034-2.177-3.617-.411-7.42-1.809-7.42-8.051 0-1.778.635-3.233 1.677-4.371-.168-.412-.727-2.069.16-4.311 0 0 1.367-.438 4.479 1.67a15.602 15.602 0 0 1 4.078-.549 15.62 15.62 0 0 1 4.078.549c3.11-2.108 4.475-1.67 4.475-1.67.889 2.242.33 3.899.163 4.311C26.37 12.66 27 14.115 27 15.893c0 6.258-3.809 7.635-7.437 8.038.584.503 1.105 1.497 1.105 3.017 0 2.177-.02 3.934-.02 4.468 0 .436.294.943 1.12.784 6.468-2.159 11.131-8.26 11.131-15.455 0-8.997-7.294-16.29-16.291-16.29"></path>
			</svg>
			<svg id="icon-rewind" viewBox="0 0 36 20">
				<title>rewind</title>
				<path d="M16.315.061c.543 0 .984.44.984.984v17.217c0 .543-.44.983-.984.983L.328 10.391s-.738-.738 0-1.476C1.066 8.178 16.315.061 16.315.061zM35.006.061c.543 0 .984.44.984.984v17.217c0 .543-.44.984-.984.984L19.019 10.39s-.738-.738 0-1.475C19.757 8.178 35.006.06 35.006.06z"/>
			</svg>
		</svg>
    <div id="particles-js"></div>
    <div class="container">
        <div class="login-box">
            
            <div class="box box-primary login-box-body" style="background-image:url('');background-repeat: no-repeat; background-color:; border-radius:5px; background-size:100%;">
               <?php 
               session_start();

if(isset($_SESSION['admin'])) {
   header('location: admin/dashboard.php');
   }elseif (isset($_SESSION['satker'])) {
       header('location: operator/dashboard.php');
   }else{

               include('include/connection.php');
               //define('BASEPATH', dirname(__FILE__));
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$user	= $_POST['username'];
					$pass	= $_POST['password'];
					$p		= md5($pass);
					if($user=='' || $pass==''){
						?>
						<div class="alert alert-warning alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php
						  echo "Form Belum Lengkap!!";
						  ?>
						</div>
						<?php
					}else{
						
						$sqlLogin = mysqli_query($con, "SELECT * FROM t_user WHERE username='$user' AND password='$p'");
						$jml=mysqli_num_rows($sqlLogin);
						$d=mysqli_fetch_array($sqlLogin);
						if($jml > 0){
							@session_start();
							//$_SESSION['admin']		= TRUE;
							$_SESSION['id']			= $d['id_user'];
							$_SESSION['id_user']	= $d['id_user'];
							$_SESSION['username']	= $d['username'];
							$_SESSION['namalengkap']= $d['namalengkap'];
							$_SESSION['level']= $d['level'];
							
							$level=$d['level'];
                            
                            if ($level == 1) {
                                		$_SESSION['username'] = $username;
                                		$_SESSION['id_user'] = $id_user;
		                                $_SESSION['admin'] = TRUE;
                        	header('Location: admin/dashboard.php');
                            } else {
                                		$_SESSION['username'] = $username;
                                		$_SESSION['id_user'] = $id_user;
		                                $_SESSION['satker'] = TRUE;
	                        header('Location: operator/dashboard.php');
                            }

							
						}else{
						?>
							<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php
							  echo "Username dan Password anda Salah!!!";
							  ?>
							</div>
						<?php
						}
						
					}
				}
   }
				?>

               <form action="" method="post">
                    <h5 class="text-center">
                <img src="./assets/img/logo.png" height="100px" width="auto" alt="" /></h5>
                <h6 class="text-center"><b>KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA R.I<br>KANTOR WILAYAH JAMBI</b></h6>
                <hr>
      <div class="form-group has-feedback">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" value="submit" class="btn btn-danger btn-block">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<footer class="footer">
            <div id="copyright">
                <p>@2021 Kantor Wilayah Kementerian Hukum dan HAM Jambi</p>
            </div>
        </footer>
        <!-- jQuery 3 -->
        <script src="assets/jquery/dist/jquery.min.js"></script>        <!-- Bootstrap 3.3.7 -->
        <script src="assets/js/bootstrap.min.js"></script>        <!-- AdminLTE App -->
               
        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>        
        <script src="assets/js/login.js"></script>            
        <script src='assets/js/anime.min.js'></script>
	    <script src='assets/js/particles.js'></script>
	    <script src='assets/js/demo.js'></script>
        
        </body>
</html>
