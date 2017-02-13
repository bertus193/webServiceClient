<?php

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

$respuesta = $cliente->validarIBAN( new validarIBAN($iban, "asdhfkashfaskfhsakdfhlskfhas"));

//var_dump($respuesta); 

if($respuesta->valido == true){
	print 'IBAN válido';
}
else{
	print 'IBAN inválido</br>';
	print $respuesta->error;
}

?>
