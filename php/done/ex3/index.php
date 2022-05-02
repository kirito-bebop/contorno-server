<!DOCTYPE html>
<html lang="es">
<head>
<title>Login</title>
<style>
    .oculta {
        display:none;
    }
</style>
</head>
    <body>
        <?php require 'validacion.php'; ?>
        <h3>Registro</h3>
        <form name='login' method='POST' action='index.php'>
            <input type="text" placeholder="usuario" id='usuario' name='usuario'
            value='<?php echo isset($_POST['usuario']) ? $_POST['usuario'] : '' ?>' required>
            <br>
            <p id='errUsuario' for='usuario' class='<?php echo (!isset($_POST['enviar']) ||
            validarNome($_POST['usuario'])) ? "oculta" : "" ?>' >
            Debe ter máis de 3 caracteres
            </p>
            <input type="password" placeholder="contrasinal" id='pass' name='pass' required>
            <br>
            <input type="password" placeholder="contrasinal" id='pass2' name='pass2' required>
            <br>
            <p id='errPassword' for='pass' class='<?php echo (!isset($_POST['enviar']) ||
            validarPasswords($_POST['pass'], $_POST['pass2'])) ? "oculta" : "" ?>'>
            O contrasinal debe coincidir e ter máis de 5 caracteres(maisculas, numeros, simbolos)
            </p >
            <input type="mail" placeholder="e-Mail" name='mail' id='mail' value='<?php echo
            isset($_POST['mail']) ? $_POST['mail'] : '' ?>' required>
            <br>
            <p id='errMail' for='email' class='<?php echo (!isset($_POST['enviar']) ||
            validarEmail($_POST['mail'])) ? "oculta" : "" ?> '>
            A dirección de email non é correcta
            </p>
            <input type="submit" value="Registrar" name='enviar'>
        </form>
    </body>
</html>
