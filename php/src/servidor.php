<?php
class mostraNome{

    public function mostraNome($id){
        $servidor = 'db6';
        $bbdd = 'proyecto';
        $usuario = 'root';
        $password = 'root';
        try{
            $pdo = new PDO("mysql:host=$servidor;dbname=$bbdd;charset=utf8",$usuario, $password);
            $pdoStatement = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
            $pdoStatement->bindParam(1,$id);
            $pdoStatement->execute();
            if($pdoStatement->rowCount() >= 1){
                $fila = $pdoStatement->fetch();
                return "<tr><td>".$fila[1] ." </td></tr>";  // 0 é o numero, 1 o nome
            }
        }catch(PDOException $e){
            return("ERROR: " . $e->getMessage());
        }
    }


    public function mostrarNomeDescripcion($id){
        $servidor = 'db6';
        $bbdd = 'proyecto';
        $usuario = 'root';
        $password = 'root';
        try{
            $pdo = new PDO("mysql:host=$servidor;dbname=$bbdd;charset=utf8",$usuario, $password);
            $pdoStatement = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
            $pdoStatement->bindParam(1,$id);
            $pdoStatement->execute();
            if($pdoStatement->rowCount() >= 1){
                $fila = $pdoStatement->fetch();
                return "<tr><td>".$fila[1] ." </td><td>".$fila[3] ." </td></tr>";  // 0 é o numero, 1 o nome
            }
        }catch(PDOException $e){
            return("ERROR: " . $e->getMessage());
        }
    }
    public function mostrarTresDatos($id){
        $servidor = 'db6';
        $bbdd = 'proyecto';
        $usuario = 'root';
        $password = 'root';
        try{
            $pdo = new PDO("mysql:host=$servidor;dbname=$bbdd;charset=utf8",$usuario, $password);
            $pdoStatement = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
            $pdoStatement->bindParam(1,$id);
            $pdoStatement->execute();
            if($pdoStatement->rowCount() >= 1){
                $fila = $pdoStatement->fetch();
                return "<tr><td>".$fila[1] ." </td><td>".$fila[3] ." </td><td>".$fila[4] ."€ </td></tr>";  // 0 é o numero, 1 o nome
            }
        }catch(PDOException $e){
            return("ERROR: " . $e->getMessage());
        }
    }
    public function mostrarFamilia($fam){
        $servidor = 'db6';
        $bbdd = 'proyecto';
        $usuario = 'root';
        $password = 'root';
        try{
            $pdo = new PDO("mysql:host=$servidor;dbname=$bbdd;charset=utf8",$usuario, $password);
            $pdoStatement = $pdo->prepare("SELECT * FROM familias WHERE cod =?");
            $pdoStatement->bindParam(1,$fam);
            $pdoStatement->execute();
            if($pdoStatement->rowCount() >=1){
                $trs = $pdoStatement->fetch();
                return "<tr><td>".$fila[0]."</td><td>".$fila[1]."</td></tr>";
            }
        }catch(PDOException $e){
            return("ERROR: " . $e->getMessage());
        }
    }
       
}



ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);
$uri="http://localhost/clienteServidor";

try{
    $server = new SoapServer(null, array('uri'=>$uri));
    $server->setClass("mostraNome");
    $server->handle();
}catch(SoapFault $f){
    die("Erro en server: " . $f->getMessage());
}