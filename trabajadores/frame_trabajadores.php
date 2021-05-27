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
	parent.opener.document.form_busqueda.codtrabajador.value=pref;
	parent.opener.document.form_busqueda.nombre.value=nombre;
	parent.opener.document.form_busqueda.nif.value=nif;
	parent.window.close();
}

</script>
<? 
require_once("../conectar7.php");
require_once("../mysqli_result.php");
 ?>
<body>
<?

	$consulta="SELECT * FROM trabajadores WHERE borrado=0 ORDER BY codtrabajador ASC";
	$rs_tabla = mysqli_query($conexion,$consulta);
	$nrs=mysqli_num_rows($rs_tabla);
?>
<div id="tituloForm2" class="header">
<div align="center">
<form id="form1" name="form1">
<? if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="10%"><div align="center"><b><span  id="tcodigo">Codigo</span></b></div></td>
			<td width="60%"><div align="center"><b><span  id="ttrabajad">TRABAJADOR</span></b></div></td>
			<td width="20%"><div align="center"><b><span  id="tnip">NIF/CIF</span></b></div></td>
			<td width="10%"><div align="center"></td>
		  </tr>
		<?php
			for ($i = 0; $i < mysqli_num_rows($rs_tabla); $i++) {
				$codtrabajador=mysqli_result($rs_tabla,$i,"codtrabajador");
				$nombre=mysqli_result($rs_tabla,$i,"nombre");
				$nif=mysqli_result($rs_tabla,$i,"nif");
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
					<td>
        <div align="center"><?php echo $codtrabajador;?></div></td>
					<td>
        <div align="left"><?php echo utf8_encode($nombre);?></div></td>
					<td><div align="center"><?php echo $nif;?></div></td>
					<td align="center"><div align="center"><a href="javascript:pon_prefijo(<?php echo $codtrabajador?>,'<?php echo $nombre?>','<?php echo $nif?>')"><img src="../img/convertir.svg" width="16px" height="16px" border="0" data-ttitle="tsel" title="Seleccionar"></a></div></td>
				</tr>
			<?php }
		?>
  </table>
		<?php
		}  ?>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
<input type="hidden" id="accion" name="accion">
</form>
</div>
</div>
</body>
</html>
