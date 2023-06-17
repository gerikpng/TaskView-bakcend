<?php
    include_once "../../../model/M_curso.php";
    $campus = new Curso(NULL,NULL,NULL);
    $listaCampus = $campus->listarCurso();
    ?>