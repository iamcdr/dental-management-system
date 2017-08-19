<div class="modal fade" id="removePatient<?= $patient_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Remove <?= $patient_firstname . " " . $patient_middlename . " " . $patient_lastname ?></h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the profile of
                    <?= $patient_firstname . " " . $patient_lastname ?>
                </p>
            </div>
            <div class="modal-footer">
                <form action="patients.php?s=exec" method="post">
                    <input type="hidden" name="patient_id" value="<?= $patient_id ?>">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">No</button>
                    <button type="sumbit" class="btn btn-sm btn-success" name="remove_patient">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
