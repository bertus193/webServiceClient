<?php
ini_set("soap.wsdl_cache_enabled", 0);
$fechaPresupuesto = $_POST['datos'];
$idCliente = $_POST['datos2'];
$referenciaProducto = $_POST['datos3'];
$cantidadProducto = $_POST['datos4'];

$SoapKey = $_POST['SoapKey'];

class generarPresupuesto {
	public $fechaPresupuesto;
	public $idCliente;
	public $referenciaProducto;
	public $cantidadProducto;
	public $SoapKey;
	public function __construct($fechaPresupuesto, $idCliente, $referenciaProducto, $cantidadProducto, $SoapKey){
		$this->fechaPresupuesto = $fechaPresupuesto;
		$this->idCliente = $idCliente;
		$this->referenciaProducto = $referenciaProducto;
		$this->cantidadProducto = $cantidadProducto;
		$this->SoapKey = $SoapKey;
	}
}

$regex = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
if (!preg_match($regex, $fechaPresupuesto)) {
    echo 'La fecha debe seguir el formato YYYY-MM-DD';
}
else{
	try{

		$cliente = new SoapClient("http://127.0.0.1:9080/practica1MTIS/services/practica1WSDL?wsdl");

		$respuesta = $cliente->generarPresupuesto( new generarPresupuesto($fechaPresupuesto, $idCliente, $referenciaProducto, $cantidadProducto, $SoapKey));

		//var_dump($respuesta); 

		if($respuesta->error != ""){
			print $respuesta->error;
		}
		else if($respuesta->presupuestoGeneradoCorrectamente == 1){
			print 'El presupuesto '.$respuesta->idPresupuesto.' se ha generado correctamente.';
		}
		else{
			print 'Ha habido algún error';
		}

	}catch (SoapFault $e){
		print 'No hay conexión con el WebService'.$e;	
	}
}

?>
