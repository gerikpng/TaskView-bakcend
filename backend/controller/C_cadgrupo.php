<?php
    require_once "../model/M_grupo.php";
    $Mgrupo = new M_Grupo(NULL,NULL,NULL,NULL);
    $gruNome = $_POST['grunome'];
    $gruHora = $_POST['gruhora'];
    $curId = $_POST['curid'];
    $Mgrupo->setGru_nome($gruNome);
    $Mgrupo->setGru_hora($gruHora);
    $Mgrupo->setCur_id($curId);
    $Mgrupo->cadGrupo($Mgrupo->getGru_nome(),$Mgrupo->getGru_hora(),$Mgrupo->getCur_id());

  //  if($campus->cadCampus($campus->getCamnome())){
      echo "<script> alert('grupo cadastrado com sucesso'); window.location.href='../view/browser/coord/grupo.php' </script>";
  //  }
    ?>