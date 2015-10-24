<?php
/**
 * The browse view file of doc module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     lib
 * @version     $Id: browse.html.php 958 2010-07-22 08:09:42Z wwccss $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../common/view/treeview.html.php';?>
<?php js::set('confirmDelete', $lang->doc->confirmDelete)?>
<script language='Javascript'>
var browseType = '<?php echo $browseType;?>';
</script>
<div id='featurebar'>
  <ul class='nav'>
    <li id='bymoduleTab' onclick='browseByModule()'><a href='#'><?php echo $lang->doc->moduleDoc;?></a></li>
    <li id='bysearchTab'><a href='#'><i class='icon-search icon'></i>&nbsp;<?php echo $lang->doc->searchDoc;?></a></li>
  </ul>
  <div class='actions'>
    <?php common::printIcon('doc', 'create', "libID=$libID&moduleID=$moduleID&productID=$productID&projectID=$projectID&from=doc");?>
  </div>
  <div id='querybox' class='<?php if($browseType == 'bysearch') echo 'show';?>'></div>
</div>
<!-- 
<div class='side' id='treebox'>
  <a class='side-handle' data-id='treebox'><i class='icon-caret-left'></i></a>
  <div class='side-body'>
    <div class='panel panel-sm'>
      <div class='panel-heading nobr'><?php echo html::icon('folder-close-alt');?> <strong><?php echo $libName;?></strong></div>
      <div class='panel-body'>
        <?php echo $moduleTree;?>
        <div class='text-right'>
          <?php common::printLink('tree', 'browse', "rootID=$libID&view=doc", $lang->doc->manageType);?>
          <?php if(is_numeric($libID)) common::printLink('tree', 'fix', "root=$libID&type=customdoc", $lang->tree->fix, 'hiddenwin');?>
        </div>
      </div>
    </div>
  </div>
</div>
 -->
<div class='main'>
  <table class='table table-condensed table-hover table-striped tablesorter table-fixed' id='docList'>
    <thead>
      <tr>
        <?php $vars = "libID=$libID&module=$moduleID&productID=$productID&projectID=$projectID&browseType=$browseType&param=$param&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}";?>
        <th class='w-id'>   <?php common::printOrderLink('id',        $orderBy, $vars, $lang->idAB);?></th>
        <!-- 
        <th>                <?php common::printOrderLink('title',     $orderBy, $vars, $lang->doc->title);?></th>
        <th class='w-100px'><?php common::printOrderLink('type',      $orderBy, $vars, $lang->doc->type);?></th>
         -->
         <!-- 修改  2015-09-20 -->
        <th class='w-100px'><?php common::printOrderLink('project_name',      $orderBy, $vars, $lang->doc->project_name);?></th>
        <th class='w-100px'><?php common::printOrderLink('organization',      $orderBy, $vars, $lang->doc->organization);?></th>
        <th class='w-100px'><?php common::printOrderLink('money',      $orderBy, $vars, $lang->doc->money);?></th>
        <th class='w-100px'><?php common::printOrderLink('day',      $orderBy, $vars, $lang->doc->day);?></th>
        <th class='w-100px'><?php common::printOrderLink('info',      $orderBy, $vars, $lang->doc->info);?></th>
        <th class='w-100px'><?php common::printOrderLink('remark',      $orderBy, $vars, $lang->doc->remark);?></th>
        
        <th class='w-100px'><?php common::printOrderLink('addedBy',   $orderBy, $vars, $lang->doc->addedBy);?></th>
        <th class='w-120px'><?php common::printOrderLink('addedDate', $orderBy, $vars, $lang->doc->addedDate);?></th>
        <!-- 
        <th class='w-120px'><?php echo $lang->doc->files;?></th>
         -->
        <th class='w-100px {sorter:false}'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($docs as $key => $doc):?>
      <?php
      $viewLink = $this->createLink('doc', 'view', "docID=$doc->id");
      $canView  = common::hasPriv('doc', 'view');
      ?>
      <tr class='text-center'>
        <td><?php if($canView) echo html::a($viewLink, sprintf('%03d', $doc->id)); else printf('%03d', $doc->id);?></td>
        <!-- 
        <td class='text-left' title="<?php echo $doc->title?>"><nobr><?php echo html::a($viewLink, $doc->title);?></nobr></td>
        <td><?php echo $lang->doc->types[$doc->type];?></td>
         -->
         <td title="<?php echo $doc->project_name?>"><nobr><?php echo html::a($viewLink, $doc->project_name);?></nobr></td>
         <td title=""><?php echo $doc->organization?></td>
        <td title=""><?php echo $doc->money?></td>
        <td title=""><?php echo $doc->day?></td>
        <td title=""><?php echo $doc->info?></td>
        <td title=""><?php echo $doc->remark?></td>
        <td><?php isset($users[$doc->addedBy]) ? print($users[$doc->addedBy]) : print($doc->addedBy);?></td>
        <td><?php echo date("m-d H:i", strtotime($doc->addedDate));?></td>
        <!-- 
        <td><?php echo $this->fetch('file', 'printFiles', array('files' => $doc->files, 'fieldset' => 'true'));?></td>
         -->
        <td>
          <?php 
          common::printIcon('doc', 'edit', "doc={$doc->id}", '', 'list');
          if(common::hasPriv('doc', 'delete'))
          {
              $deleteURL = $this->createLink('doc', 'delete', "docID=$doc->id&confirm=yes");
              echo html::a("javascript:ajaxDelete(\"$deleteURL\",\"docList\",confirmDelete)", '<i class="icon-remove"></i>', '', "class='btn-icon' title='{$lang->doc->delete}'");
          }
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
