<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col-5 mx-auto">

            <h2 class='alert-info text-center text-dark'>Agregar Usuarios</h2>
            <br>
            <form action="<?php echo base_url('index.php/nuevoU') ?>" method="POST">

                <label for="nombre" class="text-dark">Nombre:</label>
                <input type="text" name="nombre" class="form-control form-group" placeholder="Ingrese un nombre" required>

                <label for="cedula" class="text-dark">Cedula:</label>
                <input type="number" name="cedula" class="form-control form-group" placeholder="Ingrese una cedula" onKeyPress="if(this.value.length==10) return false;" required>

                <label for="correo" class="text-dark">Correo:</label>
                <input type="email" name="correo" class="form-control form-group" placeholder="Ingrese un correo" required>


                <br>
                <div class="text-center">
                    <button class="btn btn-lg btn-success" type="submit" name="agregar">Agregar</button>
                </div>
            </form>
            <?php
            if ($dato != "" && $dato != null) {
            ?>
                <div class="container-fluid">
                    <div class="row">
                        <form action="<?php echo base_url('index.php/agregarU'); ?>" method="post">
                            <div class="row">
                                <select name="uId" id="usuarioId" data-rel="chosen">
                                    <?php
                                    foreach ($dato as $value) {
                                        print("<option value='" . $value['DAP_ID'] . "'>" . $value['DAP_NOMBRES'] . "</option>");
                                    }
                                    ?>
                                </select>
                                <label for="usuario" class="text-dark"> Usuario:</label>
                                <input type="text" name="usuario" class="form-control form-group" placeholder="Ingrese un Usuario" required>

                                <label for="clave" class="text-dark"> Clave:</label>
                                <input type="text" name="cedula" class="form-control form-group" placeholder="Ingrese una clave" required>

                                <br>
                                <div class="text-center">
                                    <button class="btn btn-lg btn-success" type="submit" name="agregarU">AGREGAR USUARIOS </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>


        </div>
    </div>
</div>