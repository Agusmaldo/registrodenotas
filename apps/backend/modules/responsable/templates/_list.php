<u><h3>Responsables</h3></u>
<ul>
    <?php foreach ($responsables as $responsable): ?>
        <li><?php echo $responsable->getUsuario() ?></li>
    <?php endforeach; ?>
</ul>
