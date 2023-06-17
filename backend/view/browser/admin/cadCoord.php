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
    require_once "../../../controller/C_listcurso.php";
    require_once "../../../controller/C_listcoord.php";
  ?>
    <a href="../index.php">INICIO</a>
        <form action="../../../controller/C_cadcoord.php" method="POST">
            <select name="coordcurso">
                <?php
                    while($row = $listaCampus->fetch_assoc()){
                        echo "<option value='".$row['cur_id']."'>".$row['cur_nome']."</option>";
                    }
                ?>
                
            </select>
            <input type="text" name="coordnome" placeholder="NOME">
            <input type="text" name="coordemail" placeholder="EMAIL">
            <input type="password" name="coordsenha" placeholder="SENHA">
            <input type="date" name="coordnasc">
            <input type="submit" value="CADASTRAR">

        </form> 


        
        <a href="../../controller/C_deslogar.php">SAIR</a>
        <?php echo $_SESSION['usu_nome']; ?>
        <br><br>
        <table>
        <tr>
            <th>Nome</th>
            <th>Curso</th>
            <th>Email</th>
            <th>Campus</th>
        </tr>
        <?php
            while($row = $listaCoord->fetch_assoc()){
                echo "<tr><td>".$row['usu_nome']."</td><td>".$row['cur_nome']."</td><td>".$row['usu_email']."</td><td>".$row['cam_nome']."</td></tr>";
            }
        ?>
                </table>
    </body>
</html>