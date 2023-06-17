<?php
require_once 'conection.php';
    class M_Grupo{
        private $gru_id;
        private $gru_nome;
        private $gru_hora;
        private $cur_id;
        function __construct($gru_id,$gru_nome,$gru_hora,$cur_id)
        {
            $this->gru_id = $gru_id;
            $this->gru_nome = $gru_nome;
            $this->gru_hora = $gru_hora;
            $this->cur_id = $cur_id;
        }
        function getGru_id(){
            return $this->gru_id;
        }
        function getGru_nome(){
            return $this->gru_nome;
        }
        function getGru_hora(){
            return $this->gru_hora;
        }
        function getCur_id(){
            return $this->cur_id;
        }
        function setGru_id($gru_id){
            $this->gru_id = $gru_id;
        }
        function setGru_nome($gru_nome){
            $this->gru_nome = $gru_nome;
        }
        function setGru_hora($gru_hora){
            $this->gru_hora = $gru_hora;
        }
        function setCur_id($cur_id){
            $this->cur_id = $cur_id;
        }
        function cadGrupo($nome,$hora,$curso){
            $sql = "INSERT INTO `tb_grupo` (`gru_id`, `gru_nome`, `gru_horatotal`, `cur_id`) VALUES (NULL, '".$nome."', ".$hora.", ".$curso.");";
            $Conexao = new Conexao();
        
            $Conexao->conectar();
            $Conexao->executarSQL($sql);
            $Conexao->desconectar();
        }
        function listarGrupo($curso){
            $sql = "SELECT * FROM tb_grupo WHERE cur_id =".$curso;
            $Conexao = new Conexao();
        
            $Conexao->conectar();
            $result = $Conexao->pesquisarSQL($sql);
            $Conexao->desconectar();

            return $result;
        }
    }

