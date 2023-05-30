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

    <title>Forgot PIN</title>

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
        .success {
            background: #def2e4;
            color: #42a964;
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
                            <h4>Reset PIN</h4>
                            <form method="post" action="frgtpswd.php">
                            <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                                <?php if (isset($_GET['success'])) { ?>
                                    <p class="success"><?php echo $_GET['success']; ?></p>
                                <?php } ?>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <button type="submit" name="register" class="btn btn-primary btn-flat m-b-15" style="background-color:#9d1d40;">Submit</button>
                                <div class="register-link text-center">
                                <div class="row">
                                    <div class="col-md-6">
                                    <p>Back to <a href="index.php"> Home</a></p></div>
                                    <div class="col-md-6">
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

