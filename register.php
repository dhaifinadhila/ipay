<?php
session_start();
include "function.php";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <link rel="shortcut icon" href="assets/images/favicon_1.ico">
        <title>Information Payment</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        <script src="assets/js/modernizr.min.js"></script>
        <link href="assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
</head>
<body>
    <div class="account-pages"></div>
    <div class="clearfix"></div>
        <div class="wrapper-page">
        <div class=" card-box">
        <h3 class="text-center"> Sign Up to <strong class="text-custom">IPay</strong></h3><br>
        <?php if (!empty($_SESSION['msg'])){ ?>
        <a href="#" class="alert-link"><?php echo $_SESSION['msg'];?></a>
        <?php unset($_SESSION['msg']); } ?>
        <form action="register_act.php" method="post">
            <div class="form-group">
                <label>Unit<sup>*</sup></label>
                <!--<input type="text" name="kode_kd" class="form-control" required="" />-->
                <select class="form-control" id="unit" name="unit">
                    <option value="">- Unit -</option>

                    <?php 
                    $dist = get_all_dist();
                    for ($i=0; $i <count($dist) ; $i++) { 
                        $kode_unit = $dist[$i]['kode_kd'];
                        $nama_unit = $dist[$i]['nama_kd'];
                    
                        echo "<option value='".$kode_unit."'>".$nama_unit."</option>";
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Area<sup>*</sup></label>
                <!--<input type="text" name="kode_area" class="form-control" required="" />-->
                <select class="form-control" id="area" name="area">
                    <option value="">- Area -</option>
                </select>
            </div>
            <div class="form-group">
                <label>Rayon<sup>*</sup></label>
                <!--<input type="text" name="kode_rayon" class="form-control" required="" />-->
                <select class="form-control" id="rayon" name="rayon">
                    <option value="">- Rayon -</option>
                </select>
            </div>
            <div class="form-group">
                <label>NIP<sup>*</sup></label>
                <input type="text" name="nip" class="form-control" required="" />
            </div>
            <div class="form-group">
                <label>Name<sup>*</sup></label>
                <input type="text" name="nama" class="form-control" required="" />
            </div>
            <div class="form-group">
                <label>Jabatan<sup>*</sup></label>
                <input type="text" name="jabatan" class="form-control" required="" />
            </div>
            <div class="form-group">
                <label>E-mail<sup>*</sup></label>
                <input type="text" name="email" class="form-control" required="" />
            </div>
            <div class="form-group">
                <label>Username<sup>*</sup></label>
                <input type="text" name="username" class="form-control" required="" />
            </div>    
            <div class="form-group">
                <label>Password<sup>*</sup></label>
                <input type="password" name="password" class="form-control" required="" />
            </div>
            <div class="form-group">
                <label>Keterangan<sup>*</sup></label>
                <input type="text" name="keterangan" class="form-control" />
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit">Register</button>
                    <!-- <button class="btn btn-info waves-effect waves-light btn-sm" id="sa-success">Click me</button> -->
                </div>
            </div><br><br>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p>Already have an account? <a href="login.php"><b>Login here</b></a>.</p>
                </div>
            </div>
        </form>
        </div>
        </div>   
        <div class="row"> 
            <div class="col-sm-12 text-center">
                <p>2017 <i class="fa fa-copyright"></i> PLN Distribusi Jakarta Raya</b></p>
            </div>
        </div> 

        <script>
            var resizefunc = [];
        </script>

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


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <!-- Sweet-Alert  -->
        <script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="assets/pages/jquery.sweet-alert.init.js"></script>
        <script src="assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            $("#unit").change(function(){
                var unit = $("#unit").val();
                var showData1 = "";       

                if(unit == "" )
                { $("#area").html("<option>- Pilih Unit Terlebih Dahulu -</option>"); }
                else
                {
                    //alert(kd);
                    showData1 += "<option>- Pilih Area -</option>";
                    
                    $.getJSON('get_area.php',{'unit' : unit},function(data)
                    {   
                        
                        $.each(data,function(index,value){
                            showData1 += "<option value="+value.kode_area+">"+value.nama_area+"</option>";
                            //alert(showData1);
                        })
                        $("#area").html(showData1);
                    })
                }                       
            })

            $("#area").change(function(){
                var unit = $("#unit").val();
                var area = $("#area").val();
                var showData = null;
                                            
                if(area == "" )
                {
                    $("#rayon").html("<option>- Pilih Area Terlebih Dahulu -</option>");
                }
                else
                {
                    //alert(kd);
                    showData += "<option>-Pilih Rayon-</option>";
                    
                    $.getJSON('get_rayon.php',{'area' : area,'unit':unit},function(data)
                    {   
                        $.each(data,function(index,value){
                            showData += "<option value="+value.kode_rayon+">"+value.nama_rayon+"</option>";
                        })
                        $("#rayon").html(showData);
                    })
                }                       
            })
        </script>
</body>
</html>

        