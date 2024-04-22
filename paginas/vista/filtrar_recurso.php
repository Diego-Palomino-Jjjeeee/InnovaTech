<!DOCTYPE html> 
<html lang="es"> 
<head>
    <?php
    $ruta="../..";
    $titulo = "Aplicación de Ventas - Filtrar Recursos";
    include("../includes/cabecera.php");
    ?>
</head>
<body>
    <?php
    include("../includes/menu.php");
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fa fa-filter"></i> Filtrar Recursos</h1>
            <hr/>
        </header>
        <nav>
            <a href="listar_recurso.php" class="btn btn-outline-secondary btn-sm"> 
                <i class="fa fa-arrow-circle-left"></i> Regresar
            </a>
        </nav>
        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-5">
                        <!-- Inicio del Formulario -->
                        <form id="frm_filtrar_rec" name="frm_filtrar_rec" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="txt_valor" name="txt_valor" maxlength="48" placeholder="Valor a buscar..." autofocus />
                                <button class="btn btn-outline-success" type="button" id="btn_filtrar" name="btn_filtrar">Filtrar</button>
                                <a class="btn btn-outline-primary" href="filtrar_recurso.php">Nuevo</a>
                            </div>
                        </form>
                        <!-- Fin del Formulario -->
                    </div>
                </div>
            </article>
        </section>
        <section class="mt-3">
            <!-- Mostrar los resultados del filtro -->
            <div id="tabla"></div>
        </section>
    </div>
    <?php
    include("../includes/pie.php");
    ?>
    <!-- Modales -->
    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Escriba un valor para filtrar...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="resultadoModal" tabindex="-1" aria-labelledby="resultadoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultadoModalLabel">Resultados del Filtro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
