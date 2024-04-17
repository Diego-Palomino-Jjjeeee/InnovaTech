<!DOCTYPE html>
<html lang="es">
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Información del Servicio";
        include("../includes/cabecera.php");
    ?>
    <body>
        <?php
            include("../includes/menu.php");
            include "../includes/cargar_clases.php";

            if(isset($_GET["codser"])) {
                $codser = $_GET["codser"];

                $crudservicio = new CRUDServicios();

                $rs_prod = $crudservicio->MostrarServiciosPorCodigo($codser);

                if (empty($rs_prod)) {
                    header("location: listar_servicio.php");
                }
            } else {
                header ("location: listar_servicio.php");
            }
        ?>
        <div class="container mt-3">
            <header>
                <h1 class="text-info">
                    <i class="fas fa-info-circle"></i> Información del Servicio</h1>
                </h1>
            </header>

            <nav>
                <a href="listar_servicio.php" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-circle-left"></i> Regresar
                </a>
            </nav>

            <section>
                <article>
                    <div class="row justify-content-center mt-3">
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <h5 class="card-title">ID DEL Servicio</h5>
                                        <p class="card-text"><?=$rs_prod->Id_servicios?></p>
                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="card-title">NOMBRE</h5>
                                        <p class="card-text"><?=$rs_prod->Nombre?></p>
                                    </div>
                                    <div class="col-md-5">
                                        <h5 class="card-title">Precio</h5>
                                        <p class="card-text"><?=$rs_prod->Precio?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Duracion</h5>
                                        <p class="card-text"><?=$rs_prod->Duracion?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title"></h5>
                                        <p class="card-text"><?=$rs_prod->Categoria?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">COSTO</h5>
                                        <p class="card-text">S/.<?=$rs_prod->Estado?></p>
                                    </div>
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