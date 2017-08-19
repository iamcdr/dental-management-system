<?php

if(isset($_POST['change_password'])){
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $renewpassword = $_POST['renewpassword'];
    $user_id = $_SESSION['adramoneda_dms_uID'];


    //CHECK user old password
        $rowGetUserPass = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM users WHERE uID = {$user_id}"));
    //get SALT
        $randSALT = mysqli_fetch_assoc(mysqli_query($connection, "SELECT randSalt FROM users LIMIT 1"));
        $randSalt = $randSALT['randSalt'];

    $oldpassword = crypt($oldpassword, $rowGetUserPass['password']);

    if($oldpassword !== $rowGetUserPass['password']){
        header("Location: settings.php?oldmismatch");
    }

    //CHECK retyped password
    if($newpassword !== $renewpassword){
        header("Location: settings.php?mismatch");
    }

    //UPDATE PASSWORD
    if($oldpassword == $rowGetUserPass['password'] && $newpassword == $renewpassword){

        $newpassword = crypt($newpassword, $randSalt);

        $queryUpdatePassword = "UPDATE users SET password = '{$newpassword}' WHERE uID = {$user_id}";

        $resultUpdatePassword = mysqli_query($connection, $queryUpdatePassword);

        header("Location: settings.php?success");

    }
}
