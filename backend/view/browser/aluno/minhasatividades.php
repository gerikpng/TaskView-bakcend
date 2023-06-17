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
                <?php
                    while($row = $listaGrupo->fetch_assoc()){
                        echo "<h2>".$row['gru_nome']."</h2>";
                        include "../../../controller/C_listminsolicitacao.php";

                    }
                ?>
        
        <a href="../../controller/C_deslogar.php">SAIR</a>
        <?php echo $_SESSION['usu_nome']; ?>
    </body>
</html>