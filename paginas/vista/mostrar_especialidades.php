<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicacion de ventas - Informacion del producto";
include("../includes/cabecera.php");
?>

<body>
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";


    if (isset($_GET["idesp"])) {
        $idesp = $_GET["idesp"];


        $crudespecialidades = new CRUDEspecialidad();


        $rs_esp = $crudespecialidades->MostrarEspecialidades($idesp);


        if (empty($rs_esp)) {
            header("location:listar_especialidades.php");
        }
    } else {
        header("location:listar_especialidades.php");
    }
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-info">
                <i class="fas fa-info-circle"></i>Informacion de Especialidad
            </h1>
            <hr />
        </header>


        <nav>
            <a href="listar_especialidades.php" class="btn brn-outline-secondary btn-sm">
                <i class="fas fa-arrow-circle-left"></i>Regresar
            </a>
        </nav>


        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="card col-md-6">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <h5 class="card-title">Id</h5>
                                    <p clas="card-text"><?= $rs_esp->Id_especialidad ?></p>
                                </div>
                                <div class="col-md-8"></div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Nombre</h5>
                                    <p class="card-text"><?= $rs_esp->Nombre ?></p>
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Area</h5>
                                    <p class="card-text"><?= $rs_esp->Area ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        </div>
        </section>
        

        <?php
        include("../includes/pie.php");
        ?>
    </div>
    <div class="modal fade" id="md_aviso" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
</body>

</html>