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
        <?php 
        if(isset($_SESSION['usu_coordenador'])){
            echo "<a href='./coord/cadDiscentes.php'>CADASTRAR DISCENTES</a><br>";
            echo "<a href='./coord/discentes.php'>DISCENTES</a><br>";
            echo "<a href='./coord/grupo.php'>GRUPOS</a><br>";
            }
            if(isset($_SESSION['usu_admin'])){
                echo "<a href='./admin/cadCampus.php'>CAMPUS</a><br>";
                echo "<a href='./admin/cadCurso.php'>CURSO</a><br>";
                echo "<a href='./admin/cadCoord.php'>DOCENTES</a><br>";
            } 
            if(isset($_SESSION['usu_aluno'])){
                echo "<a href='./aluno/novaAtividade.php'>NOVA ATIVIDADE</a><br>";
                echo "<a href='./aluno/minhasAtividades.php'>MINHAS ATIVIDADES</a><br>";
            }
        ?>      
        
        <a href="../../controller/C_deslogar.php">SAIR</a>
        <?php echo $_SESSION['usu_nome']; ?>
    </body>
</html>