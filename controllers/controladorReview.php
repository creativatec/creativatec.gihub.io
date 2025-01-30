
<?php

class ControladorReview
{
    function agregarReview()
    {
        if (isset($_POST['agregarReview'])) {
            $dato = array(
                'id' => $_GET['id'],
                'opinion' => $_POST['message'],
                'nombre' => $_POST['name'],
                'correo' => $_POST['email']
            );
            $agregar = new ModeloReview();
            $res = $agregar->agregarReviewsModelo($dato);
            if ($res == true) {
                echo "<script type='text/javascript'>window.location.href = 'index.php?action=detail&id=" + $_GET['id'] + "';</script>";
            }
        }
        $listar = new ModeloReview();
        $res = $listar->listarReviews();
        return $res;
    }

    function listarReviewsId()
    {
        $listar = new ModeloReview();
        $res = $listar->listarReviewsId($_GET['id']);
        return $res;
    }
}

