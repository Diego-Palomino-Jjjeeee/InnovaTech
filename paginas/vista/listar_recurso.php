<!DOCTYPE html>
<html lang="es">
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Lista de Recursos";
        include("../includes/cabecera.php");
    ?>
    <body>
        <?php
            include("../includes/menu.php");
            include "../includes/cargar_clases.php";
            $crudrecurso = new CRUDRecurso();
            $rs_recursos = $crudrecurso->ListarRecurso();
        ?>
        <div class="container mt-3">
            <header>
                <h1><i class="fas fa-list-alt"></i>Lista de Recursos</h1>
            </header>

            <nav class="nav nav-pills nav-fill">
                <a class="nav-link active" aria-current="page" href="registrar_recurso.php">
                    <i class="fas fa-edit"></i>Registrar
                </a>
                <a class="nav-link" href="consultar_recurso.php">
                    <i class="fas fa-search"></i>Consultar
                </a>
                <a class="nav-link" href="filtrar_recurso.php">
                    <i class="fas fa-filter"></i>Filtrar
                </a>
            </nav>

            <section>
                <article>
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-6">
                            <table class="table table-hover table-sm table-success table-striped">
                                <tr class="table-primary">
                                    <th>Nº</th>
                                    <th>ID Recurso</th>
                                    <th>Nombre</th>
                                    <th>Categoría</th>
                                    <th>Estado</th>
                                    <th>Fecha Adquisición</th>
                                    <th>Costo</th>
                                    <th colspan="3">Acciones</th>
                                </tr>
                                <?php
                                    $i = 0;
                                    foreach ($rs_recursos as $recurso) {
                                        $i++;
                                ?>
                                <tr class="reg_recurso">
                                    <td><?=$i?></td>
                                    <td class="id_recurso"><?=$recurso->Id_recursos?></td>
                                    <td class="nombre"><?=$recurso->Nombre?></td>
                                    <td><?=$recurso->Categoria?></td>
                                    <td><?=$recurso->Estado?></td>
                                    <td><?=$recurso->Fecha_Adquisicion?></td>
                                    <td><?=$recurso->Costo?></td>
                                    <td>
                                        <a class="btn_mostrar btn btn-outline-success" href="#" role="button">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn_editar btn btn-outline-primary" href="#" role="button">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn_borrar btn btn-outline-danger" href="#" role="button">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
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
                        <h4 class="modal-title text-danger" id="staticBackdropLabel">
                            <i class="fas fa-trash"></i>Borrar Recurso
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <h5 class="card-title" >¿Seguro de borrar el registro?</h5>
                            <p class="card-text">
                                <span class="lbl_nombre"></span> (<span class="lbl_id_recurso"></span>)
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <a class="btn_borrar btn btn-outline-danger" href="#" role="button">Borrar</a>                    
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
