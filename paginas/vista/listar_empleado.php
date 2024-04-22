<!DOCTYPE html>
<html lang="es">
<?php
    $ruta = "../..";
    $titulo = "Aplicación de Ventas - Lista de Empleados";
    include("../includes/cabecera.php");
    ?>
    <body>
        <?php
            include("../includes/menu.php");
            include "../includes/cargar_clases.php";

            //Instanciamos CRUDEmpleado
            $crudemp = new CRUDEmpleado();
            $rs_emp = $crudemp->ListarEmpleado();
        ?>
        <div class="container  mt-3">
            <header>
                <h1><i class="fas fa-list-alt"></i> Lista de Empleados</h1>
                <hr/>
            </header>

            <nav>
                <div class="btn-group col-md-5" role="group">
                    <a href="registrar_empleado.php" class="btn btn-outline-primary btn">
                        <i class="fas fa-plus-circle"></i> Registrar
                    </a>
                    <a href="consultar_empleado.php" class="btn btn-outline-primary btn">
                        <i class="fas fa-search"></i> Consultar
                    </a>
                    <a href="filtrar_empleado.php" class="btn btn-outline-primary btn">
                        <i class="fas fa-filter"></i> Filtrar
                    </a>
                </div>
            </nav>

            <section>
                <article>
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-6">
                            <table class="table table-hover table-sm table-success table-striped">
                            <thead>   
                                <tr>
                                    <th>N°</th>
                                    <th>DNI</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Sueldo</th>
                                    <th>Estado Civil</th>
                                    <th class="text-center" colspan="3">Acciones</th>
                                </tr>
                            </thead>
                                <?php
                                    $i = 0;
                                    foreach ($rs_emp as $emp) {
                                        $i++;
                                ?>
                                    <tr class="reg_empleado">
                                        <td><?= $i ?></td>
                                        <td class="codemp"><?=$emp->DNI?></td>
                                        <td><?=$emp->Nombre?></td>
                                        <td><?=$emp->Direccion?></td>
                                        <td><?=$emp->Telefono?></td>
                                        <td><?=$emp->Email?></td>
                                        <td><?=$emp->Sueldo?></td>
                                        <td><?=$emp->Estado_civil?></td>

                                        <td><a href="#" class="btn_mostrar btn btn-primary"><i class="fas fa-chevron-up"></i>
                                        <td><a href="#" class="btn_editar btn btn-success"><i class="fas fa-edit"></i>
                                        <td><a href="#" class="btn_borrar btn btn-danger"><i class="fas fa-trash"></i>
                                    </tr>
                                <?php
                                    }
                                ?>
                                </body>
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
                    <h4 class="modal-title text-danger" id="staticBackdropLabel"><i class="fas fa-trash-alt"></i> Borrar Empleado</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <h5 class="card-title">¿Seguro que desea borrar el Empleado?</h5>
                        <p class="card-text">
                            <span class="lbl_emp"></span> (<span class="lbl_codemp"></span>)
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <a href="#" class="btn_borrar btn btn-outline-danger">Borrar</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>