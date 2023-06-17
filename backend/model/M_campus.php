<?php
require_once 'conection.php';
    class Campus{
        private $cam_id;
        private $cam_nome;
        function __construct($cam_id,$cam_nome)
        {
            $this->cam_id = $cam_id;
            $this->cam_nome = $cam_nome;
        }
        function getCamid(){
            return $this->cam_id;
        }
        function getCamnome(){
            return $this->cam_nome;
        }
        function setCamid($cam_id){
            $this->cam_id = $cam_id;
        }
        function setCamnome($cam_nome){
            $this->cam_nome = $cam_nome;
        }
        function cadCampus($nome){
            $sql = "INSERT INTO `tb_campus` (`cam_id`, `cam_nome`) VALUES (NULL, '".$nome."');";
            $Conexao = new Conexao();
        
            $Conexao->conectar();
            $Conexao->executarSQL($sql);
            $Conexao->desconectar();
        }
        function listarCampus(){
            $sql = "SELECT * FROM tb_campus";
            $Conexao = new Conexao();
        
            $Conexao->conectar();
            $result = $Conexao->pesquisarSQL($sql);
            $Conexao->desconectar();

            return $result;
        }
        function buscarCampus($id){
            $sql = "SELECT * FROM tb_campus WHERE cam_id = ".$id;
            $Conexao = new Conexao();
        
            $Conexao->conectar();
            $result = $Conexao->pesquisarSQL($sql);
            $Conexao->desconectar();
            return $result;
        }
    }

