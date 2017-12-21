<?php 
session_start();
include("config.php");

if (!isset($_SESSION['username'])){
	header ("location: login.php");
} else {
	include ("layout/header.php");
?>                
            <div class="content-page">
				<div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                <h3>Pembayaran Sudah Terkirim</h3><br>
                                <?php if (!empty($_SESSION['msg'])){ ?>
                                <a href="#" class="alert-link"><?php echo $_SESSION['msg'];?></a>
                                <?php unset($_SESSION['msg']); } ?>
                                    <table id="datatable" class="table table-bordered table-hover table-condensed">
                                        <thead>
                                            <tr>
                                            <th><div align="center">No</div></th>
                                            <th><div align="center">No Dokumen</div></th>
                                            <th><div align="center">Nama / Alamat Rekanan</div></th>
                                            <th><div align="center">Bank</div></th>
                                            <th><div align="center">No Rekening</div></th>
                                            <th><div align="center">Jumlah IDR</div></th>
                                            <th><div align="center">Keterangan</div></th>
                                            <th><div align="center">Email</div></th>
                                            <th><div align="center">Tanggal Bayar</div></th>
                                            <th><div align="center">Pengirim</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql = mysql_query("SELECT d.*,u.nama as nama_pengirim FROM tb_data d, tb_user u WHERE d.status='1' AND u.id_user = d.id_user")or die(mysql_error());
                                            while ($rows=mysql_fetch_array($sql)){ 
                                                $row[] = $rows;
                                            }
                                                
                                            for($i=0;$i<count($row);$i++)
                                            {
                                                // $id_user = $row[$i]['id_user'];
                                                // $sql = "SELECT * FROM tb_user WHERE id_user = '$id_user' ";
                                                // //echo $sql;
                                                // $user = mysql_query($sql)or die(mysql_error());
                                                // while ($u=mysql_fetch_array($user)){ 
                                                //     $us[] = $u;
                                                // }

                                            ?>
                                            <tr>
                                            <td align="center"><?php echo $no++;?></td>
                                            <td><?php echo $row[$i]['no_dokumen'];?></td>
                                            <td><?php echo $row[$i]['nama'];?></td>
                                            <td><?php echo $row[$i]['bank'];?></td>
                                            <td><?php echo $row[$i]['no_rekening'];?></td>
                                            <td><?php echo $row[$i]['jumlah_idr'];?></td>
                                            <td><?php echo $row[$i]['keterangan'];?></td>
                                            <td><?php echo $row[$i]['mail_al'];?></td>
                                            <td><?php echo $row[$i]['tgl_bayar'];?></td>
                                            <td><?php echo $row[$i]['nama_pengirim'];?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
                    
                    <?php
                    include ("layout/footer.php");
                    ?>
        <script type="text/javascript">
            function delete_id(id){
                var cnfrm = confirm("Anda yakin ingin menghapus data?");
                if(cnfrm) {
                    window.location.href='data_delete.php?delete_id='+id;
                }
            }

            function update_status(id){   
                var cnfrm = confirm("Anda yakin ingin mengirim email?");
                if(cnfrm) {
                    window.location.href='update_status.php?update_id='+id;
                }
            }
        </script>   
    </body>
</html>

<?php  } ?>