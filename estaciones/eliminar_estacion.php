<?
require_once("../conectar7.php"); 
require_once("../mysqli_result.php");

$codestacion=$_GET["codestacion"];
$cadena_busqueda=$_GET["cadena_busqueda"];

$query="SELECT * FROM estaciones WHERE codestacion='$codestacion'";
$rs_query=mysqli_query($conexion,$query);

?>

<html>
	<head>
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		function aceptar(codestacion) {
			location.href="guardar_estacion.php?codestacion=" + codestacion + "&accion=baja" + "&cadena_busqueda=<? echo $cadena_busqueda?>";
		}
		
		function cancelar() {
			location.href="index.php?cadena_busqueda=<? echo $cadena_busqueda?>";
		}
		
		</script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
                    <div id="tituloForm" class="header"><span id="telesttrab">ELIMINAR Estaciones de Trabajo</span></div>
				<div id="frmBusqueda">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%"><span id="tcod">C&Oacute;DIGO</span></td>
							<td width="85%" colspan="2"><?php echo $codestacion?></td>
					    </tr>
						<tr>
							<td width="15%"><span id="tnomb">Nombre</span></td>
						    <td width="85%" colspan="2"><?php echo mysqli_result($rs_query,0,"nombre")?></td>
					    </tr>
					</table>
			  	</div>
				<div id="botonBusqueda">
					<button type="button" id="btnaceptar" onClick="aceptar(<? echo $codestacion?>)" onMouseOver="style.cursor=cursor"> <img src="../img/ok.svg" alt="aceptar" /> <span id="taceptar">Aceptar</span> </button>
               		<button type="button" id="btncancelar" onClick="cancelar()" onMouseOver="style.cursor=cursor"> <img src="../img/cancelar.svg" alt="nuevo" /> <span id="tcancelar">Cancelar</span> </button>
				 </div>
				 </div>
		  </div>
		</div>
	</body>
</html>
