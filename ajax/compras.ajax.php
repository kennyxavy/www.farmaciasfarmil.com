<?php

require_once "../modelos/compras.modelo.php";

if ($_POST["accion"]) {

    switch ($_POST['accion']) {

        case 'obtener_compras':

            $response = ComprasModelo::mdlObtenerCompras($_POST);
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            break;


        case 'obtener_compra_x_id':

            $response = ComprasModelo::mdlObtenerCompraPorId($_POST["id_compra"]);
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            break;


        case 'obtener_detalle_compra_x_id':

            $response = ComprasModelo::mdlObtenerDetalleCompraPorId($_POST["id_compra"]);
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            break;

        case 'obtener_simbolo_moneda':

            $response = ComprasModelo::mdlObtenerSimboloMoneda($_POST['moneda']);
            echo json_encode($response);
            break;

        case 'registrar_compra':

            //DATOS DE LA COMPRA
            $formulario_compra = [];
            parse_str($_POST['datos_compra'], $formulario_compra);

            //DETALLA DE LA  COMPRA
            $detalle_productos = json_decode($_POST["arr_detalle_productos"]);

            $response = ComprasModelo::mdlRegistrarCompra(
                $formulario_compra,
                $detalle_productos,
                $_POST["ope_gravadas"],
                $_POST["ope_exoneradas"],
                $_POST["ope_inafectas"],
                $_POST["total_igv"],
                $_POST["total_descuento"],
                $_POST["total"]
            );
            echo json_encode($response);

            break;

        case 'actualizar_compra':

            //DATOS DE LA COMPRA
            $formulario_compra = [];
            parse_str($_POST['datos_compra'], $formulario_compra);

            //DETALLA DE LA  COMPRA
            $detalle_productos = json_decode($_POST["arr_detalle_productos"]);

            $response = ComprasModelo::mdlActualizarCompra(
                $formulario_compra,
                $detalle_productos,
                $_POST["ope_gravadas"],
                $_POST["ope_exoneradas"],
                $_POST["ope_inafectas"],
                $_POST["total_igv"],
                $_POST["total_descuento"],
                $_POST["total"]
            );

            echo json_encode($response);

            break;

        case 'confirmar_compra':

            $response = ComprasModelo::mdlConfirmarCompra($_POST["serie"],$_POST["correlativo"],$_POST["id_compra"]);
            echo json_encode($response);
            break;

        default:
            # code...
            break;
    }
}
