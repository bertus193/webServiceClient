<?php //ES0690000001210123456789
ini_set("soap.wsdl_cache_enabled", 0);
$iban = $_POST['datos'];

$SoapKey = $_POST['SoapKey'];

class validarIBAN {
	public $ibanSinValidar;
	public $SoapKey;
	public function __construct($ibanSinValidar, $SoapKey){
		$this->ibanSinValidar = $ibanSinValidar;
		$this->SoapKey = $SoapKey;
	}
}

$cliente = new SoapClient("http://127.0.0.1:9080/practica1MTIS/services/practica1WSDL?wsdl");

$respuesta = $cliente->validarIBAN( new validarIBAN($iban, $SoapKey));

//var_dump($respuesta); 
if($respuesta->error == "Error Validación SOAPKey"){
	print $respuesta->error;
}
else if($respuesta->valido == true){
	print 'IBAN válido';
}
else{
	print 'IBAN inválido</br>';
	print $respuesta->error;
}

?>
