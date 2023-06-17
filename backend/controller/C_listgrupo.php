<?php
    include_once "../../../model/M_grupo.php";
    $Mgrupo = new M_Grupo(NULL,NULL,NULL,NULL);
    $listaGrupo = $Mgrupo->listarGrupo($_SESSION['cur_id']);
    ?>