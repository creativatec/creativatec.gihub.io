<?php

class ControladorLocal
{
    function agregarLocal()
    {
        if (isset($_POST['agregarLocal'])) {
            $dato = array(
                'local' => $_POST['local'],
                'nit' => $_POST['nit'],
                'dire' => $_POST['dire'],
                'tel' => $_POST['tel'],
                'inicio' => $_POST['inicio'],
                'fin' => $_POST['fin'],
                'plazo' => $_POST['diasHabiles'],
                'sistema' => $_POST['sistema'],
                'estable' => $_POST['estable'],
                'cuota' => $_POST['cuota'],
                'valor' => $_POST['valor']
            );
            var_dump($dato);
            $agregar = new ModeloLocal();
            $res = $agregar->agregarLocalModelo($dato);
            $resIDLocal = $agregar->obtenerUltimoID();
            $datos = array(
                'priNombre' => 'NNNN',
                'segNombre' => '',
                'priApellido' => 'NNNN',
                'segApellido' => '',
                'cc' => '111111',
                'email' => 'feliperenjifoz@gmail.com',
                'local' => $resIDLocal[0]['MAX(id_local)']
            );
            $cliente = new ModeloCliente();
            $resClient = $cliente->agregarClienteModelo($datos);
            if ($resClient == true) {
                echo '<script>window.location="agregarLocal"</script>';
            }
        } elseif (isset($_POST['actualizarLocalAdmin'])) {
            $dato = array(
                'id' => $_POST['id'],
                'local' => $_POST['localEdit'],
                'nit' => $_POST['nitEdit'],
                'dire' => $_POST['direEdit'],
                'tel' => $_POST['telEdit'],
                'inicio' => (isset($_POST['inicio'])) ? $_POST['inicio'] : null,
                'fin' => (isset($_POST['fin'])) ? $_POST['fin'] : null,
                'plazo' => (isset($_POST['diasHabiles'])) ? $_POST['diasHabiles'] : null,
                'sistema' => (isset($_POST['sistema'])) ? $_POST['sistema'] : null,
                'estable' => (isset($_POST['estable'])) ? $_POST['estable'] : null,
                'cuota' => $_POST['cuotaEdit'],
                'valor' => $_POST['valorEdit']
            );
            $agregar = new ModeloLocal();
            $res = $agregar->actualizarLocalAdminModelo($dato);
            if ($res == true) {
                echo '<script>window.location="actualizarLocal"</script>';
            }
        } elseif (isset($_POST['actualizarLocal'])) {
            $dato = array(
                'id' => $_POST['id'],
                'local' => $_POST['localEdit'],
                'nit' => $_POST['nitEdit'],
                'dire' => $_POST['direEdit'],
                'tel' => $_POST['telEdit'],
                'ip' => $_POST['ip']
            );
            $agregar = new ModeloLocal();
            $res = $agregar->actualizarLocalModelo($dato);
            if ($res == true) {
                echo '<script>window.location="actualizarLocal"</script>';
            }
        }
    }

    function listarLocal()
    {
        $listar = new ModeloLocal();
        $res = $listar->listarModeloModelo();
        return $res;
    }

    function consultarLocal($id)
    {
        $consultar = new ModeloLocal();
        $res = $consultar->consultarLocalModelo($id);
        return $res;
    }

    function consultarLocalAjaxControlador($dato)
    {
        $consultar = new ModeloLocal();
        $res = $consultar->consultarModeloAjaxModelo($dato);
        return $res;
    }

    function eliminarLocalId()
    {
        $id = $_GET['id'];
        $listar = new ModeloLocal();
        $res = $listar->eliminarLocalIdModelo($id);
        if ($res == true) {
            echo '<script>window.location="eliminarLocal"</script>';
        }
    }

    function listarSistema()
    {
        $listar = new ModeloLocal();
        $res = $listar->listarSistemaModelo();
        return $res;
    }

    function listarEstablecimiento()
    {
        $listar = new ModeloLocal();
        $res = $listar->listarEstablecimientoModelo();
        return $res;
    }

    function actualizarCuotaSistermaLocal($total)
    {
        $listar = new ModeloLocal();
        $res = $listar->actualizarCuotaSistermaLocalModelo($total);
        return $res;
    }
}
