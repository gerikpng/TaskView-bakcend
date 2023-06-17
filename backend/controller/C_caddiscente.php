<?php

require_once "../../../model/M_User.php";
$userModel = new M_User(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
if (isset($_POST["import"])) {
    $response = $userModel->readUserRecords();
}
?>