<?php
require_once("../conectar7.php");
require_once("../mysqli_result.php");

$codcliente=$_POST["codcliente"];
$nombre=$_POST["nombre"];
$nif=$_POST["nif"];
$codprovincia=$_POST["cboProvincias"];
$localidad=$_POST["localidad"];
$telefono=$_POST["telefono"];
$cadena_busqueda=$_POST["cadena_busqueda"];
//echo $codprovincia;
$where="1=1";
if ($codcliente <> "") { $where.=" AND codcliente='$codcliente'"; }
if ($nombre <> "") { $where.=" AND nombre like '%".$nombre."%'"; }
if ($nif <> "") { $where.=" AND nif like '%".$nif."%'"; }
if ($codprovincia > "0") { $where.=" AND codprovincia='$codprovincia'"; }
if ($localidad <> "") { $where.=" AND localidad like '%".$localidad."%'"; }
if ($telefono <> "") { $where.=" AND telefono like '%".$telefono."%'"; }

$where.=" ORDER BY nombre ASC";
$query_busqueda="SELECT count(*) as filas FROM clientes WHERE borrado=0 AND ".$where;
$rs_busqueda=mysqli_query($conexion,$query_busqueda);
$filas=mysqli_result($rs_busqueda,0,"filas");

?>
<html>
	<head>
		<title>Clientes</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../jquery/jquery331.js"></script>
        <script type="text/javascript" src="../funciones/languages/changelanguage.js"></script>
		<script language="javascript">
		
		function ver_cliente(codcliente) {
			parent.location.href="ver_cliente.php?codcliente=" + codcliente + "&cadena_busqueda=<? echo $cadena_busqueda?>";
		}
		
		function modificar_cliente(codcliente) {
			parent.location.href="modificar_cliente.php?codcliente=" + codcliente + "&cadena_busqueda=<? echo $cadena_busqueda?>";
		}
		
		function eliminar_cliente(codcliente) {
			parent.location.href="eliminar_cliente.php?codcliente=" + codcliente + "&cadena_busqueda=<? echo $cadena_busqueda?>";
		}

		function inicio() {
			var numfilas=document.getElementById("numfilas").value;
			var indi=parent.document.getElementById("iniciopagina").value;
			var contador=1;
			var indice=0;
			if (indi>numfilas) { 
				indi=1; 
			}
			parent.document.form_busqueda.filas.value=numfilas;
			parent.document.form_busqueda.paginas.innerHTML="";		
			while (contador<=numfilas) {
				texto=contador + "-" + parseInt(contador+9);
				if (indi==contador) {
					parent.document.form_busqueda.paginas.options[indice]=new Option (texto,contador);
					parent.document.form_busqueda.paginas.options[indice].selected=true;
				} else {
					parent.document.form_busqueda.paginas.options[indice]=new Option (texto,contador);
				}
				indice++;
				contador=contador+10;
			}
		}
		</script>
	</head>

	<body onload=inicio()>	
		<div id="pagina">
			<div id="zonaContenido">
			<div align="center">
			<table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
			<input type="hidden" name="numfilas" id="numfilas" value="<? echo $filas?>">
				<? $iniciopagina=$_POST["iniciopagina"];
				if (empty($iniciopagina)) { $iniciopagina=$_GET["iniciopagina"]; } else { $iniciopagina=$iniciopagina-1;}
				if (empty($iniciopagina)) { $iniciopagina=0; }
				if ($iniciopagina>$filas) { $iniciopagina=0; }
					if ($filas > 0) { ?>
						<? $sel_resultado="SELECT * FROM clientes WHERE borrado=0 AND ".$where;
						   $sel_resultado=$sel_resultado."  limit ".$iniciopagina.",10";
						   $res_resultado=mysqli_query($conexion,$sel_resultado);
						   $contador=0;
						   while ($contador < mysqli_num_rows($res_resultado)) { 
								 if ($contador % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
							<td class="aCentro" width="8%"><? echo $contador+1;?></td>
							<td width="6%"><div align="center"><? echo mysqli_result($res_resultado,$contador,"codcliente")?></div></td>
							<td width="38%"><div align="left"><? echo mysqli_result($res_resultado,$contador,"nombre")?></div></td>
							<td class="aDerecha" width="13%"><div align="center"><? echo mysqli_result($res_resultado,$contador,"nif")?></div></td>
							<td class="aDerecha" width="19%"><div align="center"><? echo mysqli_result($res_resultado,$contador,"telefono")?></div></td>
							<td width="5%"><div align="center"><a href="#"><img src="../img/modificar.svg" width="16" height="16" border="0" onClick="modificar_cliente(<?php echo mysqli_result($res_resultado,$contador,"codcliente")?>)" data-ttitle="modificar" title="Modificar"></a></div></td>
														<td width="5%"><div align="center"><a href="#"><img src="../img/ver.svg" width="16" height="16" border="0" onClick="ver_cliente(<?php echo mysqli_result($res_resultado,$contador,"codcliente")?>)" data-ttitle="visualizar" title="Visualizar"></a></div></td>
							<td width="6%"><div align="center"><a href="#"><img src="../img/eliminar.svg" width="16" height="16" border="0" onClick="eliminar_cliente(<?php echo mysqli_result($res_resultado,$contador,"codcliente")?>)" data-ttitle="eliminar" title="Eliminar"></a></div></td>
						</tr>
						<? $contador++;
							}
						?>			
					</table>
					<? } else { ?>
					<table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0>
						<tr>
                            <td width="100%" class="mensaje"><span id="tmsgsincliente">No hay ning&uacute;n cliente que cumpla con los criterios de b&uacute;squeda</span></td>
					    </tr>
					</table>					
					<? } ?>					
				</div>
			</div>
		  </div>			
		</div>
	</body>
</html>
