<!DOCTYPE html>
<html lang="es"> 
<head>
    <?php
    $ruta = "../..";
    $titulo = "Aplicación de Ventas - Consultar Recurso"; 
    include("../includes/cabecera.php");
    ?>
</head>
<body>
    <?php
    include("../includes/menu.php");
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-info">
                <i class="fa fa-search"></i> Consultar Recurso</h1> 
            <hr/>
        </header>

        <nav>
            <a href="listar_recurso.php" class="btn btn-outline-secondary btn-sm"> 
                <i class="fas fa-arrow-circle-left"></i> Regresar
            </a>
        </nav>
        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="card col-md-6">
                        <div class="card-body">
                        <form id="frm_consultar_recurso" name="frm_consultar_recurso" method="post">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="txt_id_recurso" class="form-label">ID Recurso</label>
                                    <input type="text" class="form-control" id="txt_id_recurso" name="txt_id_recurso" 
                                    placeholder="ID Recurso" maxlength="5" autofocus />
                                </div>
                                <div class="col-md-8"></div>

                                <div class="col-md-8">
                                    <h5 class="card-title">Nombre</h5>
                                    <p class="nombre card-text">&nbsp;</p>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="card-title">Categoría</h5>
                                    <p class="categoria card-text">&nbsp;</p>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="card-title">Estado</h5>
                                    <p class="estado card-text">&nbsp;</p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-title">Fecha de Adquisición</h5>
                                    <p class="fecha_adquisicion card-text">&nbsp;</p>
                                </div>

                                <div class="col-md-6">
                                    <h5 class="card-title">Costo</h5>
                                    <p class="costo card-text">&nbsp;</p>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <a href="consultar_recurso.php" class="btn btn-outline-primary">
                                    <i class="fas fa-file"></i>
                                </a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </article>
        </section>
        <?php
            include("../includes/pie.php");
        ?> 
    </div>  
    <div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="modalInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInfoLabel">Información del Recurso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
