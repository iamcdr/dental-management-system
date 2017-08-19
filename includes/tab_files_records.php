<div class="row">
    <div class="section">
        <div class="section-title">Recent Treatment Record &nbsp;
            <a href="patients.php?s=ad_tr&id=<?= $rowPtInf['patient_id'] ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Treatment</a>
        </div>
        <div class="section-body">
           <table class="table">
                    <tr>
                        <td>Date</td>
                        <td>Treatment Details</td>
                        <td>Deposit</td>
                        <td>Balance</td>
                        <td>Option</td>
                    </tr>
            <?php
                                                $queryRTR = "SELECT * FROM patient_treatment WHERE patient_id = {$patient_id} and archive_status = 0 ORDER BY treatment_date DESC";
                                                $resultRTR = mysqli_query($connection, $queryRTR) or die(mysqli_error($connection));

                                                while($rowRTR = mysqli_fetch_assoc($resultRTR)){
                                                ?>

                    <tr>
                        <td><?= $rowRTR['treatment_date'] ?></td>
                        <td><?= $rowRTR['treatment_details'] ?></td>
                        <td><?= number_format($rowRTR['treatment_deposit'], 2) ?></td>
                        <td><?= number_format($rowRTR['treatment_balance'], 2) ?></td>
                        <td><a href="#" data-toggle="modal" data-target="removeTreatment<?= $rowRTR['treatment_id'] ?>" class="btn btn-primary"><i class="fa fa-times"></i> Remove</a></td>
                    </tr>
                <?php include("includes/modal_remove_treatment.php"); ?>
                </table>

                <?php }
                                                if(mysqli_num_rows($resultRTR) == 0){
                                                ?>
                    <table class="table">
                        <tr>
                            <td colspan="5"><h4 class="title">No Recent Treatment Record found</h4></td>
                        </tr>
                    </table>

                    <?php } ?>
        </div>
    </div>
</div>
