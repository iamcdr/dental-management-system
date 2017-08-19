<?php

function confirm($result){
    global $connection;
    if(!$result){

        die("QUERY FAILED ." . mysqli_error($connection));

    }

}



function insertCategory(){

global $connection;

if(isset($_POST['submit'])){

                                $cat_title = $_POST['cat_title'];

                                if($cat_title == "" || empty($cat_title)){


                                    echo "This field should not be empty.";
                                } else {


                                    $query = "INSERT into category(cat_title) ";
                                    $query .= "VALUE('{$cat_title}')";

                                    $create_category_query = mysqli_query($connection, $query);
                                }

                            }


}


function findAllCategory(){

    global $connection;

$query = "SELECT * FROM category";
$category_sidebar_result = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($category_sidebar_result)){

$cat_title = $row['cat_title'];
$cat_id = $row['cat_id'];

echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
echo "</tr>";
}




}



function deleteCategory(){

    global $connection;
     if(isset($_GET['delete'])){

         $del_cat = $_GET['delete'];
         $query = "DELETE FROM category WHERE cat_id = {$del_cat} ";

         $delete_query = mysqli_query($connection, $query);

         header("Location: categories.php");
     }
}

function insertAuditTrailData($role,$type,$remarks,$date_created = null)
    {
        global $connection;
        $user_id = $_SESSION['uID'];

        if(empty($date_created))
            $date_created = date("Y-m-d H:i:s");

        $query = "INSERT INTO audit_trail(user_id, account_role, audit_type, remarks, date_created) VALUES ({$user_id}, '{$role}','{$type}','{$remarks}','{$date_created}') ";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('Invalid query: ' . mysqli_error());
        }

        return mysqli_insert_id($connection);
    }

function getPatientName($user_id)
    {
         global $connection;

        $query = "SELECT * FROM users ";
        $query .= "WHERE uID = {$user_id}";

        $getnameresult = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($getnameresult);

        return $row['lastname']. " " . $row['firstname'] . ", " . $row['middlename'];

    }

function getPatientNameFirstNameFirst($id){

    global $connection;

        $query = "SELECT * FROM users ";
        $query .= "WHERE uID = {$id}";

        $getnameresult = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($getnameresult);

        return $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];
}

function getAccountName($user_id)
{
        global $connection;

        $query = "SELECT * FROM users ";
        $query .= "WHERE uID = {$user_id}";

        $getacctnameresult = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($getacctnameresult);

        return $row['firstname'] . " " . $row['lastname'];


}

function randomPassword($length) {

    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);

}

function getImageFile($id){
    global $connection;

    $query = "SELECT * FROM fileupload WHERE id = '{$id}'";

    $row = mysqli_fetch_assoc(mysqli_query($connection, $query));

    return $row['filename'];
}

function getDocumentFile($id){
    global $connection;

    $query = "SELECT * FROM fileupload WHERE id = '{$id}'";

    $row = mysqli_fetch_assoc(mysqli_query($connection, $query));

    return $row['filename'];
}

function getDocumentType($id){
    global $connection;

    $query = "SELECT * FROM document_type WHERE id = '{$id}'";
    $row = mysqli_fetch_assoc(mysqli_query($connection, $query));

    return $row['description'];
}

function getMedicalQuestionType($id){
    global $connection;

    $query = "SELECT * FROM health_history_type WHERE id = '{$id}' ";
    $row = mysqli_fetch_assoc(mysqli_query($connection, $query));

    return $row['health_type'];
}

function convertTooth($looptooth){
    global $connection;

    $query = "SELECT * FROM tooth WHERE looptooth = {$looptooth}";
    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($result);

    return $row['toothoutput'];
}

function isLoginSessionExpired() {
    $login_session_duration = 900;
    $current_time = time();
    if(isset($_SESSION['loggedin_time']) && isset($_SESSION["uID"])){
        if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){
            return true;
        }
    }
    return false;
}

function getLegendsDetails($id){
    global $connection;

    $query = "SELECT * FROM legends WHERE id = {$id}";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['description'];
}

function convertSurface($code, $convertedtooth){
    global $connection;

    $surface = str_split($code);
    $location = str_split($convertedtooth);
        //1&2 1-3 Anterior
        //4&3 1-3 Posterior
if($location[0] == 1 || $location[0] == 2){
$up = "Labial";
$down = "Lingual";
} else {
    $up = "Lingual";
    $down = "Labial";
}

if($location[0] == 1 || $location[0] == 4){
    $right = "Distal";
    $left = "Mesial";
} else {
    $right = "Mesial";
    $left = "Distal";
}

if($location[1] >= 4 && $location[1] <= 8){
    $center = "Occlusal";
    if($location[0] == 1 || $location[0] == 2){
    $up = "Buccal";
    } else {
        $down = "Buccal";
    }
} else {
    $center = "Incisal";
}


    $toothsurface = "<p>";
        for($i=0;$i<=4;$i++){
            if ($surface[$i] == 1){
                if($i == 0){
                    if($location[1] >= 4 && $location[1] <= 8){
                        $toothsurface .= "-Occlusal<br/>";
                    } else {
                        $toothsurface .= "-Incisal<br/>";
                    }
                } else if($i == 1){
                    if($location[1] >= 4 && $location[1] <= 8){
                        if($location[0] == 1 || $location[0] == 2){
                            $toothsurface .= "-Buccal<br/>";
                        } else {
                            $toothsurface .= "-Lingual<br/>";
                        }
                    } else {
                        if($location[0] == 1 || $location[0] == 2){
                            $toothsurface .= "-Labial<br/>";
                        } else {
                            $toothsurface .= "-Lingual<br/>";
                        }
                    }
                } else if($i == 2){
                    if($location[0] == 1 || $location[0] == 4){
                        $toothsurface .= "-Mesial<br/>";
                    } else {
                        $toothsurface .= "-Distal<br/>";
                    }

                } else if($i == 3){
                    if($location[1] >= 4 && $location[1] <= 8){
                        if($location[0] == 3 || $location[0] == 4){
                            $toothsurface .= "-Buccal<br/>";
                        } else {
                            $toothsurface .= "-Lingual<br/>";
                        }
                    } else {
                        if($location[0] == 3 || $location[0] == 4){
                            $toothsurface .= "-Labial<br/>";
                        } else {
                            $toothsurface .= "-Lingual<br/>";
                        }
                    }
                } else if($i == 4){
                    if($location[0] == 2 || $location[0] == 3){
                        $toothsurface .= "-Mesial<br/>";
                    } else {
                        $toothsurface .= "-Distal<br/>";
                    }
                }
            }
        }

    $toothsurface .= "</p>";
    return $toothsurface;
}

function getTime($id){
    global $connection;

    $query = "SELECT * FROM time WHERE id = {$id}";
    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($result);

    return $row['time'];
}

function convertToLegend($id){
    global $connection;

    $query = "SELECT * FROM legends WHERE id = {$id}";
    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($result);

    return $row['code'];
}

?>

    <!--FOR SCRIPT ONLY-->
    <script>
        function MyNewObject() {
            if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                var xmlhttp = new XMLHttpRequest();
            } else { // code for IE6, IE5
                var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            return xmlhttp;
        }

        function alertNotification(xmlhttp, divID) {
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById(divID).innerHTML = xmlhttp.responseText;
                }
            }
        }

    </script>
