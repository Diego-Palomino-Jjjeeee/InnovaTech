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

    public function EditarEspecialidad(Especialidad $especialidades, $idespe)
    {
        try {
            $cn = $this->Conectar();
            $sql = "CALL sp_EditarEspecialidad(:p_Id_especialidad, :p_Nombre, :p_Area)";
            $snt = $cn->prepare($sql);

            $snt->bindParam(":p_Id_especialidad", $idespe);
            $snt->bindParam(":p_Nombre", $especialidades->Nombre);
            $snt->bindParam(":p_Area", $especialidades->Area);

            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
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

    public function BorrarEspecialidad($idespe)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call sp_BorrarEspecialidad(:p_Id_especialidad)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(":p_Id_especialidad", $idespe);

            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    //Filtrar producto
    public function FiltrarEspecialidad($valor)
    {
        $arr_espec = null;
        $cn = $this->Conectar();
        $sql = "call sp_FiltrarEspecialidades(:valor)";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":valor", $valor, PDO::PARAM_STR, 5);
        $snt->execute();
        $arr_espec = $snt->fetchAll(PDO::FETCH_OBJ);
        $nr = $snt->rowCount();
        if ($nr > 0) {
            echo "<table class='table table-hover table-sm table-success table-striped'>";
            echo "<tr class='table-primary'>";
            echo "<th>No</th>";
            echo "<th>Código</th>";
            echo "<th>Nombre</th>";
            echo "<th>Area</th>";
            echo "</tr>";

            $i = 0;

            foreach ($arr_espec as $espec) {
                $i++;
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>$espec->Id_especialidad</td>";
                echo "<td>$espec->Nombre</td>";
                echo "<td>$espec->Area</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
            echo "No existen registros";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
            echo "</div>";
        }
        $cn = null;
    }
}
