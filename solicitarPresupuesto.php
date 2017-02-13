<?php
ini_set("soap.wsdl_cache_enabled", 0);
date_default_timezone_set('Europe/Madrid');
$referenciaPieza = $_POST['datos'];
$idProveedor = $_POST['datos2'];

$SoapKey = $_POST['SoapKey'];

class solicitarPresupuesto {
	public $referenciaPieza;
	public $idProveedor;
	public $SoapKey;
	public function __construct($referenciaPieza, $idProveedor, $SoapKey){
		$this->referenciaPieza = $referenciaPieza;
		$this->idProveedor = $idProveedor;
		$this->SoapKey = $SoapKey;
	}
}

try{

	$cliente = new SoapClient("http://127.0.0.1:9080/practica1MTIS/services/practica1WSDL?wsdl");

	$respuesta = $cliente->solicitarPresupuesto( new solicitarPresupuesto($referenciaPieza, $idProveedor, $SoapKey));

	//var_dump($respuesta); 

	if($respuesta->error != ""){
		print $respuesta->error;
	}
	else if($respuesta->precioPieza >= 0){
		print '<div class="list-group table-of-contents">
	              <a class="list-group-item" href="#">Precio Pieza: '.$respuesta->precioPieza.'</a>
	              <a class="list-group-item" href="#">Disponibilidad Pieza: '.$respuesta->disponiblidadPieza.'</a>
	              <a class="list-group-item" href="#">Fecha Disponibilidad Pieza: '.date("d-m-Y", strtotime($respuesta->fechaDisponibilidadPieza)).'</a>
	            </div>';
	}
	else{
		print 'No se ha encontrado ningún presupuesto';
	}

}catch (SoapFault $e){
	print 'No hay conexión con el WebService';	
}

?>
