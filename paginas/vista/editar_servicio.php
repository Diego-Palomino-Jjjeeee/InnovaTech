<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Editar Producto";
include("../includes/cabecera.php");
?>

<body>
<?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";

    if (isset($_GET["codser"])) {
        $codser = $_GET["codser"];

        $crudservicio = new CRUDServicios();

        $rs_prod = $crudservicio->BuscarServiciosPorCodigo($codser);

    } else {
        header("location: listar_servicio.php");
    }
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-success"><i class="fas fa-pen-square"></i> Editar Servicios</h1>
        </header>

        <nav>
            <a href="listar_servicio.php" class="btn btn-outline-primary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form id="frm_editar_ser" name="frm_editar_ser" method="post" action="../controlador/ctr_grabar_ser.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="txt_idser" class="form-label">ID SERVICIO</label>
                                            <input type="text" class="form-control" id="txt_idser" name="txt_idser" placeholder="Código"   value="<?= $rs_prod->Id_servicios ?>">
                                        </div>

                                        <div class="col-md-8">
                                            <label for="txt_nom" class="form-label">NOMBRE</label>
                                            <input type="text" class="form-control" id="txt_nom" name="txt_nom" placeholder="Nombre del producto" maxlength="40" value="<?= $rs_prod->Nombre ?>" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_pre" class="form-label">PRECIO</label>
                                            <input type="number" class="form-control" id="txt_pre" name="txt_pre" placeholder="Stock" maxlength="4" min="1" max="9999" value="<?= $rs_prod->Precio ?>" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_dur" class="form-label">DURACION</label>
                                            <input type="text" class="form-control" id="txt_dur" name="txt_dur" placeholder="Costo" maxlength="8" value="<?= $rs_prod->Duracion ?>" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_cat" class="form-label">CATEGORIA</label>
                                            <input type="text" class="form-control" id="txt_cat" name="txt_cat" placeholder="Ganancia" min="1" max="100" step="0.01" value="<?= $rs_prod->Categoria ?>" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txt_est" class="form-label">ESTADO</label>
                                            <select class="form-select" id="txt_est" name="txt_est">
                                                <option value="Disponible" <?= ($rs_prod->Estado == 'Disponible') ? 'selected' : '' ?>>Disponible</option>
                                                <option value="En proceso" <?= ($rs_prod->Estado == 'En proceso') ? 'selected' : '' ?>>En proceso</option>
                                            </select>
                                        </div>



                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_ser" name="btn_registrar_ser">
                                                <i class="fas fa-save"></i> Actualizar Informacion
                                            </button>
                                        </div>
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