<?php
session_start();
include("includes/db.php");
if(isset($_SESSION['adramoneda_dms_user_role'])){
    header("Location: ./");
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>A.D. Ramoneda - Dental Management System</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="./assets/css/vendor.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/flat-admin.css">

        <!-- Theme -->
        <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue-sky.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/theme/red.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/theme/yellow.css">

    </head>

    <body>
        <div class="app app-default">

            <div class="app-container app-login">
                <div class="flex-center">
                    <div class="app-header"></div>
                    <div class="app-body">
                        <div class="loader-container text-center">
                            <div class="icon">
                                <div class="sk-folding-cube">
                                    <div class="sk-cube1 sk-cube"></div>
                                    <div class="sk-cube2 sk-cube"></div>
                                    <div class="sk-cube4 sk-cube"></div>
                                    <div class="sk-cube3 sk-cube"></div>
                                </div>
                            </div>
                            <div class="title">Logging in...</div>
                        </div>
                        <div class="app-block">
                            <div class="app-form">
                                <div class="form-header">
                                    <div class="app-brand"><span class="highlight">A.D.R.</span>Dental Management System</div>
                                </div>
                                <form action="login.php?s=exec" method="post">

                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                                                            <i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input name="username" type="text" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon2">
                                                                            <i class="fa fa-key" aria-hidden="true"></i></span>
                                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="text-center">
                                        <input name="login" type="submit" class="btn btn-success btn-submit" value="Login">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="app-footer">
                    </div>
                </div>
            </div>

        </div>
        <?php
    if(isset($_GET['s'])) $source = $_GET['s'];  else $source = '';
        switch($source){

            case 'exec':
                include "includes/login_exec.php";
                break;

            default:
                break;
        }
                        ?>
            <!--        <script type="text/javascript" src="./assets/js/vendor.js"></script>-->
            <!--        <script type="text/javascript" src="./assets/js/app.js"></script>-->

    </body>

    </html>
