<?php use_helper('jQuery') ?>
<?php echo use_stylesheet('/css/demos.css') ?>
<?php echo use_stylesheet('/css/demo_table.css') ?>

<?php echo javascript_tag(jq_remote_function(array('update' => 'titAdm', 'url' => 'titulo/new'))) ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'subtAdm', 'url' => 'subtitulo/new'))) ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'referenciaAdm', 'url' => 'referencia/new'))) ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'responsablesAdm', 'url' => 'responsable/new'))) ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'destiRemiAdm', 'url' => 'destiRemi/new'))) ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'areaAdm', 'url' => 'area/new'))) ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'folioOtrosAdm', 'url' => 'folioOtros/new'))) ?>
<?php echo javascript_tag(jq_remote_function(array('update' => 'areaAdm', 'url' => 'area/new'))) ?>

<script>
    $(function() {
        $( "#accordionAdm" ).accordion({
            autoHeight: false,
            navigation: true
        });
    });
</script>

<div class="ui-state-default ui-corner-all" style="margin:5px 5px;">

    <h1>Administracion de combos desplegables</h1>

    <div id="accordionAdm">
        <!-- <h2><a href="#">Titulos</a></h2>
        <div>
            <div id="titAdm"></div>
        </div>
        <h2><a href="#">Subtitulos</a></h2>
        <div>
            <div id="subtAdm"></div> 
        </div> -->
        <!-- <h2><a href="#">Referencias</a></h2>
        <div>
            <div id="referenciaAdm"></div>
        </div> -->
        <!-- <h2><a href="#">Responsables</a></h2>
        <div>
            <div id="responsablesAdm"></div>
        </div> -->
        <h2><a href="#">Destinatarios/Remitentes</a></h2>
        <div>
            <div id="destiRemiAdm"></div>
        </div>
        <h2><a href="#">Areas</a></h2>
        <div>
            <div id="areaAdm"></div>
        </div>
        <!-- <h2><a href="#">Folios (otros)</a></h2>
        <div>
            <div id="folioOtrosAdm"></div>
        </div>
        <h2><a href="#">Areas</a></h2>
        <div>
            <div id="areaAdm"></div>
        </div> -->
    </div>
</div>