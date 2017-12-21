<?php
session_start();
include_once("config.php");
include_once("function.php");

if(isset($_GET['update_id'])){

	$id = $_GET['update_id'];
	$cek = mysql_query("SELECT * FROM tb_data ")or die(mysql_error());
	
	if(mysql_num_rows($cek) == 0){
		echo '<script>window.history.back()</script>';	
	}
	else{
		$del = mysql_query("UPDATE tb_data SET status='1' WHERE id='$id'");
		if($del){
			$sql = mysql_query("SELECT * FROM tb_data WHERE id='$id'")or die(mysql_error());
			while ($rows=mysql_fetch_array($sql)){ 
             $row[] = $rows;
            }
		        $body="Pembayaran PLN DISJAYA <br><br> Kepada Ysh ".$row[0]['nama']." <br><table border='0'><tr><td>No Dokumen</td><td>:</th><td>".$row[0]['no_dokumen']."</td></tr><tr><td>Bank</td><td>:</th><td>".$row[0]['bank']."</td></tr><tr><td>No Rekening</td><td>:</td><td>".$row[0]['no_rekening']."</td></tr><tr><td>Jumlah IDR</td><td>:</td><td>Rp ".$row[0]['jumlah_idr']."</td></tr><tr><td>Keterangan</td><td>:</td><td>".$row[0]['keterangan']."</td></tr></table><br>";	

		        $dep = $row[0]['mail_al'];
		        //bagian dibawah ini jangan ditab/dihapus/digeser
		        $trim_mail = trim($dep, "
" );
		    
			echo '<script language="javascript">
			window.open("http://10.3.0.72/email/index_get.php?asal=Keuangan Disjaya&subject=Pembayaran PLN&tujuan[]='.$trim_mail.'&isi='.$body.'");
			;
			</script>';		
			

		}
		else{
			header("location: home.php");
		}		
	}
	
}else{
	
	echo '<script>window.history.back()</script>';
	
}
?>
