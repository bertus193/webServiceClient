<?php
// ES0690000001210123456789
$fechaPresupuesto = $_POST['datos'];
$idCliente = $_POST['datos2'];
$referenciaProducto = $_POST['datos3'];
$cantidadProducto = $_POST['datos4'];

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

$cliente = new SoapClient("http://127.0.0.1:9080/practica1MTIS/services/practica1WSDL?wsdl");

$respuesta = $cliente->generarPresupuesto( new generarPresupuesto($fechaPresupuesto, $idCliente, $referenciaProducto, $cantidadProducto, "asdhfkashfaskfhsakdfhlskfhas"));

//var_dump($respuesta); 

if($respuesta->presupuestoGeneradoCorrectamente == 1){
	print 'El presupuesto '.$respuesta->idPresupuesto.' se ha generado correctamente.';
}
else{
	print 'Ha habido algún error';
}

?>