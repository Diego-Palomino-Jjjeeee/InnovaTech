<?php
require_once "conexion.php";

class CRUDCliente extends Conexion
{
    // Listar Distritos
    public function ListarDistrito()
    {
        try {
            $cn = $this->Conectar();
            $sql = "SELECT * FROM tb_distrito";
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            // Manejar el error de manera adecuada, por ejemplo, registrándolo o lanzándolo nuevamente
            error_log("Error al listar los distritos: " . $ex->getMessage());
            throw $ex; // Relanzar la excepción para que sea manejada por el código que llama a esta función
        }
    }

    // Listar Clientes
    public function ListarCliente()
    {
        try {
            $cn = $this->Conectar();
            $sql = "CALL sp_ListarCliente()"; // Usar CALL para llamar a procedimientos almacenados
            $stmt = $cn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            error_log("Error al listar los clientes: " . $ex->getMessage());
            throw $ex;
        }
    }

    // Buscar cliente por código
    public function BuscarClientePorCodigo($codcli)
    {
        try {
            $cn = $this->Conectar();
            $sql = "CALL sp_BuscarClientePorCodigo(:codcli)";
            $stmt = $cn->prepare($sql);
            $stmt->bindParam(":codcli", $codcli, PDO::PARAM_STR, 5);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ); // Utilizar fetch en lugar de fetchAll ya que se espera un único resultado
        } catch (PDOException $ex) {
            error_log("Error al buscar el cliente por código: " . $ex->getMessage());
            throw $ex;
        }
    }

    // Mostrar cliente por código
    public function MostrarCliente($codcli)
    {
        try {
            $cn = $this->Conectar();
            $sql = "CALL sp_MostrarCliente(:codcli)";
            $stmt = $cn->prepare($sql);
            $stmt->bindParam(":codcli", $codcli, PDO::PARAM_STR, 5);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            error_log("Error al mostrar el cliente por código: " . $ex->getMessage());
            throw $ex;
        }
    }

    // Consultar cliente por código (JSON)
    public function ConsultarClientePorCodigo($codcli)
    {
        try {
            $cn = $this->Conectar();
            $sql = "CALL sp_ConsultarClientePorCodigo(:codcli)";
            $stmt = $cn->prepare($sql);
            $stmt->bindParam(":codcli", $codcli, PDO::PARAM_STR, 5);
            $stmt->execute();
            $cliente = $stmt->fetch(PDO::FETCH_OBJ);
            // Codificar el cliente como JSON
            return json_encode($cliente);
        } catch (PDOException $ex) {
            error_log("Error al consultar el cliente por código: " . $ex->getMessage());
            throw $ex;
        }
    }

    // Filtrar cliente
    public function FiltrarCliente($valor)
    {
        try {
            $cn = $this->Conectar();
            $sql = "CALL sp_FiltrarCliente(:valor)";
            $stmt = $cn->prepare($sql);
            $stmt->bindParam(":valor", $valor, PDO::PARAM_STR, 5);
            $stmt->execute();
            $arr_clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
            // Procesar los resultados y generar la tabla HTML
            // (No imprimas directamente, devuelve los datos para que se procesen en el lugar donde se llama a esta función)
            return $arr_clientes;
        } catch (PDOException $ex) {
            error_log("Error al filtrar los clientes: " . $ex->getMessage());
            throw $ex;
        }
    }

    // Registrar Cliente
    public function RegistrarCliente(Cliente $cliente)
    {
        try {
            $cn = $this->Conectar();
            $sql = "CALL sp_RegistrarCliente(:codcli, :nom, :ap_pat, :ap_mat, :fec_nac, :dir, :correo, :distrito)";
            $stmt = $cn->prepare($sql);

            $stmt->bindParam(":codcli", $cliente->codigo_cliente);
            $stmt->bindParam(":nom", $cliente->nombre);
            $stmt->bindParam(":ap_pat", $cliente->ap_paterno);
            $stmt->bindParam(":ap_mat", $cliente->ap_materno);
            $stmt->bindParam(":fec_nac", $cliente->fecha_nacimiento);
            $stmt->bindParam(":dir", $cliente->direccion);
            $stmt->bindParam(":correo", $cliente->correo_electronico);
            $stmt->bindParam(":distrito", $cliente->distrito_nombre);
            $stmt->execute();
        } catch (PDOException $ex) {
            error_log("Error al registrar el cliente: " . $ex->getMessage());
            throw $ex;
        }
    }

    // Editar Cliente
    public function EditarCliente(Cliente $cliente)
    {
        try {
            $cn = $this->Conectar();
            $sql = "CALL sp_EditarCliente(:codcli, :nom, :ap_pat, :ap_mat, :fec_nac, :dir, :correo, :distrito)";
            $stmt = $cn->prepare($sql);

            $stmt->bindParam(":codcli", $cliente->codigo_cliente);
            $stmt->bindParam(":nom", $cliente->nombre);
            $stmt->bindParam(":ap_pat", $cliente->ap_paterno);
            $stmt->bindParam(":ap_mat", $cliente->ap_materno);
            $stmt->bindParam(":fec_nac", $cliente->fecha_nacimiento);
            $stmt->bindParam(":dir", $cliente->direccion);
            $stmt->bindParam(":correo", $cliente->correo_electronico);
            $stmt->bindParam(":distrito", $cliente->distrito_nombre);
            $stmt->execute();
        } catch (PDOException $ex) {
            error_log("Error al editar el cliente: " . $ex->getMessage());
            throw $ex;
        }
    }

    // Borrar Cliente
    public function BorrarCliente($codcli)
    {
        try {
            $cn = $this->Conectar();
            $sql = "CALL sp_BorrarCliente(:codcli)";
            $stmt = $cn->prepare($sql);
            $stmt->bindParam(":codcli", $codcli);
            $stmt->execute();
        } catch (PDOException $ex) {
            error_log("Error al borrar el cliente: " . $ex->getMessage());
            throw $ex;
        }
    }
}
?>
