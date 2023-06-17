<?php
    require_once "../model/M_atividade.php";
    $Matividade = new M_Atividade(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
    $atiNome = $_POST['atinome'];
    $gruId = $_POST['gruid'];
    $atiHoraTotal = $_POST['atihoratotal'];
    $atiHoraSemestre = $_POST['atihorasemestre'];
    $atiHoraEnvio = $_POST['atihoraenvio'];
    $atiComprov = $_POST['aticomprov'];
    $Matividade->setAti_nome($atiNome);
    $Matividade->setAti_comprov($atiComprov);
    $Matividade->setGru_id($gruId);
    $Matividade->setAti_horaTotal($atiHoraTotal);
    $Matividade->setAti_horaEnvio($atiHoraEnvio);
    $Matividade->setAti_horaSemestre($atiHoraSemestre);
    $Matividade->cadAtividade($Matividade->getAti_nome(),$Matividade->getAti_horaTotal(),$Matividade->getAti_horaSemestre(),$Matividade->getAti_horaEnvio(),$Matividade->getAti_comprov(),$Matividade->getGru_id());

  //  if($campus->cadCampus($campus->getCamnome())){
      echo "<script> alert('atividade cadastrada com sucesso'); window.location.href='../view/browser/coord/grupo.php' </script>";
  //  }
    ?>