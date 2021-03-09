<?php
require_once("../conectar7.php");
$id_resource='5';
$id_sresource='22';
require_once("../racf/purePhpVerify.php");

$cadena_busqueda=$_GET["cadena_busqueda"];

if (!isset($cadena_busqueda)) { $cadena_busqueda=""; } else { $cadena_busqueda=str_replace("",",",$cadena_busqueda); }

if ($cadena_busqueda<>"") {
	$array_cadena_busqueda=split("~",$cadena_busqueda);
	$codformapago=$array_cadena_busqueda[1];
	$nombrefp=$array_cadena_busqueda[2];
} else {
	$codformapago="";
	$nombrefp="";
}

?>
<html>
	<head>
		<title>Formas de pago</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="/jquery/jquery331.js"></script>
		 
        
        <script language="javascript">
         
		
		function inicio() {
			document.getElementById("form_busqueda").submit();
		}
		function nueva_fp() {
			location.href="nueva_fp.php";
		}
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
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
		
		function imprimir() {
			var codformapago=document.getElementById("codformapago").value;
			var nombrefp=document.getElementById("nombrefp").value;
			window.open("../fpdf/formaspago.php?codformapago="+codformapago+"&nombrefp="+nombrefp);
		}
		
		function paginar() {
			document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			document.getElementById("form_busqueda").submit();
		}
		
		function hacer_cadena_busqueda() {
			var codformapago=document.getElementById("codformapago").value;
			var nombrefp=document.getElementById("nombrefp").value;
			var cadena="";
			cadena="~"+codformapago+"~"+nombrefp+"~";
			return cadena;
			}
			
		function limpiar() {
			document.getElementById("form_busqueda").reset();
		}
		</script>
	</head>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
                    <div id="tituloForm" class="header"><span id="tbscfdp">Buscar FORMAS DE PAGO</span></div>
				<div id="frmBusqueda">
				<form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
					<table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0>					
						<tr>
                            <td width="16%"><span id="tcodfrmpg">Codigo de forma de pago</span></td>
							<td width="68%"><input id="codformapago" type="text" class="cajaPequena" NAME="codformapago" maxlength="3" value="<? echo $codformapago?>"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="6%" align="right"></td>
						</tr>
						<tr>
							<td><span id="tnomb">Nombre</span></td>
							<td><input id="nombrefp" name="nombrefp" type="text" class="cajaGrande" maxlength="20" value="<? echo $nombrefp?>"></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					</table>
			  </div>
			 	<div id="botonBusqueda">
					<button type="button" id="btnbuscar" onClick="buscar()"  onMouseOver="style.cursor=cursor"> <img src="../img/ver.svg" alt="buscar" /> <span id="tbuscar">Buscar</span> </button>
					<button type="button" id="btnlimpiar"  onClick="limpiar()" onMouseOver="style.cursor=cursor"> <img src="../img/limpiar.svg" alt="limpiar" /> <span id="tlimpiar">Limpiar</span> </button>
					<button type="button" id="btnnuevo" onClick="nueva_fp()" onMouseOver="style.cursor=cursor"> <img src="../img/nuevo.svg" alt="nuevo" /> <span>Nueva forma de Pago</span> </button>
					<button type="button" id="btnimprimir"  onClick="imprimir()" onMouseOver="style.cursor=cursor"> <img src="../img/printer.svg" alt="Imprimir" /> <span id="timpr">Imprimir</span> </button>
				</div>
			  <div id="lineaResultado">
			  <table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0>
			  	<tr>
				<td width="50%" class="paginar" align="left">N de formas de pago encontradas <input id="filas" type="text" class="cajaPequena" NAME="filas" maxlength="5" readonly></td>
				<td width="50%" align="right"><span id="tmostradas">Mostradas</span> <select name="paginas" id="paginas" onChange="paginar()">
		          </select></td>
			  </table>
				</div>
				<div id="cabeceraResultado" class="header">
					relacion de FORMAS DE PAGO </div>
				<div id="frmResultado">
				<table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
						<tr class="cabeceraTabla">
							<td width="12%"><span id="titem">ITEM</span></td>
							<td width="20%"><span id="tcodigo">CODIGO</span></td>
							<td width="50%"><span id="tnomb">NOMBRE</span></td>
							<td width="6%">&nbsp;</td>
							<td width="6%">&nbsp;</td>
							<td width="6%">&nbsp;</td>
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
				</div>
			</div>
		  </div>			
		</div>
	</body>
</html>
