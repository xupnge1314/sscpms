<?php
/**
 * The edit view of product module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     product
 * @version     $Id: edit.html.php 4129 2013-01-18 01:58:14Z wwccss $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php js::import($jsRoot . 'misc/date.js');?>
<div class='container mw-1400px'>
  <div id='titlebar'>
    <div class='heading'>
      <span class='prefix'><?php echo html::icon($lang->icons['product']);?> <strong><?php echo $product->id;?></strong></span>
      <strong><?php echo html::a($this->createLink('product', 'view', 'product=' . $product->id), $product->name);?></strong>
      <small class='text-muted'> <?php echo $lang->product->edit;?> <i class='icon icon-pencil'></i></small>
    </div>
  </div>
  <form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
    <table align='center' class='table table-form'> 
      <tr>
        <th class='w-90px'><?php echo $lang->product->name;?></th>
        <td class='w-p25-f'><?php echo html::input('name', $product->name, "class='form-control'");?></td><td></td>
      </tr>  
      
      <tr>
        <th class='w-90px'><?php echo $lang->product->customer;?></th>
        <td class='w-p25-f'><?php echo html::input('customer', $product->customer, "class='form-control'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->project_name;?></th>
        <td class='w-p25-f'><?php echo html::input('project_name', $product->project_name, "class='form-control'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->quote;?></th>
        <td class='w-p25-f'>
        <div class='input-group'>
          <?php echo html::input('quote', $product->quote, "class='form-control'");?>
            <span class='input-group-addon'><?php echo $lang->product->money;?></span>
          </div>
        </td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->quote_time;?></th>
        <td class='w-p25-f'><?php echo html::input('quote_time', $product->quote_time, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->quote_time . "'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->fare;?></th>
        <td class='w-p25-f'><?php echo html::select('fare', $lang->product->fareList, $product->fare, "class='form-control'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->status1;?></th>
        <td class='w-p25-f'><?php echo html::select('status1', $lang->product->status1List, $product->status1, "class='form-control'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->reason;?></th>
        <td class='w-p25-f'><?php echo html::input('reason', $product->reason, "class='form-control'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->cash_time;?></th>
        <td class='w-p25-f'><?php echo html::input('cash_time', $product->cash_time, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->cash_time . "'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->invoice_time;?></th>
        <td class='w-p25-f'><?php echo html::input('invoice_time', $product->invoice_time, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->invoice_time . "'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->sample_time;?></th>
        <td class='w-p25-f'><?php echo html::input('sample_time', $product->sample_time, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->sample_time . "'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->report_time;?></th>
        <td class='w-p25-f'><?php echo html::input('report_time', $product->report_time, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->report_time . "'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->send_time;?></th>
        <td class='w-p25-f'><?php echo html::input('send_time', $product->send_time, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->send_time . "'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->package_company;?></th>
        <td class='w-p25-f'><?php echo html::input('package_company', $product->package_company, "class='form-control'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->package_money;?></th>
        <td><div class='input-group'>
          <?php echo html::input('package_money', $product->package_money, "class='form-control'");?>
            <span class='input-group-addon'><?php echo $lang->product->money;?></span>
          </div>
        </td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->package_pay_time;?></th>
        <td class='w-p25-f'><?php echo html::input('package_pay_time', $product->package_pay_time, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->package_pay_time . "'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-90px'><?php echo $lang->product->package_invoice_time;?></th>
        <td class='w-p25-f'><?php echo html::input('package_invoice_time', $product->package_invoice_time, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->package_invoice_time . "'");?></td><td></td>
      </tr>  
      <!-- 
      <tr>
        <th><?php echo $lang->product->code;?></th>
        <td><?php echo html::input('code', $product->code, "class='form-control'");?></td><td></td>
      </tr>  
      <tr>
        <th><?php echo $lang->product->PO;?></th>
        <td><?php echo html::select('PO', $poUsers, $product->PO, "class='form-control chosen'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->QD;?></th>
        <td><?php echo html::select('QD', $qdUsers, $product->QD, "class='form-control chosen'");?></td><td></td>
      </tr>  
      <tr>
        <th><?php echo $lang->product->RD;?></th>
        <td><?php echo html::select('RD', $rdUsers, $product->RD, "class='form-control chosen'");?></td><td></td>
      </tr>  
      <tr>
        <th><?php echo $lang->product->status;?></th>
        <td><?php echo html::select('status', $lang->product->statusList, $product->status, "class='form-control'");?></td><td></td>
      </tr>   -->
      <tr>
        <th><?php echo $lang->product->desc;?></th>
        <td colspan='2'><?php echo html::textarea('desc', htmlspecialchars($product->desc), "rows='8' class='form-control'");?></td>
      </tr>  
      <tr class='hidden'>
        <th><?php echo $lang->product->acl;?></th>
        <td colspan='2'><?php echo nl2br(html::radio('acl', $lang->product->aclList, $product->acl, "onclick='setWhite(this.value);'", 'block'));?></td>
      </tr>  
      <tr id='whitelistBox'  class='hidden' <?php if($product->acl != 'custom') echo "class='hidden'";?>>
        <th><?php echo $lang->product->whitelist;?></th>
        <td colspan='2'><?php echo html::checkbox('whitelist', $groups, $product->whitelist);?></td>
      </tr>  
      <tr><td></td><td colspan='2'><?php echo html::submitButton();?></td></tr>
    </table>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
