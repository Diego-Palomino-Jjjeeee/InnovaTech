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

            $crudservicio = new CRUDServicios();
         

            $rs_mar = $crudservicio->ListarServicios();
 

?>

    <div class="container mt-3">
        <header>
            <h1 class="text-primary">
                    <i class="fas fa-plus-circle"></i> Registrar Servicios
            </h1>
            </hr>
        </header>

        <nav>
                <a href="listar_servicio.php" class="btn btn-outline-secondary btn-sm">
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
                                <form id="frm_registrar_ser" name="frm_registrar_ser" method="post" action="../controlador/ctr_grabar_ser.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="r"/>

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="txt_idser" class="form-label" >ID SERVICIOS</label>
                                            <input type="text" class="form-control" id="txt_idser" name="txt_idser"
                                            placeholder="D001A"  autofocus required>
                                        </div>
                                        <div class="col-md-8">
                                            <label for="txt_nom" class="form-label">NOMBRE</label>
                                            <input type="text" class="form-control" id="txt_nom" name="txt_nom"
                                            placeholder="Limpieza de hogar" maxlength="40" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txt_pre" class="form-label">PRECIO</label>
                                            <input type="number" class="form-control" id="txt_pre" name="txt_pre"
                                            placeholder="S/.40"  />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txt_dur" class="form-label">DURACION</label>
                                            <input type="text" class="form-control" id="txt_dur" name="txt_dur"
                                            placeholder="Disponible"  />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txt_cat" class="form-label"> CATEGORIA</label>
                                            <input type="text" class="form-control" id="txt_cat" name="txt_cat"
                                            placeholder="Hogar"  />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txt_est" class="form-label"> ESTADO </label>
                                            <select class="form-select" id="txt_est" name="txt_est">
                                                <option value="Disponible">Disponible</option>
                                                <option value="En proceso">En proceso</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-outline-primary" id="btn_registrar_ser" name="btn_registrar_ser">
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