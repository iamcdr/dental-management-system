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

    <form action="patients.php?s=exec" method="post">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Edit Patient Record
                            <br>
                        </div>
                        <div class="card-body app-heading">
                            <img class="profile-img" src="./assets/images/profile.png">
                            <div class="app-title">
                                <div class="title"><span class="highlight">
                            <input type="text" name="lastname" class="form-control" value="<?= $rowPtInf['lastname'] ?>">
                            <input type="text" name="firstname" class="form-control" value="<?= $rowPtInf['firstname']  ?>">
                            <input type="text" name="middlename" class="form-control" value="<?= $rowPtInf['middlename'] ?>">
                            </span></div>
                                Occupation:
                                <div class="description">
                                    <input type="text" name="occupation" class="form-control" value="<?= $rowPtInf['occupation'] ?>">
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
                                <a href="#p_profile" aria-controls="p_profile" role="tab" data-toggle="tab">Profile</a>
                            </li>
                            <li role="tab2">
                                <a href="#p_files" aria-controls="p_files" role="tab" data-toggle="tab">Files and Records</a>
                            </li>
                        </ul>
                        <div class="card-body no-padding tab-content">

                            <!--Patient PROFILE-->
                            <div role="tabpanel" class="tab-pane active" id="p_profile">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="section">
                                            <div class="section-title"><i class="icon fa fa-file" aria-hidden="true"></i> Patient Type</div>
                                            <div class="radio radio-inline">
                                                <input type="radio" name="patient_type" id="regular" value="Regular" <?php if($rowPtInf[ 'patient_type']=='Regular' ) echo 'checked'; ?>>
                                                <label for="regular">Regular</label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <input type="radio" name="patient_type" id="ortho" value="Ortho" <?php if($rowPtInf[ 'patient_type']=='Ortho' ) echo 'checked'; ?>>
                                                <label for="ortho">Ortho</label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <input type="radio" name="patient_type" id="caritas" value="Caritas" <?php if($rowPtInf[ 'patient_type']=='Caritas' ) echo 'checked'; ?>>
                                                <label for="caritas">Caritas</label>
                                            </div>
                                        </div>
                                        <div class="section">
                                            <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i> Personal Information</div>
                                            <div class="section-body">
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>Birthday:</th>
                                                        <td>
                                                            <input type="date" value="<?= $rowPtInf['birthday'] ?>" class="form-control">
                                                        </td>
                                                        <th>Age:</th>
                                                        <td>
                                                            <input type="text" value="<?= $rowPtInf['age']?>" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gender:</th>
                                                        <td>
                                                            <label>Gender*</label>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" name="sex" id="male" value="Male" <?php if($rowPtInf[ 'sex']=='Male' ) echo "checked"; ?>>
                                                                <label for="male">Male</label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" name="sex" id="female" value="Female" <?php if($rowPtInf[ 'sex']=='Female' ) echo "checked"; ?>>
                                                                <label for="female">Female</label>
                                                            </div>
                                                        </td>
                                                        <th>Status:</th>
                                                        <td>
                                                            <input type="text" name="status" value="<?= $rowPtInf['status'];?>" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Blood Type:
                                                        </th>
                                                        <td>

                                                            <select name="bloodtype" class="form-control">
                                                                <option <?php if($rowPtInf[ 'bloodtype']=='Unsure' ) echo "selected"; ?> value="Unsure">Unsure</option>
                                                                <option <?php if($rowPtInf[ 'bloodtype']=='O+' ) echo "selected"; ?> value="O+">O+</option>
                                                                <option <?php if($rowPtInf[ 'bloodtype']=='0-' ) echo "selected"; ?> value="0-">0-</option>
                                                                <option <?php if($rowPtInf[ 'bloodtype']=='A+' ) echo "selected"; ?> value="A+">A+</option>
                                                                <option <?php if($rowPtInf[ 'bloodtype']=='A-' ) echo "selected"; ?> value="A-">A-</option>
                                                                <option <?php if($rowPtInf[ 'bloodtype']=='B+' ) echo "selected"; ?> value="B+">B+</option>
                                                                <option <?php if($rowPtInf[ 'bloodtype']=='B-' ) echo "selected"; ?> value="B-">B-</option>
                                                                <option <?php if($rowPtInf[ 'bloodtype']=='AB+' ) echo "selected"; ?> value="AB+">AB+</option>
                                                                <option <?php if($rowPtInf[ 'bloodtype']=='AB-' ) echo "selected"; ?> value="AB-">AB-</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Home Address:</th>
                                                        <td>
                                                            <textarea style="resize:none" name="address" class="form-control" cols="30" rows="10">
                                                                <?=$rowPtInf['address']?>
                                                            </textarea>
                                                        </td>
                                                        <th>Religion:</th>
                                                        <td>
                                                            <input type="text" name="religion" class="form-control" value="<?=$rowPtInf['religion']?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nationality:</th>
                                                        <td>
                                                            <input type="text" name="nationality" class="form-control" value="<?= $rowPtInf['nationality'] ?>">
                                                        </td>
                                                        <th>Contact No:</th>
                                                        <td>
                                                            <input type="text" name="contactno" class="form-control" value="<?= $rowPtInf['contactno'] ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Referred By</th>
                                                        <td>
                                                            <input type="text" name="referred_by" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Chief Complaint</th>
                                                        <td>
                                                            <input type="text" name="chief_complaint" class="form-control">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="hidden" name="patient_id" value="<?= $patient_id?>">
                                        <input type="submit" class="btn btn-success" name="edit_patient">
                                        <a href="patients.php" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </div>





                            <!--files and record-->
                            <!--<div role="tabpanel" class="tab-pane" id="p_files">
                            <div class="row">
                                <div class="section">
                                    <div class="section-title">Recent Treatment Record &nbsp;
                                        <a href="patients.php?s=ad_tr&id=<?= $rowPtInf['patient_id'] ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Treatment</a>
                                    </div>
                                    <div class="section-body">
                                        <?php
                                                $queryRTR = "SELECT * FROM patient_treatment WHERE patient_id = {$patient_id} and archive_status = 0 ORDER BY treatment_date DESC";
                                                $resultRTR = mysqli_query($connection, $queryRTR) or die(mysqli_error($connection));

                                                while($rowRTR = mysqli_fetch_assoc($resultRTR)){
                                                ?>
                                            <div class="media social-post">
                                                <div class="media-left">
                                                    <h4>Rx</h4>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <h4 class="title"><?= $rowRTR['treatment_date'] ?></h4>
                                                        <h5 class="timeing">20 mins ago</h5>
                                                    </div>
                                                    <div class="media-content">
                                                        <?= $rowRTR['treatment_details'] ?>
                                                            <br>
                                                            <label>Deposit</label>: P
                                                            <?= number_format($rowRTR['treatment_deposit'], 2) ?>
                                                                <br>
                                                                <label>Balance</label>: P
                                                                <?= number_format($rowRTR['treatment_balance'], 2) ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }
                                                if(mysqli_num_rows($resultRTR) == 0){
                                                ?>
                                                <h4 class="title">No Recent Treatment Record found</h4>
                                                <?php } ?>
                                    </div>
                                </div>
                            </div>



                        </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
