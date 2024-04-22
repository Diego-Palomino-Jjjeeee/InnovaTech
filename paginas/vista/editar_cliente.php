<?php
require_once "../modelo/crudcliente.php";

// Crear una instancia de la clase CRUDCliente
$crudcliente = new CRUDCliente();

// Llamar al método ListarDistrito() para obtener los distritos
$rs_distritos = $crudcliente->ListarDistrito();
?>

<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Editar Cliente";
include("../includes/cabecera.php");
require_once "../modelo/conexion.php";
?>

<body>
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";

    if (isset($_GET["codcli"])) {
        $codcliente = $_GET["codcli"];

        $crudcliente = new CRUDCliente();

        $cliente = $crudcliente->BuscarClientePorCodigo($codcliente);

        if (!empty($cliente)) {
            $crudmarca = new CRUDMarca();
            $crudcategoria = new CRUDCategoria();

            $rs_mar = $crudmarca->ListarMarca();
            $rs_cat = $crudcategoria->ListarCategoria();
        } else {
            header("location: listar_cliente.php");
        }
    } else {
        header("location: listar_cliente.php");
    }
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-success"><i class="fas fa-pen-square"></i> Editar Cliente</h1>
        </header>

        <nav>
            <a href="listar_cliente.php" class="btn btn-outline-primary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form id="frm_editar_cliente.php" name="frm_editar_cliente" method="post" action="../controlador/ctr_grabar_cliente.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="txt_codigo_cliente" class="form-label">Código</label>
                                            <input type="text" class="form-control" id="txt_codigo_cliente" name="txt_codigo_cliente" placeholder="Código" maxlength="5" readonly value="<?= $cliente->codigo_cliente ?>">
                                        </div>
                                        <div class="col-md-8">
                                            <label for="txt_nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Nombre del cliente" maxlength="40" value="<?= $cliente->nombre ?>" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txt_ap_paterno" class="form-label">Apellido Paterno</label>
                                            <input type="text" class="form-control" id="txt_ap_paterno" name="txt_ap_paterno" placeholder="Apellido paterno" maxlength="20" value="<?= $cliente->ap_paterno ?>" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txt_ap_materno" class="form-label">Apellido Materno</label>
                                            <input type="text" class="form-control" id="txt_ap_materno" name="txt_ap_materno" placeholder="Apellido materno" maxlength="20" value="<?= $cliente->ap_materno ?>" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txt_fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" id="txt_fecha_nacimiento" name="txt_fecha_nacimiento" value="<?= $cliente->fecha_nacimiento ?>" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="txt_direccion" class="form-label">Dirección</label>
                                            <input type="text" class="form-control" id="txt_direccion" name="txt_direccion" placeholder="Dirección" maxlength="50" value="<?= $cliente->direccion ?>" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="txt_correo_electronico" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="txt_correo_electronico" name="txt_correo_electronico" placeholder="Correo electrónico" maxlength="50" value="<?= $cliente->correo_electronico ?>" />
                                        </div>
                                        <!-- Agrega más campos aquí si es necesario -->
                                        <div class="col-md-6">
                                            <label for="distrito_nombre" class="form-label">Nombre Distrito</label>
                                            <select class="form-select form-select-lg mb-3" name="distrito_nombre" id="distrito_nombre">
                                                <option value="" selected>[Seleccione Distrito]</option>
                                                <?php foreach ($rs_distritos as $distrito) { ?>
                                                    <option value="<?= $distrito->codigo_distrito ?>" <?= ($distrito->codigo_distrito == $cliente->distrito_nombre) ? 'selected' : '' ?>>
                                                        <?= $distrito->distrito ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-outline-primary" id="btn_registrar_cliente" name="btn_registrar_cliente">
                                            <i class="fas fa-save"></i> Actualizar Información
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
