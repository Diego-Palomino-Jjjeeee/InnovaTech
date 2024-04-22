<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Ventas - Consultar Empleado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php
    $ruta = "../..";
    $titulo = "Aplicación de Ventas - Consultar Empleado";
    include("../includes/cabecera.php");
    include("../includes/menu.php");
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-search"></i> Consultar Empleado</h1>
        </header>

        <nav>
            <a href="listar_empleado.php" class="btn btn-outline-secondary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="card col-md-6">
                        <div class="card-body">
                            <form id="frm_consultar_emp" name="frm_consultar_emp" method="post">
                                <div class="row g-3">
                                    <div class="col-md-7">
                                        <label for="txt_codemp" class="frm-label">Código</label>
                                        <input type="text" class="form-control" id="txt_codemp" name="txt_codemp" placeholder="Código a buscar" maxlength="8" autofocus />
                                    </div>
                                    <div class="col-md-8"></div>

                                    <div class="col-md-8">
                                        <div class="row align-items-start">
                                            <div class="col">
                                                <h5 class="card-title">Nombre</h5>
                                                <p class="nom card-text">&nbsp;</p>
                                            </div>
                                            <div class="col">
                                                <h5 class="card-title">Direccion</h5>
                                                <p class="dir card-text">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8"></div>

                                    <div>
                                        <div class="row align-items-start">
                                            <div class="col">
                                                <h5 class="card-title">Telefono</h5>
                                                <p class="tel card-text">&nbsp;</p>
                                            </div>
                                            <div class="col">
                                                <h5 class="card-title">Email</h5>
                                                <p class="ema card-text">&nbsp;</p>
                                            </div>
                                            <div class="col">
                                                <h5 class="card-title">Sueldo</h5>
                                                <p class="sue card-text">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8"></div>

                                    <div class="col-md-8">
                                        <div class="row align-items-start">
                                            <div class="col">
                                                <h5 class="card-title">Est. Civil</h5>
                                                <p class="est card-text">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="text-center mt-3">
                                <a type="submit" href="consultar_empleado.php" class="btn btn-outline-primary">
                                    <i class="fas fa-file"></i> Nueva consulta
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
        <?php
        include("../includes/pie.php");
        ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Código no encontrado</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="mensaje_modal">El código no existe.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Importa jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Coloca tu script personalizado aquí -->
    <script>
        $(document).ready(function () {
            $("#frm_consultar_emp #txt_codemp").focusout(function (e) {
                e.preventDefault();
                // Captura el valor ingresado en el cuadro de texto
                let codemp = $(this).val();

                if (codemp != "") {
                    // Implementar la consulta por medio de AJAX para JQuery 
                    $.ajax({
                        url: "../controlador/ctr_consultar_emp.php",
                        type: "POST",
                        data: { codemp: codemp },
                        success: function (rpta) {
                            let rp = JSON.parse(rpta);

                            if (rp) {
                                $(".nom").html(rp.Nombre);
                                $(".dir").html(rp.Direccion);
                                $(".tel").html(rp.Telefono);
                                $(".ema").html(rp.Email);
                                $(".sue").html("S/. " + rp.Sueldo);
                                $(".est").html(rp.Estado_civil);
                            } else {
                                $("#txt_codemp").val("");

                                let vacio = "&nbsp;";
                                $(".nom, .dir, .tel, .ema, .sue, .est").html(vacio);

                                $("#txt_codemp").focus();

                                // Mostrar modal centrado
                                $("#mensaje_modal").text("El código " + codemp + " no existe");
                                $("#exampleModal").modal("show");
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
