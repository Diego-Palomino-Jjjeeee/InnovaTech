<?php
class CRUDEspecialidad extends Conexion
{
    // Listar Producto
    public function ListarEspecialidades()
    {
        $arr_esp = null;
        $cn = $this->Conectar();
        $sql = "call sp_ListarEspecialidades()";
        $snt = $cn->prepare($sql);
        $snt->execute();
        $arr_esp = $snt->fetchAll(PDO::FETCH_OBJ);
        $cn = null;
        return $arr_esp;
    }

    //Mostrar especialidad
    public function ConsultarEspecialidades($idespe)
    {

        $arr_esp = null;
        $cn = $this->Conectar();
        $sql = "call sp_MostrarEspecialidades(:idespe)";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":idespe", $idespe, PDO::PARAM_STR, 5);
        $snt->execute();
        $nr = $snt->rowCount();
        if ($nr > 0) {
            $arr_esp = $snt->fetch(PDO::FETCH_OBJ);
        }
        $cn = null;
        echo json_encode($arr_esp);
    }

    //Mostrar especialidad
    public function MostrarEspecialidades($idespe)
    {

        $arr_esp = null;
        $cn = $this->Conectar();
        $sql = "call sp_MostrarEspecialidades(:idespe)";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":idespe", $idespe, PDO::PARAM_STR, 5);
        $snt->execute();
        $nr = $snt->rowCount();
        if ($nr > 0) {
            $arr_esp = $snt->fetch(PDO::FETCH_OBJ);
        }
        $cn = null;
        return $arr_esp;
    }
    // Registrar Especialidad
    public function RegistrarEspecialidad(Especialidad $especialidades)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call sp_RegistrarEspecialidad(:p_Id_especialidad, :p_Nombre, :p_Area)";
            $snt = $cn->prepare($sql);

            $snt->bindParam(":p_Id_especialidad", $especialidades->Id_especialidad);
            $snt->bindParam(":p_Nombre", $especialidades->Nombre);
            $snt->bindParam(":p_Area", $especialidades->Area);

            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
}
