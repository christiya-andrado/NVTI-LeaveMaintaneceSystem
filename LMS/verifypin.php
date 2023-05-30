<?php 
session_start();
include "connection.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Verify PIN</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 50%;
            border-radius: 5px;
            margin: 20px auto;
        }
        
    </style>
</head>

<body style="margin-top:180px; background-color:#d1d1d1;">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">                        
                        <div class="login-form">
                            <h4>Verify PIN</h4>
                            <form method="post" action="vrfypn.php">
                            <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>                                
                                <div class="form-group">
                                    <label>Verify PIN</label>
                                    <input type="text" name="verifypin" class="form-control" placeholder="Enter The PIN Which Last Received Your email">
                                    <input type="hidden" name="email" class="form-control" value="<?php echo $_GET['email']; ?>">
                                    <input type="hidden" name="verification_code" class="form-control" value="<?php echo $_GET['verification_code']; ?>">
                                    <br>
                                    <label>Your New PIN Number</label>
                                    <input type="text" name="npin" class="form-control" placeholder="Enter The PIN You Would Like To Have">
                                    <br>
                                    <label>Confirm Your New PIN Number</label>
                                    <input type="text" name="cnpin" class="form-control" placeholder="Re-Enter The PIN For The Confirmation">
                                </div>
                                <button type="submit" name="check" class="btn btn-primary btn-flat m-b-15" style="background-color:#9d1d40;">VERIFY</button>
                                <div class="register-link text-center">
                                    <div class="row">
                                        <div class="col-md-4">
                                    <p>Back to <a href="forgot_password.php"> Forgot Password</a></p></div> 
                                    <div class="col-md-4">
                                    <p>Back to <a href="index.php"> Home</a></p></div>
                                    <div class="col-md-4">
                                    <p>Back to <a href="login.php"> Login</a></p></div>
                                    </div> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

