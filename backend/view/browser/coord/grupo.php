<html>
    <head>
    </head>
    <body>
    <?php
session_start();
if (!isset($_SESSION)) {
      echo "<script type='text/javascript'>
    location.href='../index.php';
     </script>";
    }
    require_once "../../../controller/C_listgrupo.php";
  ?>
  
    <a href="../index.php">INICIO</a>
        <form action="../../../controller/C_cadgrupo.php" method="POST">
            <input type="text" name="grunome" placeholder="NOME GRUPO">
            <input type="text" name="gruhora" placeholder="HORA TOTAL GRUPO">
            <input type="text" name="curid" value="<?php echo $_SESSION['cur_id']?>" hidden>
            <input type="submit" value="CADASTRAR GRUPO">
        </form> 
        <hr>
        <form action="../../../controller/C_cadatividade.php" method="POST">
            <select name="gruid" onchange="showUser(this.value)">
                <option value="">Selecione um Grupo:</option>
                <?php
                    while($roww = $listaGrupo->fetch_assoc()){
                        echo "<option value='".$roww['gru_id']."'>".$roww['gru_nome']."</option>";
                    }
                ?>
            </select>
            <input type="text" name="atinome" placeholder="NOME ATIVIDADE">
            <input type="number" name="atihoratotal" placeholder="HORAS TOTAL">
            <input type="number" name="atihorasemestre" placeholder="HORAS POR SEMESTRE">
            <input type="number" name="atihoraenvio" placeholder="HORAS CADA ENVIO">
            <input type="text" name="aticomprov" placeholder="DOCUMENTO COMPROVAÇÃO">
            <input type="submit" value="CADASTRAR ATIVIDADE">
        </form>
        
        <a href="../../controller/C_deslogar.php">SAIR</a>
        <?php echo $_SESSION['usu_nome']; ?><br><br>
        <div id="txtHint"><b>Person info will be listed here.</b></div>
        <script>
            
            console.log(document.getElementsByName('gruid').value);
            function showUser(str) {
            if (str=="") {
                document.getElementById("txtHint").innerHTML="";
                return;
            }
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                document.getElementById("txtHint").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET","../../../controller/C_listatividade.php?q="+str,true);
            xmlhttp.send();
            }
    </script>
    </body>
</html>