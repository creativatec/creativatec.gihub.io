<?php
$agregar = new ControladorMaps();
$res = $agregar->agregarClienteMaps();
?>
<div class="container">
    <div class="signin-row row">
        <div class="span2"></div>
        <div class="span16">
            <div class="well well-small well-shadow">
                <legend class="lead">Cliente Maps</legend>
                <form action="controllers/controladorMaps.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div id="acct-password-row" class="span1">
                        </div>
                        <div id="acct-password-row" class="span7">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Nombre Cliente<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="id_maps" required class="span4" type="hidden" value="" autocomplete="false">
                                        <input id="current-pass-control" name="Nomcliente" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Direcci贸n<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="dire" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Latitud<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="lit" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Longitud<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="long" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span6">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Logo<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="uploadImage1" class="span4" type="hidden" value="" autocomplete="false">
                                        <input id="uploadImage2" class="form-control" type="file" id="subirAntes" name="logo" onchange="previewImage1(2);" />
                                        <img id="uploadPreview2" width="350" height="200" class="mb-3" src="views/images/img.jpg" />

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span15">
                            <fieldset>
                                <div id="info_sobre_nosotros" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Cliente</h5>

                                    </div>
                                    <div class="box-content box-table">
                                        <table class="table table-hover tablesorter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Direcci贸n</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($res as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value['id_maps'] ?></td>
                                                        <td><?php echo $value['name'] ?></td>
                                                        <td><?php echo $value['direccion'] ?></td>
                                                        <td><a class="btn btn-primary edit-button-maps" data-id="<?php print $value['id_maps']; ?>">Editar</a></td>

                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <footer id="submit-actions" class="form-actions">
                        <button id="submit-button" type="submit" class="btn btn-primary" name="clienteMaps" value="CONFIRM">Guardar</button>
                    </footer>
                </form>
            </div>
        </div>
        <div class="span2"></div>
    </div>
</div>