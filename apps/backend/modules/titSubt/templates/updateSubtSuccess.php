<select id="subtitulosx_mov_subtitulo_id" name="subtitulosx_mov[subtitulo_id]">
      <?php foreach ($subtitulos as $subtitulo) { ?>
      <option value="<?php echo $subtitulo->getId()?>" ><?php echo $subtitulo->getDescripcion(); ?></option>
      <?php }?>
</select> 