<?php
    require_once "../model/M_curso.php";
    $campusID = $_POST['Curcampus'];
    $cursoName = $_POST['Curnome'];
    $Mcurso = new Curso(NULL,NULL,NULL);
    $Mcurso->setCurnome($cursoName);
    $Mcurso->setCamid($campusID);
    $Mcurso->cadCurso($Mcurso->getCurnome(),$Mcurso->getCamid());
    echo "<script> alert('curso cadastrado com sucesso'); window.location.href='../view/browser/admin/cadCurso.php' </script>";