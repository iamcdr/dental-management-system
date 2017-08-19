<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="section">
            <div class="section-title"><i class="icon fa fa-file" aria-hidden="true"></i> Type</div>
            <?php
                                if($rowPtInf['patient_type']=='Regular'){
                                    echo "<label class='label label-primary'>Regular</label>";
                                } elseif($rowPtInf['patient_type']=='Caritas'){
                                    echo "<label class='label label-info'>Caritas</label>";
                                } elseif($rowPtInf['patient_type']=='Ortho'){
                                    echo "<label class='label label-success'>Ortho</label>";
                                }
                                ?>
        </div>
        <div class="section">
            <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i> Personal Information</div>
            <div class="section-body">
                <table class="table table-hover">
                    <tr>
                        <th>Birthday:</th>
                        <td>
                            <?php
                            if($rowPtInf['birthday']!='0000-00-00'){
                                $patientBday = date_create($rowPtInf['birthday']);
                                $patientBday = date_format($patientBday, 'F d, Y');
                                echo $patientBday;
                            }else {
                                echo "";
                            } ?>
                        </td>
                        <th>Age:</th>
                        <td>
                            <?= $rowPtInf['age']?>
                        </td>
                    </tr>
                    <tr>
                        <th>Sex:</th>
                        <td>
                            <?= $rowPtInf['sex']?>
                        </td>
                        <th>Status:</th>
                        <td>
                            <?= $rowPtInf['status'];?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Blood Type:
                        </th>
                        <td>
                            <?= $rowPtInf['bloodtype'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Home Address:</th>
                        <td>
                            <?=$rowPtInf['address']?>
                        </td>
                        <th>Religion:</th>
                        <td>
                            <?=$rowPtInf['religion']?>
                        </td>
                    </tr>
                    <tr>
                        <th>Nationality:</th>
                        <td>
                            <?= $rowPtInf['nationality'] ?>
                        </td>
                        <th>Contact No:</th>
                        <td>
                            <?= $rowPtInf['contactno'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Referred By</th>
                        <td>
                        <?= $rowPtInf['referred_by'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Chief Complaint</th>
                        <?= $rowPtInf['chief_complaint'] ?><td>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
