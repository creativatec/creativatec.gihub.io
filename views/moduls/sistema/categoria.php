<?php

if (isset($_GET['action'])) {
    if ($_GET['action'] == "agregarCategoria") {
        print '<script>
        swal("Hurra!!!", "Categoria agregada exitosamente", "success");
    </script>';
    }
    if ($_GET['action'] == "actualizarCategoria") {
        print '<script>
        swal("Hurra!!!", "Categoria actualizada exitosamente", "success");
    </script>';
    }
}
///Usuario
$user = new ControladorCategoria();
$user->agregarCategoria();
$res = $user->listarCategoria();
//activo
$activo = new ControladorActivo();
$resActivo = $activo->listarActivo();
if ($_SESSION['rol'] != "Administrador" && $_SESSION['rol'] != "Gerente") {
    echo '<script>window.location="inicio"</script>';
}
if (isset($_GET['id'])) {
    print "<script>$(document).ready(function() {
        $('#categoria').modal('toggle')
    });</script>";
    $listar = $user->listarCategoriaId();
}
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-terminal-plus" viewBox="0 0 16 16">
                    <path
                        d="M2 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v4a.5.5 0 0 1-1 0V4a1 1 0 0 0-1-1z" />
                    <path
                        d="M3.146 5.146a.5.5 0 0 1 .708 0L5.177 6.47a.75.75 0 0 1 0 1.06L3.854 8.854a.5.5 0 1 1-.708-.708L4.293 7 3.146 5.854a.5.5 0 0 1 0-.708M5.5 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5" />
                </svg>
            </button>
        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table id="usuario" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Categoria</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($res as $key => $value) {
                ?>
                    <tr>
                        <td>
                            <?php echo $value['id_categoria'] ?>
                        </td>
                        <td>
                            <?php echo $value['nombre_categoria'] ?>
                        </td>
                        <td>
                            <?php echo $value['nombre_activo'] ?>
                        </td>
                        <td><a href="index.php?action=categoria&id=<?php echo $value['id_categoria'] ?>"><i
                                    class="fas fa-print fa-lg"></i></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Categoria</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Categoria</label>
                            <input type="text" class="form-control" name="cate" id="inputEmail4"
                                placeholder="Proeevedor">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Activo</label>
                            <select id="" name="activo" class="form-control">
                                <option selected>Choose...</option>
                                <?php
                                foreach ($resActivo as $key => $value) {
                                ?>
                                    <option value="<?php echo $value['id_activo'] ?>">
                                        <?php echo $value['nombre_activo'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="agregarCategoria" class="btn btn-primary">Agregar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Editar Categoria-->
<div class="modal fade" id="categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Categoria</label>
                            <input type="text" class="form-control" value="<?php echo $listar[0]['nombre_categoria'] ?>"
                                name="cate" id="inputEmail4" placeholder="Categoria">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Activo</label>
                            <select id="" name="activo" class="form-control">
                                <option selected>Choose...</option>
                                <?php
                                foreach ($resActivo as $key => $value) {
                                ?>
                                    <option value="<?php echo $value['id_activo'] ?>" <?php if ($value['id_activo'] == $listar[0]['id_activo']) {
                                                                                            echo 'selected';
                                                                                        } ?>>
                                        <?php echo $value['nombre_activo'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="actualizarCategoria" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>