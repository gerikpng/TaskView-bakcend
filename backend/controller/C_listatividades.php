<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
require_once "../model/M_atividade.php";
$Matividade = new M_Atividade(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
$q = intval($_GET['grupo']);
$Matividade->setGru_id($q);
$resultAtividade = $Matividade->listarAtividade($Matividade->getGru_id()); 

echo "<select name='atividade'>";
while($row = mysqli_fetch_array($resultAtividade)) {
 echo "<option value = '".$row['ati_id']."'>" . $row['ati_nome'] . "</option>";
}
echo "</select>";
?>
</body>
</html>