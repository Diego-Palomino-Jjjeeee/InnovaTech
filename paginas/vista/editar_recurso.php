<!DOCTYPE html> 
<html lang="es">
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Editar Recurso";
        include("../includes/cabecera.php");
    ?>
    
    <body>
        <?php
            include("../includes/menu.php");
            include "../includes/cargar_clases.php";

            if (isset($_GET["id_recurso"])) {

                $id_recurso = $_GET["id_recurso"];

                $crudrecurso = new CRUDRecurso();

                $rs_recurso = $crudrecurso->MostrarRecursoPorId($id_recurso);

                if (!empty($rs_recurso)) {

                } else {
                    header("location: listar_recurso.php");
                }
            } else {
                header("location: listar_recurso.php");
            }
        ?>
    
        <div class="container mt-3">
            <header>
                <h1 class="text-success">
                    <i class="fas fa-pen-square"></i> Editar Recurso</h1>
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
                                    <form id="frm_editar_recurso" name="frm_editar_recurso" method="post" action="../controlador/ctr_grabar_recurso.php" autocomplete="off">
                                        <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label for="txt_id_recurso" class="form-label">ID Recurso</label>
                                                <input type="text" class="form-control" id="txt_id_recurso" 
                                                name="txt_id_recurso" placeholder="ID Recurso" readonly value="<?=$rs_recurso->Id_recursos?>" />
                                            </div>
                                            <div class="col-md-8">
                                                <label for="txt_nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" 
                                                placeholder="Nombre del recurso" maxlength="48" value="<?=$rs_recurso->Nombre?>"/>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_categoria" class="form-label">Categoría</label> 
                                                <input type="text" class="form-control" id="txt_categoria" name="txt_categoria" 
                                                placeholder="Categoría" maxlength="50" value="<?=$rs_recurso->Categoria?>"/>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_estado" class="form-label">Estado</label>
                                                <input type="text" class="form-control" id="txt_estado" name="txt_estado" 
                                                placeholder="Estado" maxlength="50" value="<?=$rs_recurso->Estado?>"/>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_fecha_adq" class="form-label">Fecha Adquisición</label>
                                                <input type="date" class="form-control" id="txt_fecha_adquisicion" name="txt_fecha_adquisicion" 
                                                value="<?=$rs_recurso->Fecha_Adquisicion?>"/>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_costo" class="form-label">Costo</label>
                                                <input type="text" class="form-control" id="txt_costo" name="txt_costo" 
                                                placeholder="Costo" maxlength="8" value="<?=$rs_recurso->Costo?>"/>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_recurso" name="btn_registrar_recurso">
                                                <i class="fa fa-save"></i> Actualizar Información 
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
