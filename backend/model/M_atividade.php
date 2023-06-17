<?php
require_once 'conection.php';
    class M_Atividade{
        private $ati_id;
        private $ati_nome;
        private $gru_id;
        private $ati_horaTotal;
        private $ati_horaSemestre;
        private $ati_horaEnvio;
        private $ati_comprov;
        function __construct($ati_id,$ati_nome,$gru_id,$ati_horaTotal,$ati_horaSemestre,$ati_horaEnvio,$ati_comprov)
        {
            $this->ati_id = $ati_id;
            $this->ati_nome = $ati_nome;
            $this->gru_id = $gru_id;
            $this->ati_horaTotal = $ati_horaTotal;
            $this->ati_horaSemestre = $ati_horaSemestre;
            $this->ati_horaEnvio = $ati_horaEnvio;
            $this->ati_comprov = $ati_comprov;
        }
        function getAti_id(){
            return $this->ati_id;
        }
        function getAti_comprov(){
            return $this->ati_comprov;
        }
        function getAti_nome(){
            return $this->ati_nome;
        }
        function getGru_id(){
            return $this->gru_id;
        }
        function getAti_horaTotal(){
            return $this->ati_horaTotal;
        }
        function getAti_horaSemestre(){
            return $this->ati_horaSemestre;
        }
        function getAti_horaEnvio(){
            return $this->ati_horaEnvio;
        }
        function setAti_id($ati_id){
            $this->ati_id = $ati_id;
        }
        function setAti_comprov($ati_comprov){
            $this->ati_comprov = $ati_comprov;
        }
        function setAti_nome($ati_nome){
            $this->ati_nome = $ati_nome;
        }
        function setGru_id($gru_id){
            $this->gru_id = $gru_id;
        }
        function setAti_horaTotal($ati_horaTotal){
            $this->ati_horaTotal = $ati_horaTotal;
        }
        function setAti_horaSemestre($ati_horaSemestre){
            $this->ati_horaSemestre = $ati_horaSemestre;
        }
        function setAti_horaEnvio($ati_horaEnvio){
            $this->ati_horaEnvio = $ati_horaEnvio;
        }
        function cadAtividade($nome,$horatotal,$horasemestre,$horaenvio,$comprov,$grupo){
            $sql = "INSERT INTO `tb_atividade` (`ati_id`, `ati_nome`, `ati_horastotal`, `ati_horassemestre`, `ati_horasenvio`, `ati_comprobatorio`, `gru_id`) VALUES (NULL, '".$nome."', ".$horatotal.", ".$horasemestre.", ".$horaenvio.", '".$comprov."', ".$grupo.");";
            $Conexao = new Conexao();
        
            $Conexao->conectar();
            $Conexao->executarSQL($sql);
            $Conexao->desconectar();
        }
        function listarAtividade($grupo){
            $sql = "SELECT * FROM tb_atividade WHERE gru_id = ".$grupo;
            $Conexao = new Conexao();
        
            $Conexao->conectar();
            $result = $Conexao->pesquisarSQL($sql);
            $Conexao->desconectar();

            return $result;
        }
    }

