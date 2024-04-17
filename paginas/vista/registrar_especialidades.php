<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Registrar Especialidad";
include("../includes/cabecera.php");
?>

<body>
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";

    $crudespecialidad = new CRUDEspecialidad();

    $rs_esp = $crudespecialidad->ListarEspecialidades();
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-primary"><i class="fas fa-plus-circle"></i> Registrar Especialidad</h1>
            </hr>
        </header>

        <nav>
            <a href="listar_especialidades.php" class="btn btn-outline-primary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Inicio del formulario -->
                                <form id="frm_registrar_espec" name="frm_registrar_espec" method="post" action="../controlador/ctr_grabar_espec.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="r" />

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="txt_cod_espec" class="form-label">ID</label>
                                            <input type="text" class="form-control" id="txt_cod_espec" name="txt_cod_espec" placeholder="Código" maxlength="5" autofocus />
                                        </div>

                                        <div class="col-md-8">
                                            <label for="txt_nom_espec" class="form-label">Especialidad</label>
                                            <input type="text" class="form-control" id="txt_nom_espec" name="txt_nom_espec" placeholder="Nombre de especialidad" maxlength="40" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_area" class="form-label">Area</label>
                                            <input type="text" class="form-control" id="txt_area" name="txt_area" placeholder="Area" maxlength="40" />
                                        </div>

                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-outline-primary" id="btn_registrar_espec" name="btn_registrar_espec">
                                            <i class="fas fa-save"></i> Registrar Informacion
                                        </button>
                                    </div>
                            </div>
                            </form>
                            <!--Fin del formulario-->
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