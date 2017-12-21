<?php
include_once("config.php");
include_once("function.php");
$kode_kd 	= $_GET['unit'] ;
$kode_area	= $_GET['area'] ;
//$kode_kd = "54";
//$respon = array();
//$respon = get_area_by_kd($kode_kd);
$query = "SELECT * FROM tb_rayon where kode_unit = '$kode_kd' and kode_area = '$kode_area' ";

$result = mysql_query($query);

$respon = array();
while ($hasil = mysql_fetch_array($result))
{
    $respon[] = $hasil;
}
echo json_encode($respon);
?>