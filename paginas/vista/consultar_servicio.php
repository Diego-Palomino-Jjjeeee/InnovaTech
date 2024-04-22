<!DOCTYPE html>
<html lang="es">
<?php
    $ruta = "../..";
    $titulo = "Aplicación de Ventas - Consultar Servicio";
    include("../includes/cabecera.php");
    
    ?>
<body>
   <?php
    include("../includes/menu.php");
   ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-primary"><i class="fas fa-search text-primary"></i> Consultar Servicio</h1>
        </header>

        <nav>
            <a href="listar_servicio.php" class="btn btn-outline-secondary btn-sm " >
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="card col-md-6">
                        <div class="card-body">
                            <form id="frm_consultar_ser" name="frm_consultar_ser" method="post">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="txt_idser" class="frm-label">ID DEL SERVICIO</label>
                                        <input type="text" class="form-control" id="txt_idser" name="txt_idser" placeholder="Código a buscar" maxlength="5" autofocus />
                                    </div>
                                    <div class="col-md-8"></div>

                                    <div class="col-md-8">
                                        <div class="row align-items-start">
                                            <div class="col">
                                                <h5 class="card-title">Categoria</h5>
                                                <p class="cat card-text">&nbsp;</p>
                                            </div>
                                            <div class="col">
                                                <h5 class="card-title">Nombre</h5>
                                                <p class="nom card-text">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="row align-items-start">
                                            <div class="col">
                                                <h5 class="card-title">Precio</h5>
                                                <p class="pre card-text">&nbsp;</p>
                                            </div>
                                            <div class="col">
                                                <h5 class="card-title">Duracion</h5>
                                                <p class="dur card-text">&nbsp;</p>
                                            </div>
                                            <div class="col">
                                                <h5 class="card-title">Estado</h5>
                                                <p class="est card-text">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <div class="text-center mt-3">
                                <a  href="consultar_servicio.php" class="btn btn-outline-primary">
                                    <i class="fas fa-file"></i> Nuevo consulta
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
</body>
</html>
