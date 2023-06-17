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

$q = intval($_GET['q']);
$Matividade->setGru_id($q);
$resultAtividade = $Matividade->listarAtividade($Matividade->getGru_id());

echo "<table>
<tr>
<th>Nome</th>
<th>Horas Total</th>
<th>Horas Semestre</th>
<th>Horas envio</th>
<th>Comprobatorio</th>
</tr>";
while($row = mysqli_fetch_array($resultAtividade)) {
  echo "<tr>";
  echo "<td>" . $row['ati_nome'] . "</td>";
  echo "<td>" . $row['ati_horastotal'] . "</td>";
  echo "<td>" . $row['ati_horassemestre'] . "</td>";
  echo "<td>" . $row['ati_horasenvio'] . "</td>";
  echo "<td>" . $row['ati_comprobatorio'] . "</td>";
  echo "</tr>";
}
echo "</table>";
?>
</body>
</html>