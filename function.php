<?php
include("PHPMailer/class.phpmailer.php");
		include("PHPMailer/class.smtp.php");
		include("config.php");
/*function get_user($username,$password){
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	
	$sql = mysql_query("SELECT * FROM tb_user WHERE username='$username' and password=md5('$password')");
	// $data = mysql_fetch_array($sql);
	$cek = mysql_num_rows($sql);

	if($cek==1){
			$_SESSION['username']=$username;
			$_SESSION['password']=md5($password);
			$_SESSION['nama']=$nama;
			header ("location: home.php");
		} else {
			$errMsg = "Login Gagal";
			$_SESSION['err']=$errMsg;
			header("location: index.php");
		}
}*/

/*function get_id_user($username){
	$sql = mysql_query("SELECT * FROM tb_user WHERE username='$username' ");
	while($row = mysql_fetch_array($sql)){
		if ($row['username']==$username  ){
			echo $row['username'];
			//$id_user = $row['id_pengguna'];
			//echo $row['id_pengguna'];
		} else {
			$errMsg = "Username atau Password Anda Salah!";
			$_SESSION['err']=$errMsg;
			//header('location: login.php');
		}
	}
}*/

	function login($usernamenya,$passwordnya)
	{	
		include "config.php";				
		$query = "select * from  tb_user where username = '$usernamenya' AND password = '$passwordnya' ";
		//echo $query;
		
		$result = mysql_query($query);
		while ($rows = mysql_fetch_array($result)) {
			$data[] = $rows;
		}
		return $data;
	}

	function get_all_dist()
	{	
		include "config.php";				
		$query = "SELECT * FROM `tb_kd`";
		$result = mysql_query($query);
		while ($rows = mysql_fetch_array($result)) {
			$data[] = $rows;
		}
		return $data;
	}

	function send_email($id,$tgl_bayar,$asal,$tujuan,$subject,$isi)
	{
		
		if($id!="" and $tgl_bayar!="" and $asal!="" and $tujuan!="" and $subject!="" and $isi!=""){
				$mail = new PHPMailer();
				$mail->Host     = "10.1.2.25";
				$mail->Mailer   = "smtp";
				$mail->SMTPAuth = true; 

				$mail->Username   = "jaya\Ipay.disjaya"; 
				$mail->Password   = "Jakarta@123";  

				$mail->From       = "ipay.disjaya@pln.co.id";
				$mail->FromName   = $asal;
				$mail->Subject    = $subject;
				$mail->AltBody    = "This is the body when user views in plain text format"; 
				$mail->WordWrap   = 50; // set word wrap

				$mail->MsgHTML($isi);
			
				$mail->AddAddress($tujuan);
				$mail->IsHTML(true); 
				if(!$mail->Send()) {
					$errMsg = "<div class='alert alert-danger'><strong>Email Gagal Dikirim. Error: ".$mail->ErrorInfo."</strong></div>";
					$_SESSION['msg']=$errMsg;
				  	echo '<script language="javascript">window.location="home.php";</script>';
				  	//echo "Mailer Error: " . $mail->ErrorInfo;
				} else {
				  	//echo "Message has been sent";
				  	$id_user 	= $_SESSION['id_user'];
				  	$del = mysql_query("UPDATE tb_data SET status='1', id_user = '$id_user' WHERE id='$id'");
				  	//echo $del;
				  	if($del){
				  		$errMsg = "<div class='alert alert-success'><strong>Sukses! </strong>Email berhasil dikirim</div>";
						$_SESSION['msg']=$errMsg;
				  		echo '<script language="javascript">window.location="home.php";</script>';
				  		
				  	}
				  	
				}

			
		}
		else{

			if($tujuan =="")
			{ $errMsg = "<div class='alert alert-danger'>Data Tidak Lengkap. E-mail Tujuan Tidak Ada</strong></div>"; }
			
			$_SESSION['msg']=$errMsg;
			echo '<script language="javascript">window.location="home.php";</script>';

			if($tgl_bayar =="")
			{ $errMsg = "<div class='alert alert-danger'>Data Tidak Lengkap. Tanggal Dibayar Belum Diisi</strong></div>"; }
			
			$_SESSION['msg']=$errMsg;
			echo '<script language="javascript">window.location="home.php";</script>';

			
			
		}
	}

	
?>