<?php
	session_start();
	include ("function.php");
	include ("config.php");

		//keep track post values
		$kode_unit 	= $_POST['unit'];
		$kode_area 	= $_POST['area'];
		$kode_rayon = $_POST['rayon'];
		$nip 		= $_POST['nip'];
		$nama 		= $_POST['nama'];
		$jabatan 	= $_POST['jabatan'];
		$email 		= $_POST['email'];
		$username 	= $_POST['username'];
		$keterangan	= $_POST['keterangan'];
		$password	= md5(mysql_real_escape_string($_POST['password']));
			$cek = mysql_num_rows(mysql_query("SELECT * FROM tb_user WHERE username='$username'"));
			if ($cek > 0){
				$errMsg = "<div class='alert alert-danger'><strong>Username Sudah Ada. </strong> User gagal ditambahkan!</div>";
				$_SESSION['msg']=$errMsg;
				//die("Query failed");
				header("location: register.php");
			} else {
				$sql = "INSERT INTO tb_user (kode_unit, kode_area, kode_rayon, nip, nama, jabatan, email, username, password, keterangan) values('$kode_unit','$kode_area','$kode_rayon','$nip','$nama','$jabatan','$email','$username','$password','$keterangan')";
				$result=@mysql_query($sql);
				
				if($result) {
					$errMsg = "<div class='alert alert-success'><strong>Sukses! </strong>User berhasil ditambahkan!</div>";
					$_SESSION['msg']=$errMsg;
					//echo '<script language="javascript">alert("Sukses! User berhasil ditambahkan!")</script>';
					//echo '<script language="javascript">window.location = "login.php"</script>';
					header("location: login.php");
					
				}else {
					$errMsg = "<div class='alert alert-danger'><strong>Gagal! </strong>User gagal ditambahkan!</div>";
					$_SESSION['msg']=$errMsg;
					header("location: register.php");
				}
			}
?>