<?php
session_start();
include("PHPMailer/class.phpmailer.php");
include("PHPMailer/class.smtp.php");
include("config.php");

if(isset($_GET['id']) and isset($_GET['asal']) and isset($_GET['tujuan']) and isset($_GET['subject']) and isset($_GET['isi'])){
	$asal 		= $_GET['asal'];
	$tujuan 	= $_GET['tujuan'];
	$subject 	= $_GET['subject'];
	$isi 		= $_GET['isi'];
	//$isi = "Terserah anda";
	for($i=0; $i<count($tujuan); $i++){
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
	
		$mail->AddAddress($tujuan[$i]);
		$mail->IsHTML(true); 
		if(!$mail->Send()) {
		  	echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  	//echo "Message has been sent";
		  	/*$id = $_GET['id'];
		  	$del = mysql_query("UPDATE tb_data SET status='1' WHERE id='$id'");
		  	if($del){
		  		$errMsg = "<div class='alert alert-success'><strong>Sukses! </strong>Email berhasil dikirim</div>";
				$_SESSION['msg']=$errMsg;
		  		echo '<script language="javascript">window.location="home.php";</script>';
		  		
		  	}*/
		  	
		}
	}
	
}else{
	echo "Data Tidak lengkap";
	if(isset($_GET['asal'])){
		echo $_GET['asal'];
	}
	if(isset($_GET['tujuan'])){
		echo $_GET['tujuan'];
	}
	if(isset($_GET['subject'])){
		echo $_GET['subject'];
	}
	if(isset($_GET['isi'])){
		echo $_GET['isi'];
	}
}



?>