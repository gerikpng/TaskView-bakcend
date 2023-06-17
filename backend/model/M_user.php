<?php

require_once 'conection.php';

class M_User {

    private $usu_id;
    private $usu_nome;
    private $usu_nasc;
    private $usu_matricula;
    private $usu_cur_id;
    public $usu_senha;
    private $usu_coordenador;
    private $usu_aluno;
    private $usu_admin;
    public $usu_email;

    function __construct($usu_id,$usu_nome,$usu_nasc,$usu_matricula,$usu_cur_id,$usu_senha,$usu_coordenador,$usu_aluno,$usu_admin,$usu_email) {
        $this->usu_id = $usu_id;
        $this->usu_nome = $usu_nome;
        $this->usu_nasc = $usu_nasc;
        $this->usu_matricula = $usu_matricula;
        $this->usu_cur_id = $usu_cur_id;
        $this->usu_senha = $usu_senha;
        $this->usu_coordenador = $usu_coordenador;
        $this->usu_aluno = $usu_aluno;
        $this->usu_admin = $usu_admin;
        $this->usu_email = $usu_email;
    }
        function getUsu_id(){
            return $this->usu_id;
        }
        function getUsu_nome(){
            return $this->usu_nome;
        }
        function getUsu_nasc(){
            return $this->usu_nasc;
        }
        function getUsu_matricula(){
            return $this->usu_matricula;
        }
        function getUsu_cur_id(){
            return $this->usu_cur_id;
        }
        function getUsu_senha(){
            return $this->usu_senha;
        }
        function getUsu_coordenador(){
            return $this->usu_coordenador;
        }
        function getUsu_aluno(){
            return $this->usu_aluno;
        }
        function getUsu_admin(){
            return $this->usu_admin;
        }
        function getUsu_email(){
            return $this->usu_email;
        }
        function setUsu_id($usu_id){
            $this->usu_id = $usu_id;
        }
        function setUsu_nome($usu_nome){
            $this->usu_nome = $usu_nome;
        }
        function setUsu_nasc($usu_nasc){
            $this->usu_nasc = $usu_nasc;
        }
        function setUsu_matricula($usu_matricula){
            $this->usu_matricula = $usu_matricula;
        }
        function setUsu_cur_id($usu_cur_id){
            $this->usu_cur_id = $usu_cur_id;
        }
        function setUsu_senha($usu_senha){
            $this->usu_senha = $usu_senha;
        }
        function setUsu_coordenador($usu_coordenador){
            $this->usu_coordenador = $usu_coordenador;
        }
        function setUsu_aluno($usu_aluno){
            $this->usu_aluno = $usu_aluno;
        }
        function setUsu_admin($usu_admin){
            $this->usu_admin = $usu_admin;
        }
        function setUsu_email($usu_email){
            $this->usu_email = $usu_email;
        }
        function efetuarLogin($usu_email,$usu_senha){
            $sql = "SELECT * FROM tb_usuario WHERE usu_email LIKE '".$usu_email."' AND usu_senha LIKE '".$usu_senha."'";
            $Conexao = new Conexao();

            $Conexao->conectar();
            $result_login = $Conexao->pesquisarSQL($sql);
            $Conexao->desconectar();

            return $result_login;
        }
        function cadCoordenador($nome,$email,$nasc,$senha,$curso,$coord){
            $sql = "INSERT INTO `tb_usuario` (`usu_id`, `usu_nome`, `usu_nascimento`, `cur_id`, `usu_senha`, `usu_coordenador`, `usu_email`) 
            VALUES (NULL, '".$nome."', '".$nasc."', ".$curso.", '".$senha."', ".$coord.", '".$email."');";

            $conexao = new Conexao();
            $conexao->conectar();
            $conexao->executarSQL($sql);
            $conexao->desconectar();
        }
        function listarCoordenador(){
            $sql = "SELECT * FROM tb_usuario INNER JOIN tb_curso ON tb_usuario.cur_id = tb_curso.cur_id AND tb_usuario.usu_coordenador = 1 INNER JOIN tb_campus ON tb_campus.cam_id = tb_curso.cam_id order by tb_campus.cam_nome;";
            $conexao = new Conexao();
            $conexao->conectar();
            $result = $conexao->pesquisarSQL($sql);
            $conexao->desconectar();

            return $result;
        }
        function cadAluno($usunome, $usumatricula, $curid, $ususenha,$usuemail)
        {
            $conexao = new Conexao();
            $sql = "SELECT usu_matricula FROM tb_usuario WHERE usu_matricula = ".$usumatricula;
            $conexao->conectar();
            $result = $conexao->pesquisarSQL($sql);
            $conexao->desconectar();
            $insert = NULL;
            if (mysqli_num_rows($result) == 0) {
                $ususenha = "IF.".$ususenha;
                //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT into tb_usuario (usu_id,usu_nome,usu_matricula,cur_id,usu_senha,usu_aluno,usu_email)
                           values (NULL,'".$usunome."',".$usumatricula.",".$curid.",'".$ususenha."',1,'".$usuemail."')";
                $conexao->conectar();
                $conexao->executarSQL($sql);
                $conexao->desconectar();
                $insert = 1;
            }
            return $insert;
        }
        function linhaVazia(array $column)
        {
            $columnCount = count($column);
            $isEmpty = true;
            for ($i = 0; $i < $columnCount; $i ++) {
                if (! empty($column[$i]) || $column[$i] !== '') {
                    $isEmpty = false;
                }
            }
            return $isEmpty;
        }
        function readUserRecords()
        {
            $fileName = $_FILES["file"]["tmp_name"];
            if ($_FILES["file"]["size"] > 0) {
                $file = fopen($fileName, "r");
                $importCount = 0; // exibir "65 USUARIOS CADASTRADOS"
                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
    
                    if (! empty($column) && is_array($column)) {
                        if ($this->linhaVazia($column)) {
                            continue;
                        }
                        if (isset($column[1], $column[3], $column[4])) {
                            $userName = $column[0];
                            $userMatricula = $column[1];
                            $curId = $column[2];
                            $usuSenha = $column[3];
                            $usuEmail = $column[4];
                            $insertId = $this->cadAluno($userName, $userMatricula, $curId, $usuSenha,$usuEmail);
                            
                            if ($insertId != NULL) {
                                $output["type"] = "success";
                                $output["message"] = ($importCount+1)." Import completed.";
                                $importCount ++;
                            }
                        }
                    } else {
                        $output["type"] = "error";
                        $output["message"] = "Problem in importing data.";
                    }
                }
                if ($importCount == 0) {
                    $output["type"] = "error";
                    $output["message"] = "Duplicate data found.";
                }
                return $output;
                
            }
        
        }
        function listarAluno()
    {
        $sqlSelect = "SELECT * FROM tb_usuario WHERE usu_aluno = 1";
        $conexao = new Conexao();
            $conexao->conectar();
            $result = $conexao->pesquisarSQL($sqlSelect);
            $conexao->desconectar();
        return $result;
    }
        
    
}