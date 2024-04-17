<?php
class CRUDCliente extends Conexion
{
    // Listar Clientes
    public function ListarClientes()
    {
        $arr_clientes = null;
        $cn = $this->Conectar();
        $sql = "SELECT * FROM tb_cliente";
        $snt = $cn->prepare($sql);
        $snt->execute();
        $arr_clientes = $snt->fetchAll(PDO::FETCH_OBJ);
        $cn = null;
        return $arr_clientes;
    }

    // Buscar Cliente por Código
    public function BuscarClientePorCodigo($codigo)
    {
        $cliente = null;
        $cn = $this->Conectar();
        $sql = "SELECT * FROM tb_cliente WHERE codigo_cliente = :codigo";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":codigo", $codigo, PDO::PARAM_STR);
        $snt->execute();
        $cliente = $snt->fetch(PDO::FETCH_OBJ);
        $cn = null;
        return $cliente;
    }

    // Registrar un nuevo cliente en la base de datos
    public function RegistrarCliente($codigo, $nombre, $ap_paterno, $ap_materno, $fecha_nacimiento, $direccion, $correo_electronico)
    {
        try {
            $cn = $this->Conectar();
            $sql = "INSERT INTO tb_cliente (codigo_cliente, nombre, ap_paterno, ap_materno, fecha_nacimiento, direccion, correo_electronico) 
                    VALUES (:codigo, :nombre, :ap_paterno, :ap_materno, :fecha_nacimiento, :direccion, :correo_electronico)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(":codigo", $codigo, PDO::PARAM_STR);
            $snt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $snt->bindParam(":ap_paterno", $ap_paterno, PDO::PARAM_STR);
            $snt->bindParam(":ap_materno", $ap_materno, PDO::PARAM_STR);
            $snt->bindParam(":fecha_nacimiento", $fecha_nacimiento, PDO::PARAM_STR);
            $snt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $snt->bindParam(":correo_electronico", $correo_electronico, PDO::PARAM_STR);
            $snt->execute();
            $cn = null;
            return true;
        } catch (PDOException $e) {
            echo "Error al registrar el cliente: " . $e->getMessage();
            return false;
        }
    }
}
?>
