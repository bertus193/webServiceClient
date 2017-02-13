<?php

$codigo = $_POST['datos'];

class consultaCodigoPostal {
	public $codigo;
	public $SoapKey;
	public function __construct($codigo, $SoapKey){
		$this->codigo = $codigo;
		$this->SoapKey = $SoapKey;
	}
}

$cliente = new SoapClient("http://127.0.0.1:9080/practica1MTIS/services/practica1WSDL?wsdl");

$respuesta = $cliente->consultaCodigoPostal( new consultaCodigoPostal($codigo, "asdhfkashfaskfhsakdfhlskfhas"));

//var_dump($respuesta); 

if($respuesta->poblacion == null){
	print 'No existe el código postal '.$respuesta->codigoPostal.' en la base de datos';
}
else{
	print '<div class="list-group table-of-contents">
              <a class="list-group-item" href="#">Código Postal: '.$respuesta->codigoPostal.'</a>
              <a class="list-group-item" href="#">Ciudad: '.$respuesta->poblacion.'</a>
              <a class="list-group-item" href="#">Provincia: '.$respuesta->provincia.'</a>
            </div>';
}

?>
