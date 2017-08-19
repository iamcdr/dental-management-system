<?php if(isset($_SESSION['ALERTS']['ADD_SUCCESS'])){ ?>
    <div class="alert alert-success" role="alert">
        <strong>Success!</strong> New account added.
    </div>
    <?php }?>


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    View All Users
                    <br>

                </div>
                <div class="card-body">
                    <a href="users.php?s=add" class="btn btn-primary"><i class="fa fa-plus"></i> Add User Account</a>
                    <table id="content" class="datatable table table-bordered table-hover dt-responsive">
                        <thead>
                            <tr>
                                <th width=10%>Name</th>
                                <th width=10%>Username</th>
                                <th width=5%>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryPatients = "SELECT * FROM users WHERE archive_status = 0";
                            $resultPatients = mysqli_query($connection, $queryPatients);

                            while($row = mysqli_fetch_assoc($resultPatients)){
                                $user_id = $row['uID'];
                                $user_name = $row['lastname'] . ", " . $row['firstname'] . " " . $row['middlename'];
                                $user_username = $row['username'];
                            ?>
                                <tr>
                                    <td>
                                        <?= $user_name; ?>
                                    </td>
                                    <td>
                                        <?= $user_username; ?>
                                    </td>
                                    <td>
                                        <div class='btn-group'>
                                            <button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='fa fa-gear'></i> Action <span class='caret'></span></button>
                                            <ul class='dropdown-menu' role='menu'>
                                                <li><a role="button" href='users.php?uid=<?= $user_id ?>&disacc'>Disable Account</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
