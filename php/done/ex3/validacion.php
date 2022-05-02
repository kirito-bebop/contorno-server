<?php
function validarNome($nome){
    return (strlen($nome)>4);
}
function validarEmail($email){
    return preg_match("/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i", $email);
}
function validarPasswords($pass1, $pass2) {
    if($pass1 == $pass2) {
        if (!preg_match('`[A-Z]`',$pass1)) {
            return false;
        } else {
            return (strlen($pass1) > 5);
        }
    } 
}
