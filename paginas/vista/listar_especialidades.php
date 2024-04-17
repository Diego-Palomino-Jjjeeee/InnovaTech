<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Lista de Especialidades";
include("../includes/cabecera.php");
?>

<body>
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";
    $crudesp = new CRUDEspecialidad();
    $rs_esp = $crudesp->ListarEspecialidades();
    ?>
    <div class="container mt-3">
        <header>
            <h1>
                <i class="fas fa-list-alt"></i>Lista de Especialidades
            </h1>
            <hr />
        </header>

        <nav>
            <div class="btn-group col-md-5" roles="group">
                <a href="registrar_especialidades.php" class="btn btn-outline-primary btn">
                    <i class="fas fa-search"></i> Registrar
                </a>
                <a href="consultar_especialidades.php" class="btn btn-outline-primary btn">
                    <i class="fas fa-search"></i> Consultar
                </a>
                <a href="filtrar_producto.php" class="btn btn-outline-primary btn">
                    <i class="fas fa-search"></i> Filtrar
                </a>
            </div>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="col- md-8">
                        <table class="table table-hover table-sm table-success  table-striped">
                            <tr class="table-primary">
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Area</th>
                                <th colspan="3">Acciones</th>
                            </tr>
                            <?php
                            $i = 0;
                            foreach ($rs_esp as $esp) {
                                $i++;

                            ?>
                                <tr class="reg_especialidades">
                                    <td class="idesp"><?= $esp->Id_especialidad ?></td>
                                    <td class="esp"><?= $esp->Nombre ?></td>
                                    <td><?= $esp->Area ?></td>
                                    <td><a href="#" class="btn_mostrar btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></td>
                                    <td><a href="#" class="btn_editar btn btn-surcess btn-sm"><i class="fas fa-edit"></i></td>
                                    <td><a href="#" class="btn_borrar btn btn-danger"><i class="fas fa-trash-alt"></i></td>
                                </tr>
                            <?php
                            }
                            ?>
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
                    <h4 class="modal-title text-danger" id="staticBackdropLabel"><i class="fas fa-trash-alt"></i> Borrar Producto</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <h5 class="card-title">¿Seguro de borrar el registro?</h5>
                        <p class="card-text">
                            <span class="lbl_prod"></span> (<span class="lbl_codprod"></span>)
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