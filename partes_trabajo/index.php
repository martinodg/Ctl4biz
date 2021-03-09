<?php
require_once("../conectar.php");
$id_resource='6';
$id_sresource='25';
require_once("../racf/purePhpVerify.php");

$cadena_busqueda=$_GET["cadena_busqueda"];

if (!isset($cadena_busqueda)) { $cadena_busqueda=""; } else { $cadena_busqueda=str_replace("",",",$cadena_busqueda); }

if ($cadena_busqueda<>"") {
	$array_cadena_busqueda=split("~",$cadena_busqueda);
#codtrabajador+"~"+nombre+"~"+numparte+"~"+cboEstados+"~"+fechacomienzo+"~"+titulo
	$codtrabajador=$array_cadena_busqueda[1];
	$nombre=$array_cadena_busqueda[2];
	$numparte=$array_cadena_busqueda[3];
	$cboEstados=$array_cadena_busqueda[4];
	$fechacomienzo=$array_cadena_busqueda[5];
	$titulo=$array_cadena_busqueda[6];
} else {
	$codcliente="";
	$nombre="";
	$numparte="";
	$cboEstados="";
	$fechainicio="";
	$fechafin="";
}

?>
<html>
	<head>
		<title>Parte de Trabajo</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
		<script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
		<script type="text/javascript" src="/jquery/jquery331.js"></script>
		 
        
        <script language="javascript">
         

		function inicio() {
			document.getElementById("form_busqueda").submit();
		}

		function nuevo_parte() {
			location.href="nuevo_parte.php";
		}

		function buscar() {
			var cadena;
			cadena=hacer_cadena_busqueda();
			document.getElementById("cadena_busqueda").value=cadena;
			if (document.getElementById("iniciopagina").value=="") {
				document.getElementById("iniciopagina").value=1;
			} else {
				document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			}
			document.getElementById("form_busqueda").submit();
		}

		function paginar() {
			document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			document.getElementById("form_busqueda").submit();
		}

		function hacer_cadena_busqueda() {
			var codtrabajador=document.getElementById("codtrabajador").value;
			var nombre=document.getElementById("nombre").value;
			var numparte=document.getElementById("numparte").value;
			var cboEstados=document.getElementById("cboEstados").value;
			var fechacomienzo=document.getElementById("fechacomienzo").value;
			var titulo=document.getElementById("titulo").value;
			var cadena="";
			cadena="~"+codtrabajador+"~"+nombre+"~"+numparte+"~"+cboEstados+"~"+fechacomienzo+"~"+titulo+"~";
			return cadena;
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
			document.getElementById("form_busqueda").reset();
		}

		function abreVentana(){
			miPopup = window.open("ventana_trabajadores.php","miwin","width=700,height=380,scrollbars=yes");
			miPopup.focus();
		}

		function validartrabajador(){
			var codigo=document.getElementById("codtrabajador").value;
			miPopup = window.open("comprobartrabajador_ini.php?codtrabajador="+codigo,"frame_datos","width=700,height=80,scrollbars=yes");
		}

		</script>
	</head>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">Buscar PARTE DE TRABAJO </div>
				<div id="frmBusqueda">
				<form id="formulario" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="16%"><span id="tcodtjador">Codigo de trabajador </span></td>
							<td width="68%"><input id="codtrabajador" type="text" class="cajaPequena" NAME="codtrabajador" maxlength="10" value="<? echo $codtrabajador?>"> <img src="../img/ver.svg" width="16" height="16" onClick="abreVentana()"  data-ttitle="data-ttitle" title="Buscar trabajador"  onMouseOver="style.cursor=cursor"> <img src="../img/cliente.svg" width="16" height="16" onClick="validartrabajador()" title="Validar trabajador" onMouseOver="style.cursor=cursor"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="6%" align="right"></td>
						</tr>
						<tr>
							<td><span id="tnomb">Nombre</span></td>
							<td><input id="nombre" name="nombre" type="text" class="cajaGrande" maxlength="45" value="<? echo $nombre?>">
<input name="nif" type="hidden" id="nif" value=""></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
						  <td>Num. Parte</td>
						  <td><input id="numparte" type="text" class="cajaPequena" NAME="numparte" maxlength="15" value="<? echo $numparte?>"></td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
					  </tr>
						<tr>
						  <td><span id="ttrabaj">TRABAJO</span></td>
						  <td><input id="titulo" name="titulo" type="text" class="cajaGrande" maxlength="45" value="<? echo $titulo?>"></td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
					  </tr>
						<tr>
							<td><span id="testado">ESTADO</span></td>
							<td><select id="cboEstados" name="cboEstados" class="comboMedio">
								<option value="0" selected data-opttrad="todosest">Todos los estados</option>
<?php
foreach ($estados_partestrabajo as $k => $v) {
?>
								<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
<?php } ?>
								</select></td>
					    </tr>
					  <tr>
						  <td><span id="fccom">Fecha Comienzo</span></td>
						  <td><input id="fechacomienzo" type="text" class="cajaPequena" NAME="fechacomienzo" maxlength="10" value="<? echo $fechacomienzo?>" readonly><img src="../img/calendario.svg" name="Image1" id="Image1" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'" title="Calendario">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fechacomienzo",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		</script>	</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
					  </tr>
					</table>
			  </div>
		 	  <div id="botonBusqueda">
                  <button type="button" id="btnbuscar" onClick="buscar()"  onMouseOver="style.cursor=cursor"> <img src="../img/ver.svg" alt="buscar" /> <span id="tbuscar">Buscar</span> </button>
			 	  <button type="button" id="btnlimpiar"  onClick="limpiar()" onMouseOver="style.cursor=cursor"> <img src="../img/limpiar.svg" alt="limpiar" /> <span id="tlimpiar">Limpiar</span> </button>
				  <button type="button" id="btnnuevo" onClick="nuevo_parte()" onMouseOver="style.cursor=cursor"> <img src="../img/nuevo.svg" alt="nuevo" /> <span id="tnuevo">Nuevo</span> </button>
			  <div id="lineaResultado">
			  <table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
			  	<tr>
				<td width="50%" class="paginar" align="left"><span id="tndpenc">N de partes encontrados</span> <input id="filas" type="text" class="cajaPequena" NAME="filas" maxlength="5" readonly></td>
				<td width="50%" class="paginar" align="right"><span id="tmostra">Mostrados</span> <select name="paginas" id="paginas" onChange="paginar()">
		          </select></td>
			  </table>
				</div>
				<div id="cabeceraResultado" class="header">
					<span id="trelprts">relacion de PARTES</span> </div>
				<div id="frmResultado">
				<table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
						<tr class="cabeceraTabla">
							<td width="8%"><span id="titem">ITEM</span></td>
                            <td width="8%"><span id="tnroparte">N. PARTE</span></td>
							<td width="12%"><span id="ttrabajad">TRABAJADOR</span></td>
                            <td width="18%"><span id="ttrabaj">TRABAJO</span> </td>
							<td width="10%"><span id="fccom">Fecha Comienzo</span></td>
						    <td width="8%"><span id="thrsprv">Horas previstas</span></td>
                            <td width="8%"><span id="tpciohs">Precio / Hora</span></td>
							<td width="10%"><span id="testado">Estado</span></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						</tr>
				</table>
				</div>
				<input type="hidden" id="iniciopagina" name="iniciopagina">
				<input type="hidden" id="cadena_busqueda" name="cadena_busqueda">
			</form>
				<div id="lineaResultado">
					<iframe width="100%" height="250" id="frame_rejilla" name="frame_rejilla" frameborder="0">
						<ilayer width="100%" height="300" id="frame_rejilla" name="frame_rejilla"></ilayer>
					</iframe>
					<iframe id="frame_datos" name="frame_datos" width="0" height="0" frameborder="0">
					<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
					</iframe>
				</div>
			</div>
		  </div>
		</div>
	</body>
</html>
