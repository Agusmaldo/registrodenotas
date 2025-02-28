<?php use_helper('jQuery')?>

<?php if($subtitulosx_movs->count() > 0) :?>
    <?php echo include_partial('list', array('subtitulosx_movs'=>$subtitulosx_movs)) ?>
<?php endif?>