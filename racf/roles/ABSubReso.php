<?
require_once("../../conectar7.php");

$accion=$_GET["accion"];
$id_role=$_GET["role"];
$id_Sreso=$_GET["sreso"];



    if ($accion == "agregar") {
    //verify existence
    $verify="UPDATE subresourcesToRolesTable SET borrado='0' WHERE id_role = $id_role AND id_subresource = $id_Sreso";
    $rs_verify=mysqli_query($conexion,$verify);
        if (mysqli_affected_rows($conexion) == "0") {
            $query="INSERT INTO subresourcesToRolesTable (id_subresource, id_role) VALUES ('$id_Sreso','$id_role')";
            $rs_query=mysqli_query($conexion,$query);
            
        }
        mysqli_close($conexion);
    }
    if ($accion == 'quitar') {
        if ($id_role==1 && (in_array($id_Sreso, array("31", "32")))) {
            $data["mensaje"]= "It's not Possible to remove users and roles privileges for admin role";  
            
        }else{
            $verify="UPDATE subresourcesToRolesTable SET borrado='1' WHERE id_role = $id_role AND id_subresource = $id_Sreso";
            $rs_verify=mysqli_query($conexion,$verify);
            if (mysqli_affected_rows($conexion) == "0") {
                $query="INSERT INTO subresourcesToRolesTable (id_subresource, id_role, borrado) VALUES ('$id_Sreso','$id_role','1')"; 
                $rs_query=mysqli_query($conexion,$query);
            }
        }
        mysqli_close($conexion);
    }
	echo json_encode($data);
?>

