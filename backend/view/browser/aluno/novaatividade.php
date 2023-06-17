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
        <form action="../../../controller/C_cadsolicitacao.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="my_file" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" /><br /><br />
        <input type="text" name = "descricao">
        <select name="grupo" onchange="showUser(this.value)">
                <option value="">Selecione um Grupo:</option>
                <?php
                    while($roww = $listaGrupo->fetch_assoc()){
                        echo "<option value='".$roww['gru_id']."'>".$roww['gru_nome']."</option>";
                    }
                ?>
            </select>
            <div id="txtHint"><b>Person info will be listed here.</b></div>
        <input type="submit" name="submit" value="Upload"/>
        </form> 
        
        <a href="../../controller/C_deslogar.php">SAIR</a>
        <?php echo $_SESSION['usu_nome']; ?>
        <script>
            
            console.log(document.getElementsByName('grupo').value);
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
            xmlhttp.open("GET","../../../controller/C_listatividades.php?grupo="+str,true);
            xmlhttp.send();
            }
    </script>
    </body>
</html>