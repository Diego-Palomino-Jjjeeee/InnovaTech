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
                <button data-bs-toggle="modal" data-bs-target="#md_agregar_especialidad" class="btn btn-outline-primary btn">
                    <i class="fas fa-search"></i> Registrar
                </button>
                <a href="consultar_especialidades.php" class="btn btn-outline-primary btn">
                    <i class="fas fa-search"></i> Consultar
                </a>
                <a href="filtrar_especialidades.php" class="btn btn-outline-primary btn">
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
                                    <td><a href="#" class="btn_editar btn btn-success btn-sm"><i class="fas fa-edit"></i></td>
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

    <!-- Mostrar informacion especialidad -->
    <div class="modal fade" id="md_mostrar_especialidad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-info">
                        <i class="fas fa-info-circle"></i>
                        Informacion
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="row justify-content-center">
                        <div class="row g-3 col-md-10 mb-4 bg-white border rounded">
                            <div class="col-md-4">
                                <h5 class="card-title">Código</h5>
                                <p class="codigo card-text">&nbsp;</p>
                            </div>
                            <div class="col-md-5">
                                <h5 class="card-title">Nombre</h5>
                                <p class="nombre card-text">&nbsp;</p>
                            </div>
                            <div class="col-md-8"></div>
                            <div class="col-md-8">
                                <div class="row align-items-start">
                                    <div class="col">
                                        <h5 class="card-title">Area</h5>
                                        <p class="area card-text">&nbsp;</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Editar informacion especialidad -->
    <div class="modal fade" id="md_editar_especialidad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-success">
                        <i class="fas fa-pen-square"></i>
                        Editar Especialidad
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <form name="frm_editar_espec" method="post" action="../controlador/ctr_grabar_espec.php" autocomplete="off">
                        <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />
                        <div class="row g-3">
                            <div class="col-md-3">
                                <input type="hidden" class="form-control" id="txt_codigo" name="txt_codigo" placeholder="Código">
                            </div>
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <label for="txt_nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" />
                            </div>
                            <div class="col-md-4">
                                <label for="txt_area" class="form-label">Area</label>
                                <input type="text" class="form-control" id="txt_area" name="txt_area" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" name="btn_registrar_espec" class="btn btn-outline-success">
                                    <i class="fas fa-save"></i> Actualizar Informacion
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Borrar Modal -->
    <div class="modal fade" id="md_borrar_especialidad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger" id="staticBackdropLabel">
                        <i class="fas fa-trash-alt"></i>
                        Borrar Especialidad
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../controlador/ctr_borrar_espec.php" method="get">
                        <div class="row justify-content-center border rounded mb-3">
                            <h5 class="card-title">¿Seguro de borrar el registro?</h5>
                            <p class="card-text">
                            <div class="col-md-3">
                                <input type="hidden" class="form-control" id="txt_codigo" name="txt_codigo" readonly>
                            </div>
                            <span class="lbl_nombre"></span>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="btn_borrar_espe" class="btn btn-outline-danger">Borrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Registrar -->
    <div class="modal fade" id="md_agregar_especialidad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary" id="staticBackdropLabel">
                        <i class="fas fa-plus-circle"></i>
                        Registrar Especialidad
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" novalidate method="post" action="../controlador/ctr_grabar_espec.php">
                        <input type="hidden" id="txt_tipo" name="txt_tipo" value="r" />
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="txt_codigo" class="form-label">Codigo</label>
                                <input type="text" class="form-control" id="txt_codigo" name="txt_codigo" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="txt_nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="txt_area" class="form-label">Area</label>
                                <input type="text" class="form-control" id="txt_area" name="txt_area" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="btn_registrar_espec" class="btn btn-outline-primary"><i class="fas fa-save"></i> Guardar Información</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>