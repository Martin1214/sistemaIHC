<div class="content">
    <div class="container-fluid">
        <div class="row">

            <form action="<?php echo base_url('index.php/buscarC'); ?>" method="Post">
                <label for="">Usuarios: </label>

                <select id="usuarioId" name="uId" data-rel=" choosen">
                    <?php
                    if ($usuarios != "") {
                        foreach ($usuarios as $value) {
                            # code...
                            print("<option value='" . $value['USU_ID'] . "'>" . $value['DAP_NOMBRES'] . "</option>");
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Buscar Us">
            </form>

            <?php
            if ($correo != "") {
                foreach ($correo as $value) {
                    # code...
                    print($value['DAP_CORREO']);
                }
            }
            ?>
        </div>
    </div>
</div>