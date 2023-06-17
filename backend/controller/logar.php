<?php
    require_once "../model/M_user.php";
    session_start();
    $email = $_POST['login'];
    $password = $_POST['password'];
    $M_User = new M_User("","","","","",$password,"","","",$email);
    $result = $M_User->efetuarLogin($M_User->getUsu_email(),$M_User->getUsu_senha());
    if(mysqli_num_rows($result)>0){
        $row = $result->fetch_assoc();
        $_SESSION['usu_id'] = $row['usu_id'];
        $_SESSION['usu_nome'] = $row['usu_nome'];
        $_SESSION['usu_nascimento'] = $row['usu_nascimento'];
        $_SESSION['cur_id'] = $row['cur_id'];
        $_SESSION['usu_senha'] = $row['usu_senha'];
        $_SESSION['usu_email'] = $row['usu_email'];
        
        $_SESSION['cur_id'] = $row['cur_id'];
        if($row['usu_coordenador'] != NULL){
            $_SESSION['usu_coordenador'] = 1;
        }
        if($row['usu_admin'] != NULL){
            $_SESSION['usu_admin'] = 1;
        }
        if($row['usu_aluno'] != NULL){
            $_SESSION['usu_matricula'] = $row['usu_matricula'];
            $_SESSION['usu_aluno'] = 1;
        }
        echo "<script> alert('logado com sucesso'); window.location.href='../view/browser/index.php' </script>";
        
    }else{
        echo "<script> alert('usuario ou senha incorretos'); window.location.href='../view/index.php' </script>";
    }
