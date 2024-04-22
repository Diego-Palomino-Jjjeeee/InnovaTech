<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Registrar Cliente";
include("../includes/cabecera.php");
include "../includes/cargar_clases.php";

$cruddistrito = new CRUDDistrito();

$rs_dis = $cruddistrito->ListarDistrito();
?>

<body>
    <?php
    include("../includes/menu.php");
    ?>

    <div class="container mt-3">
        <header>
            <h1 class="text-primary">
                <i class="fas fa-plus-circle"></i> Registrar Cliente</h1>
            <hr />
        </header>

        <nav>
            <a href="listar_cliente.php" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-arrow-circle-left"></i> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form id="frm_registrar_cli" name="frm_registrar_cli" method="post" action="../controlador/ctr_grabar_cli.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="r" />

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="txt_codcli" class="form-label">Código</label>
                                            <input type="text" class="form-control" id="txt_codcli" name="txt_codcli" placeholder="Código" maxlength="5" autofocus />
                                        </div>

                                        <div class="col-md-8">
                                            <label for="txt_nombres" class="form-label">Nombres</label>
                                            <input type="text" class="form-control" id="txt_nombres" name="txt_nombres" placeholder="Nombres" maxlength="40" />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="txt_apellidos" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="txt_apellidos" name="txt_apellidos" placeholder="Apellidos" maxlength="40" />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="txt_fecha_nac" class="form-label">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" id="txt_fecha_nac" name="txt_fecha_nac" />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="txt_direccion" class="form-label">Dirección</label>
                                            <input type="text" class="form-control" id="txt_direccion" name="txt_direccion" placeholder="Dirección" maxlength="100" />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="txt_correo" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="txt_correo" name="txt_correo" placeholder="Correo Electrónico" maxlength="50" />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="cbo_distrito" class="form-label">Distrito</label>
                                            <select class="form-select form-select-lg mb-3" id="cbo_distrito" name="cbo_distrito">
                                                <option value="" selected>[Seleccione distrito]</option>
                                                <?php
                                                foreach ($rs_dis as $dis) {
                                                ?>
                                                    <option value="<?= $dis->codigo_distrito ?>"><?= $dis->distrito ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-outline-primary" id="btn_registrar_cli" name="btn_registrar_cli">
                                            <i class="fas fa-save"></i> Grabar Información
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
