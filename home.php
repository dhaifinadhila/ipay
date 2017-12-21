<?php 
session_start();
include("config.php");

if (!isset($_SESSION['username'])){
	header ("location: login.php");
} else {
	include ("layout/header.php");
    include ("function.php");

?>                

            <div class="content-page">
				<div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                <form class="form-horizontal group-border-dashed" method="POST">
                                    <div class="row"><div class="col-sm-12"><h3>Information of Payment</h3></div></div>
                                    <div class="row"><div class="col-sm-12">
                                    <div id = "kirim_email">
                                        <button class="btn btn-primary btn-sm pull-right" data-toggle="tooltip" data-placement="top" title="Kirim Email" type="submit" name="submit"><i class="fa fa-envelope"></i> Kirim Email</button>
                                    </div>
                                    </div></div><br>

                                <?php if (!empty($_SESSION['msg'])){ ?>
                                <a href="#" class="alert-link"><?php echo $_SESSION['msg'];?></a>
                                <?php unset($_SESSION['msg']); } ?>
                                    <table id="datatable" class="table table-bordered table-hover table-condensed">
                                        <thead>
                                            <tr class="pv">
                                            <th ><div align="center"><input type="checkbox" id="checkAll" name="checkAll" class="v_checkbox all" /></div></th>
                                            <th><div align="center">No</div></th>
                                            <th><div align="center">No Dokumen</div></th>
                                            <th><div align="center">Nama / Alamat Rekanan</div></th>
                                            <th><div align="center">Bank</div></th>
                                            <th><div align="center">No Rekening</div></th>
                                            <th><div align="center">Jumlah IDR</div></th>
                                            <th><div align="center">Keterangan</div></th>
                                            <th><div align="center">Email</div></th>
                                            <th><div align="center">Tanggal Bayar</div></th>
                                            <th><div align="center">Status</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql = mysql_query("SELECT * FROM tb_data WHERE id_user!='0' ")or die(mysql_error());
                                            while ($rows=mysql_fetch_array($sql)){ 
                                                $row[] = $rows;
                                            }

                                                for($i=0;$i<count($row);$i++)
                                            {
                                            ?>

                                            <tr class="pv">
                                            <td><input type="checkbox" name="check[]" class="v_checkbox" value="<?php echo $row[$i]['id'];?>" /></td>
                                            <td align="center"><?php echo $no++;?></td>
                                            <td><?php echo $row[$i]['no_dokumen'];?></td>
                                            <td><?php echo $row[$i]['nama'];?></td>
                                            <td><?php echo $row[$i]['bank'];?></td>
                                            <td><?php echo $row[$i]['no_rekening'];?></td>
                                            <td><?php echo $row[$i]['jumlah_idr'];?></td>
                                            <td><?php echo $row[$i]['keterangan'];?></td>
                                            <td><?php echo $row[$i]['mail_al'];?></td>
                                            <td><?php echo $row[$i]['tgl_bayar'];?></td>
                                            <td>
                                                <?php if($row[$i]['status'] == "0")
                                                {
                                                ?>
                                                <!-- <a class="btn btn-primary btn-sm" href="javascript:update_status(<?php echo $row[$i]['id']?>)" data-toggle="tooltip" data-placement="top" title="Kirim Email" id="send_mail"><i class="fa fa-envelope"></i></a> -->
                                                <a class="btn btn-default btn-sm" href="data_edit.php?id=<?php echo $row[$i]['id']?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                                <a class="btn btn-danger btn-sm" href="javascript:delete_id(<?php echo $row[$i]['id']?>)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" id="delete"><i class="fa fa-trash"></i></a>

                                                <?php }
                                                else { ?>

                                                <a class="btn btn-success btn-sm" href="" data-toggle="tooltip" data-placement="top" disabled>Terkirim</a> 
                                                <?php } ?>
                                            </td>
                                            </tr>
                                            <?php } 

                                            if(!empty($_POST['check']))
                                            {
                                                    foreach($_POST['check'] as $id){
                                                    
                                                    $sql = mysql_query("SELECT * FROM tb_data WHERE id= '$id' ")or die(mysql_error());
                                                    $row = mysql_fetch_array($sql);
                                                    //echo $rows['mail_al'];
                                                    //echo '<script language="javascript">alert('.$id.')</script>';
                                                    // echo '<script language="javascript">window.location = "index_get.php?id='.$id.'&asal=Keuangan DISJAYA&subject=Pembayaran PLN DISJAYA&tujuan[]='.$trim_mail.'&isi='.$body.'"</script>';
                                                    //echo '<script type="text/javascript">','send_email('.$id.');','</script>';
                                                    //echo $trim_mail."<br>";
                                                    $body="Pembayaran PLN DISJAYA <br><br> Kepada Ysh ".$row['nama']." <br><table border='0'><tr><td>No Dokumen</td><td>:</th><td>".$row['no_dokumen']."</td></tr><tr><td>Bank</td><td>:</th><td>".$row['bank']."</td></tr><tr><td>No Rekening</td><td>:</td><td>".$row['no_rekening']."</td></tr><tr><td>Jumlah IDR</td><td>:</td><td>Rp ".$row['jumlah_idr']."</td></tr><tr><td>Keterangan</td><td>:</td><td>".$row['keterangan']."</td></tr><tr><td>Tanggal Dibayar</td><td>:</td><td>".$row['tgl_bayar']."</td></tr></table><br>"; 

                                                $tgl_bayar = $row['tgl_bayar'];
                                                $dep = $row['mail_al'];
                                                //bagian dibawah ini jangan ditab/dihapus/digeser
                                                $trim_mail = trim($dep, "
                                " );

                                                $asal    = "Keuangan DISJAYA";
                                                $subject = "Pembayaran PLN DISJAYA";
                                               // echo $tgl_bayar;
                                                //send_email($id,$tgl_bayar,$asal,$trim_mail,$subject,$body);
                                                
                                                    send_email($id,$tgl_bayar,$asal,$trim_mail,$subject,$body);
                                                //oke();
//echo $trim_mail;
                                                    }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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
                   

            /*$(document).ready(function () {
                $('#checkAll').click(function() {
                    //alert("check all");
                    $(this).closest('table').find('tbody :checkbox')
                        .prop('checked', this.checked)
                        .closest('tr').toggleClass('selected', this.checked);


                });

                $('tbody :checkbox').on('click', function () {
                    $(this).closest('tr').toggleClass('selected', this.checked); 
                    document.getElementById("send_mail").disabled = true;
                    $(this).closest('table').find('.checkAll').prop('checked', ($(this).closest('table').find('tbody :checkbox:checked').length == $(this).closest('table').find('tbody :checkbox').length)); 
                });
            });  */

            var testing = function (e) {
                var submit = $('#kirim_email');
                var checkbox = $(this);
                if ($(this).is('tr')) {
                    checkbox = $(this).find('input[type="checkbox"]');
                }

                submit.prop('disabled', true); // Disable submit button

                checkbox.prop('checked', !checkbox.is(':checked')); // Change checked property
                
                if (checkbox.hasClass('all')) { // If this is "all"
                    $('.v_checkbox:not(.all)').prop('checked', checkbox.is(':checked'));  // Set all other to same as "all" 
                    if (checkbox.is(':checked')) { // change colour of "all" tr
                        checkbox.closest('tr').addClass('diff_color');  
                    } else {
                        checkbox.closest('tr').removeClass('diff_color');  
                    }
                }

                var blnAllChecked = true; // Flag all of them as checked
                $('.v_checkbox:not(.all)').each(function() { // Loop through all checkboxes that aren't "all"
                    if ($(this).is(':checked')) {
                        $(this).closest('tr').addClass('diff_color');
                        submit.prop('disabled', false); // enable submit if one is checked
                    } else {
                        $(this).closest('tr').removeClass('diff_color');
                        blnAllChecked = false; // If one is not checked, flag all as not checked
                    }
                });
                
                if (blnAllChecked) {
                    $('.v_checkbox.all').closest('tr').addClass('diff_color');
                    $('.v_checkbox.all').prop('checked', true);
                } else {
                    $('.v_checkbox.all').closest('tr').removeClass('diff_color');
                    $('.v_checkbox.all').prop('checked', false);
                }
            };

            $(document).on('click', '.pv', testing);
            $(document).on('click', 'input[type="checkbox"]', testing);

        </script>   
    </body>
</html>

<?php  } ?>