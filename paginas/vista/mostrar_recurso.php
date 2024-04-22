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

            if (isset($_GET["id_recurso"])) { 
                $id_recurso = $_GET["id_recurso"];

                $crudrecurso = new CRUDRecurso();

                $rs_recurso = $crudrecurso->MostrarRecursoPorId($id_recurso);

                if (empty($rs_recurso)) {
                    header("location: listar_recurso.php");
                }
                
            } else {
                header("location: listar_recurso.php");
            }
        ?>
        <div class="container mt-3">
            <header>
                <h1 class="text-info">
                    <i class="fa fa-info-circle"></i> Información del Recurso</h1> 
                <hr/>
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
                                        <h5 class="card-title">ID Recurso</h5>
                                        <p class="card-text"><?=$rs_recurso->Id_recursos?></p> 
                                    </div>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-8">
                                        <h5 class="card-title">Nombre</h5>
                                        <p class="card-text"><?=$rs_recurso->Nombre?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Categoría</h5>
                                        <p class="card-text"><?=$rs_recurso->Categoria?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Estado</h5>
                                        <p class="card-text"><?=$rs_recurso->Estado?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Fecha Adquisición</h5>
                                        <p class="card-text"><?=$rs_recurso->Fecha_Adquisicion?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Costo</h5>
                                        <p class="card-text"><?=$rs_recurso->Costo?></p>
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
