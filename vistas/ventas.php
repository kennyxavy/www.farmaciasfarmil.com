<!-- Content Header (Page header) -->
<div class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h4 class="m-0">Punto de Venta</h4>

            </div><!-- /.col -->

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>

                    <li class="breadcrumb-item active">Ventas</li>

                </ol>

            </div><!-- /.col -->

        </div><!-- /.row -->

    </div><!-- /.container-fluid -->

</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="row">
        <!-- INPUT PARA INGRESO DATOS PARA LA FACTURA -->
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos para la factura</h3>
                    <div class="card-tools">
                        <button class="btn btn-tool" type="button" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <div class="form-group">
                                <label for="iptRuc">RUC:</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-id-card"></i>
                                    </span>
                                    <input type="text" class="form-control form-control-sm" id="iptRuc"
                                        placeholder="Ingrese número de RUC del cliente">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="iptNombreApellido">Cliente:</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control form-control-sm" id="iptNombreApellido"
                                        placeholder="Ingrese Nombres y apellidos">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="iptCorreo">Correo:</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="text" class="form-control form-control-sm" id="iptCorreo"
                                        placeholder="Ingrese el correo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- INPUT PARA INGRESO DEL CODIGO DE BARRAS O DESCRIPCION DEL PRODUCTO -->
        <div class="col-md-12 mb-3">

            <div class="form-group mb-2">

                <label class="col-form-label" for="iptCodigoVenta">
                    <i class="fas fa-barcode fs-6"></i>
                    <span class="small">Productos</span>
                </label>

                <input type="text" class="form-control form-control-sm" id="iptCodigoVenta"
                    placeholder="Ingrese el código de barras o el nombre del producto">
            </div>

        </div>
        <div class="content pb-2">
            <!-- <div class="container-fluid"> -->

            <div class="row mb-3">

                <div class="col-md-9">

                    <div class="row">
                        <!-- ETIQUETA QUE MUESTRA LA SUMA TOTAL DE LOS PRODUCTOS AGREGADOS AL LISTADO -->
                        <div class="col-md-6 mb-3">
                            <h3>Total Venta: $ <span id="totalVenta">0.00</span></h3>
                        </div>

                        <!-- LISTADO QUE CONTIENE LOS PRODUCTOS QUE SE VAN AGREGANDO PARA LA COMPRA -->
                        <div class="col-md-12">

                            <table id="lstProductosVenta" class="display nowrap table-striped w-100 shadow ">
                                <thead class="bg-info text-left fs-6">
                                    <tr>
                                        <th>Item</th>
                                        <th>Ubicacion</th>
                                        <th>Id Categoria</th>
                                        <th>Categoria</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Total</th>
                                        <th class="text-center">Opciones</th>
                                        <th>Aplica Peso</th>
                                        <th>Impuesto IVA</th>
                                        <th>Precio Por Mayor</th>
                                        <th>Precio Oferta</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-left fs-6">
                                </tbody>
                            </table>
                            <!-- / table -->
                        </div>
                        <!-- /.col -->

                    </div>

                </div>

                <div class="col-md-3">
                    <div class="card shadow">
                        <h5 class="card-header py-1 bg-info text-white text-center">
                            Calculo de Valores
                        </h5>
                        <div class="card-body p-2">
                            <!-- SERIE Y NRO DE BOLETA -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="iptNroSerie">Serie :</label>
                                        <input type="text" min="0" name="iptEfectivo" id="iptNroSerie"
                                            class="form-control form-control-sm" placeholder="nro Serie" disabled>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="iptNroVenta">Número Factura :</label>
                                        <input type="text" min="0" name="iptEfectivo" id="iptNroVenta"
                                            class="form-control form-control-sm" placeholder="Nro Venta" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- SELECCIONAR TIPO DE DOCUMENTO -->
                            <div class="form-group mb-2">
                                <label class="col-form-label" for="selCategoriaReg">
                                    <i class="fas fa-file-alt fs-6"></i>
                                    <span class="small">Documento</span><span class="text-danger">*</span>
                                </label>

                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    id="selDocumentoVenta" disabled>
                                    <option value="0">Seleccione Documento</option>
                                    <option value="1" selected="true">Nota de venta</option>
                                    <option value="2">Factura</option>

                                </select>

                                <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                                    Debe Seleccione documento
                                </span>

                            </div>

                            <!-- SELECCIONAR TIPO DE PAGO -->
                            <div class="form-group mb-2">

                                <label class="col-form-label" for="selCategoriaReg">
                                    <i class="fas fa-money-bill-alt fs-6"></i>
                                    <span class="small">Forma de Pago</span><span class="text-danger">*</span>
                                </label>

                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    id="selTipoPago" disabled>
                                    <option value="0">Seleccione Tipo Pago</option>
                                    <option value="efectivo" selected>Efectivo</option>
                                    <option value="transferencia">Transferencia</option>
                                    <option value="tarjeta_credito">Tarjeta de Crédito</option>
                                    <option value="tarjeta_debito">Tarjeta de Débito</option>
                                </select>



                                <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                                    Debe Ingresar tipo de pago
                                </span>
                            </div>
                            <!-- EFECTIVO RECIBIDO -->
                            <div class="form-group">
                                <label for="iptEfectivoRecibido">Valor recibido</label>
                                <input type="number" min="0" name="iptEfectivo" id="iptEfectivoRecibido"
                                    class="form-control form-control-sm" placeholder="Cantidad de efectivo recibida">
                            </div>
                            <!-- MOSTRAR MONTO EFECTIVO ENTREGADO Y EL VUELTO -->
                            <div class="row mt-2">

                                <div class="col-12">
                                    <h6 class="text-start fw-bold">Monto: $ <span id="EfectivoEntregado">0.00</span>
                                    </h6>
                                </div>

                                <div class="col-12">
                                    <h6 class="text-start text-danger fw-bold">Vuelto: $ <span id="Vuelto">0.00</span>
                                    </h6>
                                </div>

                            </div>
                            <!-- INPUT DE EFECTIVO ENTREGADO -->
                            <div class="form-check d-flex justify-content-between">
                                <label class="form-check-label" for="chkEfectivoExacto">
                                    Efectivo Exacto
                                </label>
                                <input class="form-check-input" type="checkbox" value="" id="chkEfectivoExacto"
                                    onclick="uncheckOtherCheckboxes(this)">
                            </div>
                            <!-- INPUT DE TRANSFERENCIA-->
                            <div class="form-check d-flex justify-content-between">
                                <label class="form-check-label" for="chkTransferenciaBancaria">
                                    Transferencia Bancaria
                                </label>
                                <input class="form-check-input" type="checkbox" value="" id="chkTransferenciaBancaria"
                                    onclick="uncheckOtherCheckboxes(this)">
                            </div>

                            <div class="form-check d-flex justify-content-between">
                                <label class="form-check-label" for="chkTarjetaDebito">
                                    Tarjeta de Débito
                                </label>
                                <input class="form-check-input" type="checkbox" value="" id="chkTarjetaDebito"
                                    onclick="uncheckOtherCheckboxes(this)">
                            </div>

                            <div class="form-check d-flex justify-content-between">
                                <label class="form-check-label" for="chkTarjetaCredito">
                                    Tarjeta de Crédito
                                </label>
                                <input class="form-check-input" type="checkbox" value="" id="chkTarjetaCredito"
                                    onclick="uncheckOtherCheckboxes(this)">
                            </div>

                            <div class="col-md-12 horizontal-line"></div>


                            <!-- MOSTRAR EL SUBTOTAL, IVA Y TOTAL DE LA VENTA -->
                            <div class="row">
                                <div class="col-md-12 horizontal-line"></div>

                                <div class="col-md-7">
                                    <span>Tarjeta de Débito(2.24%)</span>
                                </div>
                                <div class="col-md-5 text-right">
                                    $ <span class="" id="boleta_TDD">0.00</span>
                                </div>

                                <div class="col-md-7">
                                    <span>Tarjeta de Crédito(5.4%)</span>
                                </div>
                                <div class="col-md-5 text-right">
                                    $ <span class="" id="boleta_TDC">0.00</span>
                                </div>

                                <div class="col-md-7">
                                    <span>SUBTOTAL</span>
                                </div>
                                <div class="col-md-5 text-right">
                                    $ <span class="" id="boleta_subtotal">0.00</span>
                                </div>

                                <div class="col-md-7">
                                    <span>IVA (15%)</span>
                                </div>
                                <div class="col-md-5 text-right">
                                    $ <span class="" id="boleta_igv">0.00</span>
                                </div>

                                <div class="col-md-7">
                                    <span>TOTAL</span>
                                </div>
                                <div class="col-md-5 text-right">
                                    $ <span class="" id="boleta_total">0.00</span>
                                </div>
                                <h5 class="card-header py-1 bg-primary text-white text-center">
                                    Total Venta: $ <span id="totalVentaRegistrar">0.00</span>
                                </h5>
                                <div class="col-md-12 horizontal-line"></div>
                            </div>
                            <!-- BOTONES PARA VACIAR LISTADO Y COMPLETAR LA VENTA -->
                            <div class="text-center">
                                <button class="btn btn-success btn-sm" id="btnIniciarVenta">
                                    <i class="fas fa-shopping-cart"></i> Realizar Venta
                                </button>
                                <button class="btn btn-danger btn-sm" id="btnVaciarListado">
                                    <i class="far fa-trash-alt"></i> Vaciar Listado
                                </button>
                            </div>
                        </div><!-- ./ CARD BODY -->
                    </div><!-- ./ CARD -->
                </div>
            </div>
        </div>
    </div>

    <script>
    var table;
    var items = []; // SE USA PARA EL INPUT DE AUTOCOMPLETE
    var itemProducto = 1;

    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });
    /* ======================================================================================
                     //HABILITA SOLO UN CHECK A LA VEZ
      ======================================================================================*/

    function uncheckOtherCheckboxes(checkbox) {
        var checkboxes = document.querySelectorAll('.form-check-input');
        checkboxes.forEach(function(currentCheckbox) {
            if (currentCheckbox !== checkbox) {
                currentCheckbox.checked = false;
            }
        });
    }

    $(document).ready(function() {

        /* ======================================================================================
        TRAER EL NRO DE BOLETA
        ======================================================================================*/
        CargarNroBoleta();

        /* ======================================================================================
        EVENTO PARA VACIAR EL CARRITO DE COMPRAS
        =========================================================================================*/
        $("#btnVaciarListado").on('click', function() {
            vaciarListado();
        });

        /* ======================================================================================
        INICIALIZAR LA TABLA DE VENTAS
        ======================================================================================*/
        table = $('#lstProductosVenta').DataTable({
            "columns": [{
                    "data": "id" //0
                },
                {
                    "data": "codigo_producto" //1
                },
                {
                    "data": "id_categoria" //2
                },
                {
                    "data": "nombre_categoria" //3
                },
                {
                    "data": "descripcion_producto" //4
                },
                {
                    "data": "cantidad" //5
                },
                {
                    "data": "precio_venta_producto" //6
                },
                {
                    "data": "total" //7
                },
                {
                    "data": "acciones" //8
                },
                {
                    "data": "aplica_peso" //9
                },
                {
                    "data": "impuesto_producto_iva" //10
                },
                {
                    "data": "precio_mayor_producto" //11
                },
                {
                    "data": "precio_oferta_producto" //12
                },

            ],
            columnDefs: [{
                    targets: 0,
                    visible: false
                },
                {
                    targets: 3,
                    visible: false
                },
                {
                    targets: 2,
                    visible: false
                },
                {
                    targets: 6,
                    orderable: false
                },
                {
                    targets: 9,
                    visible: false
                },
                {
                    targets: 10,
                    visible: false
                },
                {
                    targets: 11,
                    visible: false
                },
                {
                    targets: 12,
                    visible: false
                }

            ],
            "order": [
                [0, 'desc']
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });
        /* ======================================================================================
            //HABILITA LOS SELECC LA FORMA DE PAGO Y TIPO DE DOCUMENTO
             ======================================================================================*/
        // Selecciona el elemento por su ID
        //var selectElement = document.getElementById('selDocumentoVenta');

        // Remueve el atributo 'disabled' para habilitar el elemento
        // selectElement.removeAttribute('disabled');
        // Selecciona el elemento por su ID
        //var selectElement = document.getElementById('selTipoPago');

        // Remueve el atributo 'disabled' para habilitar el elemento
        // selectElement.removeAttribute('disabled');

        /* ======================================================================================
       //Se agrega el botón de exportar a excel en la tabla #tabla_facturas
        ======================================================================================*/

        $.ajax({
            url: "ajax/productos.ajax.php",
            method: "POST",
            data: {
                'accion': 6
            },
            dataType: 'json',
            success: function(respuesta) {
                var items = [];

                // Verifica que la respuesta sea un array antes de intentar iterar sobre ella
                if (Array.isArray(respuesta)) {
                    // Utiliza forEach para simplificar el código y mejorar la legibilidad
                    respuesta.forEach(function(elemento) {
                        if (elemento && elemento['descripcion_producto']) {
                            items.push(elemento['descripcion_producto']);
                        }
                    });
                }

                // Verifica si el elemento tiene la función autocomplete antes de llamarla
                if ($("#iptCodigoVenta").autocomplete) {
                    $("#iptCodigoVenta").autocomplete({
                        source: items,
                        select: function(event, ui) {
                            CargarProductos(ui.item.value);
                            $("#iptCodigoVenta").val("").focus();
                            return false;
                        }
                    });
                } else {
                    console.error("El elemento #iptCodigoVenta no tiene la función autocomplete.");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        });

        /* ======================================================================================
        EVENTO QUE REGISTRA EL PRODUCTO EN EL LISTADO CUANDO SE INGRESA EL CODIGO DE BARRAS
        ======================================================================================*/
        $("#iptCodigoVenta").change(function() {
            CargarProductos();
        });

        /* ======================================================================================
        EVENTO PARA ELIMINAR UN PRODUCTO DEL LISTADO
        ======================================================================================*/
        $('#lstProductosVenta tbody').on('click', '.btnEliminarproducto', function() {
            table.row($(this).parents('tr')).remove().draw();
            recalcularTotales();
        });

        /* ======================================================================================
        EVENTO PARA AUMENTAR LA CANTIDAD DE UN PRODUCTO DEL LISTADO
        ====================================================================================== */
        $('#lstProductosVenta tbody').on('click', '.btnAumentarCantidad', function() {

            var data = table.row($(this).parents('tr')).data(); //Recuperar los datos de la fila

            var idx = table.row($(this).parents('tr')).index(); // Recuperar el Indice de la Fila

            var codigo_producto = data['codigo_producto'];
            var cantidad = data['cantidad'];

            $.ajax({
                async: false,
                url: "ajax/productos.ajax.php",
                method: "POST",
                data: {
                    'accion': 8,
                    'codigo_producto': codigo_producto,
                    'cantidad_a_comprar': cantidad
                },

                dataType: 'json',
                success: function(respuesta) {

                    if (parseInt(respuesta['existe']) == 0) {

                        Toast.fire({
                            icon: 'error',
                            title: ' El producto ' + data['descripcion_producto'] +
                                ' ya no tiene stock'
                        })

                        $("#iptCodigoVenta").val("");
                        $("#iptCodigoVenta").focus();

                    } else {

                        cantidad = parseInt(data['cantidad']) + 1;

                        table.cell(idx, 5).data(cantidad + ' Und(s)').draw();

                        NuevoPrecio = (parseInt(data['cantidad']) * data[
                            'precio_venta_producto'].replace("$ ", "")).toFixed(2);
                        NuevoPrecio = "$ " + NuevoPrecio;

                        table.cell(idx, 7).data(NuevoPrecio).draw();

                        recalcularTotales();
                    }
                }
            });

        });

        /* ======================================================================================
        EVENTO PARA DESMINUIR LA CANTIDAD DE UN PRODUCTO DEL LISTADO
        ======================================================================================*/
        $('#lstProductosVenta tbody').on('click', '.btnDisminuirCantidad', function() {

            var data = table.row($(this).parents('tr')).data();

            if (data['cantidad'].replace('Und(s)', '') >= 2) {

                cantidad = parseInt(data['cantidad'].replace('Und(s)', '')) - 1;

                var idx = table.row($(this).parents('tr')).index();

                table.cell(idx, 5).data(cantidad + ' Und(s)').draw();

                NuevoPrecio = (parseInt(data['cantidad']) * data['precio_venta_producto'].replace("$ ",
                    "")).toFixed(2);
                NuevoPrecio = "$ " + NuevoPrecio;

                table.cell(idx, 7).data(NuevoPrecio).draw();

            }

            recalcularTotales();
        });

        /* ======================================================================================
        EVENTO PARA INGRESAR EL PESO DEL PRODUCTO
        ====================================================================================== */
        $('#lstProductosVenta tbody').on('click', '.btnIngresarPeso', function() {

            var data = table.row($(this).parents('tr')).data();

            Swal.fire({
                title: "",
                text: "Peso del Producto (Grms):",
                input: 'text',
                width: 300,
                confirmButtonText: 'Aceptar',
                showCancelButton: true,
            }).then((result) => {

                if (result.value) {

                    cantidad = result.value;

                    var idx = table.row($(this).parents('tr')).index();

                    table.cell(idx, 5).data(cantidad + ' Kg(s)').draw();

                    NuevoPrecio = ((parseFloat(data['cantidad']) * data['precio_venta_producto']
                        .replace("$ ", "")).toFixed(2));
                    NuevoPrecio = "$ " + NuevoPrecio;

                    table.cell(idx, 7).data(NuevoPrecio).draw();

                    recalcularTotales();

                }

            });


        });

        /* ======================================================================================
        EVENTO PARA MODIFICAR EL PRECIO DE VENTA DEL PRODUCTO
        ======================================================================================*/
        $('#lstProductosVenta tbody').on('click', '.dropdown-item', function() {

            codigo_producto = $(this).attr("codigo");
            precio_venta = parseFloat($(this).attr("precio").replaceAll("$ ", "")).toFixed(2);

            recalcularMontos(codigo_producto, precio_venta);
        });

        /* =======================================================================================
        EVENTO QUE PERMITE CHECKEAR EL EFECTIVO CUANDO ES EXACTO O TRANSFERENCIA BANCARIA
       =========================================================================================*/
        $("#chkEfectivoExacto, #chkTransferenciaBancaria, #chkTarjetaDebito, #chkTarjetaCredito").change(
            function() {
                var isChecked = $(this).is(':checked');
                console.log("Checkbox changed: ", $(this).attr('id'), "Checked: ", isChecked);
                if (isChecked) {
                    handleChecked($(this).attr('id'));
                } else {
                    handleUnchecked();
                }
            });

        function handleChecked(id) {
            var totalVenta = parseFloat($("#totalVenta").html());
            var efectivoEntregado = totalVenta;
            var comision = 0;
            var formaPago = ""; // Inicializar la variable formaPago

            console.log("Handle checked: ", id);
            console.log("Total Venta inicial: ", totalVenta);

            switch (id) {
                case 'chkTarjetaCredito':
                    $("#boleta_TDD").html("0.00");
                    comision = parseFloat(totalVenta) * 0.054;
                    totalVenta += comision;
                    $("#boleta_TDC").html(comision.toFixed(2));
                    formaPago = "tarjeta_credito"; // Establecer formaPago como tarjeta de crédito
                    console.log("Comisión tarjeta crédito: ", comision);
                    break;
                case 'chkTarjetaDebito':
                    $("#boleta_TDC").html("0.00");
                    comision = parseFloat(totalVenta) * 0.0224;
                    totalVenta += comision;
                    $("#boleta_TDD").html(comision.toFixed(2));
                    formaPago = "tarjeta_debito"; // Establecer formaPago como tarjeta de débito
                    console.log("Comisión tarjeta débito: ", comision);
                    break;
                case 'chkEfectivoExacto':
                    $("#boleta_TDD").html("0.00");
                    $("#boleta_TDC").html("0.00");
                    formaPago = "efectivo"; // Establecer formaPago como efectivo
                    $("#iptEfectivoRecibido").val(totalVenta.toFixed(2));
                    break;
                case 'chkTransferenciaBancaria':
                    $("#boleta_TDD").html("0.00");
                    $("#boleta_TDC").html("0.00");
                    formaPago = "transferencia"; // Establecer formaPago como transferencia bancaria
                    break;
            }

            console.log("Total Venta después de comisión: ", totalVenta);

            $("#iptEfectivoRecibido").val(totalVenta.toFixed(2));
            $("#EfectivoEntregado").html(efectivoEntregado.toFixed(2));
            $("#boleta_total").html(totalVenta.toFixed(2));
            $("#totalVentaRegistrar").html(totalVenta.toFixed(2));

            console.log("Mostrar los totales: ");
            console.log("Recibido: ", totalVenta);
            console.log("Entregado: ", efectivoEntregado);
            console.log("Valor en factura: ", totalVenta);
            console.log("Total: ", totalVenta);

            var vuelto = 0;
            $("#Vuelto").html(vuelto.toFixed(2));
            console.log("Vuelto: ", vuelto);
            // Actualizar el nombre de la forma de pago seleccionada en el select
            $("#selTipoPago").val(formaPago);

            console.log("Forma de Pago: " + formaPago); // Mostrar la forma de pago en la consola
        }

        function handleUnchecked() {
            console.log("Handle unchecked");
            $("#iptEfectivoRecibido").val("");
            $("#EfectivoEntregado").html("0.00");
            $("#Vuelto").html("0.00");
        }

        /* ======================================================================================
        EVENTO QUE SE DISPARA AL DIGITAR EL MONTO EN EFECTIVO ENTREGADO POR EL CLIENTE
        =========================================================================================*/
        $("#iptEfectivoRecibido").keyup(function() {
            actualizarVuelto();
        });

        /* ======================================================================================
        EVENTO PARA INICIAR EL REGISTRO DE LA VENTA
        ====================================================================================== */
        $("#btnIniciarVenta").on('click', function() {
            realizarVenta();
        })


    }) //FIN DOCUMENT READY

    /*===================================================================*/
    //FUNCION PARA CARGAR EL NRO DE BOLETA
    /*===================================================================*/
    function CargarNroBoleta() {

        $.ajax({
            async: false,
            url: "ajax/ventas.ajax.php",
            method: "POST",
            data: {
                'accion': 1
            },
            dataType: 'json',
            success: function(respuesta) {

                serie_boleta = respuesta["serie_boleta"];
                nro_boleta = respuesta["nro_venta"];

                $("#iptNroSerie").val(serie_boleta);
                $("#iptNroVenta").val(nro_boleta);
            }
        });
    }


    /*===================================================================*/
    //FUNCION PARA LIMPIAR TOTALMENTE EL CARRITO DE VENTAS
    /*===================================================================*/
    function vaciarListado() {
        table.clear().draw();
        LimpiarInputs();
    }

    /*===================================================================*/
    //FUNCION PARA LIMPIAR LOS INPUTS DE LA BOLETA Y LABELS QUE TIENEN DATOS
    /*===================================================================*/
    function LimpiarInputs() {
        $("#totalVenta").html("0.00");
        $("#totalVentaRegistrar").html("0.00");
        $("#boleta_total").html("0.00");
        $("#iptEfectivoRecibido").val("");
        $("#EfectivoEntregado").html("0.00");
        $("#Vuelto").html("0.00");
        $("#chkEfectivoExacto").prop('checked', false);
        $("#chkTransferenciaBancaria").prop('checked', false);
        $("#chkTarjetaCredito").prop('checked', false);
        $("#chkTarjetaDebito").prop('checked', false);
        $("#boleta_subtotal").html("0.00");
        $("#boleta_igv").html("0.00");

        // Incluir limpieza para los nuevos campos
        $("#iptRuc").val("");
        $("#iptNombreApellido").val("");
        $("#iptCorreo").val("");
    }
    /* FIN LimpiarInputs */

    /*===================================================================*/
    //FUNCION PARA ACTUALIZAR EL VUELTO
    /*===================================================================*/

    function actualizarVuelto() {

        var totalVenta = $("#totalVenta").html();

        $("#chkEfectivoExacto").prop('checked', false);
        $("#chkTransferenciaBancaria").prop('checked', false);
        $("#chkTarjetaCredito").prop('checked', false);
        $("#chkTarjetaDebito").prop('checked', false);

        var efectivoRecibido = $("#iptEfectivoRecibido").val();
        if (efectivoRecibido > 0) {
            $("#EfectivoEntregado").html(parseFloat(efectivoRecibido).toFixed(2));
            vuelto = parseFloat(efectivoRecibido) - parseFloat(totalVenta);
            $("#Vuelto").html(vuelto.toFixed(2));
        } else {
            $("#EfectivoEntregado").html("0.00");
            $("#Vuelto").html("0.00");

        }
    }

    /*===================================================================*/
    //FUNCION PARA RECALCULAR LOS MONTOS
    /*===================================================================*/


    function recalcularMontos(codigo_producto, precio_venta) {

        table.rows().eq(0).each(function(index) {
            var row = table.row(index);
            var data = row.data();
            if (data['codigo_producto'] == codigo_producto) {
                // AUMENTAR EN 1 EL VALOR DE LA CANTIDAD
                table.cell(index, 6).data("$ " + parseFloat(precio_venta).toFixed(2)).draw();
                // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
                NuevoPrecio = (parseFloat(data['cantidad']) * data['precio_venta_producto'].replaceAll(
                    "$ ",
                    "")).toFixed(2);
                NuevoPrecio = "$ " + NuevoPrecio;
                table.cell(index, 7).data(NuevoPrecio).draw();
            }
        });
        // RECALCULAMOS TOTALES
        recalcularTotales();
    }

    /*===================================================================*/
    //FUNCION PARA RECALCULAR LOS TOTALES DE VENTA
    /*===================================================================*/
    function recalcularTotales() {
        var totalVenta = 0.00;
        var iva = 0.00;

        console.log("Inicio de recalcularTotales");
        console.log("totalVenta inicial: ", totalVenta);
        console.log("iva inicial: ", iva);

        table.rows().eq(0).each(function(index) {
            var row = table.row(index);
            var data = row.data();

            // Asegurarse de que los datos no sean nulos o indefinidos y puedan convertirse en números
            var total = parseFloat(data['total'].replace("$ ", "")) || 0.00;
            var impuesto = parseInt(data['impuesto_producto_iva']) || 0;

            console.log(`Fila ${index} - total: ${total}, impuesto: ${impuesto}`);

            totalVenta += total;
            iva += impuesto === 1 ? total * 0.15 :
                0; // Si el producto tiene impuesto, calcula el IVA, si no, agrega 0

            console.log(`Acumulado después de fila ${index} - totalVenta: ${totalVenta}, iva: ${iva}`);
        });

        var subtotal = totalVenta - iva;
        console.log("subtotal calculado: ", subtotal);

        // Actualizar los elementos del DOM con los valores calculados
        $("#totalVenta").html(totalVenta.toFixed(2));
        console.log("Total de ventas: ", totalVenta);
        $("#totalVentaRegistrar").html(totalVenta.toFixed(
            2)); // Asegurar que ambos sean mostrados en formato de dos decimales
        $("#boleta_subtotal").html(subtotal.toFixed(2));
        $("#boleta_igv").html(iva.toFixed(2));
        $("#boleta_total").html(totalVenta.toFixed(2));

        console.log("Valores actualizados en el DOM");

        // Limpiar input de efectivo exacto y desmarcar checkboxes
        $("#iptEfectivoRecibido").val("");
        $("#chkEfectivoExacto").prop('checked', false);
        $("#chkTransferenciaBancaria").prop('checked', false);
        $("#chkTarjetaCredito").prop('checked', false);
        $("#chkTarjetaDebito").prop('checked', false);

        console.log("Checkboxes y campos de entrada reseteados");

        // Limpiar otros inputs y resetear el enfoque en el campo de código de venta
        $("#iptCodigoVenta").val("").focus();

        console.log("Final de recalcularTotales");
    }

    // function recalcularTotales() {
    //     var totalVenta = 0.00;
    //     var iva = 0.00;

    //     table.rows().eq(0).each(function(index) {
    //         var row = table.row(index);
    //         var data = row.data();

    //         totalVenta += parseFloat(data['total'].replace("$ ", ""));
    //         var impuesto = parseInt(data['impuesto_producto_iva']);
    //         iva += impuesto === 1 ? parseFloat(data['total'].replace("$ ", "")) * 0.15 :
    //             0; //SI EL PRODUCTO TIENE IMPUESTO SACA EL CALCULO DEL IVA AL SUBTOTAL CASO CONTRARIO CERO
    //     });

    //     var subtotal = totalVenta - iva;

    //     $("#totalVenta").html(totalVenta.toFixed(2));
    //     $("#totalVentaRegistrar").html(totalVenta);
    //     $("#boleta_subtotal").html(subtotal.toFixed(2));
    //     $("#boleta_igv").html(iva.toFixed(2));
    //     $("#boleta_total").html(totalVenta.toFixed(2));
    //     // Limpiar input de efectivo exacto; desmarcar check de efectivo exacto
    //     // Borrar datos de efectivo entregado y vuelto
    //     $("#iptEfectivoRecibido").val("");
    //     $("#chkEfectivoExacto").prop('checked', false);
    //     $("#chkTransferenciaBancaria").prop('checked', false);
    //     $("#chkTarjetaCredito").prop('checked', false);
    //     $("#chkTarjetaDebito").prop('checked', false);
    //     $("#iptCodigoVenta").val("").focus();
    // }
    /*===================================================================*/
    //FUNCION PARA CARGAR PRODUCTOS EN EL DATATABLE
    /*===================================================================*/
    function CargarProductos(producto = "") {

        if (producto != "") {
            var codigo_producto = producto;
        } else {
            var codigo_producto = $("#iptCodigoVenta").val();
        }
        var producto_repetido = 0;

        /*===================================================================*/
        // AUMENTAMOS LA CANTIDAD SI EL PRODUCTO YA EXISTE EN EL LISTADO
        /*===================================================================*/
        table.rows().eq(0).each(function(index) {

            var row = table.row(index);
            var data = row.data();

            if (parseInt(codigo_producto) == data['codigo_producto']) {

                producto_repetido = 1;

                $.ajax({
                    async: false,
                    url: "ajax/productos.ajax.php",
                    method: "POST",
                    data: {
                        'accion': 8,
                        'codigo_producto': data['codigo_producto'],
                        'cantidad_a_comprar': data['cantidad']
                    },
                    dataType: 'json',
                    success: function(respuesta) {

                        if (parseInt(respuesta['existe']) == 0) {

                            Toast.fire({
                                icon: 'error',
                                title: ' El producto ' + data[
                                        'descripcion_producto'] +
                                    ' ya no tiene stock'
                            })

                            $("#iptCodigoVenta").val("");
                            $("#iptCodigoVenta").focus();


                        } else {

                            // AUMENTAR EN 1 EL VALOR DE LA CANTIDAD
                            table.cell(index, 5).data(parseFloat(data['cantidad']) + 1 +
                                    ' Und(s)')
                                .draw();

                            // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
                            NuevoPrecio = (parseInt(data['cantidad']) * data[
                                    'precio_venta_producto']
                                .replace("$ ", "")).toFixed(2);
                            NuevoPrecio = "$ " + NuevoPrecio;
                            table.cell(index, 7).data(NuevoPrecio).draw();

                            // RECALCULAMOS TOTALES
                            recalcularTotales();
                        }
                    }
                });
            }
        });

        if (producto_repetido == 1) {
            return;
        }
        /*===================================================================*/
        //LISTA EL PRODUCTO CUANDO SE BUSCA POR CODIGO DE BARRA O SE ESCRIBE EL NOMRE DEL PRODUCTO
        /*===================================================================*/
        $.ajax({
            url: "ajax/productos.ajax.php",
            method: "POST",
            data: {
                'accion': 7, //BUSCAR PRODUCTOS POR SU CODIGO DE BARRAS
                'codigo_producto': codigo_producto
            },
            dataType: 'json',
            success: function(respuesta) {

                /*===================================================================*/
                //SI LA RESPUESTA ES VERDADERO, TRAE ALGUN DATO
                /*===================================================================*/
                if (respuesta) {

                    var TotalVenta = 0.00;

                    if (respuesta['aplica_peso'] == 1) {

                        table.row.add({
                            'id': itemProducto,
                            'codigo_producto': respuesta['codigo_producto'],
                            'ubicacion_producto': respuesta['ubicacion_producto'],
                            'id_categoria': respuesta['id_categoria'],
                            'nombre_categoria': respuesta['nombre_categoria'],
                            'descripcion_producto': respuesta['descripcion_producto'],
                            'cantidad': respuesta['cantidad'] + ' Kg(s)',
                            'precio_venta_producto': respuesta['precio_venta_producto'],
                            'total': respuesta['total'],
                            'acciones': "<center>" +
                                "<span class='btnIngresarPeso text-success px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Aumentar Stock'> " +
                                "<i class='fas fa-balance-scale fs-5'></i> " +
                                "</span> " +
                                "<span class='btnEliminarproducto text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar producto'> " +
                                "<i class='fas fa-trash fs-5'> </i> " +
                                "</span>" +
                                "<div class='btn-group'>" +
                                "<button type='button' class=' p-0 btn btn-primary transparentbar dropdown-toggle btn-sm' data-bs-toggle='dropdown' aria-expanded='false'>" +
                                "<i class='fas fa-cog text-primary fs-5'></i> <i class='fas fa-chevron-down text-primary'></i>" +
                                "</button>" +

                                "<ul class='dropdown-menu'>" +
                                "<li><a class='dropdown-item' codigo = '" + respuesta[
                                    'codigo_producto'] + "' precio=' " + respuesta[
                                    'precio_venta_producto'] +
                                "' style='cursor:pointer; font-size:14px;'>Normal (" +
                                respuesta[
                                    'precio_venta_producto'] + ")</a></li>" +
                                "<li><a class='dropdown-item' codigo = '" + respuesta[
                                    'codigo_producto'] + "' precio=' " + respuesta[
                                    'precio_mayor_producto'] +
                                "' style='cursor:pointer; font-size:14px;'>Por Mayor ($ " +
                                parseFloat(respuesta['precio_mayor_producto']).toFixed(2) +
                                ")</a></li>" +
                                "<li><a class='dropdown-item' codigo = '" + respuesta[
                                    'codigo_producto'] + "' precio=' " + respuesta[
                                    'precio_oferta_producto'] +
                                "' style='cursor:pointer; font-size:14px;'>Oferta ($ " +
                                parseFloat(
                                    respuesta['precio_oferta_producto']).toFixed(2) +
                                ")</a></li>" +
                                "</ul>" +
                                "</div>" +
                                "</center>",
                            'aplica_peso': respuesta['aplica_peso'],
                            'impuesto_producto_iva': respuesta['impuesto_producto_iva'],
                            'precio_mayor_producto': respuesta['precio_mayor_producto'],
                            'precio_oferta_producto': respuesta['precio_oferta_producto']

                        }).draw();

                        itemProducto = itemProducto + 1;

                    } else {

                        table.row.add({
                            'id': itemProducto,
                            'codigo_producto': respuesta['codigo_producto'],
                            'id_categoria': respuesta['id_categoria'],
                            'nombre_categoria': respuesta['nombre_categoria'],
                            'descripcion_producto': respuesta['descripcion_producto'],
                            'cantidad': respuesta['cantidad'] + ' Und(s)',
                            'precio_venta_producto': respuesta['precio_venta_producto'],
                            'total': respuesta['total'],
                            'acciones': "<center>" +
                                "<span class='btnAumentarCantidad text-success px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Aumentar Stock'> " +
                                "<i class='fas fa-cart-plus fs-5'></i> " +
                                "</span> " +
                                "<span class='btnDisminuirCantidad text-warning px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Disminuir Stock'> " +
                                "<i class='fas fa-cart-arrow-down fs-5'></i> " +
                                "</span> " +
                                "<span class='btnEliminarproducto text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar producto'> " +
                                "<i class='fas fa-trash fs-5'> </i> " +
                                "</span>" +
                                "<div class='btn-group'>" +
                                "<button type='button' class=' p-0 btn btn-primary transparentbar dropdown-toggle btn-sm' data-bs-toggle='dropdown' aria-expanded='false'>" +
                                "<i class='fas fa-cog text-primary fs-5'></i> <i class='fas fa-chevron-down text-primary'></i>" +
                                "</button>" +

                                "<ul class='dropdown-menu'>" +
                                "<li><a class='dropdown-item' codigo = '" + respuesta[
                                    'codigo_producto'] + "' precio=' " + respuesta[
                                    'precio_venta_producto'] +
                                "' style='cursor:pointer; font-size:14px;'>Normal (" +
                                respuesta[
                                    'precio_venta_producto'] + ")</a></li>" +
                                "<li><a class='dropdown-item' codigo = '" + respuesta[
                                    'codigo_producto'] + "' precio=' " + respuesta[
                                    'precio_mayor_producto'] +
                                "' style='cursor:pointer; font-size:14px;'>Por Mayor ($ " +
                                parseFloat(respuesta['precio_mayor_producto']).toFixed(2) +
                                ")</a></li>" +
                                "<li><a class='dropdown-item' codigo = '" + respuesta[
                                    'codigo_producto'] + "' precio=' " + respuesta[
                                    'precio_oferta_producto'] +
                                "' style='cursor:pointer; font-size:14px;'>Oferta ($ " +
                                parseFloat(
                                    respuesta['precio_oferta_producto']).toFixed(2) +
                                ")</a></li>" +
                                "</ul>" +
                                "</div>" +
                                "</center>",
                            'aplica_peso': respuesta['aplica_peso'],
                            'impuesto_producto_iva': respuesta['impuesto_producto_iva'],
                            'precio_mayor_producto': respuesta['precio_mayor_producto'],
                            'precio_oferta_producto': respuesta['precio_oferta_producto']

                        }).draw();

                        itemProducto = itemProducto + 1;

                    }

                    //  Recalculamos el total de la venta
                    recalcularTotales();

                    //             /*===================================================================*/
                    //             //SI LA RESPUESTA ES FALSO, NO TRAE ALGUN DATO
                    //             /*===================================================================*/
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: ' El producto no existe o no tiene stock'
                    });

                    $("#iptCodigoVenta").val("");
                    $("#iptCodigoVenta").focus();
                }

            }
        });


    } /* FIN CargarProductos */

    /*===================================================================*/
    //REALIZAR LA VENTA
    /*===================================================================*/

    function realizarVenta() {


        var count = 0;
        var totalVenta = $("#totalVenta").html();
        var nro_boleta = $("#iptNroVenta").val();
        console.log(`Funcion Calculo de venta: ${totalVenta}, iva: ${nro_boleta}`);
        /*===================================================================*/
        //FUNCION PARA VALIDAR DATOS DE USUARIOS PARA LA FACTURA
        /*===================================================================*/


        var ruc = $("#iptRuc").val().trim() || "NN";
        var nombreApellido = $("#iptNombreApellido").val().trim() || "Usuario Final";
        var correo = $("#iptCorreo").val().trim() || "usuario_final@nn.com";
        console.log(
            `Datos para la factura si es vacio se llena solo RUC: ${ruc}, Nombres: ${nombreApellido}, Nombres: ${correo}`
        );

        table.rows().eq(0).each(function(index) {
            count++;
        });

        if (count > 0) {
            var efectivoRecibido = parseFloat($("#iptEfectivoRecibido").val());

            if (efectivoRecibido > 0) {
                if (efectivoRecibido < parseFloat(totalVenta)) {
                    Toast.fire({
                        icon: 'warning',
                        title: 'El efectivo es menor al costo total de la venta'
                    });
                    return false;
                }

                var formData = new FormData();
                var arr = [];

                table.rows().eq(0).each(function(index) {
                    var row = table.row(index);
                    var data = row.data();
                    arr[index] =
                        `${data['codigo_producto']},${parseFloat(data['cantidad'])},${data['total'].replace("$ ", "")}`;
                    formData.append('arr[]', arr[index]);
                });

                formData.append('numero_ruc_cliente', ruc);
                formData.append('nombres_apellidos_razon_social_cliente', nombreApellido);
                formData.append('email_cliente', correo);
                formData.append('nro_boleta', nro_boleta);
                formData.append('descripcion_venta', `Venta realizada con Nro. Nota de Venta: ${nro_boleta}`);
                formData.append('total_venta', parseFloat(totalVenta));

                console.log(
                    `formDat Datos que pasan al proceso ajax ventas: ${ruc}, Nombres: ${nombreApellido}, Correo: ${correo}, Numero de venta: ${nro_boleta}, Total de venta: ${totalVenta}`
                );

                $.ajax({
                    url: "ajax/ventas.ajax.php",
                    method: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(respuesta) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: respuesta,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        table.clear().draw();
                        LimpiarInputs();
                        CargarNroBoleta();
                    }
                });
            } else {
                Toast.fire({
                    icon: 'warning',
                    title: 'Ingrese el monto en efectivo'
                });
            }
        } else {
            Toast.fire({
                icon: 'warning',
                title: 'No hay productos en el listado.'
            });
        }
        // Borrar datos de efectivo entregado y vuelto
        $("#EfectivoEntregado").html("0.00");
        $("#Vuelto").html("0.00");
        $("#boleta_TDD").html("0.00");
        $("#boleta_TDC").html("0.00");
        $("#iptCodigoVenta").focus();
    } /* FIN realizarVenta */
    </script>