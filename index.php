<?php
if(session_id() == '') {
    session_start();
}

// Turn off all error reporting
error_reporting(0);

?>



<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' media='screen and (max-width: 700px)' href='../estilos/menu0.css' />
    <link rel='stylesheet' media='screen and (min-width: 701px) and (max-width: 959px)' href='../estilos/menu1.css' />
    <link rel='stylesheet' media='screen and (min-width: 960px)' href='../estilos/menu2.css' />
    <!link href="../estilos/menu2.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="./jquery/jquery331.js"></script>
    <script type="text/javascript" src="./funciones/languages/changelanguage.js"></script>

    
    <script language="javascript">
        $(document).ready(function() {
            $.get("getcompanyname.php", 
                    function(data) {
                        $('#nombreCompania').html(data);
                        

                    });
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            /* Intermediarios Comerciales                                                                                                             */
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            $('#proveedores').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/proveedores.svg">');
                $('#bottombar').html('Intermediarios Comerciales>Proveedores');
            });
            $('#clientes').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/clientes.svg">');
                $('#bottombar').html('Intermediarios Comerciales>Clientes');
            });
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            /* Produccion                                                                                                                             */
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            $('#tipoarticulos').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/tipos.svg">');
                $('#bottombar').html('Produccion>Tipo de Articulos');
            });
            $('#articulos').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/articulos.svg">');
                $('#bottombar').html('Produccion>Articulos');
            });
            $('#metaprocesos').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/metaproc.svg">');
                $('#bottombar').html('Produccion>Meta Procesos');
            });
            $('#procesosproduccion').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/procesos.svg">');
                $('#bottombar').html('Produccion>Procesos de Produccion');
            });
            $('#agruparprocesos').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/procesos.svg">');
                $('#bottombar').html('Produccion>Agrupar Procesos');
            });
            $('#batchproduccion').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/batch.svg">');
                $('#bottombar').html('Produccion>Batch de Produccion');
            });
            $('#lotesproduccion').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/lotes.svg">');
                $('#bottombar').html('Produccion>Lotes de Produccion');
            });
            $('#estaciones').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/estaciones.svg">');
                $('#bottombar').html('Produccion>Estaciones de Trabajo');
            });
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            /* Ventas                                                                                                                                 */
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            $('#ventasmostrador').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/ventasmostrador.svg">');
                $('#bottombar').html('Ventas>Venta a mostrador');
            });
            $('#facturas').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/factura.svg">');
                $('#bottombar').html('Ventas>Facturas');
            });
            $('#remitos').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/remito.svg">');
                $('#bottombar').html('Ventas>Remitos');
            });
            $('#facturarremitos').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/facturarremito.svg">');
                $('#bottombar').html('Ventas>Facturar Remitos');
            });
            $('#presupuestos').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/presupuesto.svg">');
                $('#bottombar').html('Ventas>Presupuestos');
            });
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            /* Compras                                                                                                                                */
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            $('#facturascompras').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/factura-compras.svg">');
                $('#bottombar').html('Compras>Facturas de Compras');
            });
            $('#remitoscompras').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/remito-compras.svg">');
                $('#bottombar').html('Compras>Remitos de Compras');
            });

            $('#facturarremitoscompras').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/facturarremito-compras.svg">');
                $('#bottombar').html('Compras>Facturar Remitos de Compras');
            });
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            /* Contabilidad                                                                                                                              */
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            $('#cobros').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/cobros.svg">');
                $('#bottombar').html('Administracion>Cobros');
            });
            $('#pagos').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/pagos.svg">');
                $('#bottombar').html('Administracion>Pagos');
            });

            $('#caja').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/caja.svg">');
                $('#bottombar').html('Administracion>Caja Diaria');
            });
            $('#librodiario').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/librodiario.svg">');
                $('#bottombar').html('Administracion>Libro Diario');
            });
            $('#formaspagos').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/formadepago.svg">');
                $('#bottombar').html('Configuracion>Formas de Pago');
            });    
            $('#impuestos').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/impuestos.svg">');
                $('#bottombar').html('Configuracion>Impuestos');
            });
            $('#entidades').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/entidades.svg">');
                $('#bottombar').html('Configuracion>Entidades Bancarias');
            });
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            /* Recursos Humanos                                                                                                                             */
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            $('#recursoshumanos').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/hr.svg">');
                $('#bottombar').html('Recursos Humanos>Partes de Trabajo');
            });
            $('#empleados').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/empleados.svg">');
                $('#bottombar').html('Recursos Humanos>Empleados');
            });
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            /* Configuracion                                                                                                                              */
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            
            $('#etiquetas').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/etiquetas.svg">');
                $('#bottombar').html('Configuracion>Etiquetas');
            });
            $('#ubicaciones').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/ubicaciones.svg">');
                $('#bottombar').html('Configuracion>Ubicaciones');
            });
            $('#embalajes').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/embalajes.svg">');
                $('#bottombar').html('Configuracion>Embalajes');
            });
            
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            /* side menu                                                                                                                              */
            /*----------------------------------------------------------------------------------------------------------------------------------------*/
            $('#home').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/homeg.svg">');
                $('#bottombar').html('Home');
            });
            $('#settings').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/settingsg.svg">');
                $('#bottombar').html('Settings');
            });
            $('#ayuda').click(function() {
                $('#icono').html('<img class="imgicon" src="./img/helpg.svg">');
                $('#bottombar').html('Ayuda');
            });
        });
        //function to redirect parent page
        function changeURL( url ) {
            window.top.location.href = url;
            //document.location = url;
        }
    </script>
</head>

<body>
<?php
if($_SESSION["intUser"]) {
?>
    <div id="header">
        <div id="icono"><img class="imgicon" src="./img/homeg.svg"></div>
        <nav id="page-nav" role="navigation">
            <label for="hamburger"><img class="menuicon" src="./img/menu.svg"></label>
            <input type="checkbox" id="hamburger" />
            <ul class="menu">
                <li>
                    <label for="hamburger-3"><span id="ventas_plus">Ventas +</span></label> 
                    <a class="menu" href="#"><span id="ventas">Ventas</span></a>
                    <input type="checkbox" id="hamburger-3" />
                    <ul class="dropdown">
                        <li><a href="./clientes/index.php" target="principal" id="clientes"><span id="cliente">Clientes</span></a></li>
                        <li><a href="./ventas_mostrador/index.php" target="principal" id="ventasmostrador"><span id="tvntmst">Venta a Mostrador</span></a></li>
                        <li><a href="./facturas_clientes/index.php" target="principal" id="facturas"><span id="factura">Facturas</span></a></li>
                        <li><a href="./albaranes_clientes/index.php" target="principal" id="remitos"><span id="remitos">Remitos</span></a></li>
                        <li><a href="./lote_albaranes_clientes/index.php" target="principal" id="facturarremitos"><span id="facturar_remitos">Facturar Remitos</span></a></li>
                        <li><a href="./presupuestos_clientes/index.php" target="principal" id="presupuestos"><span id="presupuestos">Presupuestos</span></a></li>
                    </ul>
                </li>
                <li>
                    <label for="hamburger-2"><span id="produccion_plus">Produccion +</label>
                    <a class="menu" href="#"><span id="produccion">Produccion</a>
                    <input type="checkbox" id="hamburger-2" />
                    <ul class="dropdown">
                        <li><a href="./familias/index.php" target="principal" id="tipoarticulos"><span id="tipodart">Tipo de Articulos</span></a></li>
                        <li><a href="./articulos/index.php" target="principal" id="articulos"><span id="articu">Articulos</span></a></li>
                        <li><a href="./meta_procesos/index.php" target="principal" id="metaprocesos"><span id="metproc">Meta-Procesos</span></a></li>
                        <li><a href="./procesos/index.php" target="principal" id="procesosproduccion"><span id="propru">Procesos de Produccion</span></a></li>
                        <li><a href="./agrupar_procesos/index.php" target="principal" id="agruparprocesos"><span id="proagpru">Agrupar Procesos</span></a></li>
                        <li><a href="./batch/index.php" target="principal" id="batchproduccion"><span id="batchprod">Batch de Produccion</span></a></li>
                        <li><a href="./lotes/index.php" target="principal" id="lotesproduccion"><span id="lotdprod">Lotes de Produccion</span></a></li>
                        <li><a href="./estaciones/index.php" target="principal" id="estaciones"><span id="estactra">Estaciones de trabajo</span></a></li>
                    </ul>
                </li>
               
                <li>
                    <label for="hamburger-4"><span id="compras_plus">Compras +</span></label>
                    <a class="menu" href="#"><span id="compras">Compras</span></a>
                    <input type="checkbox" id="hamburger-4" />
                    <ul class="dropdown">
                        <li><a href="./proveedores/index.php" target="principal" id="proveedores"><span id="prov">Proveedores</span></a></li>
                        <li><a href="./facturas_proveedores/index.php" target="principal" id="facturascompras"><span id="factura_c">Facturas</span></a></li>
                        <li><a href="./albaranes_proveedores/index.php" target="principal" id="remitoscompras"><span id="remitos_c">Remitos</span></a></li>
                        <li><a href="./lote_albaranes_proveedores/index.php" target="principal" id="facturarremitoscompras"><span id="facturar_remitos_c">Facturar Remitos</span></a></li>
                    </ul>
                </li>
                <li>
                    <label for="hamburger-5"><span id="contabilidad_plus">Contabilidad +</span></label>
                    <a class="menu" href="#"><span id="contabilidad">Contabilidad</span></a>
                    <input type="checkbox" id="hamburger-5" />
                    <ul class="dropdown">
                        <li><a href="./cobros/index.php" target="principal" id="cobros"><span id="cobros">Cobros</span></a></li>
                        <li><a href="./pagos/index.php" target="principal" id="pagos"><span id="pagos">Pagos</span></a></li>
                        <li><a href="./cerrarcaja/index.php" target="principal" id="caja"><span id="cjadiaria">Caja Diaria</span></a></li>
                        <li><a href="./librodiario/index.php" target="principal" id="librodiario"><span id="librodrio">Libro Diraio</span></a></li>
                        <li><a href="./formaspago/index.php" target="principal" id="formaspagos"><span id="forpago">Formas de Pago</span></a></li>
                        <li><a href="./impuestos/index.php" target="principal" id="impuestos"><span id="impuestos">Impuestos</span></a></li>
                        <li><a href="./entidades/index.php" target="principal" id="entidades"><span id="entbcaria">Entidades Bancarias</span></a></li>
                    </ul>
                </li>
                <li>
                    <label for="hamburger-6"><span id="rrhh_plus">Recursos Humanos +</span></label>
                    <a class="menu" href="#"><span id="rrhh">Recursos Humanos</span></a>
                    <input type="checkbox" id="hamburger-6" />
                    <ul class="dropdown">
                        <li><a href="./partes_trabajo/index.php" target="principal" id="recursoshumanos"><span id="ordentrabajo">Orden de Trabajo</span></a></li>
                        <li><a href="./trabajadores/index.php" target="principal" id="empleados"><span id="empleado">Empleados</span></a></li>                        
                    </ul>
                </li>
                <li>
                    <label for="hamburger-6"><span id="config_plus">Configuracion +</span></label>
                    <a class="menu" href="#"><span id="config">Configuracion</span></a>
                    <input type="checkbox" id="hamburger-7" />
                    <ul class="dropdown">
                        <li><a href="./etiquetas/index.php" target="principal" id="etiquetas"><span id="etiquet">Etiquetas</span></a></li>
                        <li><a href="./ubicaciones/index.php" target="principal" id="ubicaciones"><span id="ubica">Ubicaciones</span></a></li>
                        <li><a href="./embalajes/index.php" target="principal" id="embalajes"><span id="embala">Embalajes</span></a></li>
                       
                        
                    </ul>
                </li>

            </ul>
           
        </nav>
        
        <div><img class="logo" src="./img/ctl4bizlogo-long.svg"></div>
       <div id="nombreCompania" class="company"></div>


    </div>
    <div id="left_side">
        <a href="./central2.php" target="principal" id="home"><img src="./img/home.svg" class="iconolado" alt="inizio"></a>
        <a href="./settings/settings.php" target="principal" id="settings"><img src="./img/settings.svg" class="iconolado" alt="settings"></a>
        <a href="./ayuda/creditos.php" target="principal" id="ayuda"><img src="./img/help.svg" class="iconolado" alt="help"></a>
        <a href="./login/logout.php" target="principal" id="logout"><img src="./img/cerrar.svg" class="iconolado" alt="help"></a>      
    </div>
    <div id="content">
        <iframe src="central2.php" name="principal" title="principal" width="100%" height="1500px" frameborder=0 scrolling="no" style="margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 0px;" ></iframe>
    </div>
    <div id="bottombar"></div>
    <?php
    }else{ 
    ?>      <script>
                changeURL('./login/login.php');
            </script>
    <?
    } 
    ?>
</body>

</html>