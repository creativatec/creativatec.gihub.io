<?php

header('Content-Type: application/json');
require_once '../models/conexion.php';
$conn = new Conexion();
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'leer';
switch ($accion) {
    case 'agregar':
        $stmt = $conn->conectar()->prepare("INSERT INTO eventos(title, descripcion, color, textColor,start,end)
        VALUES (:title,:descripcion,:color,:textColor,:start,:end)");
        $respuesta = $stmt->execute(array(
            'title' => $_POST['title'],
            'descripcion' => $_POST['descripcion'],
            'color' => $_POST['color'],
            'textColor' => $_POST['textColor'],
            'start' => $_POST['start'],
            'end' => $_POST['end']
        ));
        echo json_encode($respuesta);
        break;
    case 'eliminar':
        $respuesta=false;
        if (isset($_POST['id'])) {
            $stmt = $conn->conectar()->prepare("DELETE FROM eventos WHERE id=:id");
            $respuesta=$stmt->execute(array(
                'id' => $_POST['id']
            ));
            echo json_encode($respuesta);
        }
        break;
    case 'modificar':
        $stmt = $conn->conectar()->prepare("UPDATE eventos SET title=:title, descripcion=:descripcion,color=:color,textColor=:textColor,start=:start,end=:end WHERE id =:id");
        $respuesta = $stmt->execute(array(
            'id' => $_POST['id'],
            'title' => $_POST['title'],
            'descripcion' => $_POST['descripcion'],
            'color' => $_POST['color'],
            'textColor' => $_POST['textColor'],
            'start' => $_POST['start'],
            'end' => $_POST['end']
        ));
        echo json_encode($respuesta);
        break;
    default:

        $stmt = $conn->conectar()->prepare("SELECT * FROM eventos");
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($res);
        break;
}
