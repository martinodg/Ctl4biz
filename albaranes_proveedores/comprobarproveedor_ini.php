<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="../funciones/languages/changelanguage.js"></script>
</head>
<script language="javascript">

function pon_prefijo(nombre) {
	parent.document.form_busqueda.nombre.value=nombre;
}

function limpiar() {
	parent.document.form_busqueda.nombre.value="";
	parent.document.form_busqueda.codproveedor.value="";
}

</script>
<? require_once("../conectar7.php"); ?>
require_once("../mysqli_result.php");
<body>
<?
	$codproveedor=$_GET["codproveedor"];
	$consulta="SELECT * FROM proveedores WHERE codproveedor='$codproveedor' AND borrado=0";
	$rs_tabla = mysqli_query($conexion,$consulta);
	if (mysqli_num_rows($rs_tabla)>0) {
		?>
		<script languaje="javascript">
		pon_prefijo("<? echo mysqli_result($rs_tabla,0,nombre) ?>");
		</script>
		<? 
	} else { ?>
    <!-- @todo revisar si hay que cargar en este archivo las traducciones  -->
	<script>
    //talert('sinproveedor');
    talert('sinproveedor');
	limpiar();
	</script>
	<? }
?>
</div>
</body>
</html>
