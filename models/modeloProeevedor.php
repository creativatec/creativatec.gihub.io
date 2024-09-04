<?php
require_once 'conexion.php';
class ModeloProeevedor
{
    public $tabla = "proeevedor";
    function agregarProeevedorModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (nit_proeevedor, nombre_proeevedor, telefono_proeevedor, direccion_proeevedor, id_local) VALUES (?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['nit'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['proe'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['tel'], PDO::PARAM_INT);
            $stms->bindParam(4, $dato['dire'], PDO::PARAM_STR);
            $stms->bindParam(5, $_SESSION['id_local'], PDO::PARAM_INT);
        }
        try {
            if ($stms->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function listarProeevedorModelo()
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN local ON local.id_local = proeevedor.id_local WHERE proeevedor.id_local = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        $stms->bindParam(1, $_SESSION['id_local'], PDO::PARAM_INT);
        try {
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function consultarProeevedorAjaxModelo($dato)
    {
        if ($dato != '') {
            $dato = '%' . $dato . '%';
            $sql = "SELECT * FROM $this->tabla WHERE nit_proeevedor like ? OR nombre_proeevedor like ? AND id_local = ? ORDER BY id_proeevedor ";
        } else {
            $sql = "SELECT * FROM $this->tabla ORDER BY id_proeevedor";
        }

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != '') {
                $stms->bindParam(1, $dato, PDO::PARAM_STR);
                $stms->bindParam(2, $dato, PDO::PARAM_STR);
                $stms->bindParam(3, $_SESSION['id_local'], PDO::PARAM_INT);
            }
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return [];
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function consultarProeevedorModelo($id)
    {
        if ($_SESSION['rol'] == "Administrador") {
            $sql = "SELECT * FROM $this->tabla WHERE id_proeevedor = ? AND id_local =? " ;
        } else {
            $sql = "SELECT * FROM $this->tabla WHERE id_proeevedor = ? AND id_local = ?";
        }
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($_SESSION['rol'] == "Administrador") {
            $stms->bindParam(1, $id, PDO::PARAM_INT);
            $stms->bindParam(2, $_SESSION['id_local'], PDO::PARAM_INT);
        } else {
            $stms->bindParam(1, $id, PDO::PARAM_INT);
            $stms->bindParam(2, $_SESSION['id_local'], PDO::PARAM_INT);
        }
        try {
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function actualizarProeevedorModelo($dato)
    {
        $sql = "UPDATE $this->tabla SET nit_proeevedor=?,nombre_proeevedor=?,telefono_proeevedor=?,direccion_proeevedor=?,id_local=? WHERE id_proeevedor=? AND id_local = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['nit'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['proe'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['tel'], PDO::PARAM_INT);
            $stms->bindParam(4, $dato['dire'], PDO::PARAM_STR);
            $stms->bindParam(5, $_SESSION['id_local'], PDO::PARAM_INT);
            $stms->bindParam(6, $dato['id'], PDO::PARAM_INT);
            $stms->bindParam(7, $_SESSION['id_local'], PDO::PARAM_INT);
        }
        try {
            if ($stms->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function eliminarProeevedorIdModelo($id)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=1";

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($stms->execute()) {
                $sql = "DELETE FROM $this->tabla WHERE id_proeevedor = ? AND id_local = ?";

                try {
                    $conn = new Conexion();
                    $stms = $conn->conectar()->prepare($sql);
                    $stms->bindParam(1, $id, PDO::PARAM_INT);
                    $stms->bindParam(2, $_SESSION['id_local'], PDO::PARAM_INT);
                    if ($stms->execute()) {
                        return true;
                    } else {
                        return false;
                    }
                } catch (PDOException $e) {
                    print_r($e->getMessage());
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }
}
