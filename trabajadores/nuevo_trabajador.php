<?php 
require_once("../conectar7.php"); 
?>
<html>
	<head>
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../funciones/validar.js"></script>
		<script language="javascript">

		function cancelar() {
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

		function limpiar() {
			document.getElementById("formulario").reset();
		}

		</script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header"><span id="tinstrab">INSERTAR TRABAJADOR</span> </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_trabajador.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%"><span id="tnomb">Nombre</span></td>
						    <td width="43%"><input NAME="anombre" type="text" class="cajaGrande" id="nombre" size="45"></td>
					        <td width="42%" rowspan="14" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
						  <td><span id="tnip">NIF / CIF</span></td>
						  <td><input id="nif" type="text" class="cajaPequena" NAME="anif" maxlength="15"></td>
				      </tr>
						<tr>
						  <td><span id="tpassword">Contrase&ntilde;a</span></td>
						  <td><input NAME="apassword" type="text" class="cajaPequena" id="password" size="20" maxlength="20"></td>
				      </tr>
						<tr>
							<td><span id="ttelef">Tel&eacute;fono</span></td>
							<td><input id="cuentabanco" type="text" class="cajaPequena" NAME="atelefono" maxlength="20"></td>
					    </tr>
						<tr>
							<td><span id="tmovil">M&oacute;vil</span> </td>
							<td><input id="codpostal" type="text" class="cajaPequena" NAME="amovil" maxlength="20"></td>
					    </tr>
						<tr>
							<td><span id="tmovavi">M&oacute;vil Avisos</span> </td>
							<td><input id="telefono" name="amovilavisos" type="text" class="cajaPequena" maxlength="20"></td>
					    </tr>
						<tr>
							<td><span id="tcorrelec">Correo electr&oacute;nico</span></td>
							<td><input name="aemail" type="text" class="cajaGrande" id="movil" size="50" maxlength="50"></td>
					    </tr>
						<tr>
							<td><span id="tcorrelecavs">Correo electr&oacute;nico Avisos</span> </td>
							<td><input NAME="aemailavisos" type="text" class="cajaGrande" id="email" size="50" maxlength="50"></td>
					    </tr>
												<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
					    </tr>
					</table>
			  </div>
                <div id="botonBusqueda">
					<button type="button" id="btnaceptar" onClick="validar(formulario,true)"  onMouseOver="style.cursor=cursor"> <img src="../img/ok.svg" alt="aceptar" /> <span id="taceptar">Aceptar</span> </button>
					<button type="button" id="btnlimpiar"  onClick="limpiar()" onMouseOver="style.cursor=cursor"> <img src="../img/limpiar.svg" alt="limpiar" /> <span id="tlimpiar">Limpiar</span> </button>
					<button type="button" id="btncancelar"  onClick="cancelar()" onMouseOver="style.cursor=cursor"> <img src="../img/cancelar.svg" alt="cancelar" /> <span id="tcancelar">Cancelar</span> </button>
					<input id="accion" name="accion" value="alta" type="hidden">
					<input id="id" name="Zid" value="" type="hidden">
			  </div>
			  </form>
			  </div>
		  </div>
		</div>
	</body>
</html>
