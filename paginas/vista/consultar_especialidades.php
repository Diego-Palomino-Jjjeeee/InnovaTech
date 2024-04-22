<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Consultar Especialiades";
include("../includes/cabecera.php");
?>

<body>
    <?php
    include("../includes/menu.php");
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-search"></i> Consultar Especialidades</h1>
        </header>

        <nav>
            <a href="listar_especialidades.php" class="btn btn-outline-secondary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="card col-md-6">
                        <div class="card-body">
                            <form id="frm_consultar_espec" name="frm_consultar_espec" method="post">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="txt_Id_especialidad" class="frm-label">Código</label>
                                        <input type="text" class="form-control" id="txt_Id_especialidad" name="txt_Id_especialidad" placeholder="Código a buscar" maxlength="5" autofocus />
                                    </div>
                                    <div class="col-md-8"></div>

                                    <div class="col-md-8">
                                        <div class="row align-items-start">
                                            <div class="col">
                                                <h5 class="card-title">Nombre</h5>
                                                <p class="nom card-text">&nbsp;</p>
                                            </div>
                                            <div class="col">
                                                <h5 class="card-title">Area</h5>
                                                <p class="are card-text">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="text-center mt-3">
                                <a type="submit" href="consultar_especialidades.php" class="btn btn-outline-primary">
                                    <i class="fas fa-file"></i> Nuevo consulta
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="error_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mensaje de Alerta</h5>
                        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        El código de especialidad ingresado no existe.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include("../includes/pie.php");
        ?>
    </div>
</body>