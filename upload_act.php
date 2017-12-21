<?php
//echo readfile("readme.txt");
require_once 'lib/excell/simplexlsx.class.php';
require_once 'lib/excell/reader.php';
require_once 'config.php';

session_start();
	error_reporting(0);
	ini_set('post_max_size', '64M');
	ini_set('upload_max_filesize', '64M');
	// mysql_connect('localhost','','') or die('could not connect to database'.mysql_error());
	// mysql_select_db('ipay');

	$temps 		= date('dmY_His_');
	$file		= $temps.$_FILES["var_file"]["name"];
	//echo $file."dep";
	$target_dir = "uploads/";
	
	$target_file = $target_dir  .basename($file);
	// $temps = date('Y-m-d H:i:s');
	// $target_file= $target_dir .basename($_FILES["var_file"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	$id_user 		= $_SESSION['id_user'];
	$kode_unit 		= $_SESSION['kode_unit'];
	$kode_area 		= $_SESSION['kode_area'];
	$kode_rayon		= $_SESSION['kode_rayon'];

	if($imageFileType == "txt" || $imageFileType == "TXT") {
		$uploadOk = 1;
		if ($uploadOk == 0) 
		{ 
			echo '<script language="javascript">alert("Upload File Gagal")</script>';
			echo '<script language="javascript">window.location = "upload.php"</script>';
		}

		else
		{
			if (move_uploaded_file($_FILES["var_file"]["tmp_name"], $target_file) ) 
		    { 

				$row=0;
				if ($file = fopen("uploads/".$file, "r")) {
				    while(!feof($file)) {
				        $line = fgets($file);
				        
				        $lines = explode("	", $line);
						
						$row++;
						if($row>1) {
							//echo $pieces[1]."<br>";
							$no_dokumen		= $lines[1];
							$nama 			= $lines[2];
							$bank			= $lines[3];
							$no_rekening	= $lines[4];
							$jumlah_idr 	= $lines[5];
							$keterangan		= $lines[6];
							$mail_al		= $lines[7];
							$tgl_bayar		= $lines[8];
							
							$originalDate = $tgl_bayar;
							$newDate = date("Y-m-d", strtotime($originalDate));
							if ($tgl_bayar == 0){
								$sql = "INSERT INTO tb_data(id_user, kode_unit, kode_area,kode_rayon,no_dokumen,nama,bank, no_rekening,jumlah_idr,keterangan,mail_al,tgl_bayar) VALUES('$id_user','$kode_unit','$kode_area','$kode_rayon','$no_dokumen','$nama','$bank','$no_rekening','$jumlah_idr','$keterangan','$mail_al', curdate())";
							}
							else {
								$sql = "INSERT INTO tb_data(id_user, kode_unit, kode_area,kode_rayon, no_dokumen, nama, bank, no_rekening, jumlah_idr, keterangan, mail_al, tgl_bayar) VALUES('$id_user','$kode_unit','$kode_area','$kode_rayon','$no_dokumen','$nama','$bank','$no_rekening','$jumlah_idr','$keterangan','$mail_al','$newDate')";
							}
							mysql_query($sql);
							//echo $sql;
						}
				    }
				    fclose($file);
				}
				//echo $sql;
				echo '<script language="javascript">alert("Data berhasil ditambahkan")</script>';
				echo '<script language="javascript">window.location = "belum_kirim.php"</script>';
		    } 
		    else 
		    { 
		    	echo '<script language="javascript">alert("Terjadi Kesalahan Saat Upload. Silahkan Coba Kembali")</script>';
				echo '<script language="javascript">window.location = "upload.php"</script>';
		    }
		}
		    
		} 
	elseif ($imageFileType == "xlsx" || $imageFileType == "XLSX") {
		$uploadOk = 1;
		if ($uploadOk == 0) 
		{ 
			echo '<script language="javascript">alert("Upload File Gagal")</script>';
			echo '<script language="javascript">window.location = "upload.php"</script>';
		}

	else
		{
			if (move_uploaded_file($_FILES["var_file"]["tmp_name"], $target_file) ) 
		    { 
		    	$xlsx = new SimpleXLSX('uploads/'.$file.'');
				$excel_data = $xlsx->rows();
				$jumlah_row_excel_data=count($excel_data);
		  		//echo $jumlah_row_excel_data;
		  		//$berhasil_insert = 0;
				for ($i=1;$i<count($excel_data);$i++)
				{ 
					

					$no_dokumen		= trim($excel_data[$i][1]);	
					$nama 			= trim($excel_data[$i][2]);	
					$bank			= trim($excel_data[$i][3]);	
					$no_rekening	= trim($excel_data[$i][4]);	
					$jumlah_idr 	= trim($excel_data[$i][5]);	
					$keterangan		= trim($excel_data[$i][6]);	
					$mail_al		= trim($excel_data[$i][7]);	
					$tgl_bayar		= date('Y-m-d',$xlsx->unixstamp($excel_data[$i][8]));	
					
					//$newDate = date("Y-m-d", strtotime($tgl_bayar));
					
					
					$sql = "INSERT INTO tb_data(id_user, kode_unit, kode_area,kode_rayon, no_dokumen, nama, bank, no_rekening, jumlah_idr, keterangan, mail_al, tgl_bayar) VALUES('$id_user','$kode_unit','$kode_area','$kode_rayon','$no_dokumen','$nama','$bank','$no_rekening','$jumlah_idr','$keterangan','$mail_al','$tgl_bayar')";
					//echo $sql;
					mysql_query($sql);
					//$berhasil_insert++;
				}
				
				echo '<script language="javascript">alert("Data berhasil ditambahkan")</script>';
				echo '<script language="javascript">window.location = "belum_kirim.php"</script>';
		    } 
		    else 
		    { 
		    	echo '<script language="javascript">alert("Terjadi Kesalahan Saat Upload. Silahkan Coba Kembali")</script>';
				echo '<script language="javascript">window.location = "upload.php"</script>';
		    }
		}

	}
	else
	{
		echo '<script language="javascript">alert("Jenis File Tidak Diizinkan")</script>';
		echo '<script language="javascript">window.location = "upload.php"</script>';
	}

?>