<?php
    if(isset($_SESSION['ALERTS']['FAILED_MISMATCH'])){ ?>
    <div class="alert alert-danger" role="alert">
        <strong>Failed!</strong> Passwords mismatched.
    </div>
    <?php } ?>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Add User Account
                    <br>
                </div>

                <div class="card-body">
                    <form action="users.php?s=exec" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Last Name</label>
                                <input type="text" name="lastname" class="form-control" placeholder="e.g. Parker" required>
                            </div>
                            <div class="col-md-4">
                                <label>First Name</label>
                                <input type="text" name="firstname" class="form-control" placeholder="e.g. Peter" required>
                            </div>
                            <div class="col-md-4">
                                <label>Middle Name</label>
                                <input type="text" name="middlename" class="form-control" placeholder="e.g. James">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="category">Role:</label>
                                <select name="user_role" class="form-control">
                                    <option value="Administrator">Administrator</option>
                                    <option value="Dentist">Dentist</option>
                                    <option value="Secretary">Secretary</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="title">Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="title">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="title">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="title">Retype Password</label>
                                <input type="password" class="form-control" name="repassword">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="add_user" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
