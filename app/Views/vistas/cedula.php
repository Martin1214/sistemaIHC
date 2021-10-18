<div class="content">
    <div class="container-fluid">
        <div class="row">

            <form action="<?php echo base_url('index.php/cedula'); ?>" method="Post">

                <input type="text" name="cedula" value="">

                <input type="submit" value="Cedula">
            </form>

            <?php
            if ($msm != "") {
                print($msm);
            }
            ?>
        </div>
    </div>
</div>