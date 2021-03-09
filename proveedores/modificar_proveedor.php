<?
require_once("../conectar7.php");
require_once("../mysqli_result.php");

$codproveedor=$_GET["codproveedor"];

$query="SELECT * FROM proveedores WHERE codproveedor='$codproveedor'";
$rs_query=mysqli_query($conexion,$query);

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
                    <div id="tituloForm" class="header"><span id="tmodprove">MODIFICAR PROVEEDOR</span></div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_proveedor.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td><span id="tcod">C&Oacute;DIGO</span></td>
							<td><?php echo $codproveedor?></td>
						    <td width="42%" rowspan="13" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
							<td width="15%"><span id="tnomb">Nombre</span></td>
						    <td width="43%"><input NAME="Anombre" type="text" class="cajaGrande" id="nombre" size="45" maxlength="45" value="<?php echo mysqli_result($rs_query,0,"nombre")?>"></td>
				        </tr>
						<tr>
						  <td><span id="tnip">NIF / CIF</span></td>
						  <td><input id="nif" type="text" class="cajaPequena" NAME="anif" maxlength="15" value="<?php echo mysqli_result($rs_query,0,"nif")?>"></td>
				      </tr>
						<tr>
						  <td><span id="tdireccion">Direcci&oacute;n</span></td>
						  <td><input NAME="adireccion" type="text" class="cajaGrande" id="direccion" size="45" maxlength="45" value="<?php echo mysqli_result($rs_query,0,"direccion")?>"></td>
				      </tr>
						<tr>
						  <td><span id="tlocal">Localidad</span></td>
						  <td><input NAME="alocalidad" type="text" class="cajaGrande" id="localidad" size="35" maxlength="35" value="<?php echo mysqli_result($rs_query,0,"localidad")?>"></td>
				      </tr>
					  <?php
					  	$codprovincia=mysqli_result($rs_query,0,"codprovincia");
					  	$query_provincias="SELECT * FROM provincias ORDER BY nombreprovincia ASC";
						$res_provincias=mysqli_query($conexion,$query_provincias);
						$contador=0;
					  ?>
						<tr>
							<td width="15%"><span id="tpcia">Provincia</span></td>
							<td width="43%"><select id="cboProvincias" name="cboProvincias" class="comboGrande">
							<option value="0" data-opttrad="selprovincia" >Seleccione una provincia</option>
								<?php
								while ($contador < mysqli_num_rows($res_provincias)) { 
									if ($codprovincia == mysqli_result($res_provincias,$contador,"codprovincia")) {?>
								<option value="<?php echo mysqli_result($res_provincias,$contador,"codprovincia")?>" selected="selected"><?php echo mysqli_result($res_provincias,$contador,"nombreprovincia")?></option>
								<? } else { ?>
									<option value="<?php echo mysqli_result($res_provincias,$contador,"codprovincia")?>"><?php echo mysqli_result($res_provincias,$contador,"nombreprovincia")?></option>
								<? } $contador++;
								} ?>				
								</select>							</td>
				        </tr>						
						<?php
						$codentidad=mysqli_result($rs_query,0,"codentidad");
					  	$query_entidades="SELECT * FROM entidades WHERE borrado=0 ORDER BY nombreentidad ASC";
						$res_entidades=mysqli_query($conexion,$query_entidades);
						$contador=0;
					  ?>
						<tr>
							<td width="15%" height="26"><span id="tentiban">Entidad Bancaria</span></td>
							<td width="43%"><select id="cboBanco" name="cboBanco" class="comboGrande">
							<option value="0"> data-opttrad="selntiban" >Seleccione una entidad bancaria<</option>
									<?php
								while ($contador < mysqli_num_rows($res_entidades)) { 
									if ($codentidad == mysqli_result($res_entidades,$contador,"codentidad")) { ?>
								<option value="<?php echo mysqli_result($res_entidades,$contador,"codentidad")?>" selected="selected"><?php echo mysqli_result($res_entidades,$contador,"nombreentidad")?></option>
								<? } else { ?>
								<option value="<?php echo mysqli_result($res_entidades,$contador,"codentidad")?>"><?php echo mysqli_result($res_entidades,$contador,"nombreentidad")?></option>
								<? } $contador++;
								} ?>
											</select>							</td>
				        </tr>
						<tr>
							<td><span id="tctabcaria">Cuenta bancaria</span></td>
							<td><input id="cuentabanco" type="text" class="cajaGrande" NAME="acuentabanco" maxlength="20" value="<?php echo mysqli_result($rs_query,0,"cuentabancaria")?>"></td>
					    </tr>
						<tr>
							<td><span id="tcodpostal">C&oacute;digo postal</span></td>
							<td><input id="codpostal" type="text" class="cajaPequena" NAME="acodpostal" maxlength="5" value="<?php echo mysqli_result($rs_query,0,"codpostal")?>"></td>
					    </tr>
						<tr>
							<td><span id="ttelef">Tel&eacute;fono</span></td>
							<td><input id="telefono" name="atelefono" type="text" class="cajaPequena" maxlength="14" value="<?php echo mysqli_result($rs_query,0,"telefono")?>"></td>
					    </tr>
						<tr>
							<td><span id="tmovil">M&oacute;vil</span></td>
							<td><input id="movil" name="amovil" type="text" class="cajaPequena" maxlength="14" value="<?php echo mysqli_result($rs_query,0,"movil")?>"></td>
					    </tr>
						<tr>
							<td><span id="tcorrelec">Correo electr&oacute;nico</span></td>
							<td><input NAME="aemail" type="text" class="cajaGrande" id="email" size="35" maxlength="35" value="<?php echo mysqli_result($rs_query,0,"email")?>"></td>
					    </tr>
												<tr>
							<td><span id="tdirrcweb">Direcci&oacute;n web</span></td>
							<td><input NAME="aweb" type="text" class="cajaGrande" id="web" size="45" maxlength="45" value="<?php echo mysqli_result($rs_query,0,"web")?>"></td>
					    </tr>
					</table>
			  </div>
				<div id="botonBusqueda">
					<button type="button" id="btnaceptar" onClick="validar(formulario,true)"  onMouseOver="style.cursor=cursor"> <img src="../img/ok.svg" alt="aceptar" /> <span id="taceptar">Aceptar</span> </button>
					<button type="button" id="btnlimpiar"  onClick="limpiar()" onMouseOver="style.cursor=cursor"> <img src="../img/limpiar.svg" alt="limpiar" /> <span id="tlimpiar">Limpiar</span> </button>
					<button type="button" id="btncancelar"  onClick="cancelar()" onMouseOver="style.cursor=cursor"> <img src="../img/cancelar.svg" alt="cancelar" /> <span id="tcancelar">Cancelar</span> </button>
					<input id="accion" name="accion" value="modificar" type="hidden">
					<input id="id" name="id" value="<?php echo $codproveedor?>" type="hidden">
			  </div>
			  </form>
			  </div>
		  </div>
		</div>
	</body>
</html>
