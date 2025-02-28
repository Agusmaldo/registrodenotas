<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<script>
    $(document).ready(function() {
        
        $("#movimiento_remitente_id").change(function(){
            if($("#movimiento_remitente_id").val()){
                mueveReloj("#movimiento_fecha_recepcion");
            }
            else{
                $("#movimiento_fecha_recepcion").attr('value', "")
            }		
        });
        $("#movimiento_destinatario_id").change(function(){
            if($("#movimiento_destinatario_id").val()){
                mueveReloj("#movimiento_fecha_elevacion");
            }
            else{
                $("#movimiento_fecha_elevacion").attr('value', "")
            }		
        });
    });

    function mueveReloj(campo){
        momentoActual = new Date();
        año = momentoActual.getFullYear();
        mes = (1+momentoActual.getMonth());
        dia = momentoActual.getDate();
        hora = momentoActual.getHours();
        minuto = momentoActual.getMinutes();
        segundo = momentoActual.getSeconds();
    

        fechaCompleta = año + "-" + mes + "-" + dia + " " + hora + ":" + minuto + ":" + segundo;
        $(campo).attr('value', fechaCompleta)
    }
    
    function valida() {  
          
        if( $("#movimiento_remitente_id").val() ||$("#movimiento_destinatario_id").val()) {
                return true  
        } else {  
                $("#notificaciones").replaceWith('<div id="notificaciones" class="ui-state-error">Ingrese un destinatario o remitente</div>');
                return false  
        }  
          
    } 
    

</script>

<form action="<?php echo url_for('ingresoDatos1/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id=' . $form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> onSubmit="return valida();">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->renderHiddenFields(false) ?>
                    <?php if (!$form->getObject()->isNew() && $sf_user->hasCredential('Administrador')): ?>
                        &nbsp;<?php echo button_to('Eliminar', 'ingresoDatos1/delete?id=' . $form->getObject()->getId(), 'confirm = ¿Esta seguro que desea eliminar el movimiento?') ?> 

                    <?php endif; ?>
                    <input type="submit" value="Guardar" />
                </td>
            </tr>
        </tfoot>
        <tbody>

            <?php echo $form->renderGlobalErrors() ?> 
            <tr>
                <th><?php echo $form['remitente_id']->renderLabel() ?></th>
                <td>
                    <?php echo $form['remitente_id']->renderError() ?>
                    <?php echo $form['remitente_id'] ?>
                </td>
                <th><?php echo $form['destinatario_id']->renderLabel() ?></th>
                <td>
                    <?php echo $form['destinatario_id']->renderError() ?>
                    <?php echo $form['destinatario_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['area_id']->renderLabel() ?></th>
                <td>
                    <?php echo $form['area_id']->renderError() ?>
                    <?php echo $form['area_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['estado_id']->renderLabel() ?></th>
                <td>
                    <?php echo $form['estado_id']->renderError() ?>
                    <?php echo $form['estado_id'] ?>
                </td>
            </tr>

            <tr>
                <th>N°</th>
                <td colspan="7" style="white-space: nowrap;">
                    <?php echo $form['tipo_doc']->renderError() ?>
                    <?php echo $form['tipo_doc'] ?>
                    
                    &nbsp;

                    <?php echo $form['anio']->renderError() ?>
                    <?php echo $form['anio'] ?>
                    
                    &nbsp;

                    <?php echo $form['num']->renderError() ?>
                    <?php echo $form['num'] ?>
                    
                    &nbsp;

                    <?php echo $form['dependencia']->renderError() ?>
                    <?php echo $form['dependencia'] ?>
                    
                    &nbsp;

                    <?php echo $form['organismo']->renderError() ?>
                    <?php echo $form['organismo'] ?>
                    
                    &nbsp;

                    <?php echo $form['entidad']->renderError() ?>
                    <?php echo $form['entidad'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['fecha_documento']->renderLabel() ?></th>
                <td>

                    <?php if ($form['fecha_documento']->hasError()): ?>
                        <div class="ui-state-error">
                            <?php echo $form['fecha_documento']->renderError() ?>
                    <?php endif; ?>

                        <?php echo $form['fecha_documento'] ?>

                    <?php if ($form['fecha_documento']->hasError()): ?>
                        </div>
                    <?php endif; ?>
                </td> 
            </tr>
            <tr>
                <th><?php echo 'Referencia' ?></th>
                <td colspan="9">
                    <?php echo $form['comentarios']->renderError() ?>
                    <?php echo $form['comentarios'] ?>
                </td>
            </tr>
        </tbody>
    </table>
</form>
