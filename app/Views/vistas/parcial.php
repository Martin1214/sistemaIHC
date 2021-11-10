<div class="content">
    <div class="container-fluid">

        <div class="row">
            <button class='btn btn-success' data-toggle="modal" data-target="#mdInsert"> Agregar Nuevo </button>
            <div class=" card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning">
                        <th>#</th>
                        <th>Nombres</th>
                        <th>Cedula</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Editar</th>
                    </thead>
                    <tbody>
                        <?php

                        $cont = 1;
                        foreach ($usuarios as $value) {
                            print("<tr>");
                            print("<td>" . $cont . "</td> <td>" . $value['us_nombre'] . "</td> <td>" . $value['us_cedula'] . "</td> <td>" . $value['us_telefono'] . "</td> <td>" . $value['us_direccion'] . "</td> <td> <button class='btn btn-lg btn-success' name='editP' onclick='cargar(" . $value['us_id'] . ",\"" . $value['us_nombre'] . "\"," . $value['us_cedula'] . "," . $value['us_telefono'] . ",\"" . $value['us_direccion'] . "\")' data-toggle='modal' data-target='#mdUpdate' >Editar</button></td>");
                            print("</tr>");
                            $cont++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>






    <div class="modal" id="mdInsert" tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="modal-title">Agregar Usuario</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="<?php echo base_url('index.php/insert') ?>">
                    <div class="modal-body row">

                        <p class="col-sm-12">INGRESAR:</p>

                        <label class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-10 ">
                            <input type="text" name="nombre" id="nombre" class="form-control name_list" placeholder="Escriba el Nombre del usuario" required>
                        </div>
                        <br><br>
                        <label class="col-sm-2 col-form-label">Cedula:</label>
                        <div class="col-sm-10">
                            <input type="text" name="cedula" id="cedula" class="form-control name_list" placeholder="Escriba la Cedula del usuario" maxlength="10" onkeypress="return soloNumeros(event)" required>
                        </div>
                        <br><br>
                        <label class="col-sm-2 col-form-label">Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" name="telefono" id="telefono" class="form-control name_list" placeholder="Escriba el Telefono del usuario" maxlength="10" onkeypress="return soloNumeros(event)" required>
                        </div>
                        <br><br>
                        <label class="col-sm-2 col-form-label">Direccion:</label>
                        <div class="col-sm-10">
                            <input type="text" name="direccion" id="direccion" class="form-control name_list" placeholder="Escriba la Direccion del usuario" required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-warning">Guardar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>


    <div class="modal" id="mdUpdate" tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="modal-title">Editar Usuario</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="<?php echo base_url('index.php/update') ?>">
                    <div class="modal-body row">

                        <p class="col-sm-12">EDITAR:</p>

                        <input type="text" name="idU" id="idU" style="display:none;">

                        <label class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-10 ">
                            <input type="text" name="nombreA" id="nombreA" class="form-control name_list" placeholder="Escriba el Nombre del usuario" required>
                        </div>
                        <br><br>
                        <label class="col-sm-2 col-form-label">Cedula:</label>
                        <div class="col-sm-10">
                            <input type="text" name="cedulaA" id="cedulaA" class="form-control name_list" placeholder="Escriba la Cedula del usuario" maxlength="10" required>
                        </div>
                        <br><br>
                        <label class="col-sm-2 col-form-label">Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" name="telefonoA" id="telefonoA" class="form-control name_list" placeholder="Escriba el Telefono del usuario" maxlength="10" required>
                        </div>
                        <br><br>
                        <label class="col-sm-2 col-form-label">Direccion:</label>
                        <div class="col-sm-10">
                            <input type="text" name="direccionA" id="direccionA" class="form-control name_list" placeholder="Escriba la Direccion del usuario">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-alert">Guardar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>