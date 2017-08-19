<?php

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);


    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $find_user_result = mysqli_query($connection, $query);


    while($row = mysqli_fetch_assoc($find_user_result)){

        $db_user_id = $row['uID'];
        $db_username = $row['username'];
        $db_user_email = $row['email'];
        $db_user_password = $row['password'];
        $db_user_firstname = $row['firstname'];
        $db_user_middlename = $row['middlename'];
        $db_user_lastname = $row['lastname'];
        $db_user_role = $row['user_role'];
        $db_user_account_status = $row['account_status'];
        $db_user_archive_status = $row['archive_status'];

        $password = crypt($password, $db_user_password);
    }



    if($username !== $db_username || $password !== $db_user_password || $db_user_archive_status == 1 || $db_user_role == 'Patient'){

        header("Location: ./index.php?error=1");

    } else if($username == $db_username && $password == $db_user_password){

            $_SESSION['adramoneda_dms_username'] = $db_username;
            $_SESSION['adramoneda_dms_uID'] = $db_user_id;
            $_SESSION['adramoneda_dms_firstname'] = $db_user_firstname;
            $_SESSION['adramoneda_dms_middlename'] = $db_user_middlename;
            $_SESSION['adramoneda_dms_lastname'] = $db_user_lastname;
            $_SESSION['adramoneda_dms_password'] = $db_user_password;
            $_SESSION['adramoneda_dms_user_role'] = $db_user_role;
            $_SESSION['adramoneda_dms_email'] = $db_user_email;
            $_SESSION['adramoneda_dms_loggedin_time'] = time();


            /*if($_SESSION['user_role'] == 'Patient'){
                header("Location: ../user/patient/");}
            else if($_SESSION['user_role'] == 'Administrator'){
                header("Location: ../../user/admin/");}
            else if($_SESSION['user_role'] == 'Dentist'){
                header("Location: ../../user/dentist/");}
            else if($_SESSION['user_role'] == 'Secretary'){
                header("Location: ../../user/secretary/");
            }*/

        header("Location: ./");

    } else if($db_user_account_status == 0 || $db_user_archive_status == 1){

            header("Location: ./index.php?error=2");

           }

}

if(isset($_GET['adramoneda_logout'])){

    $_SESSION['adramoneda_dms_username'] = null;
    $_SESSION['adramoneda_dms_uID'] = null;
    $_SESSION['adramoneda_dms_firstname'] = null;
    $_SESSION['adramoneda_dms_middlename'] = null;
    $_SESSION['adramoneda_dms_lastname'] = null;
    $_SESSION['adramoneda_dms_password'] = null;
    $_SESSION['adramoneda_dms_user_role'] = null;
    $_SESSION['adramoneda_dms_email'] = null;

    header("Location: ./?logout");

}

?>
