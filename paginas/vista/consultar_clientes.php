<!DOCTYPE html>
<html lang="es">

<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Consultar Cliente";
include("../includes/cabecera.php");
?>

<body>
    <?php
    include("../includes/menu.php");
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-search"></i> Consultar Cliente</h1>
        </header>

        <nav>
            <a href="listar_cliente.php" class="btn btn-outline-secondary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-5">
                        <form id="form_consultar_cli" name="form_consultar_cli" method="post" action="../controlador/ctr_consultar_cliente.php">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="txt_valor" name="txt_valor" maxlength="5" placeholder="Valor a buscar..." autofocus />
                                <button type="submit" class="btn btn-outline-success" id="btn_consultar" name="btn_consultar">Consultar</button>
                                <a class="btn btn-outline-primary" href="consultar_clientes.php">Nuevo</a>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </section>
        <!-- Mostrar información del cliente -->
        <div class="modal fade" id="md_consultar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="text-primary">
                            <i class="fas fa-info-circle"></i>
                            Información del Cliente
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-light">
                        <div class="row justify-content-center">
                            <div class="col g-3 col-md-10 mb-4 bg-white border rounded">
                                <div class="col-md-5">
                                    <h5 class="card-title">Código</h5>
                                    <p class="codigo card-text"></p>
                                </div>
                                <div class="col">
                                    <h5 class="card-title">Nombre</h5>
                                    <p class="nombre card-text">&nbsp;</p>
                                </div>
                                <div class="col">
                                    <h5 class="card-title">Ap. Paterno</h5>
                                    <p class="ap_paterno card-text"></p>
                                </div>
                                <div class="col">
                                    <h5 class="card-title">Ap. Materno</h5>
                                    <p class="ap_materno card-text"></p>
                                </div>
                                <div class="col">
                                    <h5 class="card-title">Fecha de Nacimiento</h5>
                                    <p class="fecha_nacimiento card-text"></p>
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Dirección</h5>
                                    <p class="direccion card-text"></p>
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Correo Electrónico</h5>
                                    <p class="correo_electronico card-text"></p>
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Distrito</h5>
                                    <p class="distrito card-text"></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de error -->
        <div class="fade modal" tabindex="-1" id="md_error_consultar">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger"><i class="fas fa-trash"></i> Cliente no encontrado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="txt_mensaje">&nbsp;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("../includes/pie.php");
    ?>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap Bundle JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Tu archivo JavaScript personalizado -->
    <script>
        $(function() {
    $("#form_consultar_cli").submit(function(e) {
        e.preventDefault();

        var valor = $("#txt_valor").val();

        if (valor != "") {
            // Convertir el valor a entero
            var codcli = parseInt(valor);

            $.ajax({
                url: "../controlador/ctr_consultar_cliente.php",
                type: "POST",
                data: { codcli: codcli }, // Pasar el valor convertido a entero
                success: function(rpta) {
                    let rp = JSON.parse(rpta);

                    if (rp) {
                        $("#md_consultar .codigo").html(rp.codigo_cliente);
                        $("#md_consultar .nombre").html(rp.nombre);
                        $("#md_consultar .ap_paterno").html(rp.ap_paterno);
                        $("#md_consultar .ap_materno").html(rp.ap_materno);
                        $("#md_consultar .fecha_nacimiento").html(rp.fecha_nacimiento);
                        $("#md_consultar .direccion").html(rp.direccion);
                        $("#md_consultar .correo_electronico").html(rp.correo_electronico);
                        $("#md_consultar .distrito").html(rp.distrito_nombre);

                        $("#md_consultar").modal("show");
                    } else {
                        let vacio = "&nbsp;";
                        $("#md_consultar .codigo, #md_consultar .nombre, #md_consultar .ap_paterno, #md_consultar .ap_materno, #md_consultar .fecha_nacimiento, #md_consultar .direccion, #md_consultar .correo_electronico, #md_consultar .distrito").html(vacio);
                        alert("El código " + valor + " no existe");
                    }
                }
            });
        } else {
            alert("Ingrese un valor para consultar");
        }
    });
});
    </script>
</body>

</html>
