<?php
require_once("../conectar7.php"); 
require_once("../mysqli_result.php"); 


    $codproceso=$_GET["codproceso"];
    $cantidad=$_GET["cantidad"];
    $estado=$_GET["estado"];
    $fechaf=$_GET["fechaf"];
    $horaf=$_GET["horaf"];
    $codigo=$_GET["codarticulo"];
    
   
    If ($estado=="2"){
                    //Set query for discharged status
                    $query_operacion="UPDATE proceso SET cantidad = $cantidad, fechaf='$fechaf', horaf='$horaf', codstatus='2' WHERE codproceso=$codproceso;";		
                    }    
    if ($estado=="1"){	
                    //Set query for ended status    
                    $query_operacion="UPDATE proceso, articulos SET articulos.stock=articulos.stock+$cantidad, proceso.cantidad=$cantidad, proceso.fechaf='$fechaf', proceso.horaf='$horaf', proceso.codstatus='1' WHERE proceso.codproceso=$codproceso AND articulos.codarticulo=$codigo;";
                    }   
    if ($estado=="0"){                                    
                    //Set query for iniciated status, so quantity modification only
                    $query_operacion="UPDATE proceso SET cantidad = $cantidad, fechaf='0000-00-00', horaf='00:00', codstatus='0' WHERE codproceso=$codproceso;";			
                    }
    if (!mysqli_query($conexion,$query_operacion)){
               
    echo "<div class=\"mensaje\"><span class=\"tmsgermdproc\">ATENCION: No ha podido ser modificado con exito el proceso</span>: '$codproceso'!!</div>";
        echo mysqli_error($conexion) ;
    }else{
       echo "<div class=\"header\"><span class=\"tmsgokmdproc\">ATENCION: El proceso ha sido modificado con exito!</span></div>";
    }
 
mysqli_close($conexion);   
	
?>
