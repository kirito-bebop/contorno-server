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
                    return "NOME: ".$fila[1] ." <br>DESCRIPCION: ". $fila[3]."<br>PREZO: ". $fila[4];  // 0 é o numero, 1 o nome
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