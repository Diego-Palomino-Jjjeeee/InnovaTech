<!DOCTYPE html>
<html lang="es">
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Información del Empleado";
        include("../includes/cabecera.php");
    ?>
    <body>
        <?php
            include("../includes/menu.php");
            include "../includes/cargar_clases.php";

            if(isset($_GET["codemp"])) {
                $codemp = $_GET["codemp"];

                $crudempleado = new CRUDEmpleado();

                $rs_emp = $crudempleado->MostrarEmpleado($codemp);

                if (empty($rs_emp)) {
                    header("location: listar_empleado.php");
                }
            } else {
                header ("location: listar_empleado.php");
            }
        ?>
        <div class="container mt-3">
            <header>
                <h1 class="text-info">
                    <i class="fas fa-info-circle"></i> Información del Empleado pe</h1>
                </h1>
            </header>

            <nav>
                <a href="listar_empleado.php" class="btn btn-outline-secondary btn-sm">
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
                                        <h5 class="card-title">DNI</h5>
                                        <p class="card-text"><?=$rs_emp->DNI?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Nombre</h5>
                                        <p class="card-text"><?=$rs_emp->Nombre?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Direccion</h5>
                                        <p class="card-text"><?=$rs_emp->Direccion?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Telefono</h5>
                                        <p class="card-text"><?=$rs_emp->Telefono?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Email</h5>
                                        <p class="card-text"><?=$rs_emp->Email?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Sueldo</h5>
                                        <p class="card-text"><?=$rs_emp->Sueldo?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Estado Civil</h5>
                                        <p class="card-text"><?=$rs_emp->Estado_civil?></p>
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