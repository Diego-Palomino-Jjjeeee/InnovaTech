<!DOCTYPE html>
<html lang="es">
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Innovatech - Lista de Recursos";
        include("../includes/cabecera.php");
    ?>
    <body>
        <?php
            include("../includes/menu.php");
            include "../includes/cargar_clases.php";

            $crudservicio = new CRUDServicios();
            $rs_prod = $crudservicio->ListarServicios();
        ?>

        <div class="container mt-3">
            <header>
                <h1>
                    <i class="fas fa-list-alt"></i> Lista de Servicios
                </h1>
                <hr/>
            </header>

            <nav>
                <div class="btn-group col-md-5" role="group">
                    <a href="registrar_servicio.php" class="btn btn-outline-primary btn">
                        <i class="fas fa-plus-circle"></i> Registrar
                    </a>
                    <a href="consultar_servicio.php" class="btn btn-outline-primary btn">
                        <i class="fas fa-search"></i> Consultar
                    </a>
                    <a href="filtrar_servicio.php" class="btn btn-outline-primary btn">
                        <i class="fas fa-filter"></i> Filtrar
                    </a>
                    <a href="formulario.php" class="btn btn-outline-primary btn">
                        <i class="fas fa-filter"></i> Enviar Correo
                    </a>
                </div>
            </nav>

            <section>
                <article>
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-8">
                            <table class="table table-hover table-sm table-success tab">
                                <tr class ="table-primary">
                                  
                                    <th>Id_servicios</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Duracion</th>
                                    <th>Categoria</th>
                                    <th>Estado</th>
                                    <th colspan="3">Acciones</th>
                                </tr>
                                <?php
                                    $i = 0;
                                    foreach ($rs_prod as $prod) {
                                        $i++;
                                ?>
                                <tr class="reg_servicio">
                                   
                                    <td class="codser"><?=$prod->Id_servicios?></td>
                                    <td class="prod"><?=$prod->Nombre?></td>
                                    <td><?=$prod->Precio?></td>
                                    <td><?=$prod->Duracion?></td>
                                    <td><?=$prod->Categoria?></td>
                                    <td><?=$prod->Estado?></td>
                                    <td><a href="#" class="btn_mostrar btn btn-secondary fas fa-chevron-up"></a></td>
                                    <td><a href="#" class="btn_editar btn btn-success fas fa-edit"></a></td>
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

        <!--Model-->
        <div class="modal fade" id="md_borrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-danger" id="staticBackdropLabel"><i class="fas
                        fa-trash-alt"></i> Borrar Producto</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <h5 class="card-title">¿Seguro que desea borrar el Registro? </h5>
                            <p class="card-text">
                                <span class="lbl_prod"></span> (<pan class="lbl_codser"></pan>)
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar 
                        </button>

                        <a href="#" class="btn_borrar btn btn-outline-danger">Borrar</a>
                    </div>
                </div>
            </div>                
        </div>
    </body>
</html>

