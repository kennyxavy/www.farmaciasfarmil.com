<?php

require_once "conexion.php";

class VentasModelo
{
    public $resultado;

    static public function mdlObtenerNroBoleta()
    {
        $stmt = Conexion::conectar()->prepare("CALL prc_obtenerNroBoleta()");

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    static public function mdlRegistrarVenta($datos, $nro_boleta, $total_venta, $descripcion_venta, $numero_ruc_cliente, $nombres_apellidos_razon_social_cliente, $email_cliente)
    {
        try {
            $conexion = Conexion::conectar();

            // Verifica si el cliente ya existe en la tabla
            $stmtCliente = $conexion->prepare("SELECT COUNT(*) as count FROM clientes WHERE numero_ruc_cliente = :numero_ruc_cliente");

            $stmtCliente->bindParam(":numero_ruc_cliente", $numero_ruc_cliente, PDO::PARAM_STR);
            $stmtCliente->execute();
            $resultadoCliente = $stmtCliente->fetch(PDO::FETCH_ASSOC);

            if ($resultadoCliente['count'] == 0) {
                // Si el cliente no existe, entonces lo inserta
                $stmtInsertCliente = $conexion->prepare("INSERT INTO clientes(numero_ruc_cliente, nombres_apellidos_razon_social_cliente, email_cliente)
                                          VALUES(:numero_ruc_cliente, :nombres_apellidos_razon_social_cliente, :email_cliente)");

                $stmtInsertCliente->bindParam(":numero_ruc_cliente", $numero_ruc_cliente, PDO::PARAM_STR);
                $stmtInsertCliente->bindParam(":nombres_apellidos_razon_social_cliente", $nombres_apellidos_razon_social_cliente, PDO::PARAM_STR);
                $stmtInsertCliente->bindParam(":email_cliente", $email_cliente, PDO::PARAM_STR);

                $stmtInsertCliente->execute();
            }

            // Continúa con el resto del código (inserción en venta_cabecera, venta_detalle, etc.)


            $stmt = $conexion->prepare("INSERT INTO venta_cabecera(nro_boleta, descripcion, total_venta, numero_ruc_cliente, nombres_apellidos_razon_social_cliente, email_cliente)         
            VALUES(:nro_boleta, :descripcion, :total_venta, :numero_ruc_cliente, :nombres_apellidos_razon_social_cliente, :email_cliente)");

            $stmt->bindParam(":nro_boleta", $nro_boleta, PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $descripcion_venta, PDO::PARAM_STR);
            $stmt->bindParam(":total_venta", $total_venta, PDO::PARAM_STR);
            $stmt->bindParam(":numero_ruc_cliente", $numero_ruc_cliente, PDO::PARAM_STR);
            $stmt->bindParam(":nombres_apellidos_razon_social_cliente", $nombres_apellidos_razon_social_cliente, PDO::PARAM_STR);
            $stmt->bindParam(":email_cliente", $email_cliente, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $stmt = null;

                $stmt = $conexion->prepare("UPDATE empresa SET nro_correlativo_venta = LPAD(nro_correlativo_venta + 1,8,'0')");

                if ($stmt->execute()) {
                    $listaProductos = [];

                    foreach ($datos as $dato) {
                        $listaProductos = explode(",", $dato);

                        $stmt = $conexion->prepare("INSERT INTO venta_detalle(nro_boleta, codigo_producto, cantidad, total_venta) 
                                                VALUES(:nro_boleta, :codigo_producto, :cantidad, :total_venta)");

                        $stmt->bindParam(":nro_boleta", $nro_boleta, PDO::PARAM_STR);
                        $stmt->bindParam(":codigo_producto", $listaProductos[0], PDO::PARAM_STR);
                        $stmt->bindParam(":cantidad", $listaProductos[1], PDO::PARAM_STR);
                        $stmt->bindParam(":total_venta", $listaProductos[2], PDO::PARAM_STR);

                        if ($stmt->execute()) {
                            $stmt = null;

                            $stmt = $conexion->prepare("UPDATE productos SET stock_producto = stock_producto - :cantidad, ventas_producto = ventas_producto + :cantidad
                                                    WHERE codigo_producto = :codigo_producto");

                            $stmt->bindParam(":codigo_producto", $listaProductos[0], PDO::PARAM_STR);
                            $stmt->bindParam(":cantidad", $listaProductos[1], PDO::PARAM_STR);

                            if (!$stmt->execute()) {
                                $resultado = "Error al actualizar el stock";
                            }
                        } else {
                            $resultado = "Error al registrar la venta";
                        }
                    }

                    if (!isset($resultado)) {
                        $resultado = "Se registró la venta correctamente.";
                    }

                    return $resultado;
                }
            }
        } catch (PDOException $e) {
            return 'Error de PDO: ' . $e->getMessage();
        } catch (Exception $e) {
            return 'Excepción capturada: ' .  $e->getMessage() . "\n";
        }
    }

    // public static function mdlRegistrarVenta($datos, $nro_boleta, $total_venta, $descripcion_venta, $numero_ruc_cliente, $nombres_apellidos_razon_social_cliente, $email_cliente)
    // {
    //     try {
    //         $conexion = Conexion::conectar();

    //         // Verifica si el cliente ya existe en la tabla, si no, lo inserta
    //         $stmtCliente = $conexion->prepare("INSERT INTO clientes(numero_ruc_cliente, nombres_apellidos_razon_social_cliente, email_cliente) 
    //                                       VALUES(:numero_ruc_cliente, :nombres_apellidos_razon_social_cliente, :email_cliente)
    //                                       ON DUPLICATE KEY UPDATE numero_ruc_cliente=VALUES(numero_ruc_cliente), nombres_apellidos_razon_social_cliente=VALUES(nombres_apellidos_razon_social_cliente), email_cliente=VALUES(email_cliente)");

    //         $stmtCliente->bindParam(":numero_ruc_cliente", $numero_ruc_cliente, PDO::PARAM_STR);
    //         $stmtCliente->bindParam(":nombres_apellidos_razon_social_cliente", $nombres_apellidos_razon_social_cliente, PDO::PARAM_STR);
    //         $stmtCliente->bindParam(":email_cliente", $email_cliente, PDO::PARAM_STR);

    //         $stmtCliente->execute();

    //         $stmt = $conexion->prepare("INSERT INTO venta_cabecera(nro_boleta, descripcion, total_venta, numero_ruc_cliente, nombres_apellidos_razon_social_cliente, email_cliente)         
    //         VALUES(:nro_boleta, :descripcion, :total_venta, :numero_ruc_cliente, :nombres_apellidos_razon_social_cliente, :email_cliente)");

    //         $stmt->bindParam(":nro_boleta", $nro_boleta, PDO::PARAM_STR);
    //         $stmt->bindParam(":descripcion", $descripcion_venta, PDO::PARAM_STR);
    //         $stmt->bindParam(":total_venta", $total_venta, PDO::PARAM_STR);
    //         $stmt->bindParam(":numero_ruc_cliente", $numero_ruc_cliente, PDO::PARAM_STR);
    //         $stmt->bindParam(":nombres_apellidos_razon_social_cliente", $nombres_apellidos_razon_social_cliente, PDO::PARAM_STR);
    //         $stmt->bindParam(":email_cliente", $email_cliente, PDO::PARAM_STR);

    //         if ($stmt->execute()) {
    //             // Resto del código permanece sin cambios
    //         }
    //     } catch (PDOException $e) {
    //         return 'Error de PDO: ' . $e->getMessage();
    //     } catch (Exception $e) {
    //         return 'Excepción capturada: ' .  $e->getMessage() . "\n";
    //     }
    // }


    static public function mdlListarVentas($fechaDesde, $fechaHasta)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT CONCAT('Factura Nro: ', v.nro_boleta, ' - Total Venta: $ ', ROUND(vc.total_venta, 2)) as nro_boleta,
                                                            v.codigo_producto,
                                                            c.nombre_categoria,
                                                            p.descripcion_producto,
                                                            CASE WHEN c.aplica_peso = 1 THEN CONCAT(v.cantidad, ' Kg(s)')
                                                            ELSE CONCAT(v.cantidad, ' Und(s)') END as cantidad,                            
                                                            CONCAT('$ ', ROUND(v.total_venta, 2)) as total_venta,
                                                            v.fecha_venta
                                                    FROM venta_detalle v
                                                    INNER JOIN productos p ON v.codigo_producto = p.codigo_producto
                                                    INNER JOIN venta_cabecera vc ON CAST(vc.nro_boleta AS INTEGER) = CAST(v.nro_boleta AS INTEGER)
                                                    INNER JOIN categorias c ON c.id_categoria = p.id_categoria_producto
                                                    WHERE DATE(v.fecha_venta) >= DATE(:fechaDesde) AND DATE(v.fecha_venta) <= DATE(:fechaHasta)
                                                    ORDER BY v.nro_boleta ASC");

            $stmt->bindParam(":fechaDesde", $fechaDesde, PDO::PARAM_STR);
            $stmt->bindParam(":fechaHasta", $fechaHasta, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return 'Error de PDO: ' . $e->getMessage();
        } catch (Exception $e) {
            return 'Excepción capturada: ' .  $e->getMessage() . "\n";
        }
    }
}
