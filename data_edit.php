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
						<?php
						$id = $_GET['id'];
						$show = mysql_query("SELECT * FROM tb_data WHERE id='$id'");
						
							if(mysql_num_rows($show) == 0){
								echo '<script>window.history.back()</script>';
							}else{
								$data = mysql_fetch_assoc($show);
							}
						$originalDate = $data['tgl_bayar'];
						$newDate = date("m/d/Y", strtotime($originalDate));
						?>
						
						<div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h3>Form Edit</h3><br>
                                    <div class="row">
                                        <div class="col-sm-12">
											<form class="form-horizontal group-border-dashed" action="data_edit_act.php" method="POST">
												<div class="form-group">
													<label class="col-md-2 control-label">No Dokumen</label>
													<div class="col-sm-8">
														<input id="id" name="id" type="hidden" class="form-control" value="<?php echo $data['id'];?>">
														<input id="no_dokumen" name="no_dokumen" type="text" class="form-control" value="<?php echo $data['no_dokumen'];?>" required="">
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-2 control-label">Nama / Alamat Rekanan</label>
													<div class="col-sm-8">
														<input id="nama" name="nama" type="text" class="form-control" value="<?php echo $data['nama'];?>" required="">
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-2 control-label">Bank</label>
													<div class="col-sm-8">
														<input id="bank" name="bank" type="text" class="form-control" value="<?php echo $data['bank'];?>" required="">
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-2 control-label">No Rekening</label>
													<div class="col-sm-8">
														<input id="no_rekening" name="no_rekening" type="text" class="form-control" value="<?php echo $data['no_rekening'];?>" required="">
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-2 control-label">Jumlah IDR</label>
													<div class="col-sm-8">
														<input id="jumlah_idr" name="jumlah_idr" type="text" class="form-control" value="<?php echo $data['jumlah_idr'];?>" required="">
													</div>
												</div>
												<div class="form-group">
													<label  class="col-sm-2 control-label">Keterangan</label>
													<div class="col-sm-8">
														<textarea name="keterangan" class="form-control"><?php echo $data['keterangan']; ?></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Email</label>
													<div class="col-sm-8">
														<input id="mail_al" name="mail_al" type="text" class="form-control" value="<?php echo $data['mail_al'];?>">
													</div>	
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Tanggal Bayar</label>
													<div class="col-sm-8">
													<div class="input-group">
														<input name="tgl_bayar" type="text" class="form-control" value="<?php echo $newDate ?>" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
														<span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
													</div>
													</div>	
												</div>
												<div class="form-group m-b-0">	
                                                    <div class="col-sm-offset-2 col-sm-9 m-t-15">
														<button value="submit" name="submit" type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                		<button type="button" onClick="history.back();" class="btn btn-raised btn-white" >Cancel</button> 
													</div>
                                                </div>
											</form>
										</div>
									</div>
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
            	jQuery(document).ready(function() {
	            	jQuery('#datepicker-autoclose').datepicker({
	                	autoclose: true,
	                	todayHighlight: true
	                });
	            });
            </script>
	</body>
</html>
<?php } ?>