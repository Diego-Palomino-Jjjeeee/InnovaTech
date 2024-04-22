<!DOCTYPE html> 
<html lang="es">
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Registrar Recurso";
        include("../includes/cabecera.php");
    ?>
    
    <body>
        <?php
            include("../includes/menu.php");
            include "../includes/cargar_clases.php";

        ?>
    
        <div class="container mt-3">
            <header>
                <h1 class="text-primary">
                    <i class="fa fa-plus-circle"></i> Registrar Recurso</h1>
                <hr/> 
            </header>

            <nav>
                <a href="listar_recurso.php" class="btn btn-outline-secondary btn-sm">
                    <i class="fa fa-arrow-circle-left"></i> Regresar
                </a>
            </nav>
            <section>
                <article>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Inicio del Formulario -->
                                    <form id="frm_registrar_recurso" name="frm_registrar_recurso" method="post" action="../controlador/ctr_grabar_recurso.php" autocomplete="off">
                                        <input type="hidden" id="txt_tipo" name="txt_tipo" value="r" />
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label for="txt_id_recurso" class="form-label">ID Recurso</label>
                                                <input type="text" class="form-control" id="txt_id_recurso" name="txt_id_recurso" 
                                                placeholder="ID Recurso" maxlength="5" autofocus />
                                            </div>
                                            <div class="col-md-8">
                                                <label for="txt_nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" 
                                                placeholder="Nombre del recurso" maxlength="48" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_categoria" class="form-label">Categoría</label> 
                                                <input type="text" class="form-control" id="txt_categoria" name="txt_categoria" 
                                                placeholder="Categoría" maxlength="50" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_estado" class="form-label">Estado</label>
                                                <input type="text" class="form-control" id="txt_estado" name="txt_estado" 
                                                placeholder="Estado" maxlength="50" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_fecha_adq" class="form-label">Fecha Adquisición</label>
                                                <input type="date" class="form-control" id="txt_fecha_adq" name="txt_fecha_adquisicion" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_costo" class="form-label">Costo</label>
                                                <input type="text" class="form-control" id="txt_costo" name="txt_costo" 
                                                placeholder="Costo" maxlength="8" />
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_recurso" name="btn_registrar_recurso">
                                                <i class="fa fa-save"></i> Grabar Información 
                                            </button>
                                        </div>
                                    </form>
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
    </body>
</html>
