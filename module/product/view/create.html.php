<?php
/**
 * The create view of product module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     product
 * @version     $Id: create.html.php 4129 2013-01-18 01:58:14Z wwccss $
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
      <span class='prefix'><?php echo html::icon($lang->icons['product']);?></span>
      <strong><small class='text-muted'><i class='icon icon-plus'></i></small> <?php echo $lang->product->create;?></strong>
    </div>
  </div>
  <form class='form-condensed' method='post' target='hiddenwin' id='dataform'  enctype='multipart/form-data'>
    <table class='table table-form'> 
      <tr>
        <th class='w-90px'><?php echo $lang->product->name;?></th>
        <td class='w-p25-f'><?php echo html::input('name', '', "class='form-control'");?></td><td></td>
      </tr>  
      <!-- 
      <tr>
        <th><?php echo $lang->product->code;?></th>
        <td><?php echo html::input('code', '', "class='form-control'");?></td><td></td>
      </tr>  
      <tr>
        <th><?php echo $lang->product->PO;?></th>
        <td><?php echo html::select('PO', $poUsers, $this->app->user->account, "class='form-control chosen'");?></td><td></td>
      </tr>  
      <tr>
        <th><?php echo $lang->product->QD;?></th>
        <td><?php echo html::select('QD', $qdUsers, '', "class='form-control chosen'");?></td><td></td>
      </tr>  
      <tr>
        <th><?php echo $lang->product->RD;?></th>
        <td><?php echo html::select('RD', $rdUsers, '', "class='form-control chosen'");?></td><td></td>
      </tr>  
      <tr>
        <th><?php echo $lang->product->desc;?></th>
        <td colspan='2'><?php echo html::textarea('desc', '', "rows='8' class='form-control'");?></td>
      </tr>  
      <tr>
        <th><?php echo $lang->product->acl;?></th>
        <td colspan='2'><?php echo nl2br(html::radio('acl', $lang->product->aclList, 'open', "onclick='setWhite(this.value);'", 'block'));?></td>
      </tr>  
      <tr id='whitelistBox' class='hidden'>
        <th><?php echo $lang->product->whitelist;?></th>
        <td colspan='2'><?php echo html::checkbox('whitelist', $groups);?></td>
      </tr>  
       -->
       <!-- 添加 2015-09-20  -->
       <tr>
        <th><?php echo $lang->product->customer;?></th>
        <td><?php echo html::input('customer', '', "class='form-control'");?></td><td></td>
      </tr>  
      <tr>
        <th><?php echo $lang->product->project_name;?></th>
        <td><?php echo html::input('project_name', '', "class='form-control'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->quote;?></th>
        <td>
        <div class='input-group'>
        <?php echo html::input('quote', '', "class='form-control'");?>
        <span class='input-group-addon'><?php echo $lang->product->money;?></span>
        </div>
        </td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->quote_time;?></th>
        <td><?php echo html::input('quote_time',date('Y-m-d'), "class='form-control w-100px form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->quote_time . "'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->fare;?></th>
        <td><?php echo html::select('fare', $lang->product->fares, '', "class='form-control chosen'");?></td><td></td>
      </tr>
      <!-- 新添加  2015-10-29 -->
      <tr>
        <th><?php echo $lang->product->reason;?></th>
        <td><?php echo html::input('reason', '', "class='form-control'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->cash_time;?></th>
        <td><?php echo html::input('cash_time','', "class='form-control w-100px form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->cash_time . "'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->invoice_time;?></th>
        <td><?php echo html::input('invoice_time','', "class='form-control w-100px form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->invoice_time . "'");?></td><td></td>
      </tr>
      <!-- 
      <tr>
        <th><?php echo $lang->product->sample_time;?></th>
        <td><?php echo html::input('sample_time','', "class='form-control w-100px form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->sample_time . "'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->package_company;?></th>
        <td><?php echo html::input('package_company', '', "class='form-control'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->package_money;?></th>
        <td>
        <div class='input-group'>
        <?php echo html::input('package_money', '', "class='form-control'");?>
        <span class='input-group-addon'><?php echo $lang->product->money;?></span>
        </div>
        </td><td></td>
      </tr>
       -->
      <tr>
        <th><?php echo $lang->product->report_time;?></th>
        <td><?php echo html::input('report_time','', "class='form-control w-100px form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->report_time . "'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->send_time;?></th>
        <td><?php echo html::input('send_time','', "class='form-control w-100px form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->send_time . "'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->package_pay_time;?></th>
        <td><?php echo html::input('package_pay_time','', "class='form-control w-100px form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->package_pay_time . "'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->package_invoice_time;?></th>
        <td><?php echo html::input('package_invoice_time','', "class='form-control w-100px form-date' onchange='computeWorkDays()' placeholder='" . $lang->product->package_invoice_time . "'");?></td><td></td>
      </tr>
      
      <tr>
        <th><?php echo $lang->product->person;?></th>
        <td><?php echo html::input('person', '', "class='form-control'");?></td><td></td>
      </tr>
      <!--  -->
       <tr id='fileBox'>
        <th><?php echo $lang->product->files;?></th>
        <td colspan='2'><?php echo $this->fetch('file', 'buildform');?></td><td></td>
      </tr> 
       
      <tr><td></td><td colspan='2'><?php echo html::submitButton();?></td></tr>
    </table>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
