<?php
$activePage = "Settings";
include("includes/header.php");?>

    <?php include("includes/side-nav.php");?>
        <div class="app-container">

            <?php include("includes/top-nav.php");?>

                <div class="row">

                    <?php

                        if(isset($_GET['s'])) $source = $_GET['s']; else $source = '';

                            switch($source){

                                case 'exec':
                                    include "includes/settings_exec.php";
                                    break;

                                default:
                                    include "includes/settings_change_pass.php";
                                    break;
                            }



                        ?>

                </div>

                <?php include("includes/footer.php");?>
