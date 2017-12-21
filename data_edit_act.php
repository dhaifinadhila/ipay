<?php	
session_start();
include("config.php");

if(isset($_POST['submit'])){
		$id				= $_POST['id'];
		$no_dokumen		= $_POST['no_dokumen'];
		$nama		 	= $_POST['nama'];
		$bank			= $_POST['bank'];
		$no_rekening	= $_POST['no_rekening'];
		$jumlah_idr	 	= $_POST['jumlah_idr'];
		$keterangan		= $_POST['keterangan'];
		$mail_al	 	= $_POST['mail_al'];
		$tgl_bayar		= $_POST['tgl_bayar'];

		$newDate 		= date("Y-m-d", strtotime($tgl_bayar));	
	
	$update = mysql_query("UPDATE tb_data SET no_dokumen='$no_dokumen', nama='$nama', bank='$bank', no_rekening='$no_rekening', jumlah_idr='$jumlah_idr', keterangan='$keterangan', mail_al='$mail_al', tgl_bayar='$newDate' WHERE id='$id' ") or die(mysql_error());
		
	if($update){
		$errMsg = "<div class='alert alert-success'><strong>Sukses! </strong>Data Pembayaran berhasil diubah</div>";
		$_SESSION['msg']=$errMsg;
		header("location: belum_kirim.php");		
	}else{
		$errMsg = "<div class='alert alert-danger'><strong>Gagal! </strong>Data Pembayaran gagal diubah</div>";
		$_SESSION['msg']=$errMsg;
		header("location: belum_kirim.php");
	}
	
}else{	

	echo '<script>window.history.back()</script>';

}
?>