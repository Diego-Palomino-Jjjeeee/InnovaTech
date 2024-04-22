<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Editar Empleado";
include("../includes/cabecera.php");
?>

<body>
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";

    if (isset($_GET["codemp"])) {
        $codemp = $_GET["codemp"];

        $crudempleado = new CRUDEmpleado();

        $rs_emp = $crudempleado->BuscarEmpleado($codemp);

        
    } else {
        header("location: listar_empleado.php");
    }
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-success"><i class="fas fa-pen-square"></i> Editar Empleado</h1>
        </header>

        <nav>
            <a href="listar_empleado.php" class="btn btn-outline-primary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form id="frm_editar_emp.php" name="frm_editar_emp" method="post" action="../controlador/ctr_grabar_emp.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />

                                    <div class="row g-3">
                                        <div class="col-md-5">
                                            <label for="txt_dni" class="form-label">Id</label>
                                            <input type="text" class="form-control" id="txt_dni" name="txt_dni" placeholder="Id" maxlength="8" readonly value="<?= $rs_emp->DNI ?>" />
                                        </div>
                                        <div class="col-md-5">
                                            <label for="txt_nom" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="txt_nom" name="txt_nom" placeholder="Nombre" maxlength="8" value="<?= $rs_emp->Nombre ?>" />
                                        </div>
                                        <div class="col-md-8">
                                            <label for="txt_dir" class="form-label">Dirección</label>
                                            <input type="text" class="form-control" id="txt_dir" name="txt_dir" placeholder="Dirección" maxlength="40" value="<?= $rs_emp->Direccion ?>" />
                                        </div>
                                        <div class="col-md-5">
                                            <label for="txt_tel" class="form-label">Teléfono</label>
                                            <input type="text" class="form-control" id="txt_tel" name="txt_tel" placeholder="Teléfono" maxlength="9" value="<?= $rs_emp->Telefono ?>" />
                                        </div>
                                        <div class="col-md-7">
                                            <label for="txt_ema" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="txt_ema" name="txt_ema" placeholder="Email" maxlength="40" value="<?= $rs_emp->Email ?>" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txt_sue" class="form-label">Sueldo</label>
                                            <input type="text" class="form-control" id="txt_sue" name="txt_sue" placeholder="Sueldo" maxlength="9999" value="<?= $rs_emp->Sueldo ?>" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txt_est" class="form-label">Est. Civil</label>
                                            <input type="text" class="form-control" id="txt_est" name="txt_est" placeholder="Estado Civil" maxlength="12" value="<?= $rs_emp->Estado_civil ?>" /> 
                                        </div>

                                        <div class="col-md-6">
                                            <label for="txt_est" class="form-label">Est. Civil</label>
                                            <select class="form-select form-select-lg mb-3" name="txt_est" id="txt_est">
                                                <option value="Soltero" <?= ($rs_emp->Estado_civil == 'Soltero') ? 'select' : '' ?>>Soltero</option>
                                                <option value="Casado" <?= ($rs_emp->Estado_civil == 'Casado') ? 'select' : '' ?>>Casado</option>
                                                <option value="Divorciado" <?= ($rs_emp->Estado_civil == 'Divorciado') ? 'select' : '' ?>>Divorciado</option>
                                                <option value="Viudo" <?= ($rs_emp->Estado_civil == 'Viudo') ? 'select' : '' ?>>Viudo</option>
                                            </select>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-success" id="btn_registrar_emp" name="btn_registrar_emp">
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