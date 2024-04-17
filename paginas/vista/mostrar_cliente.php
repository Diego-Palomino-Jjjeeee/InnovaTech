<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Ventas - Información de Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Agrega cualquier otro estilo CSS que necesites -->
    <style>
        /* Agrega tus estilos personalizados aquí */
    </style>
</head>
<body>
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Información de Cliente";
        include("../includes/cabecera.php");
        include("../includes/menu.php");
        include "../includes/cargar_clases.php";

        // Verificar si se recibió el código del cliente por GET
        if(isset($_GET["codcliente"])){
            $codcliente = $_GET["codcliente"];
            $crudcliente = new CRUDCliente();
            $rs_cliente = $crudcliente->BuscarClientePorCodigo($codcliente);
            if(empty($rs_cliente)){
                // Si el cliente no existe, redirigir a la lista de clientes
                header("location: listar_cliente.php");
            }
        } else {
            // Si no se recibió el código del cliente, redirigir a la lista de clientes
            header("location: listar_cliente.php");
        }
    ?>

    <div class="container mt-3">
        <header>
            <h1 class="text-info"><i class="fas fa-info-circle"></i> Información de Cliente</h1>
            <hr/>
        </header>

        <nav>
            <a href="listar_cliente.php" class="btn btn-outline-secondary btn-sm">
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
                                    <h5 class="card-title">Código</h5>
                                    <p class="card-text"><?=$rs_cliente->codigo_cliente?></p>
                                </div>
                                <div class="col-md-8"></div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Nombre Completo</h5>
                                    <p class="card-text"><?=$rs_cliente->nombre?> <?=$rs_cliente->ap_paterno?> <?=$rs_cliente->ap_materno?></p>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="card-title">Fecha de Nacimiento</h5>
                                    <p class="card-text"><?=$rs_cliente->fecha_nacimiento?></p>
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Dirección</h5>
                                    <p class="card-text"><?=$rs_cliente->direccion?></p>
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Correo Electrónico</h5>
                                    <p class="card-text"><?=$rs_cliente->correo_electronico?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </div>

    <?php
        include("../includes/pie.php");
    ?>

    <!-- Scripts de Bootstrap y cualquier otro script que necesites -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
