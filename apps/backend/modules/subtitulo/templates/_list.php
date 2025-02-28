<?php
$titSubts = array();
foreach ($subtitulos as $subtitulo) {
    $arrayhelper[(string) $subtitulo->getTitulo()] = $subtitulo->getDescripcion();
    $titSubts = array_merge_recursive($titSubts, $arrayhelper);
    array_shift($arrayhelper);
}
?>

<DL>
    <LH><h3><u>Subtitulos</u></h3></LH>
    <?php $tits = array_keys($titSubts) ?>
    <?php foreach ($tits as $tit): ?>
        <DT><?php echo $tit ?></DT>
        <?php if (is_array($titSubts[(string) $tit])): ?>
            <?php foreach ($titSubts[(string) $tit] as $subtitulo): ?>
                <DD>- <?php echo (string) $subtitulo ?></DD>
            <?php endforeach; ?>                
            <?php else: ?>
                <DD>- <?php echo $titSubts[(string) $tit] ?></DD>
        <?php endif; ?>
    <?php endforeach; ?>
</DL>  
