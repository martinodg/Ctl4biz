<?
require_once("../conectar7.php"); 
require_once("../mysqli_result.php");

$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }

$nombreentidad=$_POST["Anombreentidad"];

if ($accion=="alta") {
	$query_operacion="INSERT INTO entidades (codentidad, nombreentidad, borrado) 
					VALUES ('', '$nombreentidad', '0')";					
	$rs_operacion=mysqli_query($conexion,$query_operacion);
	if ($rs_operacion) { $mensaje="La entidad ha sido dada de alta correctamente"; }
	$cabecera1="Inicio >> Entidades bancarias &gt;&gt; Nueva Entidad Bancaria ";
	$cabecera2="INSERTAR ENTIDAD BANCARIA ";
	$sel_maximo="SELECT max(codentidad) as maximo FROM entidades";
	$rs_maximo=mysqli_query($conexion,$sel_maximo);
	$codentidad=mysqli_result($rs_maximo,0,"maximo");
}

if ($accion=="modificar") {
	$codentidad=$_POST["Zid"];
	$query="UPDATE entidades SET nombreentidad='$nombreentidad', borrado=0 WHERE codentidad='$codentidad'";
	$rs_query=mysqli_query($conexion,$query);
	if ($rs_query) { $mensaje="Los datos de la entidad bancaria han sido modificados correctamente"; }
	$cabecera1="Inicio >> Entidades Bancarias &gt;&gt; Modificar Entidad Bancaria ";
	$cabecera2="MODIFICAR ENTIDAD BANCARIA ";
}

if ($accion=="baja") {
	$codentidad=$_GET["codentidad"];
	$query_comprobar="SELECT * FROM clientes WHERE codentidad='$codentidad' AND borrado=0";
	$rs_comprobar=mysqli_query($conexion,$query_comprobar);
	if (mysqli_num_rows($rs_comprobar) > 0 ) {
		?><script>
			alert ("No se puede eliminar esta entidad bancaria porque tiene clientes asociados.");
			location.href="eliminar_entidad.php?codentidad=<? echo $codentidad?>";
		</script>
		<?
	} else {
		$query_comprobar="SELECT * FROM proveedores WHERE codentidad='$codentidad' AND borrado=0";
		$rs_comprobar=mysqli_query($conexion,$query_comprobar);
		if (mysqli_num_rows($rs_comprobar) > 0 ) {
			?><script>
				alert ("No se puede eliminar esta entidad bancaria porque tiene proveedores asociados.");
				location.href="eliminar_entidad.php?codentidad=<? echo $codentidad?>";
			</script>
		<? } else {
				$query="UPDATE entidades SET borrado=1 WHERE codentidad='$codentidad'";
				$rs_query=mysqli_query($conexion,$query);
				if ($rs_query) { $mensaje="La entidad ha sido eliminada correctamente"; }
				$cabecera1="Inicio >> Entidades Bancarias &gt;&gt; Eliminar Entidad Bancaria ";
				$cabecera2="ELIMINAR ENTIDAD BANCARIA ";
				$query_mostrar="SELECT * FROM entidades WHERE codentidad='$codentidad'";
				$rs_mostrar=mysqli_query($conexion,$query_mostrar);
				$codentidad=mysqli_result($rs_mostrar,0,"codentidad");
				$nombreentidad=mysqli_result($rs_mostrar,0,"nombreentidad");
			}
	}
}

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
		
		function aceptar() {
			location.href="index.php";
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
							<td width="15%"><span  id="tcod">C&Oacute;DIGO</span></td>
							<td width="85%" colspan="2"><?php echo $codentidad?></td>
					    </tr>
						<tr>
							<td width="15%"><span  id="tnomb">Nombre</span></td>
						    <td width="85%" colspan="2"><?php echo $nombreentidad?></td>
					    </tr>						
					</table>
			  </div>
				<div id="botonBusqueda">
					<button type="button" id="btnaceptar" onClick="aceptar()" onMouseOver="style.cursor=cursor"> <img src="../img/ok.svg" alt="aceptar" /> <span  id="taceptar">Aceptar</span> </button>
			  </div>
			 </div>
		  </div>
		</div>
	</body>
</html>
