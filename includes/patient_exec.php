<?php

if(isset($_POST['add_new_patient'])){
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $firstname = ucwords($firstname);
    $middlename = mysqli_real_escape_string($connection, $_POST['middlename']);
    $middlename = ucwords($middlename);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $lastname = ucwords($lastname);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $birthday = $_POST['dob'];
    $age = $_POST['age'];
    $address = $_POST['address1'] . " " . ucwords($_POST['address2']) . " " . ucwords($_POST['address3']);
    $occupation = $_POST['occupation'];
    $nationality = $_POST['nationality'];
    $religion = $_POST['religion'];
    $sex = $_POST['sex'];
    $status = $_POST['status'];
    $bloodtype = $_POST['bloodtype'];
    $contactno = $_POST['contactno'];
    $referred_by = $_POST['referred_by'];
    $chief_complaint = $_POST['chief_complaint'];
    $patient_type = $_POST['patient_type'];

    $queryPatient = "INSERT INTO patients (firstname, middlename, lastname, email, patient_type) VALUES ('{$firstname}', '{$middlename}', '{$lastname}', '{$email}', '{$patient_type}')";
    mysqli_query($connection, $queryPatient) or die(mysqli_error($connection));

    $patient_id = mysqli_insert_id($connection);

    $queryPProfile = "INSERT INTO patient_profile (patient_id,birthday,age,sex,bloodtype,status,address,religion, nationality,occupation,contactno,referred_by,chief_complaint) VALUES('{$patient_id}', '{$birthday}', '{$age}', '{$sex}', '{$bloodtype}', '{$status}', '{$address}', '{$religion}', '{$nationality}', '{$occupation}', '{$contactno}', '{$referred_by}', '{$chief_complaint}')";
    mysqli_query($connection, $queryPProfile) or die(mysqli_error($connection));

    $_SESSION['ALERTS']['ADD_SUCCESS'] = true;
    $_SESSION['POST'] = $_POST;

    header("Location: patients.php?s=add");
    exit();
}

if(isset($_POST['add_treatment'])){
    $patient_id = $_POST['patient_id'];
    $concern = $_POST['concern'];
    $estimated_amount = $_POST['estimated_amount'];
    $deposit = $_POST['deposit'];
    $balance = $_POST['balance'];
    $treatment_date = $_POST['treatment_date'];
    $treatment_details = mysqli_real_escape_string($connection, $_POST['treatment_details']);
    $treatment_details = "<b>" . $concern ."</b>" . "<br/>" . $treatment_details;

    //
    $queryTreatment = "INSERT INTO patient_treatment (patient_id, treatment_date, treatment_details, treatment_est_amount, treatment_deposit, treatment_balance) VALUES ('{$patient_id}', '{$treatment_date}', '{$treatment_details}', '{$estimated_amount}', '{$deposit}', '{$balance}')";
    mysqli_query($connection, $queryTreatment) or die(mysqli_error($connection));

    $_SESSION['POST'] = $_POST;

    header("Location: patients.php?s=record&id=$patient_id");
    exit();
}

if(isset($_POST['remove_patient'])){
    $patient_id = $_POST['patient_id'];

    mysqli_query($connection, "UPDATE patients SET archive_status = 1 WHERE patient_id = {$patient_id}");

    $_SESSION['ALERTS']['RMV_SUCCESS'] = true;

    header("Location: patients.php");
    exit();
}

if(isset($_POST['edit_patient'])){
    $patient_id = $_POST['patient_id'];
    $patient_type = $_POST['patient_type'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $status = $_POST['status'];
    $bloodtype = $_POST['bloodtype'];
    $address = $_POST['address'];
    $religion = $_POST['religion'];
    $nationality = $_POST['nationality'];
    $contactno = $_POST['contactno'];
    $referred_by = $_POST['referred_by'];
    $chief_complaint = $_POST['chief_complaint'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $occupation = $_POST['occupation'];

    //UPDATE profile
    mysqli_query($connection, "UPDATE patient_profile SET
    sex = '{$sex}',
    age = '{$age}',
    status = '{$status}',
    bloodtype = '{$bloodtype}',
    address = '{$address}',
    religion = '{$religion}',
    nationality = '{$nationality}',
    contactno = '{$contactno}',
    referred_by = '{$referred_by}',
    chief_complaint = '{$chief_complaint}',
    occupation = '{$occupation}'
    WHERE patient_id = {$patient_id}") or die(mysqli_error($connection));

    //UPDATE patientstbl
    mysqli_query($connection, "UPDATE patients SET patient_type = '{$patient_type}', lastname = '{$lastname}', firstname = '{$firstname}', middlename = '{$middlename}' WHERE patient_id = {$patient_id}") or die(mysqli_error($connection));

    $_SESSION['ALERTS']['EDT_SUCCESS'] = true;
    $_SESSION['POST'] = $_POST;

    header("Location: patients.php");
    exit();

}

if(isset($_POST['remove_treatment'])){
    $treatment_id = $_POST['treatment_id'];
    $patient_id = $_POST['patient_id'];

    mysqli_query($connection, "UPDATE patient_treatment SET archive_status = 1 WHERE treatment_id = {$treatment_id}");

    $_SESSION['ALERTS']['RMV_TR_SUCCESS'] = true;

    header("Location: patients.php?s=record&id=$patient_id");
    exit();
}
