<?php
ini_set('session.gc_maxlifetime', 30*60);
session_start();
include_once("config.php");
include_once("function.php");

$get_var_username = $_POST['username'];
$get_var_password = md5(mysql_real_escape_string($_POST['password']));

$pengguna = login($get_var_username,$get_var_password);

//print_r($pengguna);

$VAR_ID_PENGGUNA	=$pengguna[0]['id_user'];
$VAR_KODE_KD		=$pengguna[0]['kode_unit']; 
$VAR_KODE_AREA		=$pengguna[0]['kode_area']; 
$VAR_KODE_RAYON		=$pengguna[0]['kode_rayon']; 
$VAR_NIP			=$pengguna[0]['nip']; 
$VAR_NAMA			=$pengguna[0]['nama'];
$VAR_JABATAN		=$pengguna[0]['jabatan']; 
$VAR_EMAIL			=$pengguna[0]['email']; 
$VAR_USERNAME		=$pengguna[0]['username'];

if ($VAR_ID_PENGGUNA=="") {
    $errMsg = "<div class='alert alert-danger'><strong>Login gagal! </strong>Silahkan ulangi kembali</div>";
	$_SESSION['msg']=$errMsg;
	header("location: login.php");
} else {
	$_SESSION['id_user'] 		= $VAR_ID_PENGGUNA;	
	$_SESSION['kode_unit']		= $VAR_KODE_KD;
	$_SESSION['kode_area']		= $VAR_KODE_AREA;
	$_SESSION['kode_rayon']		= $VAR_KODE_RAYON;
	$_SESSION['nip']			= $VAR_NIP;
	$_SESSION['nama'] 			= $VAR_NAMA;	
	$_SESSION['jabatan']		= $VAR_JABATAN;
	$_SESSION['email']			= $VAR_EMAIL;	
	$_SESSION['username'] 		= $VAR_USERNAME;
	
	//echo '<script language="javascript">alert("'.$_SESSION['temp_url'].'");</script>';
	if ($_SESSION['temp_url']<>"" or $_SESSION['temp_url']<>null ) {
		echo '<script language="javascript">window.location ="'.$_SESSION["temp_url"].'"</script>';
		$_SESSION['temp_url']="";

	}	
	else {
		echo '<script language="javascript">window.location = "home.php"</script>';
	}	

} 
 

?>