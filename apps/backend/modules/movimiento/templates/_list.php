<div class="sf_admin_list ui-grid-table ui-widget ui-corner-all ui-helper-reset ui-helper-clearfix">
  <?php if (!$pager->getNbResults()): ?>

  <table>
    <caption class="fg-toolbar ui-widget-header ui-corner-top">
            <div id="sf_admin_filters_buttons" class="fg-buttonset fg-buttonset-multi ui-state-default">
        <a href="#sf_admin_filter" id="sf_admin_filter_button" class="fg-button ui-state-default fg-button-icon-left ui-corner-left"><?php echo UIHelper::addIconByConf('filters') . __('Filtros', array(), 'sf_admin') ?></a>
        <?php echo link_to(UIHelper::addIconByConf('reset') . __('Reset', array(), 'sf_admin'), 'movimiento_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'fg-button ui-state-default fg-button-icon-left ui-corner-right')) ?></span>
      </div>
            <h1><span class="ui-icon ui-icon-triangle-1-s"></span> <?php echo __('Movimientos', array(), 'messages') ?></h1>
    </caption>
    <tbody>
      <tr class="sf_admin_row ui-widget-content">
        <td align="center" height="30">
          <p align="center"><?php echo __('No result', array(), 'sf_admin') ?></p>
        </td>
      </tr>
    </tbody>
  </table>

  <?php else: ?>

  <table>
    <caption class="fg-toolbar ui-widget-header ui-corner-top">
            <div id="sf_admin_filters_buttons" class="fg-buttonset fg-buttonset-multi ui-state-default">
        <a href="#sf_admin_filter" id="sf_admin_filter_button" class="fg-button ui-state-default fg-button-icon-left ui-corner-left"><?php echo UIHelper::addIconByConf('filters') . __('Filtros', array(), 'sf_admin') ?></a>
        <?php $isDisabledResetButton = ($hasFilters->getRawValue()) ? '' : ' ui-state-disabled' ?>
        <?php echo link_to(UIHelper::addIconByConf('reset') . __('Reset', array(), 'sf_admin'), 'movimiento_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'fg-button ui-state-default fg-button-icon-left ui-corner-right'.$isDisabledResetButton)) ?></span>
      </div>
            <h1><span class="ui-icon ui-icon-triangle-1-s"></span> <?php echo __('Movimientos', array(), 'messages') ?></h1>
    </caption>

    <thead class="ui-widget-header">
      <tr>
                  <th id="sf_admin_list_batch_actions"  class="ui-state-default ui-th-column"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
        
        <?php /* include_partial('movimiento/list_th_tabular', array('sort' => $sort)); */ ?>

                  <th id="sf_admin_list_th_actions" class="ui-state-default ui-th-column"><?php echo __('Remitente', array(), 'sf_admin') ?></th>
                  <th id="sf_admin_list_th_actions" class="ui-state-default ui-th-column"><?php echo __('Destinatario', array(), 'sf_admin') ?></th>
                  <th id="sf_admin_list_th_actions" class="ui-state-default ui-th-column"><?php echo __('N°', array(), 'sf_admin') ?></th>
                  <th id="sf_admin_list_th_actions" class="ui-state-default ui-th-column"><?php echo __('Fecha documento', array(), 'sf_admin') ?></th>
                  <th id="sf_admin_list_th_actions" class="ui-state-default ui-th-column"><?php echo __('Area', array(), 'sf_admin') ?></th>
                  <th id="sf_admin_list_th_actions" class="ui-state-default ui-th-column"><?php echo __('Estado', array(), 'sf_admin') ?></th>
                  <th id="sf_admin_list_th_actions" class="ui-state-default ui-th-column"><?php echo __('Referencia', array(), 'sf_admin') ?></th>
                  <th id="sf_admin_list_th_actions" class="ui-state-default ui-th-column"><?php echo __('Acciones', array(), 'sf_admin') ?></th>
              </tr>
    </thead>

    <tfoot>
      <tr>
        <th colspan="10">
          <div class="ui-state-default ui-th-column ui-corner-bottom">
            <?php include_partial('movimiento/pagination', array('pager' => $pager)) ?>
          </div>
        </th>
      </tr>
    </tfoot>

    <tbody>
      <?php foreach ($pager->getResults() as $i => $movimiento): $odd = fmod(++$i, 2) ? ' odd' : '' ?>
        <tr class="sf_admin_row ui-widget-content <?php echo $odd ?>">
                      <?php include_partial('movimiento/list_td_batch_actions', array('movimiento' => $movimiento, 'helper' => $helper)) ?>
          
          <?php include_partial('movimiento/list_td_tabular', array('movimiento' => $movimiento)) ?>

                      <?php include_partial('movimiento/list_td_actions', array('movimiento' => $movimiento, 'helper' => $helper)) ?>
                  </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <?php endif; ?>
</div>

<script type="text/javascript">
/* <![CDATA[ */
function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
}
/* ]]> */
</script>
