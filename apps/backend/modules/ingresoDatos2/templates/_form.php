<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('jQuery') ?>
<script type="text/javascript">
    $(document).ready(function() {
        if($('#movimiento_folio_fep').val() != '' || $('#movimiento_folio_fsr').val() != '' || $('#movimiento_folio_nca').val() != '' ||
            $('#movimiento_folio_soe').val() != '' || $('#movimiento_folio_allc').val() != '' || $('#movimiento_folio_allm').val() != '' ||
            $('#movimiento_folio_sgld').val() != '' || $('#movimiento_nro_folio_otros').val() != '')
        {    document.formulario2.archivo.checked=true;
            document.getElementById('archivoDat').style.display = "block";           
        }
    });
        
        
    function mostrarArch(it, box) {
        var vis = (box.checked) ? "block" : "none";
        document.getElementById(it).style.display = vis;
    }                   
            
</script>


<form name="formulario2" action="<?php echo url_for('ingresoDatos2/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id=' . $form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
            <tr>
                <td></td>
                <td>
                    <?php echo $form->renderHiddenFields(false) ?> 

                    <input type="submit" value="Guardar" />

                    <?php echo jq_button_to_remote('Cancelar', array('update' => 'formulario', 'url' => 'ingresoDatos2/cancelarForm')) ?>          
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>            
            <tr>
                <th><?php echo $form['remitente_id']->renderLabel() ?></th>
                <td>
                    <div style="display:none">
                    <?php echo $form['remitente_id']->renderError() ?>
                    <?php echo $form['remitente_id'] ?>
                    </div>
                    <?php echo $form->getObject()->getRemitente() ?>
                </td>
            </tr>
            <tr>
                <th><?php echo 'Area' ?></th>
                <td>
                    <div style="display:none">
                    <?php echo $form['responsable_id']->renderError() ?>
                    <?php echo $form['responsable_id'] ?>
                    </div>
                    <?php echo $form->getObject()->getResponsable()->getUsuario() ?>
                </td>
            </tr>      
            <tr>
                <th><?php echo $form['destinatario_id']->renderLabel() ?></th>
                <td>
                    <div style="display:none">
                    <?php echo $form['destinatario_id']->renderError() ?>
                    <?php echo $form['destinatario_id'] ?>
                    </div>
                    <?php echo $form->getObject()->getDestinatario() ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['fecha_recepcion']->renderLabel() ?></th>
                <td>
                    <div style="display:none">
                    <?php echo $form['fecha_recepcion']->renderError() ?>
                    <?php echo $form['fecha_recepcion'] ?>
                    </div>
                    <?php echo $form->getObject()->getFechaRecepcion() ?>
                </td>

                <th><?php echo $form['fecha_elevacion']->renderLabel() ?></th>
                <td>
                    <div style="display:none">
                    <?php echo $form['fecha_elevacion']->renderError() ?>
                    <?php echo $form['fecha_elevacion'] ?>
                    </div>
                    <?php echo $form->getObject()->getFechaElevacion() ?>
                </td>

            </tr>      
            <tr>

                <th><?php echo $form['referencia_id']->renderLabel() ?></th>
                <td>
                    <div style="display:none">
                    <?php echo $form['referencia_id']->renderError() ?>
                    <?php echo $form['referencia_id'] ?><?php echo $form['referencia_nro'] ?>
                    </div>
                    <?php echo $form->getObject()->getReferencia() ?> <?php echo $form->getObject()->getReferenciaNro() ?>
                </td>

                <th><?php echo $form['fecha_documento']->renderLabel() ?></th>
                <td>
                    <div style="display:none">
                    <?php echo $form['fecha_documento']->renderError() ?>
                    <?php echo $form['fecha_documento'] ?>
                    </div>
                    <?php echo $form->getObject()->getFechaDocumento() ?>
                </td>       

            </tr>      
            <tr>
                <th><?php echo $form['cnrt_pendiente']->renderLabel() ?></th>
                <td>
                    <div style="display:none">
                    <?php echo $form['cnrt_pendiente']->renderError() ?>
                    <?php echo $form['cnrt_pendiente'] ?>
                    </div>
                    <?php echo ($form->getObject()->getCnrtPendiente() ? 'Sí' : 'No' )?>
                </td>
                <th><?php echo $form['tramite_pendiente']->renderLabel() ?></th>
                <td>
                    <div style="display:none">
                    <?php echo $form['tramite_pendiente']->renderError() ?>
                    <?php echo $form['tramite_pendiente'] ?>
                    </div>
                    <?php echo ($form->getObject()->getTramitePendiente() ? 'Sí' : 'No' )?>
                </td>
            </tr>      
            <tr>


                <th><?php echo $form['cudap']->renderLabel() ?></th>
                <td>
                    <div style="display:none">
                    <?php if ($form['cudap']->hasError()): ?>
                        <div class="ui-state-error">
                            <?php echo $form['cudap']->renderError() ?>
                        <?php endif; ?>

                        <?php echo $form['cudap'] ?>

                        <?php if ($form['cudap']->hasError()): ?>
                        </div>
                    <?php endif; ?>
                    </div>
                    <?php echo $form->getObject()->getCudap() ?>
                </td>

                <th><?php echo $form['cantidad_folios']->renderLabel() ?></th>
                <td>
                    <div style="display:none">
                    <?php if ($form['cantidad_folios']->hasError()): ?>
                        <div class="ui-state-error">
                            <?php echo $form['cantidad_folios']->renderError() ?>
                    <?php endif; ?>

                        <?php echo $form['cantidad_folios'] ?>

                    <?php if ($form['cantidad_folios']->hasError()): ?>
                        </div>
                    <?php endif; ?>
                    </div>
                    <?php echo $form->getObject()->getCantidadFolios() ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['comentarios']->renderLabel() ?></th>
                <td colspan="9">
                    <div style="display:none">
                    <?php echo $form['comentarios']->renderError() ?>
                    <?php echo $form['comentarios'] ?>
                    </div>
                    <?php echo $form->getObject()->getComentarios() ?>
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

                                <td colspan="2"></td>

                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>      
        </tbody>
    </table>
</form>
