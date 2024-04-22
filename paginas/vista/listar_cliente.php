<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Lista de Clientes";
include("../includes/cabecera.php");
?>

<body>
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";

    $crudcliente = new CRUDCliente();
    $rs_clientes = $crudcliente->ListarCliente();
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-list-alt"></i>Lista de Clientes</h1>
        </header>

        <nav>
            <div class="btn-group col-md-5" role="group">
                <a href="registrar_cliente.php" class="btn btn-outline-primary ">
                    <i class="fas fa-plus-circle"></i>Registrar
                </a>
                <a href="consultar_clientes.php" class="btn btn-outline-primary ">
                    <i class="fas fa-search"></i>Consultar
                </a>
                <a href="filtrar_cliente.php" class="btn btn-outline-primary ">
                    <i class="fas fa-filter"></i>Filtrar
                </a>
            </div>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-9">
                        <table class="table-info table">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Ap.Paterno</th>
                                    <th>Ap.Materno</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Dirección</th>
                                    <th>Correo Electronico</th>
                                    <th>Nombre Distrito</th>
                                    <th class="text-center" colspan="3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($rs_clientes as $cliente) {
                                    $i++;
                                ?>
                                    <tr class="reg_cliente">
                                        <td><?= $i ?></td>
                                        <td class="codcliente"><?= $cliente->codigo_cliente ?></td>
                                        <td class="nombre"><?= $cliente->nombre ?></td>
                                        <td class="ap_paterno"><?= $cliente->ap_paterno ?></td>
                                        <td class="ap_materno"><?= $cliente->ap_materno ?></td>
                                        <td class="fecha_nacimiento"><?= $cliente->fecha_nacimiento ?></td>
                                        <td class="direccion"><?= $cliente->direccion ?></td>
                                        <td class="correo_electronico"><?= $cliente->correo_electronico ?></td>
                                        <td class="distrito_nombre"><?= $cliente->distrito_nombre ?></td>
                                        <td><a href="mostrar_cliente.php?codcli=<?= $cliente->codigo_cliente ?>" class="btn_mostrar btn btn-primary"><i class="fas fa-info-circle"></i></a></td>
                                        <td><a href="editar_cliente.php?codcli=<?= $cliente->codigo_cliente ?>" class="btn_editar btn btn-success"><i class="fas fa-edit"></i></a></td>
                                        <td><a href="#" class="btn_borrar btn btn-danger"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </article>
        </section>
        <?php
        include("../includes/pie.php");
        ?>
    </div>
    <div class="modal fade" id="md_borrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger" id="staticBackdropLabel"><i class="fas fa-trash-alt"></i> Borrar Cliente</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <h5 class="card-title">¿Seguro de borrar el registro?</h5>
                        <p class="card-text">
                            <span class="lbl_nombre"></span> (<span class="lbl_codcliente"></span>)
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <a href="#" class="btn_borrar btn btn-outline-danger">Borrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
