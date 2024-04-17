<!DOCTYPE html>
<html lang="es">
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Registrar Cliente";
        include("../includes/cabecera.php");
    ?>
    <body>
        <?php
            include("../includes/menu.php");
            include "../includes/cargar_clases.php";
            $cruddistrito = new CRUDDistrito(); 

            // Obtener la lista de distritos
            $rs_distritos = $cruddistrito->ListarDistritos();
        ?>
        <div class="container mt-3">
            <header>
                <h1 class="text-primary">
                    <i class="fas fa-plus-circle"></i>Registrar Cliente</h1>
                <hr/>
            </header>

            <nav>
                <a href="listar_cliente.php" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-circle-left"></i> Regresar
                </a>
            </nav>

            <section>
                <article>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <form id="frm_registrar_cliente" name="frm_registrar_cliente" method="post" action="../controlador/ctr_grabar_cliente.php" autocomplete="off">
                                        <input type="hidden" id="txt_tipo" name="txt_tipo" value="r" />

                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label for="txt_codcliente" class="form-label">Código</label>
                                                <input type="text" class="form-control" id="txt_codcliente" name="txt_codcliente" placeholder="Código" maxlength="5" autofocus />
                                            </div>

                                            <div class="col-md-8">
                                                <label for="txt_nom" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="txt_nom" name="txt_nom" placeholder="Nombre del cliente" maxlength="20" autofocus />
                                            </div>

                                            <div class="col-md-4">
                                                <label for="txt_apaterno" class="form-label">Apellido Paterno</label>
                                                <input type="text" class="form-control" id="txt_apaterno" name="txt_apaterno" placeholder="Apellido Paterno" maxlength="20" autofocus />
                                            </div>

                                            <div class="col-md-4">
                                                <label for="txt_amaterno" class="form-label">Apellido Materno</label>
                                                <input type="text" class="form-control" id="txt_amaterno" name="txt_amaterno" placeholder="Apellido Materno" maxlength="20" autofocus />
                                            </div>

                                            <div class="col-md-4">
                                                <label for="txt_fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" id="txt_fecha_nacimiento" name="txt_fecha_nacimiento" autofocus />
                                            </div>

                                            <div class="col-md-6">
                                                <label for="txt_direccion" class="form-label">Dirección</label>
                                                <input type="text" class="form-control" id="txt_direccion" name="txt_direccion" placeholder="Dirección" maxlength="50" autofocus />
                                            </div>

                                            <div class="col-md-6">
                                                <label for="txt_correo" class="form-label">Correo Electrónico</label>
                                                <input type="email" class="form-control" id="txt_correo" name="txt_correo" placeholder="Correo Electrónico" maxlength="50" autofocus />
                                            </div>

                                            <div class="col-md-12">
                                                <label for="cbo_distrito" class="form-label">Distrito</label>
                                                <select class="form-select form-select-lg mb-3" id="cbo_distrito" name="cbo_distrito">
                                                    <option value="" selected>[Seleccione distrito]</option>
                                                <?php
                                                    // Iterar sobre los distritos para mostrarlos en el select
                                                    foreach($rs_distritos as $distrito){
                                                ?>
                                                    <option value="<?=$distrito->codigo_distrito?>"><?=$distrito->distrito?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_cliente" name="btn_registrar_cliente">
                                                <i class="fas fa-save"></i> Grabar Información
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
