<?php 
require_once("../conectar7.php");
require_once("../mysqli_result.php");

$codtrabajador=$_GET["codtrabajador"];

$query="SELECT * FROM trabajadores WHERE codtrabajador='$codtrabajador'";
$rs_query=mysqli_query($conexion,$query);

?>
<html>
	<head>
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../funciones/validar.js"></script>
		<script language="javascript">

		function cancelar() {
			location.href="index.php?cadena_busqueda=<? echo $cadena_busqueda?>";
		}

		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}

		function limpiar() {
			document.getElementById("formulario").reset();
		}

		</script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
                    <div id="tituloForm" class="header"><span  id="tmodtrab">MODIFICAR TRABAJADOR</span></div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_trabajador.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td><span  id="tcod">C&Oacute;DIGO</span></td>
							<td><?php echo $codtrabajador?></td>
						    <td width="42%" rowspan="14" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
							<td width="15%"><span  id="tnomb">Nombre</span></td>
						    <td width="43%"><input NAME="anombre" type="text" class="cajaGrande" id="anombre" size="45" maxlength="45" value="<?php echo mysqli_result($rs_query,0,"nombre")?>"></td>
				        </tr>
						<tr>
						  <td><span  id="tnip">NIF / CIF</span></td>
						  <td><input id="nif" type="text" class="cajaPequena" NAME="anif" maxlength="15" value="<?php echo mysqli_result($rs_query,0,"nif")?>"></td>
				      </tr>
						<tr>
<td><span  id="tpassword">Contrase&ntilde;a</span></td>
<td><input NAME="apassword" type="text" class="cajaPequena" id="password" value="<?php echo mysqli_result($rs_query,0,"password")?>" size="20" maxlength="20"></td>
					  </tr>
						<tr>
<td><span  id="ttelef">Tel&eacute;fono</span></td>
<td><input NAME="atelefono" type="text" class="cajaPequena" id="cuentabanco" value="<?php echo mysqli_result($rs_query,0,"telefono")?>" maxlength="20"></td>
						</tr>
						<tr>
<td><span  id="tmovil">M&oacute;vil</span> </td>
<td><input NAME="amovil" type="text" class="cajaPequena" id="codpostal" value="<?php echo mysqli_result($rs_query,0,"movil")?>" maxlength="20"></td>
						</tr>
						<tr>
<td><span  id="tmovavi">M&oacute;vil Avisos</span> </td>
<td><input name="amovilavisos" type="text" class="cajaPequena" id="telefono" value="<?php echo mysqli_result($rs_query,0,"movilavisos")?>" maxlength="20"></td>
						</tr>
						<tr>
<td><span  id="tcorrelec">Correo electr&oacute;nico</span></td>
<td><input name="aemail" type="text" class="cajaGrande" id="movil" value="<?php echo mysqli_result($rs_query,0,"email")?>" size="50" maxlength="50"></td>
						</tr>
						<tr>
<td><span  id="tcorrelecavs">Correo electr&oacute;nico Avisos</span> </td>
<td><input NAME="aemailavisos" type="text" class="cajaGrande" id="email" value="<?php echo mysqli_result($rs_query,0,"emailavisos")?>" size="50" maxlength="50"></td>
						</tr>
					</table>
			  </div>
<div id="botonBusqueda">
					<button type="button" id="btnaceptar" onClick="validar(formulario,true)"  onMouseOver="style.cursor=cursor"> <img src="../img/ok.svg" alt="aceptar" /> <span  id="taceptar">Aceptar</span> </button>

					<button type="button" id="btnlimpiar"  onClick="limpiar()" onMouseOver="style.cursor=cursor"> <img src="../img/limpiar.svg" alt="limpiar" /> <span  id="tlimpiar">Limpiar</span> </button>
					<button type="button" id="btncancelar"  onClick="cancelar()" onMouseOver="style.cursor=cursor"> <img src="../img/cancelar.svg" alt="cancelar" /> <span  id="tcancelar">Cancelar</span> </button>
					<input id="accion" name="accion" value="modificar" type="hidden">
					<input id="id" name="id" value="" type="hidden">
					<input id="codtrabajador" name="codtrabajador" value="<?php echo $codtrabajador?>" type="hidden">
			  </div>
			  </form>
		  </div>
		  </div>
		</div>
	</body>
</html>
