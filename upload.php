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
                                <div class="card-box table-responsive" >
                                    <div class="form-group">    
                                        Untuk upload file excel, silahkan download <a href="uploads/Template2.xlsx">Template2.xlsx</a> ini. <br>
                                        Untuk upload file txt, silahkan download dari aplikasi SAP. <br>
                                        Hindari penggunaan karakter kutip satu ( ' ) untuk mencegah kegagalan upload file
                                    </div>
                                    <form method="post" action="upload_act.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">File (.txt, .xlsx)</label>
                                            <div class="col-sm-4">
                                                <input type="file" class="filestyle" data-buttonname="btn-white" value="" name="var_file" ><br>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
                    
                    <?php
                    include ("layout/footer.php");
                    ?>   
    </body>
</html>

<?php  } ?>