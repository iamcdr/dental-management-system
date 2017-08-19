<?php
$activePage = "Users";
include("includes/header.php");?>

    <?php include("includes/side-nav.php");?>
        <div class="app-container">

            <?php include("includes/top-nav.php");?>

                <div class="row">

                    <?php

                        if(isset($_GET['s'])) $source = $_GET['s']; else $source = '';

                            switch($source){

                                case 'add':
                                    include "includes/add_user.php";
                                    break;

                                case 'record':
                                    include "includes/patient_record.php";
                                    break;

                                case 'ad_tr':
                                    include "includes/add_treatment_record.php";
                                    break;

                                case 'exec':
                                    include "includes/users_exec.php";
                                    break;

                                default:
                                    include "includes/view_all_users.php";
                                    break;
                            }



                        ?>

                </div>

                <?php include("includes/footer.php");?>
