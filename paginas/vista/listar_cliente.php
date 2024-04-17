<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Ventas - Lista de Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Lista de Clientes";
        include("../includes/cabecera.php");
        include("../includes/menu.php");
        include "../includes/cargar_clases.php";

        // Obtener la lista de clientes
        $crudcliente = new CRUDCliente(); 
        $rs_cliente = $crudcliente->ListarClientes();
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-list-alt"></i> Lista de Clientes</h1>
        </header>

        <nav>
            <div class="btn-group col-md-5" role="group">
                <a href="registrar_cliente.php" class="btn btn-outline-primary">
                    <i class="fas fa-plus-circle"></i> Registrar
                </a>
                <a href="consultar_cliente.php" class="btn btn-outline-primary">
                    <i class="fas fa-search"></i> Consultar
                </a>
                <a href="filtrar_cliente.php" class="btn btn-outline-primary">
                    <i class="fas fa-filter"></i> Filtrar
                </a>
            </div>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-12">
                        <table class="table table-hover table-sm table-success table-striped">
                            <tr class="table-primary">
                                <th>Nº</th>
                                <th>Cod. Cliente</th>
                                <th>Nombre</th>
                                <th>Ap. Paterno</th>
                                <th>Ap. Materno</th>
                                <th>Fecha Nacimiento</th>
                                <th>Dirección</th>
                                <th>Correo Electrónico</th>
                                <th>Cod. Distrito</th>
                                <th class="acciones">Acciones</th>
                            </tr>
                            <?php
                                $i = 0;
                                foreach ($rs_cliente as $cliente) {
                                    $i++;
                            ?>
                            <tr class="reg_cliente">
                                <td><?=$i?></td>
                                <td class="codcliente"><?=$cliente->codigo_cliente?></td>
                                <td class="nombre"><?=$cliente->nombre?></td>
                                <td class="ap_paterno"><?=$cliente->ap_paterno?></td>
                                <td class="ap_materno"><?=$cliente->ap_materno?></td>
                                <td><?=$cliente->fecha_nacimiento?></td>
                                <td><?=$cliente->direccion?></td>
                                <td><?=$cliente->correo_electronico?></td>
                                <td><?=$cliente->cliente_codigo_distrito?></td>
                                <td>
                                    <a href="mostrar_cliente.php?codcliente=<?=$cliente->codigo_cliente?>" class="btn btn-info btn_mostrar" data-codcliente="<?=$cliente->codigo_cliente?>"><i class="fas fa-eye"></i> Mostrar</a>
                                    <a href="editar_cliente.php?codcliente=<?=$cliente->codigo_cliente?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                    <a href="#" class="btn btn-danger btn_borrar"><i class="fas fa-trash-alt"></i> Borrar</a>
                                </td>
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

    <!-- Scripts de Bootstrap y cualquier otro script que necesites -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
