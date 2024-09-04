<?php

class ControladorIngredienteProducto
{
    function agregarIngredienteProducto()
    {
        if (isset($_POST['agregarIngredienteProducto'])) {
            $id_producto = $_POST['id_producto'];
            $id_ingre = $_POST['id_ingre'];
            $cantidad = $_POST['cantidad'];
            for ($i = 0; $i < count($cantidad); $i++) {
                $agregar = new ModeloIngredienteProducto();
                $res = $agregar->agregarIngredienteProductoModelo($id_producto, $id_ingre[$i], $cantidad[$i]);
                if ($res == true) {
                    echo '<script>window.location="agregarIngredienteProducto"</script>';
                }
            }
        } elseif (isset($_POST['actualiarIngredienteProducto'])) {
            $id = $_POST['id'];
            $id_producto = $_POST['id_producto'];
            $id_ingre = $_POST['id_ingreEdit'];
            $cantidad = $_POST['cantidadEdit'];
            for ($i = 0; $i < count($cantidad); $i++) {
                $agregar = new ModeloIngredienteProducto();
                $res = $agregar->actualizarIngredienteProductoModelo($id[$i], $id_producto, $id_ingre[$i], $cantidad[$i]);
                if ($res == true) {
                    echo '<script>window.location="agregarIngredienteProducto"</script>';
                }
            }
        }
    }

    function listarIngredinteProductoId()
    {
        $listar = new ModeloIngredienteProducto();
        $res = $listar->listarIngredinteProductoIdModelo();
        return $res;
    }

    function listarIngredinteProducto($id)
    {
        $listar = new ModeloIngredienteProducto();
        $res = $listar->listarIngredinteProductoModelo($id);
        return $res;
    }

    function listarIngredienteId($id)
    {
        $consultar = new ModeloIngredienteProducto();
        $res = $consultar->listarIngredienteId($id);
        return $res;
    }

    function consultarIngredeinteAjaxControlador($dato)
    {
        //$consultar = new ModeloIngredienteProducto();
        //$res = $consultar->consultarIngredeinteAjaxModelo($dato);
        //if ($res[0]['id_producto'] == null) {
        $consultarPro = new ControladorProducto();
        $res = $consultarPro->consultarProductoAjaxControlador($dato);
        return $res;
        //}
        //return $res;
    }

    function listarIngredienteProductoFactura($id)
    {
        $consultar = new ModeloIngredienteProducto();
        $res = $consultar->listarIngredienteProductoFacturaModelo($id);
        return $res;
    }

    function eliminaIngrediente_productoId()
    {
        $id = $_GET['ids'];
        $listar = new ModeloIngredienteProducto();
        $res = $listar->eliminaIngrediente_productoIdModelo($id);
        if ($res == true) {
            echo '<script>window.location="eliminarProducto_ingrediente"</script>';
        }
    }
}
