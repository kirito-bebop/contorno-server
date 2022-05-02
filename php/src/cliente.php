<?php
ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);
$url = 'http://localhost/servidor.php';
$uri = 'http://localhost/clienteServidor';
$servidor = 'db6';
$bbdd = 'proyecto';
$usuario = 'root';
$password = 'root';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENTE</title>
</head>
<body>
    <form action="">
        <label for="">ID:</label>
        <input type="text" name="id">
        <input type="submit" value="Mostrar-Nome" name="mostrar-nome">
        <input type="submit" value="Mostrar-Nome-Descripcion" name="mostrar-nome-desc">
        <input type="submit" value="Mostrar-Nome-Desc-Prezo" name="mostrar-tres-datos">
        <br/>
        <hr/>
        <label for="">FAMILIA: </label>
        <select name="familia" id="">
            <?php
                try{
                    $conn = new PDO("mysql:host=$servidor;dbname=$bbdd;charset=utf8",$usuario,$password);
                    $stat = $conn->prepare("SELECT * FROM familias");
                    $stat->execute();
                    echo "ENTRA";
                    while($fila = $stat->fetch()){
                        echo "<option name='".$fila[0]."'>".$fila[0]."</option>";
                    }
                }catch(PDOException $e){
                    die("ERROR: ". $e->getMessage());
                }
            ?>
        </select>
        <input type="submit" value="Mostrar Familia" name="mostrar-familia">

    </form>
    <table>
        
<?php

if(isset($_GET['mostrar-nome'])){
    echo "<tr><th>Nome</th></tr>";
    if($_GET['id'] != null){
        $id = $_GET['id'];
        try{
            $cliente = new SoapClient(null,['location'=>$url,'uri'=>$uri, 'trace'=>true ]);
            $mostrarNome = $cliente->mostraNome($id);
            echo $mostrarNome;
        }catch(SoapFault $f){
            die("ERROO: " . $f->getMessage());
        }
    }
}else if(isset($_GET['mostrar-tres-datos'])){
    echo "<tr><th>Nome</th><th>Descripcion</th><th>Prezo</th></tr>";
    if($_GET['id'] != null){
        $id = $_GET['id'];
        try{
            $cliente = new SoapClient(null,['location'=>$url,'uri'=>$uri, 'trace'=>true]);
            $nomeDesc = $cliente->mostrarTresDatos($id);
            echo $nomeDesc;
        }catch(SoapFault $f){
            die('ERRO: ' . $f->getMessage());
        }
    }
}else if(isset($_GET['mostrar-familia'])){
    echo "<tr><th>Codigo</th><th>Nome</th></tr>";
    if($_GET['familia'] != null){
        $familia = $_GET['familia'];
        try{
            $cliente = new SoapClient(null, ['location'=>$url, 'uri'=>$uri, 'trace'=>true]);
            $family = $cliente->mostrarFamilia($familia);
            echo $familia;
            echo $family;
        }catch(SoapFault $f){
            die("ERRO: " . $f->getMessage());
        }
    }
}
    
?>  
    </table>
</body>
</html>