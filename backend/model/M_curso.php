<?php
require_once 'conection.php';
    class Curso{
        private $cur_id;
        private $cam_id;
        private $cur_nome;
        function __construct($cam_id,$cur_nome,$cur_id)
        {
            $this->cur_id = $cur_id;
            $this->cam_id = $cam_id;
            $this->cur_nome = $cur_nome;
        }
        function getCurid(){
            return $this->cur_id;
        }
        function getCamid(){
            return $this->cam_id;
        }
        function getCurnome(){
            return $this->cur_nome;
        }
        function setCurid($cur_id){
            $this->cur_id = $cur_id;
        }
        function setCamid($cam_id){
            $this->cam_id = $cam_id;
        }
        function setCurnome($cur_nome){
            $this->cur_nome = $cur_nome;
        }
        function cadCurso($nome,$campus){
            $sql = "INSERT INTO `tb_curso` (`cur_id`, `cur_nome`, `cam_id`) VALUES (NULL, '".$nome."', ".$campus.");";
            $Conexao = new Conexao();
        
            $Conexao->conectar();
            $Conexao->executarSQL($sql);
            $Conexao->desconectar();
        }
        function listarCurso(){
            $sql = "SELECT * FROM tb_curso";
            $Conexao = new Conexao();
        
            $Conexao->conectar();
            $result = $Conexao->pesquisarSQL($sql);
            $Conexao->desconectar();

            return $result;
        }
        function buscarCurso($id){
            $sql = "SELECT * FROM tb_curso WHERE cur_id = ".$id;
            $Conexao = new Conexao();
        
            $Conexao->conectar();
            $result = $Conexao->pesquisarSQL($sql);
            $Conexao->desconectar();
            return $result;
        }
    }

