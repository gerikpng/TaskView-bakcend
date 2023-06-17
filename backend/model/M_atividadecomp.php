<?php
require_once 'conection.php';
    class M_AtividadeComp{
        private $env_id;
        private $env_descricao;
        private $env_arquivo;
        private $gru_id;
        private $ati_id;
        private $env_situacao;
        private $alu_matricula;
        private $env_hora;
        private $env_data;
        function __construct($ati_id,$env_id,$env_descricao,$env_arquivo,$gru_id,$env_situacao,$env_hora,$env_data,$alu_matricula)
        {
            $this->env_id = $env_id;
            $this->env_descricao = $env_descricao;
            $this->env_arquivo = $env_arquivo;
            $this->gru_id = $gru_id;
            $this->ati_id = $ati_id;
            $this->env_situacao = $env_situacao;
            $this->alu_matricula = $alu_matricula;
            $this->env_hora = $env_hora;
            $this->env_data = $env_data;
        }
        function getAti_id(){
            return $this->ati_id;
        }
        function getEnv_id(){
            return $this->env_id;
        }
        function getEnv_descricao(){
            return $this->env_descricao;
        }
        function getGru_id(){
            return $this->gru_id;
        }
        function getEnv_arquivo(){
            return $this->env_arquivo;
        }
        function getEnv_situacao(){
            return $this->env_situacao;
        }
        function getEnv_hora(){
            return $this->env_hora;
        }
        function getEnv_data(){
            return $this->env_data;
        }
        function getAlu_matricula(){
            return $this->alu_matricula;
        }


        function setEnv_id($env_id){
            $this->env_id = $env_id;
        }
        function setEnv_descricao($env_descricao){
            $this->env_descricao = $env_descricao;
        }
        function setAti_id($ati_id){
            $this->ati_id = $ati_id;
        }
        function setEnv_arquivo($env_arquivo){
            $this->env_arquivo = $env_arquivo;
        }
        function setAlu_matricula($alu_matricula){
            $this->alu_matricula = $alu_matricula;
        }
        function setGru_id($gru_id){
            $this->gru_id = $gru_id;
        }
        function setEnv_situacao($env_situacao){
            $this->env_situacao = $env_situacao;
        }
        function setEnv_hora($env_hora){
            $this->env_hora = $env_hora;
        }
        function setEnv_data($env_data){
            $this->env_data = $env_data;
        }
        function listarMinhaAtividadeGrupo($alu_matricula){
            $sql = "SELECT * FROM tb_envio WHERE alu_matricula = ".$alu_matricula." AND env_situacao LIKE 'aprovado'";
            $Conexao = new Conexao();
        
            $Conexao->conectar();
            $result = $Conexao->pesquisarSQL($sql);
            $Conexao->desconectar();

            return $result;
        }
        function calculaMinhaAtividadeGrupo($alu_matricula,$grupo){
            $sql = "SELECT * FROM tb_envio WHERE alu_matricula = ".$alu_matricula." AND env_situacao LIKE 'aprovado'";
            $Conexao = new Conexao();
        
            $Conexao->conectar();
            $result = $Conexao->pesquisarSQL($sql);
            $Conexao->desconectar();

            return $result;
        }
        function cadastrarAtividadeComp($descricao,$arquivo,$gruid,$atiid,$horas,$matricula,$data){
            $sql = "INSERT INTO `tb_envio` (`env_id`, `env_descricao`, `env_arquivo`, `gru_id`, `ati_id`, `env_situacao`, `alu_matricula`, `env_hora`, `env_data`)
             VALUES (NULL, '".$descricao."', ".$arquivo.", ".$gruid.", ".$atiid.", 'aprovado', ".$matricula.", ".$horas.", ".$data.");";
            $Conexao = new Conexao();
        
            $Conexao->conectar();
            $Conexao->executarSQL($sql);
            $Conexao->desconectar();
        }
    }

