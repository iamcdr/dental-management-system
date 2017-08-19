<?php
$activePage = "Patients";
include("includes/header.php");?>

    <?php include("includes/side-nav.php");?>
        <div class="app-container">

            <?php include("includes/top-nav.php");?>

                <div class="row">

                    <?php

                        if(isset($_GET['s'])) $source = $_GET['s']; else $source = '';

                            switch($source){

                                case 'add':
                                    include "includes/add_patient.php";
                                    break;

                                case 'edit_pr':
                                    include "includes/edit_patient.php";
                                    break;

                                case 'record':
                                    include "includes/patient_record.php";
                                    break;

                                case 'ad_tr':
                                    include "includes/add_treatment_record.php";
                                    break;


                                case 'exec':
                                    include "includes/patient_exec.php";
                                    break;

                                default:
                                    include "includes/view_all_patients.php";
                                    break;
                            }



                        ?>

                </div>

                <?php include("includes/footer.php");?>
