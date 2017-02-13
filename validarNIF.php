<?php
ini_set("soap.wsdl_cache_enabled", 0);
$nif = $_POST['datos'];

$SoapKey = $_POST['SoapKey'];

class validarNIF {
    public $nifSinValidar;
    public $SoapKey;
    public function __construct($nifSinValidar, $SoapKey){
        $this->nifSinValidar = $nifSinValidar;
        $this->SoapKey = $SoapKey;
    }
}
try{
	
	$cliente = new SoapClient("http://127.0.0.1:9080/practica1MTIS/services/practica1WSDL?wsdl");


	$respuesta = $cliente->validarNIF( new validarNIF($nif, $SoapKey));

	//var_dump($respuesta); 
	if($respuesta->error != ""){
		print $respuesta->error;
	}
	else if($respuesta->validado == true){
		print 'NIF válido';
	}
	else{
		print 'NIF inválido';
	}

}catch (SoapFault $e){
	print 'No hay conexión con el WebService';
}
?>
