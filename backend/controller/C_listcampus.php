<?php
    include_once "../../../model/M_campus.php";
    $campus = new Campus(NULL,NULL);
    $listaCampus = $campus->listarCampus();
    ?>