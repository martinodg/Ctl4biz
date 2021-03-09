<?
require_once("../conectar7.php"); 
require_once("../mysqli_result.php");

$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }

$nombre=$_POST["Anombre"];
$nif=$_POST["anif"];
$direccion=$_POST["adireccion"];
$localidad=$_POST["alocalidad"];
$codprovincia=$_POST["cboProvincias"];
$codformapago=$_POST["cboFPago"];
$codentidad=$_POST["cboBanco"];
$cuentabanco=$_POST["acuentabanco"];
$codpostal=$_POST["acodpostal"];
$telefono=$_POST["atelefono"];
$movil=$_POST["amovil"];
$email=$_POST["aemail"];
$web=$_POST["aweb"];

if ($accion=="alta") {
	$query_operacion="INSERT INTO clientes (codcliente, nombre, nif, direccion, codprovincia, localidad, codformapago, codentidad, cuentabancaria, codpostal, telefono, movil, email, web, borrado) VALUES ('', '$nombre', '$nif', '$direccion', '$codprovincia', '$localidad', '$codformapago', '$codentidad', '$cuentabanco', '$codpostal', '$telefono', '$movil', '$email', '$web', '0')";					
	$rs_operacion=mysqli_query($conexion,$query_operacion);
	if ($rs_operacion) { $mensaje="El cliente ha sido dado de alta correctamente"; }
	$cabecera1="Inicio >> Clientes &gt;&gt; Nuevo Cliente ";
	$cabecera2="INSERTAR CLIENTE ";
	$sel_maximo="SELECT max(codcliente) as maximo FROM clientes";
	$rs_maximo=mysqli_query($conexion,$sel_maximo);
	$codcliente=mysqli_result($rs_maximo,0,"maximo");
}

if ($accion=="modificar") {
	$codcliente=$_POST["codcliente"];
	$query="UPDATE clientes SET nombre='$nombre', nif='$nif', direccion='$direccion', codprovincia='$codprovincia', localidad='$localidad', codformapago='$codformapago', codentidad='$codentidad', cuentabancaria='$cuentabanco', codpostal='$codpostal', telefono='$telefono', movil='$movil', email='$email', web='$web', borrado=0 WHERE codcliente='$codcliente'";
	$rs_query=mysqli_query($conexion,$query);
	if ($rs_query) { $mensaje="Los datos del cliente han sido modificados correctamente"; }
	$cabecera1="Inicio >> Clientes &gt;&gt; Modificar Cliente ";
	$cabecera2="MODIFICAR CLIENTE ";
}

if ($accion=="baja") {
	$codcliente=$_GET["codcliente"];
	$query="UPDATE clientes SET borrado=1 WHERE codcliente='$codcliente'";
	$rs_query=mysqli_query($conexion,$query);
	if ($rs_query) { $mensaje="El cliente ha sido eliminado correctamente"; }
	$cabecera1="Inicio >> Clientes &gt;&gt; Eliminar Cliente ";
	$cabecera2="ELIMINAR CLIENTE ";
	$query_mostrar="SELECT * FROM clientes WHERE codcliente='$codcliente'";
	$rs_mostrar=mysqli_query($conexion,$query_mostrar);
	$nombre=mysqli_result($rs_mostrar,0,"nombre");
	$nif=mysqli_result($rs_mostrar,0,"nif");
	$direccion=mysqli_result($rs_mostrar,0,"direccion");
	$localidad=mysqli_result($rs_mostrar,0,"localidad");
	$codprovincia=mysqli_result($rs_mostrar,0,"codprovincia");
	$codformapago=mysqli_result($rs_mostrar,0,"codformapago");
	$codentidad=mysqli_result($rs_mostrar,0,"codentidad");
	$cuentabanco=mysqli_result($rs_mostrar,0,"cuentabancaria");
	$codpostal=mysqli_result($rs_mostrar,0,"codpostal");
	$telefono=mysqli_result($rs_mostrar,0,"telefono");
	$movil=mysqli_result($rs_mostrar,0,"movil");
	$email=mysqli_result($rs_mostrar,0,"email");
	$web=mysqli_result($rs_mostrar,0,"web");
}

?>

<html>
	<head>
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		
		function aceptar() {
			location.href="index.php";
		}
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		</script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header"><?php echo $cabecera2?></div>
				<div id="frmBusqueda">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%"></td>
							<td width="85%" colspan="2" class="mensaje"><?php echo $mensaje;?></td>
					    </tr>
						<tr>
							<td width="15%"><span id="tcod">C&Oacute;DIGO</span></td>
							<td width="85%" colspan="2"><?php echo $codcliente?></td>
					    </tr>
						<tr>
							<td width="15%"><span id="tnomb">Nombre</span></td>
						    <td width="85%" colspan="2"><?php echo $nombre?></td>
					    </tr>
						<tr>
						  <td><span id="tnip">NIF / CIF</span></td>
						  <td colspan="2"><?php echo $nif?></td>
					  </tr>
						<tr>
						  <td><span id="tdireccion">Direcci&oacute;n</span></td>
						  <td colspan="2"><?php echo $direccion?></td>
					  </tr>
						<tr>
						  <td><span id="tlocal">Localidad</span></td>
						  <td colspan="2"><?php echo $localidad?></td>
					  </tr>
					  <?php
					  	if ($codprovincia<>0) {
							$query_provincias="SELECT * FROM provincias WHERE codprovincia='$codprovincia'";
							$res_provincias=mysqli_query($conexion,$query_provincias);
							$nombreprovincia=mysqli_result($res_provincias,0,"nombreprovincia");
						} else {
							$nombreprovincia="Sin determinar";						
						}
					  ?>
						<tr>
							<td width="15%"><span id="tpcia">Provincia</span></td>
							<td width="85%" colspan="2"><?php echo $nombreprovincia?></td>
					    </tr>
						<?php
						if ($codformapago<>0) {
							$query_formapago="SELECT * FROM formapago WHERE codformapago='$codformapago'";
							$res_formapago=mysqli_query($conexion,$query_formapago);
							$nombrefp=mysqli_result($res_formapago,0,"nombrefp");
						} else {
							$nombrefp="Sin determinar";
						}
					  ?>
						<tr>
							<td width="15%"><span id="tforpago">Forma de pago</span></td>
							<td width="85%" colspan="2"><?php echo $nombrefp?></td>
					    </tr>
						<?php
						if ($codentidad<>0) {
							$query_entidades="SELECT * FROM entidades WHERE codentidad='$codentidad'";
							$res_entidades=mysqli_query($conexion,$query_entidades);
							$nombreentidad=mysqli_result($res_entidades,0,"nombreentidad");
						} else {
							$nombreentidad="Sin determinar";
						}
					  ?>
						<tr>
							<td width="15%"><span id="tentiban">Entidad Bancaria</span></td>
							<td width="85%" colspan="2"><?php echo $nombreentidad?></td>
					    </tr>
						<tr>
							<td><span id="tctabcaria">Cuenta bancaria</span></td>
							<td colspan="2"><?php echo $cuentabanco?></td>
						</tr>
						<tr>
							<td><span id="tcodpostal">C&oacute;digo postal</span></td>
							<td colspan="2"><?php echo $codpostal?></td>
						</tr>
						<tr>
							<td><span id="ttelef">Tel&eacute;fono</span></td>
							<td><?php echo $telefono?></td>
						</tr>
						<tr>
							<td><span id="tmovil">M&oacute;vil</span></td>
							<td colspan="2"><?php echo $movil?></td>
						</tr>
						<tr>
							<td><span id="tcorrelec">Correo electr&oacute;nico</span></td>
							<td colspan="2"><?php echo $email?></td>
						</tr>
												<tr>
							<td><span id="tdirrcweb">Direcci&oacute;n web</span></td>
							<td colspan="2"><?php echo $web?></td>
						</tr>
					</table>
			  </div>
				<div id="botonBusqueda">
					<button type="button" id="btnaceptar" onClick="aceptar()" onMouseOver="style.cursor=cursor"> <img src="../img/ok.svg" alt="aceptar" /> <span id="taceptar">Aceptar</span> </button>
			  </div>
			 </div>
		  </div>
		</div>
	</body>
</html>
