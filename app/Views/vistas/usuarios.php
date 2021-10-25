<div class="content">
    <div class="container-fluid">

        <div class="row">

            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning">
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Nombres</th>
                        <th>Correo</th>
                        <th>Editar</th>
                    </thead>
                    <tbody>
                        <?php

                        $cont = 1;

                        foreach ($usuarios as $value) {
                            print("<tr>");
                            print("<td>" . $cont . "</td> <td>" . $value['USU_USUARIO'] . "</td> <td>" . $value['DAP_NOMBRES'] . "</td> <td>" . $value['DAP_CORREO'] . "</td>");
                            print("<td> <button onclick='updatePass(".$value['USU_ID'].")' class='btn btn-danger'> CAMBIAR </button> </td>");
                            print("</tr>");
                            $cont++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div style="display: none" id="passC">
                <form action="<?php echo base_url('index.php/updatePass') ?>" method="POST">

                    <input type="text" style="display: none" id="idU" name="id" class="form-control form-group" placeholder="Ingrese un nombre">

                    <label for="pass" class="text-dark">NUEVA CLAVE:</label>
                    <input type="number" id="pass" name="pass" class="form-control form-group" placeholder="Ingrese una cedula">

                    <br>
                    <div class="text-center">
                        <button class="btn btn-lg btn-success" type="submit" name="agregar">MODIFICAR</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>