<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(pref,nombre,nif) {
	parent.opener.document.formulario.codcliente.value=pref;
	parent.opener.document.formulario.nombre.value=nombre;
	parent.opener.document.formulario.nif.value=nif;
	parent.window.close();
}

</script>
<? require_once("../conectar7.php"); ?>
require_once("../mysqli_result.php");
<body>
<?
	$codcliente=$_GET["codcliente"];
	$consulta="SELECT * FROM clientes WHERE codcliente='$codcliente' AND borrado=0";
	$rs_tabla = mysqli_query($conexion,$consulta);
?>
<div id="tituloForm" class="header">
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="10%"><div align="center"><b><span id="tcodigo">Codigo</span></b></div></td>
			<td width="60%"><div align="center"><b><span id="tcliente">Cliente</span></b></div></td>
			<td width="20%"><div align="center"><b><span id="tnip">NIF/CIF</span></b></div></td>
			<td width="10%"><div align="center"></td>
		  </tr>
		<?php if (mysqli_num_rows($rs_tabla) > 0) { 
				$codcliente=mysqli_result($rs_tabla,$i,"codcliente");
				$nombre=mysqli_result($rs_tabla,$i,"nombre");
				$nif=mysqli_result($rs_tabla,$i,"nif"); ?>
			<tr class="itemParTabla">
				<tr>
					<td>
        <div align="center"><?php echo $codcliente;?></div></td>
					<td>
        <div align="left"><?php echo utf8_encode($nombre);?></div></td>
					<td><div align="center"><?php echo $nif;?></div></td>
					<td align="center"><div align="center"><a href="javascript:pon_prefijo(<?php echo $codcliente?>,'<?php echo $nombre?>','<?php echo $nif?>')"><img src="../img/convertir.svg" width="16px" height="16px" border="0" data-ttitle="tsel" title="Seleccionar"></a></div></td>
				</tr>
		<?php } else { ?>
			<tr>
			<td width="10%"><div align="center"></div></td>
			<td width="60%"><div align="center"><b><span id="tmsgsc">NO HAY NING&Uacute;N CLIENTE CON ESE C&Oacute;DIGO</span></b></div></td>
			<td width="20%"><div align="center"></div></td>
			<td width="10%"><div align="center"></td>
		  	</tr>
		<?php } ?>
  </table>
</div>
</body>
</html>
