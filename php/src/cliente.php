<?php
ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);
$url = 'http://localhost/servidor.php';
$uri = 'http://localhost/clienteServidor';

try{
    $cliente = new SoapClient(null,['location'=>$url,'uri'=>$uri, 'trace'=>true ]);
    $mostrarNome = $cliente->mostraNome('1');
    echo $mostrarNome;
}catch(SoapFault $f){
    die("ERROO: " . $f->getMessage());
}