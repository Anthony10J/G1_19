<?php
     if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
     }
        header('Access-Control-Allow-Origin: *');  
        header('Content-Type: application/json');

        require_once("C:/xampp/htdocs/G1_19/config/conexion.php");
        require_once("C:/xampp/htdocs/G1_19/models/ma_materiales_models.php");
        $materiales = new ma_materiales();

        $body = json_decode(file_get_contents("php://input"), true);

        switch($_GET["op"]){

            case "GetMateriales":
                $datos=$materiales->get_materiales();
                echo json_encode($datos);
            break;

            case "GetMaterial":
                $datos=$materiales->get_material($body["ID"]);
                echo json_encode($datos);
            break;

            case "InsertMaterial":
                $datos=$materiales->insert_material($body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE"],$body["ESTADO"],$body["ID_SOCIO"]);
                echo json_encode("Material agregado");
            break;

            case "UpdateMaterial":
                $datos=$materiales->update_material($body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE"],$body["ESTADO"],$body["ID_SOCIO"],$body["ID"]);
                echo json_encode("Material actualizado");
            break;
            
            case "DeleteMaterial":
                $datos=$materiales->delete_material($body["ID"]);
                echo json_encode("Material eliminado");
            break;

        }
    
?>
