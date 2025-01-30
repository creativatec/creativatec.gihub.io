
<?php

class ControladorCarrito
{
    function agregarProductoCarrito()
    {
        if (isset($_GET['id'])) {
            $lis = new ModeloProducto();
            $res = $lis->listarProductoIdModelo($_GET['id']);
            if ($res[0]['precio_descuento'] > 0) {
                $precio = $res[0]['precio_descuento'];
            } else {
                $precio = $res[0]['precio'];
            }
            if (isset($_GET['cant'])) {
                $cant = $_GET['cant'];
            } else {
                $cant = 1;
            }
            $dato = array(
                'id' => $_GET['id'],
                'precio' => $precio,
                'cant' => $cant,
                'token' => $_SESSION['random'],
                'id_cliente' => 0
            );
            $agregar = new ModeloCarrito();
            $res = $agregar->agregarProductoCarritoModelo($dato);
            if ($res == true) {
                echo "<script type='text/javascript'>window.location.href = 'cart';</script>";
            }
        }

        $lis =  new ModeloCarrito();
        $res = $lis->listarProductoCarrito();
        return $res;
    }

    function totalCarrito()
    {
        $con =  new ModeloCarrito();
        $res = $con->totalCarrito();
        return $res;
    }

    function actualizarCantCarritoProducto($id, $cant)
    {
        $actu = new ModeloCarrito();
        $res = $actu->actualizarCantCarritoProductoModelo($id, $cant);
        return $res;
    }

    function actualizarPagoCarrito()
    {
        $cart = new ModeloCarrito();
        $res = $cart->actualizarPagoCarrito();
    }
}

