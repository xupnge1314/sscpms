<?php
/**
 * The task block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<style>
td.delayed{background: #e84e0f!important; color: white;}
</style>
<table class='table table-data table-hover block-task table-fixed'>
  <thead>
  <tr>
    <th width='50'><?php echo $lang->idAB?></th>
    <th width='30'><?php echo $lang->priAB?></th>
    <th>           <?php echo $lang->task->name;?></th>
    <th width='40'><?php echo $lang->task->estimateAB;?></th>
    <th width='75'><?php echo $lang->task->deadline;?></th>
    <th width='50'><?php echo $lang->statusAB;?></th>
  </tr>
  </thead>
  <?php foreach($tasks as $task):?>
  <?php $appid = isset($_GET['entry']) ? "class='app-btn' data-id='{$this->get->entry}'" : ''?>
  <tr data-url='<?php echo $sso . $sign . 'referer=' . base64_encode($this->createLink('task', 'view', "taskID={$task->id}")); ?>' <?php echo $appid?>>
    <td><?php echo $task->id;?></td>
    <td><?php echo zget($lang->task->priList, $task->pri, $task->pri)?></td>
    <td title='<?php echo $task->name?>'><?php echo $task->name?></td>
    <td><?php echo $task->estimate?></td>
    <td class='<?php if(isset($task->delay)) echo 'delayed';?>'><?php if(substr($task->deadline, 0, 4) > 0) echo $task->deadline;?></td>
    <td ><?php echo zget($lang->task->statusList, $task->status, $task->status);?></th>
  </tr>
  <?php endforeach;?>
</table>
<script>$('.block-task').dataTable();</script>
