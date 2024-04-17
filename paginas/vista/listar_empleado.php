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

            //Instanciamos CRUDMarca
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
                    <a href="#" class="btn btn-outline-primary btn">
                        <i class="fas fa-search"></i> Consultar
                    </a>
                    <a href="#" class="btn btn-outline-primary btn">
                        <i class="fas fa-filter"></i> Filtrar
                    </a>
                </div>
            </nav>

            <section>
                <article>
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-6">
                            <table class="table table-hover table-sm table-success table-striped">
                                <tr class="table-primary">
                                    <th>N°</th>
                                    <th>DNI</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Sueldo</th>
                                    <th>Estado Civil</th>
                                    <th colspan="3">Acciones</th>
                                </tr>
                                <?php
                                    $i = 0;
                                    foreach ($rs_emp as $emp) {
                                        $i++;
                                ?>
                                <tr class="reg_empleado">
                                    <td><?=$i?></td>
                                    <td class="codemp"><?=$emp->DNI?></td>
                                    <td class="nom"><?=$emp->Nombre?></td>
                                    <td><?=$emp->Direccion?></td>
                                    <td><?=$emp->Telefono?></td>
                                    <td><?=$emp->Email?></td>
                                    <td><?=$emp->Sueldo?></td>
                                    <td><?=$emp->Estado_civil?></td>

                                    <td><a href="mostrar_empleado.php?codemp=<?=$emp->DNI?>" class="btn_mostrar btn btn-secondary fas fa-chevron-up"></a></td>
                                    <td><a href="editar_empleado.php?codemp=<?=$emp->Nombre?>" class="btn_editar btn btn-success fas fa-edit"></a></td>
                                    <td><a href="#" class="btn_borrar btn btn-danger fa fa-trash"></a></td>
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
        
    </body>
</html>