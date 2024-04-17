<!DOCTYPE html>
<html lang="es">
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Información del Recurso";
        include("../includes/cabecera.php");
    ?>
    <body>
        <?php
            include("../includes/menu.php");
            include "../includes/cargar_clases.php";

            if(isset($_GET["codrec"])) {
                $codrec = $_GET["codrec"];

                $crudproducto = new CRUDRecursos();

                $rs_prod = $crudproducto->MostrarRecursoPorCodigo($codrec); 

                if (empty($rs_prod)) {
                    header("location: listar_recurso.php");
                }
            } else {
                header ("location: listar_recurso.php");
            }
        ?>
        <div class="container mt-3">
            <header>
                <h1 class="text-info">
                    <i class="fas fa-info-circle"></i> Información del Recurso</h1>
                </h1>
            </header>

            <nav>
                <a href="listar_recurso.php" class="btn btn-outline-secondary btn-sm">
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
                                        <h5 class="card-title">ID DEL RECURSO</h5>
                                        <p class="card-text"><?=$rs_prod->Id_recursos?></p>
                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="card-title">NOMBRE</h5>
                                        <p class="card-text"><?=$rs_prod->Nombre?></p>
                                    </div>
                                    <div class="col-md-5">
                                        <h5 class="card-title">CATEGORIA</h5>
                                        <p class="card-text"><?=$rs_prod->Categoria?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">ESTADO</h5>
                                        <p class="card-text"><?=$rs_prod->Estado?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">FECHA DE ADQUISICION</h5>
                                        <p class="card-text"><?=$rs_prod->Fecha_Adquisicion?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">COSTO</h5>
                                        <p class="card-text"><?=$rs_prod->Costo?></p>
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