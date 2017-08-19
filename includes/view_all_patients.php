<?php
if(isset($_SESSION['ALERTS']['RMV_SUCCESS'])){ ?>
    <div class="alert alert-success" role="alert">
        <strong>Success!</strong> Patient was successfully removed.
    </div>
    <?php } ?>
    <?php
if(isset($_SESSION['ALERTS']['EDT_SUCCESS'])){ ?>
    <div class="alert alert-success" role="alert">
        <strong>Success!</strong> Patient record was successfully edited.
    </div>
    <?php } ?>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    View All Patients
                    <br>

                </div>
                <div class="card-body">
                    <a href="patients.php?s=add" class="btn btn-primary"><i class="fa fa-plus"></i> Add Patient</a>
                    <table id="content" class="datatable table table-bordered table-hover dt-responsive">
                        <thead>
                            <tr>
                                <th width=10%>Last Name</th>
                                <th width=10%>First Name</th>
                                <th width=10%>Middle Name</th>
                                <th width=10%>Patient Type</th>
                                <th width=10%>Address</th>
                                <th width=5%>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryPatients = "SELECT * FROM patients
                            LEFT JOIN patient_profile
                            ON patients.patient_id = patient_profile.patient_id
                            WHERE archive_status = 0 ORDER BY lastname";
                            $resultPatients = mysqli_query($connection, $queryPatients);

                            while($row = mysqli_fetch_assoc($resultPatients)){
                                $patient_id = $row['patient_id'];
                                $patient_firstname = $row['firstname'];
                                $patient_middlename = $row['middlename'];
                                $patient_lastname = $row['lastname'];
                                $patient_email = $row['email'];
                                $patient_birthday = $row['birthday'];
                                    $birthday = date_create($patient_birthday);
                                    $patient_birthday = date_format($birthday, 'F d Y');
                                $address = $row['address'];
                                $patient_type = $row['patient_type'];
                            ?>


                                <tr>
                                    <td>
                                        <?= $patient_lastname ?>
                                    </td>
                                    <td>
                                        <?= $patient_firstname ?>
                                    </td>
                                    <td>
                                        <?= $patient_middlename ?>
                                    </td>
                                    <td>
                                        <?php
                                if($patient_type=='Regular'){
                                    echo "<label class='label label-primary'>Regular</label>";
                                } elseif($patient_type=='Caritas'){
                                    echo "<label class='label label-info'>Caritas</label>";
                                } elseif($patient_type=='Ortho'){
                                    echo "<label class='label label-success'>Ortho</label>";
                                }
                                ?>
                                    </td>
                                    <td>
                                        <?= $address ?>
                                    </td>


                                    <td>
                                        <div class='btn-group'>
                                            <button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='fa fa-eye'></i> Action <span class='caret'></span></button>
                                            <ul class='dropdown-menu' role='menu'>
                                                <li><a href='patients.php?s=record&id=<?= $patient_id ?>'>View Record</a></li>
                                                <li><a href='patients.php?s=edit_pr&id=<?= $patient_id ?>'>Edit Record</a></li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#removePatient<?= $patient_id ?>">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php include("includes/modal_remove_patient.php"); ?>
                                    <?php } ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
