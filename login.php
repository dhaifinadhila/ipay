<?php
session_start()
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <link rel="shortcut icon" href="assets/images/pln.jpg">
        <title>Information of Payment</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

</head>
<body>
    <div class="animationload">
        <div class="loader"></div>
    </div>
    <div class="account-pages"></div>
    <div class="clearfix"></div>
        <div class="wrapper-page">
        <div class=" card-box">
        <div align="center"><img src="assets/images/ipay.jpg" align="center" height="150" width="300"></div>
        <!-- <h2 class="text-center"><strong class="text-custom">IPay</strong></h2><br> -->
        <?php if (!empty($_SESSION['msg'])){ ?>
        <a href="#" class="alert-link"><?php echo $_SESSION['msg'];?></a>
        <?php unset($_SESSION['msg']); } ?>
        <form action="login_act.php" method="post">
            <div class="form-group">
                <label>Username<sup>*</sup></label>
                <input type="text" name="username" class="form-control">
            </div>    
            <div class="form-group">
                <label>Password<sup>*</sup></label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group text-center m-t-10">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit">Sign In</button>
                </div>
            </div><br><br>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p>Don't have an account? <a href="register.php"><b>Sign Up</b></a></p>
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
</body>
</html>