<?php
if(isset($_SESSION['ALERTS']['ADD_SUCCESS'])){ ?>
    <div class="alert alert-success" role="alert">
        <strong>Success!</strong> Patient
        <?= $_SESSION['POST']['firstname'] . " " . $_SESSION['POST']['lastname']; ?> added.
    </div>
    <?php } ?>

        <div class="col-md-12">
            <div class="card">
                <form action="patients.php?s=exec" method="post">
                    <div class="card-header">
                        Add Patient
                        <br>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Patient Type</label>
                                <div class="radio radio-inline">
                                    <input type="radio" name="patient_type" id="regular" value="Regular" required>
                                    <label for="regular">Regular</label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="patient_type" id="ortho" value="Ortho">
                                    <label for="ortho">Ortho</label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="patient_type" id="caritas" value="Caritas">
                                    <label for="caritas">Caritas</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Last Name*</label>
                                <input type="text" name="lastname" class="form-control" placeholder="e.g. Parker" required>
                            </div>
                            <div class="col-md-4">
                                <label>First Name*</label>
                                <input type="text" name="firstname" class="form-control" placeholder="e.g. Peter" required>
                            </div>
                            <div class="col-md-4">
                                <label>Middle Name*</label>
                                <input type="text" name="middlename" class="form-control" placeholder="e.g. James">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Gender*</label>
                                <div class="radio radio-inline">
                                    <input type="radio" name="sex" id="male" value="Male" required>
                                    <label for="male">Male</label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="sex" id="female" value="Female">
                                    <label for="female">Female</label>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Age</label>
                                <input type="text" name="age" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Address*</label>
                                <input type="text" name="address1" class="form-control" placeholder="Street Address, Barangay">
                                <input type="text" name="address2" class="form-control" placeholder="City/Town">
                                <input type="text" name="address3" class="form-control" placeholder="Province">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="barry.allen@gmail.com">
                            </div>
                        </div>
                        <div class="row">
                            <legend>Personal Information</legend>

                            <div class="form-group col-lg-6">
                                <label>Occupation</label>
                                <input type="text" name="occupation" class="form-control" placeholder="e.g. Engineer, Student, etc">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Nationality</label>
                                <input type="text" name="nationality" class="form-control" placeholder="e.g. Filipino">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Status</label>
                                <input type="text" name="status" class="form-control" placeholder="e.g. Married, Single">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Religion</label>
                                <input type="text" name="religion" class="form-control" placeholder="e.g. Roman Catholic, Baptist">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Blood Type</label>
                                <br>
                                <select name="bloodtype" class="form-control">
                                    <option value="Unsure">Unsure</option>
                                    <option value="O+">O+</option>
                                    <option value="0-">0-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>

                            </div>

                            <!--Code for 'numbers' only contact no. -->
                            <script type="text/javascript">
                                function isNumberKey(evt) {
                                    var charCode = (evt.which) ? evt.which : event.keyCode
                                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                                        return false;

                                    return true;
                                }

                            </script>

                            <div class="form-group col-lg-6">
                                <label>Contact Number (+63)*</label>
                                <input type="text" name="contactno" class="form-control" placeholder="e.g. 9198765432" onkeypress="return isNumberKey(event)" maxlength="10">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Referred By</label>
                                <input type="text" name="referred_by" class="form-control">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Chief Complaint</label>
                                <input type="text" name="chief_complaint" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <input type="submit" class="btn btn-success" name="add_new_patient">
                                <a href="patients.php" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
