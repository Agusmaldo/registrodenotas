<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<div class="sf_admin_form">
    <div id="sf_admin_form_tab_menu">
        <div class="sf_admin_form_row">
        <div class="sf_admin_form_row">
            <label>Remitente:</label>
            <?php echo $movimiento->getRemitente() ? $movimiento->getRemitente() : "&nbsp;" ?>
        </div>
        <div class="sf_admin_form_row">
            <label>Destinatario:</label>
            <?php echo $movimiento->getDestinatario() ? $movimiento->getDestinatario() : "&nbsp;" ?>
        </div>
        <div class="sf_admin_form_row">
            <label>Area:</label>
            <?php echo $movimiento->getArea()->getDescripcion() ?>
        </div>
        <div class="sf_admin_form_row">
            <label>Cudap:</label>
            <?php echo $movimiento->getCudap() ? $movimiento->getCudap() : "&nbsp;" ?>
        </div>
        <div class="sf_admin_form_row">
            <label>Fecha documento:</label>
            <?php echo $movimiento->getFechaDocumento() ? $movimiento->getFechaDocumento() : "&nbsp;" ?>
        </div>
        <div class="sf_admin_form_row">
            <label>Asunto:</label>
            <?php echo $movimiento->getAsunto() ? $movimiento->getAsunto() : "&nbsp;" ?>
        </div>
        <div class="sf_admin_form_row">
            <label>Estado:</label>
            <?php echo $movimiento->getEstado() ? $movimiento->getEstado() : "&nbsp;" ?>
        </div>
        <div class="sf_admin_form_row">
            <label>Referencia:</label>
            <?php echo $movimiento->getComentarios() ? $movimiento->getComentarios() : "&nbsp;" ?>
        </div>
    </div>
</div>