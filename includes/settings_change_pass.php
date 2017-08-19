<?php
if(isset($_SESSION['adramoneda_dms_uID'])){
    $user_id = $_SESSION['adramoneda_dms_uID'];

    $queryPatientInfo = "SELECT * FROM users WHERE uID = {$user_id}";
    $resultPatientInfo = mysqli_query($connection, $queryPatientInfo) or die(mysqli_error($connection));

    $rowPtInf = mysqli_fetch_assoc($resultPatientInfo);
} else {
    header("Location: 404.php");
}
?>

    <div class="col-md-12">
        <?php
            if(isset($_GET['oldmismatch'])){
    echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span><span class='sr-only'></span> Old password did not match.</div>";
                              }

            if(isset($_GET['mismatch'])){
    echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span><span class='sr-only'></span> Retyped password did not match with new password.</div>";
                              }

            if(isset($_GET['success'])){
    echo "<div class='alert alert-success' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span><span class='sr-only'></span> Password was successfully changed.</div>";
                              }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body app-heading">
                            <img class="profile-img" src="./assets/images/profile.png">
                            <div id="webcam"></div>
                            <div class="app-title">
                                <div class="title"><span class="highlight"><?= $rowPtInf['lastname'] . ", " . $rowPtInf['firstname']  ?></span></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Change Password
                            <br>
                        </div>
                        <div class="card-body">
                            <form action="settings.php?s=exec" method="post">

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="title">Old Password</label>
                                        <input type="password" class="form-control" name="oldpassword" required>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-lg-6">
                                        <label for="title">New Password</label>
                                        <input type="password" class="form-control" name="newpassword" required>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="title">Retype New Password</label>
                                        <input type="password" class="form-control" name="renewpassword" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="change_password" value="Save">
                                    <a type="button" class="btn btn-default" href="./">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
