<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('jQuery') ?>
<script type="text/javascript">
    $(document).ready(function() {
        if($('#movimiento_folio_fep').val() != '' || $('#movimiento_folio_fsr').val() != '' || $('#movimiento_folio_nca').val() != '' ||
            $('#movimiento_folio_soe').val() != '' || $('#movimiento_folio_allc').val() != '' || $('#movimiento_folio_allm').val() != '' ||
            $('#movimiento_folio_sgld').val() != '' ||$('#movimiento_nro_folio_otros').val() != '')
        {    document.formulario2.archivo.checked=true;
            document.getElementById('archivoDat').style.display = "block";           
        }
    });
        
        
    function mostrarArch(it, box) {
        var vis = (box.checked) ? "block" : "none";
        document.getElementById(it).style.display = vis;
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

<?php $Acreditado = $sf_user->hasCredential('Administrador') || $sf_user->hasCredential('CargaLectura')?>

<form name="formulario2" action="<?php echo url_for('movimiento/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id=' . $form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> onSubmit="return valida();">
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
            <tr>
                <td></td>
                <td>
                    <?php echo $form->renderHiddenFields(false) ?> 
                    <?php if (!$form->getObject()->isNew() && $sf_user->hasCredential('Administrador')): ?>
                        <?php echo button_to('Eliminar', 'ingresoDatos2/delete?id=' . $form->getObject()->getId(), 'confirm = ¿Está seguro?') ?>
                    <?php endif; ?>
                    <?php if (!$form->getObject()->isNew()): ?>
                    <input type="submit" value="Guardar" />
                    <?php else: ?>
                    <input type="submit" value="Guardar Cambios" />
                    <?php endif; ?>
                    <?php echo button_to('Volver', 'movimiento/index') ?>          
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>            
            <tr>
                <th><?php echo $form['remitente_id']->renderLabel() ?></th>
                <td>
                    <div <?php echo $Acreditado ? "" : 'style="display:none"'?>>
                    <?php echo $form['remitente_id']->renderError() ?>
                    <?php echo $form['remitente_id'] ?>
                    </div>
                    <?php echo !$Acreditado ? $form->getObject()->getRemitente() : "" ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['area_id']->renderLabel() ?></th>
                <td>
                    <div <?php echo $Acreditado ? "" : 'style="display:none"'?>>
                    <?php echo $form['area_id']->renderError() ?>
                    <?php echo $form['area_id'] ?>
                    </div>
                    <?php echo !$Acreditado ? $form->getObject()->getResponsable()->getUsuario() : ""?>
                </td>
            </tr>      
            <tr>
                <th><?php echo $form['estado_id']->renderLabel() ?></th>
                <td>
                    <div <?php echo $Acreditado ? "" : 'style="display:none"'?>>
                    <?php echo $form['estado_id']->renderError() ?>
                    <?php echo $form['estado_id'] ?>
                    </div>
                    <?php echo !$Acreditado ? $form->getObject()->getResponsable()->getUsuario() : ""?>
                </td>
            </tr>   

             <tr>
                <th><?php echo $form['tipo_doc']->renderLabel() ?></th>
                <td>
                    <div <?php echo $Acreditado ? "" : 'style="display:none"'?>>
                    <?php echo $form['tipo_doc']->renderError() ?>
                    <?php echo $form['tipo_doc'] ?>
                    </div>
                    <?php echo !$Acreditado ? $form->getObject()->getResponsable()->getUsuario() : ""?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['anio']->renderLabel() ?></th>
                <td>
                    <div <?php echo $Acreditado ? "" : 'style="display:none"'?>>
                    <?php echo $form['anio']->renderError() ?>
                    <?php echo $form['anio'] ?>
                    </div>
                    <?php echo !$Acreditado ? $form->getObject()->getResponsable()->getUsuario() : ""?>
                </td>
            </tr>   
            <tr>
                <th><?php echo $form['num']->renderLabel() ?></th>
                <td>
                    <div <?php echo $Acreditado ? "" : 'style="display:none"'?>>
                    <?php echo $form['num']->renderError() ?>
                    <?php echo $form['num'] ?>
                    </div>
                    <?php echo !$Acreditado ? $form->getObject()->getResponsable()->getUsuario() : ""?>
                </td>
            </tr>   
            <tr>
                <th><?php echo $form['dependencia']->renderLabel() ?></th>
                <td>
                    <div <?php echo $Acreditado ? "" : 'style="display:none"'?>>
                    <?php echo $form['dependencia']->renderError() ?>
                    <?php echo $form['dependencia'] ?>
                    </div>
                    <?php echo !$Acreditado ? $form->getObject()->getResponsable()->getUsuario() : ""?>
                </td>
            </tr>   
            <tr>
                <th><?php echo $form['organismo']->renderLabel() ?></th>
                <td>
                    <div <?php echo $Acreditado ? "" : 'style="display:none"'?>>
                    <?php echo $form['organismo']->renderError() ?>
                    <?php echo $form['organismo'] ?>
                    </div>
                    <?php echo !$Acreditado ? $form->getObject()->getResponsable()->getUsuario() : ""?>
                </td>
            </tr>  
            <tr>
                <th><?php echo $form['entidad']->renderLabel() ?></th>
                <td>
                    <div <?php echo $Acreditado ? "" : 'style="display:none"'?>>
                    <?php echo $form['entidad']->renderError() ?>
                    <?php echo $form['entidad'] ?>
                    </div>
                    <?php echo !$Acreditado ? $form->getObject()->getResponsable()->getUsuario() : ""?>
                </td>
            </tr>  
            <tr>
                <th><?php echo $form['destinatario_id']->renderLabel() ?></th>
                <td>
                    <div <?php echo $Acreditado ? "" : 'style="display:none"'?>>
                    <?php echo $form['destinatario_id']->renderError() ?>
                    <?php echo $form['destinatario_id'] ?>
                    </div>
                    <?php echo !$Acreditado ? $form->getObject()->getDestinatario() : ""?>
                </td>
            </tr>
   
            <tr>

                <th><?php echo $form['fecha_documento']->renderLabel() ?></th>
                <td>
                    <div <?php echo $Acreditado ? "" : 'style="display:none"'?>>
                    <?php echo $form['fecha_documento']->renderError() ?>
                    <?php echo $form['fecha_documento'] ?>
                    </div>
                    <?php echo !$Acreditado ? $form->getObject()->getFechaDocumento() : "" ?>
                </td>       

            </tr>      
            <tr>
                <th><?php echo 'Referencia' ?></th>
                <td colspan="9">
                    <div <?php echo $Acreditado ? "" : 'style="display:none"'?>>
                    <?php echo $form['comentarios']->renderError() ?>
                    <?php echo $form['comentarios'] ?>
                    </div>
                    <?php echo !$Acreditado ? $form->getObject()->getComentarios() : "" ?>
                </td>
            </tr>

            <tr>
                <td colspan="9">
                    <br/>
                    <hr width=50% align="center"/>
                    <br/>
                </td>
            </tr>  

            <tr>
                <th><?php echo $form['vinculo_exp']->renderLabel() ?></th>
                <td>
                    <?php echo $form['vinculo_exp']->renderError() ?>
                    <?php echo $form['vinculo_exp'] ?>
                </td>
            </tr>

            <tr>
                <th></th>
                <td colspan="19">
                    <?php if (!$form->getObject()->isNew()): ?>
                        <?php echo javascript_tag(jq_remote_function(array('update' => 'divSubtitulos', 'url' => 'titSubt/new?movimiento_id=' . $form->getObject()->getId(),))) ?>
                    <?php endif; ?>
                    <div id="divSubtitulos"></div>
                </td>
            </tr>

            <tr>
                <th><?php echo $form['asunto']->renderLabel() ?></th>
                <td colspan="9">
                    <?php echo $form['asunto']->renderError() ?>
                    <?php echo $form['asunto'] ?>
                </td>
            </tr>

            <tr>
                <th><label for="archivo">ARCHIVO </label></th>
                <td colspan="9">
                    <input type="checkbox" name="archivo" id="archivoAct" onClick="mostrarArch('archivoDat', this)"/>
                </td>
            </tr>

            <tr>
                <th colspan="1"></th>
                <td colspan="9">
                    <table id="archivoDat" style="display:none">
                        <tbody>

                            <tr>          
                                <th><?php echo $form['folio_fep']->renderLabel() ?></th>
                                <td>
                                    <?php echo $form['folio_fep']->renderError() ?>
                                    <?php echo $form['folio_fep'] ?>
                                </td>

                                <th><?php echo $form['folio_fsr']->renderLabel() ?></th>
                                <td>
                                    <?php echo $form['folio_fsr']->renderError() ?>
                                    <?php echo $form['folio_fsr'] ?>
                                </td>

                                <th><?php echo $form['folio_allc']->renderLabel() ?></th>
                                <td>
                                    <?php echo $form['folio_allc']->renderError() ?>
                                    <?php echo $form['folio_allc'] ?>
                                </td>

                                <th><?php echo $form['folio_otros_id']->renderLabel() ?></th>
                                <td>
                                    <?php echo $form['folio_otros_id']->renderError() ?>
                                    <?php echo $form['folio_otros_id'] ?>
                                </td>

                                <th><?php echo $form['nro_folio_otros']->renderLabel() ?></th>
                                <td>
                                    <?php echo $form['nro_folio_otros']->renderError() ?>
                                    <?php echo $form['nro_folio_otros'] ?>
                                </td>

                            </tr>        
                            <tr>


                                <th><?php echo $form['folio_nca']->renderLabel() ?></th>
                                <td>
                                    <?php echo $form['folio_nca']->renderError() ?>
                                    <?php echo $form['folio_nca'] ?>
                                </td>  

                                <th><?php echo $form['folio_soe']->renderLabel() ?></th>
                                <td>
                                    <?php echo $form['folio_soe']->renderError() ?>
                                    <?php echo $form['folio_soe'] ?>
                                </td> 

                                <th><?php echo $form['folio_allm']->renderLabel() ?></th>
                                <td>
                                    <?php echo $form['folio_allm']->renderError() ?>
                                    <?php echo $form['folio_allm'] ?>
                                </td>
                                
                                <th><?php echo $form['folio_sgld']->renderLabel() ?></th>
                                <td>
                                    <?php echo $form['folio_sgld']->renderError() ?>
                                    <?php echo $form['folio_sgld'] ?>
                                </td>
                                
                                <th><?php echo $form['cuerpo']->renderLabel() ?></th>
                                <td>
                                    <?php echo $form['cuerpo']->renderError() ?>
                                    <?php echo $form['cuerpo'] ?>
                                </td>

                                <td colspan="2"> </td>

                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>      
        </tbody>
    </table>
</form>
