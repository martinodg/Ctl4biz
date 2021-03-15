<?php 
require_once("../conectar.php");
require_once("../funciones/fechas.php");
 
$codalbaran=$_GET["codalbaran"];
$sel_albaran="SELECT fecha FROM albaranes WHERE codalbaran='$codalbaran'";
$rs_albaran=mysqli_query($conexion,$sel_albaran);
$fecha=mysqli_result($rs_albaran,0,"fecha");
$fecha=implota($fecha);
?>
<html>
	<head>
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../funciones/validar.js"></script>
		<link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
		<!-- <script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script> -->
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
		<script language="javascript">
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		function cancelar() {
			location.href="index.php";
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
				<div id="tituloForm" class="header">CONVERTIR ALBAR&Aacute;N </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_albaran.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="14%"><span id="tcodalbaran">C&oacute;digo de albar&aacute;n</span></td>
						    <td width="36%"><? echo $codalbaran?></td>
				            <td width="50%"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
							<td width="14%"><span id="tfecha">Fecha</span></td>
						    <td width="36%"><input NAME="fecha" type="text" class="cajaPequena" id="fecha" size="10" maxlength="10" value="<? echo $fecha?>" readonly> <img src="../img/calendario.svg" name="Image1" id="Image1" width="16" height="16" border="0" id="Image1" onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecha",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		</script></td>
				            <td width="50%"></td>
						</tr>							
					</table>
			  </div>
				<div id="botonBusqueda">
					<input type="hidden" name="id" id="id" value="">
					<button type="button" id="btnaceptar" onClick="validar(formulario,true)"  onMouseOver="style.cursor=cursor"> <img src="../img/ok.svg" alt="aceptar" /> <span id="taceptar">Aceptar</span> </button>

					<button type="button" id="btnlimpiar"  onClick="limpiar()" onMouseOver="style.cursor=cursor"> <img src="../img/limpiar.svg" alt="limpiar" /> <span id="tlimpiar">Limpiar</span> </button>
					<button type="button" id="btncancelar"  onClick="cancelar()" onMouseOver="style.cursor=cursor"> <img src="../img/cancelar.svg" alt="cancelar" /> <span id="tcancelar">Cancelar</span> </button>
					<input id="accion" name="accion" value="convertir" type="hidden">
					<input id="codalbaran" name="codalbaran" value="<? echo $codalbaran?>" type="hidden">
			  </div>
			  </form>
			 </div>
		  </div>
		</div>
	</body>
</html>
