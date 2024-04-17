<!DOCTYPE html>
<html lang="en">
<?php
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Información del Producto";
        include("../includes/cabecera.php");
    ?>
<body>
<?php
            include("../includes/menu.php");
            include "../includes/cargar_clases.php";

            $crudrecurso = new CRUDRecursos();
         

            $rs_mar = $crudrecurso->ListarRecursos();
 

?>

    <div class="container mt-3">
        <header>
            <h1 class="text-primary">
                    <i class="fas fa-plus-circle"></i> Registrar Recurso
            </h1>
            </hr>
        </header>

        <nav>
                <a href="listar_recurso.php" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-circle-left"></i> Regresar
                </a>
            </nav>
        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Inicio del formaulario-->
                                <form id="frm_registrar_prod" name="frm_registrar_prod" method="post" action="../controlador/ctr_grabar_rec.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="r"/>

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="txt_codprod" class="form-label">ID RECURSO</label>
                                            <input type="text" class="form-control" id="txt_codprod" name="txt_codprod"
                                            placeholder="Codigo" maxlength="5" autofocus>
                                        </div>
                                        <div class="col-md-8">
                                            <label for="txt_prod" class="form-label">NOMBRE</label>
                                            <input type="text" class="form-control" id="txt_prod" name="txt_prod"
                                            placeholder="Nombre del Producto" maxlength="40" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txt_stk" class="form-label">CATEGORIA</label>
                                            <input type="number" class="form-control" id="txt_stk" name="txt_stk"
                                            placeholder="Stok" maxlength="4" min="1" max="9999" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txt_cst" class="form-label">ESTADO</label>
                                            <input type="number" class="form-control" id="txt_cst" name="txt_cst"
                                            placeholder="Costo" maxlength="8"  />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txt_gnc" class="form-label"> FECHA DE ADQUISICION</label>
                                            <input type="number" class="form-control" id="txt_gnc" name="txt_gnc"
                                            placeholder="Ganacia" min="1"  max="100" step="0.01" />
                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-outline-primary" id="btn_registrar_rec" name="btn_registrar_rec">
                                        <i class="fas fa-save "></i> Grabar informacion
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