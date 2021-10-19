<div class="content">
    <div class="container-fluid">
        <div class="row">

            <form action="<?php echo base_url('index.php/cedula'); ?>" method="Post">

                <input type="number" name="cedula" value="" onKeyPress="if(this.value.length==10) return false;">

                <input type="submit" value="Cedula">
            </form>

            <?php
            print($msm);
            ?>
        </div>
    </div>
</div>