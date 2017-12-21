<?php 
session_start();
include("config.php");
if (!isset($_SESSION['username'])){
    header ("location: login.php");
} 
else {
    include ("layout/header.php");
    include ("function.php");
?>   
            
        <div class="content-page">
        <!-- Start content -->
            <div class="content">
                <div class="container">

                    <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Payment Information</b></h4>

                                    <button id="demo-delete-row" class="btn btn-primary btn-sm" disabled><i class="fa fa-envelope m-r-5"></i>Kirim E-mail</button>
                                    <table id="demo-custom-toolbar"  data-toggle="table"
                                           data-toolbar="#demo-delete-row"
                                           data-search="true"
                                           data-show-refresh="true"
                                           data-show-toggle="true"
                                           data-show-columns="true"
                                           data-sort-name="id"
                                           data-page-list="[5, 10, 20]"
                                           data-page-size="5"
                                           data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id" data-sortable="true" data-formatter="invoiceFormatter">No</th>
                                                <th data-field="name" data-sortable="true">No Dokumen</th>
                                                <th data-field="date" data-sortable="true" data-formatter="dateFormatter">Nama / Alamat Rekanan</th>
                                                <th data-field="amount" data-align="center" data-sortable="true" data-sorter="priceSorter">Bank</th>
                                                <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">No Rekening</th>
                                                <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Jumlah IDR</th>
                                                <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Keterangan</th>
                                                <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Email</th>
                                                <th data-field="status" data-align="center" data-sortable="true" data-formatter="dateFormatter">Tanggal Bayar</th>
                                                <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Status</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            $sql = mysql_query("SELECT * FROM tb_data ")or die(mysql_error());
                                            while ($rows=mysql_fetch_array($sql)){ 
                                                $row[] = $rows;
                                            }
                                            ?>
                                            
                                            <?php
                                                for($i=0;$i<count($row);$i++)
                                            {
                                            ?>

                                            <tr>
                                                <td></td>
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
                                                    $body="Pembayaran PLN DISJAYA <br><br> Kepada Ysh ".$row['nama']." <br><table border='0'><tr><td>No Dokumen</td><td>:</th><td>".$row['no_dokumen']."</td></tr><tr><td>Bank</td><td>:</th><td>".$row['bank']."</td></tr><tr><td>No Rekening</td><td>:</td><td>".$row['no_rekening']."</td></tr><tr><td>Jumlah IDR</td><td>:</td><td>Rp ".$row['jumlah_idr']."</td></tr><tr><td>Keterangan</td><td>:</td><td>".$row['keterangan']."</td></tr></table><br>"; 

                                                $dep = $row['mail_al'];
                                                //bagian dibawah ini jangan ditab/dihapus/digeser
                                                $trim_mail = trim($dep, "
                                " );

                                                $asal    = "Keuangan DISJAYA";
                                                $subject = "Pembayaran PLN DISJAYA";

                                                    send_email($id,$asal,$trim_mail,$subject,$body);
                                                    }
                                            }

                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div> <!-- container -->                
            </div> <!-- content -->      
        </div>
            <!-- END wrapper -->
        <?php include "footer.php";?>
        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/bootstrap-table/dist/bootstrap-table.min.js"></script>

        <script src="assets/pages/jquery.bs-table.js"></script>


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        
        <script type="text/javascript">
            function delete_id(id){
                var cnfrm = confirm("Anda yakin ingin menghapus data?");
                if(cnfrm) {
                    window.location.href='data_delete.php?delete_id='+id;
                }
            }

            

            $(document).on('click', '.pv', testing);
            $(document).on('click', 'input[type="checkbox"]', testing);

        </script>   
    </body>
</html>
<?php } ?>