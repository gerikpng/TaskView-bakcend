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
  ?>
    <a href="../index.php">INICIO</a>
        <form action="../../../controller/C_cadcampus.php" method="POST">
            <input type="text" name="nomeCampus">
            <input type="submit" value="CADASTRAR">

        </form> 
        
        <a href="../../controller/C_deslogar.php">SAIR</a>
        <?php echo $_SESSION['usu_nome']; ?>
    </body>
</html>