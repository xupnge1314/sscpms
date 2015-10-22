<?php
/**
 * The batch edit file of product module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Congzhi Chen <congzhi@cnezsoft.com>
 * @package     ZenTaoPMS
 * @version     $Id$
 */
?>
<?php include '../../common/view/header.html.php';?>
<div id='titlebar'>
  <div class='heading'>
    <span class='prefix'><?php echo html::icon($lang->icons['product']);?></span>
    <strong><small class='text-muted'><?php echo html::icon($lang->icons['batchEdit']);?></small> <?php echo $lang->product->batchEdit;?></strong>
  </div>
</div>
<form class='form-condensed' method='post' target='hiddenwin' action='<?php echo inLink('batchEdit');?>'>
  <table class='table table-form table-fixed'>
    <thead>
      <tr>
        <th class='w-id'>   <?php echo $lang->idAB;?></th>
        <th>    <?php echo $lang->product->name;?> <span class='required'></span></th>
        <th class='w-150px'><?php echo $lang->product->customer;?></th>
        <th class='w-150px'><?php echo $lang->product->project_name;?></th>
        <th class='w-150px'><?php echo $lang->product->quote;?></th>
        <th class='w-150px'><?php echo $lang->product->quote_time;?></th>
        <th class='w-150px'><?php echo $lang->product->fare;?></th>
        <th class='w-150px'><?php echo $lang->product->person;?></th>
        <!-- 
        <th class='w-150px'><?php echo $lang->product->code;?> <span class='required'></span></th>
        <th class='w-150px'><?php echo $lang->product->PO;?></th>
        <th class='w-150px'><?php echo $lang->product->QD;?></th>
        <th class='w-150px'><?php echo $lang->product->RD;?></th>
        <th class='w-100px'><?php echo $lang->product->status;?></th>
         -->
        <th class='w-80px'><?php echo $lang->product->order;?></th>
      </tr>
    </thead>
    <?php foreach($productIDList as $productID):?>
    <tr class='text-center'>
      <td><?php echo sprintf('%03d', $productID) . html::hidden("productIDList[$productID]", $productID);?></td>
      <td><?php echo html::input("names[$productID]", $products[$productID]->name, "class='form-control'");?></td>
      <td><?php echo html::input("customers[$productID]", $products[$productID]->customer, "class='form-control'");?></td>
        <td><?php echo html::input("project_names[$productID]", $products[$productID]->project_name, "class='form-control'");?></td>
        <td><?php echo html::input("quotes[$productID]", $products[$productID]->quote, "class='form-control'");?></td>
        <td><?php echo html::input("quote_times[$productID]", $products[$productID]->quote_time, "class='form-control'");?></td>
        <td><?php echo html::select("farees[$productID]", $lang->product->fares, $products[$productID]->fare, "class='form-control'");?></td>
        <td><?php echo html::input("persons[$productID]", $products[$productID]->person, "class='form-control'");?></td>
      <!-- 
      <td><?php echo html::input("codes[$productID]", $products[$productID]->code, "class='form-control'");?></td>
      <td class='text-left' style='overflow:visible'><?php echo html::select("POs[$productID]",  $poUsers, $products[$productID]->PO, "class='form-control chosen'");?></td>
      <td class='text-left' style='overflow:visible'><?php echo html::select("QDs[$productID]",  $qdUsers, $products[$productID]->QD, "class='form-control chosen'");?></td>
      <td class='text-left' style='overflow:visible'><?php echo html::select("RDs[$productID]",  $rdUsers, $products[$productID]->RD, "class='form-control chosen'");?></td>
      <td><?php echo html::select("statuses[$productID]", $lang->product->statusList, $products[$productID]->status, "class='form-control'");?></td>
       -->
      <td><?php echo html::input("orders[$productID]", $products[$productID]->order, "class='form-control'");?></td>
    </tr>
    <?php endforeach;?>
    <tr><td colspan='8' class='text-center'><?php echo html::submitButton();?></td></tr>
  </table>
</form>
<?php include '../../common/view/footer.html.php';?>
