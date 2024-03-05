<?php

class VentasControlador
{

    static public function ctrObtenerNroBoleta()
    {

        $nroBoleta = VentasModelo::mdlObtenerNroBoleta();

        return $nroBoleta;
    }

    static public function ctrRegistrarVenta($datos, $nro_boleta, $total_venta, $descripcion_venta, $numero_ruc_cliente, $nombres_apellidos_razon_social_cliente, $email_cliente)
    {
        $productos = VentasModelo::mdlRegistrarVenta($datos, $nro_boleta, $total_venta, $descripcion_venta, $numero_ruc_cliente, $nombres_apellidos_razon_social_cliente, $email_cliente);
        return $productos;
    }


    static public function ctrListarVentas($fechaDesde, $fechaHasta)
    {

        $ventas = VentasModelo::mdlListarVentas($fechaDesde, $fechaHasta);

        return $ventas;
    }
}
