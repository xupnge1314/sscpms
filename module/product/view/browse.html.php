<?php
/**
 * The browse view file of product module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     product
 * @version     $Id: browse.html.php 4909 2013-06-26 07:23:50Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/treeview.html.php';?>
<?php js::set('confirmDelete', $lang->product->confirmDelete)?>
<?php js::set('browseType', $browseType);?>
<div id='featurebar'>
  <div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>
</div>
<div class='main'>
  <?php if(empty($productStats)):?>
<div class='container mw-500px'>
  <div class='alert'>
    <i class='icon icon-info-sign'></i>
    <div class='content'>
      <h5><?php echo $lang->my->home->noProductsTip ?></h5>
      <?php echo html::a($this->createLink('product', 'create'), "<i class='icon-plus'></i> " . $lang->my->home->createProduct,'', "class='btn btn-success'") ?>
    </div>
  </div>
</div>
<?php else:?>
<?php $canOrder = (common::hasPriv('product', 'updateOrder') and strpos($orderBy, 'order') !== false)?>
<form method='post' action='<?php echo inLink('batchEdit', "productID=$productID");?>'>
  <table class='table table-condensed table-hover table-striped tablesorter'>
    <?php $vars = "locate=no&productID=$productID&status=$status&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
    <thead>
      <tr>
        <th class='w-id'><?php echo $lang->idAB;?></th>
        <th><?php echo $lang->product->name;?></th>
        <th class='w-80px'><?php echo $lang->product->customer;?></th>
        <th class='w-80px'><?php echo $lang->product->project_name;?></th>
        <th class='w-80px'><?php echo $lang->product->quote;?></th>
        <th class='w-80px'><?php echo $lang->product->quote_time;?></th>
        <th class='w-80px'><?php echo $lang->product->fare;?></th>
        <th class='w-80px'><?php echo $lang->product->status1;?></th>
        <th class='w-80px'><?php echo $lang->product->reason;?></th>
        <th class='w-80px'><?php echo $lang->product->cash_time;?></th>
        <th class='w-80px'><?php echo $lang->product->invoice_time;?></th>
        <th class='w-80px'><?php echo $lang->product->sample_time;?></th>
        <th class='w-80px'><?php echo $lang->product->report_time;?></th>
        <th class='w-80px'><?php echo $lang->product->send_time;?></th>
        <th class='w-80px'><?php echo $lang->product->package_company;?></th>
        <th class='w-80px'><?php echo $lang->product->package_money;?></th>
        <th class='w-80px'><?php echo $lang->product->package_pay_time;?></th>
        <th class='w-80px'><?php echo $lang->product->package_invoice_time;?></th>
        <th class='w-100px '><?php echo $lang->actions;?></th>
        <!-- 
        <?php if($canOrder):?>
        <th class='w-60px sort-default'><?php common::printOrderLink('order', '', $vars, $lang->product->updateOrder);?></th>
        <?php endif;?>
         -->
      </tr>
    </thead>
    <?php $canBatchEdit = common::hasPriv('product', 'batchEdit'); ?>
    <tbody class='sortable' id='productTableList'>
      <?php foreach($productStats as $product):?>
      <tr class='text-center' data-id='<?php echo $product->id ?>' data-order='<?php echo $product->code ?>'>
        <td>
          <?php if($canBatchEdit):?>
          <input type='checkbox' name='productIDList[<?php echo $product->id;?>]' value='<?php echo $product->id;?>' /> 
          <?php endif;?>
          <?php echo html::a($this->createLink('product', 'view', 'product=' . $product->id), sprintf('%03d', $product->id));?>
        </td>
        <td class='text-left' title='<?php echo $product->name?>'><?php echo html::a($this->createLink('product', 'view', 'product=' . $product->id), $product->name);?></td>
        <td><?php echo $product->customer;?></td>
        <td><?php echo $product->project_name;?></td>
        <td><?php echo $product->quote;?></td>
        <td><?php echo $product->quote_time;?></td>
        <td><?php echo $product->fare;?></td>
        <td><?php echo $product->status1;?></td>
        <td><?php echo $product->reason;?></td>
        <td><?php echo $product->cash_time;?></td>
        <td><?php echo $product->invoice_time;?></td>
        <td><?php echo $product->sample_time;?></td>
        <td><?php echo $product->report_time;?></td>
        <td><?php echo $product->send_time;?></td>
        <td><?php echo $product->package_company;?></td>
        <td><?php echo $product->package_money;?></td>
        <td><?php echo $product->package_pay_time;?></td>
        <td><?php echo $product->package_invoice_time;?></td>
        <td>
          <?php 
          common::printIcon('product', 'edit', "product={$product->id}", '', 'list');
          //common::printIcon('product', 'delete', $params, '', 'button', '', 'hiddenwin');
          if(common::hasPriv('product', 'delete'))
          {
              $deleteURL = $this->createLink('product', 'delete', "productID=$product->id&confirm=yes");
              echo html::a("javascript:ajaxDelete(\"$deleteURL\",\"productList\",confirmDelete)", '<i class="icon-remove"></i>', '', "class='btn-icon' title='{$lang->product->delete}'");
          }
          ?>
        </td>
        <!-- 
        <?php if($canOrder):?>
        <td class='sort-handler'><i class="icon icon-move"></i></td>
        <?php endif;?>
         -->
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan='<?php echo $canOrder ? 12 : 11?>'>
          <div class='table-actions clearfix'>
            <?php //if($canBatchEdit and !empty($productStats)):?>
            <?php //echo "<div class='btn-group'>" . html::selectButton() . '</div>';?>
            <?php //echo html::submitButton($lang->product->batchEdit, '', '');?>
            <?php //endif;?>
            <?php if(!$canOrder and common::hasPriv('product', 'updateOrder')) echo html::a(inlink('index', "locate=no&productID=$productID&status=$status&order=order_desc&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}"), $lang->product->updateOrder, '' , "class='btn'");?>
          </div>
          <div class='text-right'><?php $pager->show();?></div>
        </td>
      </tr>
    </tfoot>
  </table>
</form>
<?php endif;?>
</div>
<script language='javascript'>
$('#module<?php echo $moduleID;?>').addClass('active');
$('#<?php echo $browseType;?>Tab').addClass('active');
</script>
<?php include '../../common/view/footer.html.php';?>
