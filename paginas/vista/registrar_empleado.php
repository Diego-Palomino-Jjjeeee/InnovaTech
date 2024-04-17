<!DOCTYPE html>
<html lang="es">
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Registrar Empleado";
        include("../includes/cabecera.php");
    ?>
    <body>
        <?php
            include("../includes/menu.php");
            include "../includes/cargar_clases.php";
        ?>
        <div class="container mt-3">
            <header>
                <h1 class="text-primary">
                    <i class="fas fa-plus-circle"></i>Registrar Empleado</h1>
                <hr/>
            </header>

            <nav>
                <a href="listar_empleado.php" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-circle-left"></i> Regresar
                </a>

            </nav>

            <section>
                <article>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <form id="frm_registrar_emp" name= "frm_registrar_emp" method = "post" action="../controlador/ctr_grabar_emp.php" autocomplete="off">
                                        <input type="hidden" id= "txt_tipo" name ="txt_tipo" value= "r" />

                                        <div class="row g-3">
                                            <div class="col-md-5">
                                                <label for="txt_dni" class="form-label">DNI</label>
                                                <input type="text" class="form-control" id="txt_dni" name="txt_dni"
                                                placeholder="DNI" maxlength="8" autofocus />
                                            </div>
                                            <div class="col-md-7">
                                                <label for="txt_nom" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="txt_nom" name="txt_nom"
                                                placeholder="Nombre del Empleado" maxlength="40" autofocus />
                                            </div>
                                            <div class="col-md-5">
                                                <label for="txt_dir" class="form-label">Dirección</label>
                                                <input type="text" class="form-control" id="txt_dir" name="txt_dir"
                                                placeholder="Dirección" maxlength="40" autofocus />
                                            </div>
                                            <div class="col-md-5">
                                                <label for="txt_tel" class="form-label">Teléfono</label>
                                                <input type="text" class="form-control" id="txt_tel" name="txt_tel"
                                                placeholder="Telefono" maxlength="12" autofocus />
                                            </div>
                                            <div class="col-md-5">
                                                <label for="txt_ema" class="form-label">Email</label>
                                                <input type="text" class="form-control" id="txt_ema" name="txt_ema"
                                                placeholder="Email" maxlength="50" autofocus />
                                            </div>
                                            <div class="col-md-5">
                                                <label for="txt_sue" class="form-label">Sueldo</label>
                                                <input type="text" class="form-control" id="txt_sue" name="txt_sue"
                                                placeholder="Sueldo" maxlength="99999" autofocus />
                                            </div>
                                            <div class="col-md-5">
                                                <label for="txt_est" class="form-label">Estado Civil</label>
                                                <input type="text" class="form-control" id="txt_est" name="txt_est"
                                                placeholder="Estado Civil" maxlength="14" autofocus />
                                            </div>


                                        </div>
                                        
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_emp" 
                                            name="btn_registrar_emp">
                                                <i class="fas fa-save"></i> Grabar Informacion
                                            </button>
                                        </div>
                                    </form>
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