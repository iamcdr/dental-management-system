<?php
if(isset($_GET['id'])){
    $patient_id = $_GET['id'];

    $queryPatientInfo = "SELECT * FROM patients AS a LEFT JOIN patient_profile AS b ON a.patient_id=b.patient_id WHERE a.patient_id = {$patient_id}";
    $resultPatientInfo = mysqli_query($connection, $queryPatientInfo) or die(mysqli_error($connection));

    $rowPtInf = mysqli_fetch_assoc($resultPatientInfo);
} else {
    header("Location: ./pages/404.php");
}

?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="title"><a href="patients.php?s=record&id=<?= $patient_id; ?>">
                        <?= $rowPtInf['firstname'] . " " . $rowPtInf['lastname'] ?>
                    </a> -> Treatment Record</h4>
                <br>

            </div>
            <div class="card-body">
                <form action="patients.php?s=exec" method="post">
                    <input type="hidden" value="<?= $patient_id ?>" name="patient_id">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Treatment Concern</label>
                            <select name="concern" class="form-control" required>
                                <option value="">-=Please Select=-</option>
                                <?php
                                            $query = "SELECT * FROM concerns ORDER BY concern ";
                                            $result = mysqli_query($connection, $query);

                                    while($data = mysqli_fetch_assoc($result)){
                                        ?>
                                    <option value="<?php echo $data['concern']?>">
                                        <?php echo $data['concern'];?>

                                    </option>

                                    <?php }
                                           ?>
                            </select>
                            <label>Estimated Amount</label>
                            <input type="text" class="form-control" name="estimated_amount">
                            <label>Deposit</label>
                            <input type="text" class="form-control" name="deposit">
                            <label>Balance</label>
                            <input type="text" class="form-control" name="balance">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Date:</label>
                            <input type="date" name="treatment_date" class="form-control">
                            <label>Treatment Details</label>
                            <input type="text" class="form-control" name="treatment_details">
                        </div>

                        <div class="col-lg-6">
                            <input type="submit" class="btn btn-success" name="add_treatment">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
