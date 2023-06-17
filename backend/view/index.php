<html>
    <head>

    </head>
    <body>
        <?php session_start(); ?>
        <form action="../controller/logar.php" method="POST">
            <input type="text" placeholder="DIGITE O LOGIN" name="login">
            <input type="password" placeholder="DIGITE A SENHA" name="password">
            <input type="submit" value="ENTRAR">

        </form>
        
    </body>
</html>