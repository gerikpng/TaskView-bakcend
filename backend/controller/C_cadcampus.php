<?php
    require_once "../model/M_campus.php";
    $campus = new Campus(NULL,NULL);
    $nomeCampus = $_POST['nomeCampus'];
    $campus->setCamnome($nomeCampus);
    $campus->cadCampus($campus->getCamnome());
  //  if($campus->cadCampus($campus->getCamnome())){
        echo "<script> alert('campus cadastrado com sucesso'); window.location.href='../view/browser/admin/cadCampus.php' </script>";
  //  }
    ?>