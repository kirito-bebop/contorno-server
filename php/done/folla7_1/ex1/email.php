<?php

if(isset($_POST['datos_usuario'])){
    
    echo $_POST['email'];
}else{
    echo "NON HAI DATOS";
    /* header('Location: exercicio1.html'); */
}
