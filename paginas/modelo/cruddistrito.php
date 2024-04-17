<?php
class CRUDDistrito extends Conexion
{
    public function ListarDistritos()
    {
        $arr_distritos = null;
        try {
            $cn = $this->Conectar();
            $sql = "CALL sp_ListarDistrito()";
            $snt = $cn->prepare($sql);
            $snt->execute();
            $arr_distritos = $snt->fetchAll(PDO::FETCH_OBJ);
            $cn = null;
        } catch (PDOException $e) {
            // Manejar el error como desees
            throw new Exception("Error al listar los distritos: " . $e->getMessage());
        }
        return $arr_distritos;
    }

    public function BuscarDistritoPorCodigo($codigo_distrito)
    {
        $distrito = null;
        $cn = $this->Conectar();
        $sql = "CALL sp_BuscarDistritoPorCodigo(:codigo_distrito)";
        $snt = $cn->prepare($sql);
        $snt->bindParam(':codigo_distrito', $codigo_distrito, PDO::PARAM_STR);
        $snt->execute();
        $distrito = $snt->fetch(PDO::FETCH_OBJ);
        $cn = null;
        return $distrito;
    }

    public function RegistrarDistrito($distrito)
    {
        try {
            $cn = $this->Conectar();
            $sql = "INSERT INTO tb_distrito (codigo_distrito, nombre_distrito) VALUES (:codigo_distrito, :nombre_distrito)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(':codigo_distrito', $distrito->codigo_distrito, PDO::PARAM_STR);
            $snt->bindParam(':nombre_distrito', $distrito->nombre_distrito, PDO::PARAM_STR);
            $snt->execute();
            $cn = null;
            return true; // El distrito se registró correctamente
        } catch (PDOException $e) {
            // En caso de error, puedes manejarlo como desees, por ejemplo, lanzando una excepción
            throw new Exception("Error al registrar el distrito: " . $e->getMessage());
        }
    }
    
    public function ActualizarDistrito($distrito)
    {
        try {
            $cn = $this->Conectar();
            $sql = "UPDATE tb_distrito SET nombre_distrito = :nombre_distrito WHERE codigo_distrito = :codigo_distrito";
            $snt = $cn->prepare($sql);
            $snt->bindParam(':nombre_distrito', $distrito->nombre_distrito, PDO::PARAM_STR);
            $snt->bindParam(':codigo_distrito', $distrito->codigo_distrito, PDO::PARAM_STR);
            $snt->execute();
            $cn = null;
            return true; // El distrito se actualizó correctamente
        } catch (PDOException $e) {
            throw new Exception("Error al actualizar el distrito: " . $e->getMessage());
        }
    }
}
?>
