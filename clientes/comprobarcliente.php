<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(nombre,nif) {
	parent.document.form_busqueda.nombre.value=nombre;
	parent.document.form_busqueda.nif.value=nif;
}

function limpiar() {
	parent.document.form_busqueda.nombre.value="";
	parent.document.form_busqueda.nif.value="";
	parent.document.form_busqueda.codcliente.value="";
}

</script>
<? require_once("../conectar7.php"); ?>
require_once("../mysqli_result.php");
<body>
<?
	$codcliente=$_GET["codcliente"];
	$consulta="SELECT * FROM clientes WHERE codcliente='$codcliente' AND borrado=0";
	$rs_tabla = mysqli_query($conexion,$consulta);
	if (mysqli_num_rows($rs_tabla)>0) {
		?>
		<script languaje="javascript">
		pon_prefijo("<? echo mysqli_result($rs_tabla,0,nombre) ?>","<? echo mysqli_result($rs_tabla,0,nif) ?>");
		</script>
		<? 
	} else { ?>
	<script>
	talert ('msgscliente');
	limpiar();
	</script>
	<? }
?>
</div>
</body>
</html>
