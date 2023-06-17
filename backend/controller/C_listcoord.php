<?php
    include_once "../../../model/M_User.php";
    $Muser = new M_User(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
    $listaCoord = $Muser->listarCoordenador();
    ?>