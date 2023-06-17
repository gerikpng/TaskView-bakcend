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
    require_once "../../../controller/C_listcampus.php";
  ?>
    <a href="../index.php">INICIO</a>
        <form action="../../../controller/C_cadcurso.php" method="POST">
            <select name="Curcampus">
                <?php
                    while($row = $listaCampus->fetch_assoc()){
                        echo "<option value='".$row['cam_id']."'>".$row['cam_nome']."</option>";
                    }
                ?>
                
            </select>
            <input type="text" name="Curnome">
            <input type="submit" value="CADASTRAR">

        </form> 
        
        <a href="../../controller/C_deslogar.php">SAIR</a>
        <?php echo $_SESSION['usu_nome']; ?>
    </body>
</html>