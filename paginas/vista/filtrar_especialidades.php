<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Filtrar Especialidades";
include("../includes/cabecera.php");
?>

<body>
    <?php
    include("../includes/menu.php");
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-filter"></i>Filtrar Especialidad</h1>
            <hr />
        </header>

        <nav>
            <a href="listar_especialidades.php" class="btn brn-outline-secondary btn-sm">
                <i class="fas fa-arrow-circle-left"></i> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-5">
                        <form id="form_filtrar_espec" name="form_filtrar_espec" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="txt_valor" name="txt_valor" maxlength="40" placeholder="Valor a buscar..." autofocus />

                                <button type="submit" class="btn btn-outline-success" id="btn_filtrar" name="btn_filtrar">Filtrar</button>
                                <a class="btn btn-outline-primary" href="filtrar_especialidades.php">Nuevo</a>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </section>

        <!-- Modal informacion -->
        <div class="modal fade" id="modal_information" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Filtrar Especialidad</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <section class="mt-3">
                            <div id="tabla"></div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include("../includes/pie.php");
        ?>
    </div>
</body>

</html>