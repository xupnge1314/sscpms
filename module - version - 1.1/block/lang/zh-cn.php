<?php
/**
 * The zh-cn file of crm block module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->block = new stdclass();
$lang->block->num      = '数量';
$lang->block->type     = '类型';
$lang->block->orderBy  = '排序';
$lang->block->status   = '状态';
$lang->block->actions  = '操作';

$lang->block->availableBlocks = new stdclass();

$lang->block->availableBlocks->todo    = '我的待办';
$lang->block->availableBlocks->task    = '我的任务';
$lang->block->availableBlocks->bug     = '我的Bug';
$lang->block->availableBlocks->case    = '我的用例';
$lang->block->availableBlocks->story   = '我的需求';
$lang->block->availableBlocks->product = $lang->productCommon . '列表';
$lang->block->availableBlocks->project = $lang->projectCommon . '列表';

$lang->block->orderByList = new stdclass();

$lang->block->orderByList->task = array();
$lang->block->orderByList->task['id_asc']        = 'ID 递增';
$lang->block->orderByList->task['id_desc']       = 'ID 递减';
$lang->block->orderByList->task['pri_asc']       = '优先级递增';
$lang->block->orderByList->task['pri_desc']      = '优先级递减';
$lang->block->orderByList->task['estimate_asc']  = '预计时间递增';
$lang->block->orderByList->task['estimate_desc'] = '预计时间递减';
$lang->block->orderByList->task['status_asc']    = '状态正序';
$lang->block->orderByList->task['status_desc']   = '状态倒序';
$lang->block->orderByList->task['deadline_asc']  = '截止日期递增';
$lang->block->orderByList->task['deadline_desc'] = '截止日期递减';

$lang->block->orderByList->bug = array();
$lang->block->orderByList->bug['id_asc']        = 'ID 递增';
$lang->block->orderByList->bug['id_desc']       = 'ID 递减';
$lang->block->orderByList->bug['pri_asc']       = '优先级递增';
$lang->block->orderByList->bug['pri_desc']      = '优先级递减';
$lang->block->orderByList->bug['severity_asc']  = '级别递增';
$lang->block->orderByList->bug['severity_desc'] = '级别递减';

$lang->block->orderByList->case = array();
$lang->block->orderByList->case['id_asc']        = 'ID 递增';
$lang->block->orderByList->case['id_desc']       = 'ID 递减';
$lang->block->orderByList->case['pri_asc']       = '优先级递增';
$lang->block->orderByList->case['pri_desc']      = '优先级递减';

$lang->block->orderByList->story = array();
$lang->block->orderByList->story['id_asc']        = 'ID 递增';
$lang->block->orderByList->story['id_desc']       = 'ID 递减';
$lang->block->orderByList->story['pri_asc']       = '优先级递增';
$lang->block->orderByList->story['pri_desc']      = '优先级递减';
$lang->block->orderByList->story['status_asc']    = '状态正序';
$lang->block->orderByList->story['status_desc']   = '状态倒序';
$lang->block->orderByList->story['stage_asc']     = '阶段正序';
$lang->block->orderByList->story['stage_desc']    = '阶段倒序';

$lang->block->typeList = new stdclass();

$lang->block->typeList->task['assignedTo'] = '指派给我';
$lang->block->typeList->task['openedBy']   = '由我创建';
$lang->block->typeList->task['finishedBy'] = '由我完成';
$lang->block->typeList->task['closedBy']   = '由我关闭';
$lang->block->typeList->task['canceledBy'] = '由我取消';

$lang->block->typeList->bug['assignedTo'] = '指派给我';
$lang->block->typeList->bug['openedBy']   = '由我创建';
$lang->block->typeList->bug['resolvedBy'] = '由我解决';
$lang->block->typeList->bug['closedBy']   = '由我关闭';

$lang->block->typeList->case['assigntome'] = '指派给我';
$lang->block->typeList->case['openedbyme'] = '由我创建';

$lang->block->typeList->story['assignedTo'] = '指派给我';
$lang->block->typeList->story['openedBy']   = '由我创建';
$lang->block->typeList->story['reviewedBy'] = '由我评审';
$lang->block->typeList->story['closedBy']   = '由我关闭';
