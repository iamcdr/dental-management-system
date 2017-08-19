<?php
if(isset($_GET['id'])){
    $patient_id = $_GET['id'];

    $queryPatientInfo = "SELECT * FROM patients AS a LEFT JOIN patient_profile AS b ON a.patient_id=b.patient_id WHERE a.patient_id = {$patient_id}";
    $resultPatientInfo = mysqli_query($connection, $queryPatientInfo) or die(mysqli_error($connection));

    $rowPtInf = mysqli_fetch_assoc($resultPatientInfo);
} else {
    header("Location: 404.php");
}

?>

    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body app-heading">
                        <img class="profile-img" src="./assets/images/profile.png">
                        <div id="webcam"></div>
                        <div class="app-title">
                            <div class="title"><span class="highlight"><?= $rowPtInf['lastname'] . ", " . $rowPtInf['firstname']  ?></span></div>
                            Occupation:
                            <div class="description">
                                <?= $rowPtInf['occupation'] ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-tab">
                    <ul class="nav nav-tabs">
                        <li role="tab1" class="active">
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Profile</a>
                        </li>
                        <li role="tab2">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Files and Records</a>
                        </li>
                    </ul>
                    <div class="card-body no-padding tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab1">
                            <?php include("includes/tab_profile.php");?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab2">
                            <?php include("includes/tab_files_records.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
