<?php
require_once "../../../model/M_atividade.php";
$Matividade = new M_Atividade(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
$q = intval($row['gru_id']);
$Matividade->setGru_id($q);
$resultAtividade = $Matividade->listarAtividade($Matividade->getGru_id()); 
while($row = mysqli_fetch_array($resultAtividade)) {
 echo "<p>" . $row['ati_nome'] . "</p>";
}
?>