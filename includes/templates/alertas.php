<?php foreach($alertas as $alerta) : ?>
    <?php if($exito) { ?>
        <div class="alerta exito">
    <?php }else { ?>
        <div class="alerta error">
    <?php echo $alerta; ?>
        </div>
    <?php } ?>
<?php endforeach; ?>