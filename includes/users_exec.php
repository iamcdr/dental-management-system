<?php

if(isset($_POST['add_user'])){
    $lastname = $_POST['lastname'];
        $lastname = mysqli_real_escape_string($connection, $lastname);
    $firstname = $_POST['firstname'];
        $firstname = mysqli_real_escape_string($connection, $firstname);
    $middlename = $_POST['middlename'];
        $middlename = mysqli_real_escape_string($connection, $middlename);
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
        $username = mysqli_real_escape_string($connection, $username);
    $email = $_POST['email'];
        $email = mysqli_real_escape_string($connection, $email);
    $password = $_POST['password'];
        $password = mysqli_real_escape_string($connection, $password);
    $repassword = $_POST['repassword'];
        $repassword = mysqli_real_escape_string($connection, $repassword);

    //get salt value
    $randSALT = mysqli_fetch_array(mysqli_query($connection, "SELECT randSalt FROM users LIMIT 1"));
    $randSalt = $randSALT[0];

    //check if password match with repassword
    if($password == $repassword){
        $passwordFinal = crypt($password, $randSalt);

        //insert
        $queryAdd = "INSERT INTO users (username, password, firstname, middlename, lastname, email, user_role) VALUES ('{$username}', '{$passwordFinal}', '{$firstname}', '{$middlename}', '{$lastname}', '{$email}', '{$user_role}')";
        mysqli_query($connection, $queryAdd) or die(mysqli_error($connection));

        $_SESSION['POST'] = $_POST;
        $_SESSION['ALERTS']['ADD_SUCCESS'] = true;
        header("Location: users.php");
        exit();
    } else {
        $_SESSION['ALERTS']['FAILED_MISMATCH'] = true;
        header("Location: users.php?s=add");
        exit();
    }

}

if(isset($_GET['disacc'])&&isset($_GET['uid'])){
    $user_id = $_GET['uid'];

    $query = "UPDATE users SET archive_status = 1 WHERE user_id = {$user_id}";
    mysqli_query($connection, $query) or die(mysqli_error($connection));

    $_SESSION['ALERTS']['DISACC_SUCCESS'] = true;
    header("Location: users.php");
    exit();
}
