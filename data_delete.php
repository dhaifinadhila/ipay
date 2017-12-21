<?php
session_start();
include_once("config.php");
include_once("function.php");

if(isset($_GET['delete_id'])){

	$id = $_GET['delete_id'];
	
	$cek = mysql_query("SELECT id FROM tb_data WHERE id='$id'") or die(mysql_error());
	
	if(mysql_num_rows($cek) == 0){
		echo '<script>window.history.back()</script>';	
	}else{
		$del = mysql_query("DELETE FROM tb_data WHERE id = '$id'");
		if($del){			
			$errMsg = "<div class='alert alert-success'><strong>Sukses! </strong>Data Pembayaran berhasil dihapus</div>";
			$_SESSION['msg']=$errMsg;
			header("location: belum_kirim.php");			
		}else{			
			$errMsg = "<div class='alert alert-danger'><strong>Gagal! </strong>Data Pembayaran gagal dihapus</div>";
			$_SESSION['msg']=$errMsg;
			header("location: belum_kirim.php");
		}		
	}
	
}else{
	
	echo '<script>window.history.back()</script>';
	
}
?>
