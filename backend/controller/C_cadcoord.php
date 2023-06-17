<?php
    require_once "../model/M_user.php";
    $coordNome = $_POST['coordnome'];
    $coordSenha= $_POST['coordsenha'];
    $coordEmail = $_POST['coordemail'];
    $coordNasc = $_POST['coordnasc'];
    $coordCurso = $_POST['coordcurso'];
    $Muser = new M_User(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
    $Muser->setUsu_nome($coordNome);
    $Muser->setUsu_senha($coordSenha);
    $Muser->setUsu_coordenador(1);
    $Muser->setUsu_email($coordEmail);
    $Muser->setUsu_nasc($coordNasc);
    $Muser->setUsu_cur_id($coordCurso);

    $Muser->cadCoordenador($Muser->getUsu_nome(),$Muser->getUsu_email(),$Muser->getUsu_nasc(),$Muser->getUsu_senha(),$Muser->getUsu_cur_id(),$Muser->getUsu_coordenador());
    echo "<script> alert('Docente cadastrado com sucesso'); window.location.href='../view/browser/admin/cadCoord.php' </script>";