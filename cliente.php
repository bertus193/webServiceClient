<head>
   <title>WebService Client</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap.css">
<script src="jquery.min.js"></script>
<script> 

function submit(nombre, url) {
	var SoapKey, datos, datos2, datos3, datos4 = "";
	SoapKey = document.getElementById(SoapKey).value;
	datos = document.getElementById(nombre).value;

	if(document.getElementById(nombre+'2')){ //generarPresupuesto
		datos2 = document.getElementById(nombre+'2').value;
		datos3 = document.getElementById(nombre+'3').value;
		datos4 = document.getElementById(nombre+'4').value;
	}

	var respInput = document.getElementById(nombre+"_res");
    $.ajax({
       type: "POST",
       url: url,
       data: { SoapKey: SoapKey, datos: datos, datos2: datos2, datos3: datos3, datos4: datos4 },
       success: function(res)
       {
           respInput.innerHTML = res; // Mostrar la respuestas del script PHP.
       }
    });
}
</script>
</head>
<body>

<div class="page-header" id="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 breadcrumb" style="margin-right:5px;height: 280px;">
				<h1>ValidarNIF</h1>
					<div class="navbar-form">
						<input style="width: 100%;margin-bottom: 7px;" class="form-control" id="SoapKey" placeholder="SOAP Key" type="text">
						<div class="form-group">
							<input class="form-control" id="validarNIF" placeholder="NIF" type="text" style="width: 322px;">
						</div>
						<button onClick="submit('validarNIF', 'validarNIF.php')" type="submit" class="btn btn-primary">Validar</button><br><br>
						<div class="panel panel-default">
						  <div class="panel-body" id="validarNIF_res">
						    Resultado
						  </div>
						</div>
					</div>
			</div>
			<div class="col-lg-5 breadcrumb" style="margin-right:5px">
				<h1>ValidarIBAN</h1>
					<div class="navbar-form">
						<input style="width: 100%;margin-bottom: 7px;" class="form-control" id="SoapKey" placeholder="SOAP Key" type="text">
						<div class="form-group">
							<input class="form-control" id="validarIBAN" placeholder="IBAN" type="text" style="width: 330px;">
						</div>
						<button onClick="submit('validarIBAN', 'validarIBAN.php')" type="submit" class="btn btn-primary">Validar</button><br><br>
						<div class="panel panel-default" style="min-height: 96px;">
						  <div class="panel-body" id="validarIBAN_res">
						    Resultado
						  </div>
						</div>
					</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-5 breadcrumb" style="margin-right:5px;height: 459px;">
				<h1>consultaCodigoPostal</h1>
					<div class="navbar-form">
						<input style="width: 100%;margin-bottom: 7px;" class="form-control" id="SoapKey" placeholder="SOAP Key" type="text">
						<div class="form-group">
							<input class="form-control" id="consultaCodigoPostal" placeholder="Código Postal" type="text" style="width: 330px;">
						</div>
						<button onClick="submit('consultaCodigoPostal', 'consultaCodigoPostal.php')" type="submit" class="btn btn-primary">Buscar</button><br><br>
						<div class="panel panel-default" style="margin-top: 50px;">
						  <div class="panel-body" id="consultaCodigoPostal_res" style="min-height: 180px;">
						    Resultado
						  </div>
						</div>
					</div>
			</div>
			<div class="col-lg-5 breadcrumb" style="margin-right:5px">
				<h1>solicitarPresupuesto</h1>
					<div class="navbar-form">
						<input style="width: 100%;margin-bottom: 7px;" class="form-control" id="SoapKey" placeholder="SOAP Key" type="text">
						<input style="width: 100%;margin-bottom: 7px;" class="form-control" id="referenciaPieza" placeholder="Referencia pieza" type="text">
						<div class="form-group">
							<input class="form-control" id="solicitarPresupuesto" placeholder="IBAN" type="text" style="width: 330px;">
						</div>
						<button onClick="submit('solicitarPresupuesto', 'solicitarPresupuesto.php')" type="submit" class="btn btn-primary">Solicitar</button><br><br>
						<div class="panel panel-default">
						  <div class="panel-body" id="validarIBAN_res" style="min-height: 180px;">
						    Resultado
						  </div>
						</div>
					</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-5 breadcrumb" style="margin-right:5px">
				<h1>generarPresupuesto</h1>
					<div class="navbar-form">
						<input style="width: 100%;margin-bottom: 7px;" class="form-control" id="SoapKey" placeholder="SOAP Key" type="text">
						<input style="width: 100%;margin-bottom: 7px;" class="form-control" id="generarPresupuesto"  placeholder="Fecha presupuesto" type="text">
						<input style="width: 100%;margin-bottom: 7px;" class="form-control" id="generarPresupuesto2" placeholder="ID cliente" type="text">
						<input style="width: 100%;margin-bottom: 7px;" class="form-control" id="generarPresupuesto3" placeholder="Referencia producto" type="text">
						<input style="width: 100%;margin-bottom: 7px;" class="form-control" id="generarPresupuesto4" placeholder="Cantidad producto" type="text">
						<button onClick="submit('generarPresupuesto', 'generarPresupuesto.php')" type="submit" class="btn btn-primary">Generar Presupuesto</button><br><br>
						<div class="panel panel-default">
						  <div class="panel-body" id="generarPresupuesto_res">
						    Resultado
						  </div>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
</body>
