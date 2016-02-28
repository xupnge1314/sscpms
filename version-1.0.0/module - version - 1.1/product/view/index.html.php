<?php
/**
 * The html template file of index method of index module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Yangyang Shi <shiyangyang@cnezsoft.com>
 * @package     ZenTaoPMS
 * @version     $Id$
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/sparkline.html.php';?>
<?php include '../../common/view/sortable.html.php';?>
<div id='featurebar'>
  <div class='heading'><?php echo html::icon($lang->icons['product']) . ' ' . $lang->product->index;?>  </div>
  <div class='actions'>
    <?php echo html::a($this->createLink('product', 'create'), "<i class='icon-plus'></i> " . $lang->product->create,'', "class='btn'") ?>
  </div>
  <ul class='nav'>
    <?php echo "<li id='noclosedTab'>" . html::a(inlink("index", "locate=no&productID=$productID&status=noclosed"), $lang->product->unclosed) . '</li>';?>
    <?php echo "<li id='closedTab'>" . html::a(inlink("index", "locate=no&productID=$productID&status=closed"), $lang->product->statusList['closed']) . '</li>';?>
    <?php echo "<li id='allTab'>" . html::a(inlink("index", "locate=no&productID=$productID&status=all"), $lang->product->allProduct) . '</li>';?>
  </ul>
</div>

<div class='block' id='productbox'>
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
        <th class='w-id'><?php common::printOrderLink('id', $orderBy, $vars, $lang->idAB);?></th>
        <th><?php common::printOrderLink('name', $orderBy, $vars, $lang->product->name);?></th>
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
        <!-- 
        <th class='w-80px'><?php echo $lang->story->statusList['active']  . $lang->story->common;?></th>
        <th class='w-80px'><?php echo $lang->story->statusList['changed'] . $lang->story->common;?></th>
        <th class='w-80px'><?php echo $lang->story->statusList['draft']   . $lang->story->common;?></th>
        <th class='w-80px'><?php echo $lang->story->statusList['closed']  . $lang->story->common;?></th>
        <th class='w-80px'><?php echo $lang->product->plans;?></th>
        <th class='w-80px'><?php echo $lang->product->releases;?></th>
        <th class='w-80px'><?php echo $lang->product->bugs;?></th>
        <th class='w-80px'><?php echo $lang->bug->unResolved;?></th>
        <th class='w-80px'><?php echo $lang->bug->assignToNull;?></th>
         -->
        <?php if($canOrder):?>
        <th class='w-60px sort-default'><?php common::printOrderLink('order', $orderBy, $vars, $lang->product->updateOrder);?></th>
        <?php endif;?>
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
        <!-- 
        <td><?php echo $product->stories['active']?></td>
        <td><?php echo $product->stories['changed']?></td>
        <td><?php echo $product->stories['draft']?></td>
        <td><?php echo $product->stories['closed']?></td>
        <td><?php echo $product->plans?></td>
        <td><?php echo $product->releases?></td>
        <td><?php echo $product->bugs?></td>
        <td><?php echo $product->unResolved;?></td>
        <td><?php echo $product->assignToNull;?></td>
         -->
        <?php if($canOrder):?>
        <td class='sort-handler'><i class="icon icon-move"></i></td>
        <?php endif;?>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan='<?php echo $canOrder ? 12 : 11?>'>
          <div class='table-actions clearfix'>
            <?php if($canBatchEdit and !empty($productStats)):?>
            <?php echo "<div class='btn-group'>" . html::selectButton() . '</div>';?>
            <?php echo html::submitButton($lang->product->batchEdit, '', '');?>
            <?php endif;?>
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
<script>$("#<?php echo $status;?>Tab").addClass('active');</script>
<?php js::set('orderBy', $orderBy)?>
<?php include '../../common/view/footer.html.php';?>
