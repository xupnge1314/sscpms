<?php
/**
 * The product module zh-cn file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     product
 * @version     $Id: zh-cn.php 5091 2013-07-10 06:06:46Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
$lang->product->common      = $lang->productCommon . '视图';
$lang->product->index       = $lang->productCommon . "首页";
$lang->product->browse      = "浏览{$lang->productCommon}";
$lang->product->dynamic     = "动态";
$lang->product->view        = "{$lang->productCommon}概况";
$lang->product->edit        = "编辑{$lang->productCommon}";
$lang->product->batchEdit   = "批量编辑";
$lang->product->create      = "新增{$lang->productCommon}";
$lang->product->read        = "{$lang->productCommon}详情";
$lang->product->delete      = "删除{$lang->productCommon}";
$lang->product->deleted     = "已删除";
$lang->product->close       = "关闭";
$lang->product->select      = "请选择{$lang->productCommon}";
$lang->product->mine        = '我负责：';
$lang->product->other       = '其他：';
$lang->product->closed      = '已关闭';
$lang->product->updateOrder = "排序";

$lang->product->basicInfo = '基本信息';
$lang->product->otherInfo = '其他信息';

$lang->product->plans    = '计划数';
$lang->product->releases = '发布数';
$lang->product->docs     = '文档数';
$lang->product->bugs     = '相关BUG';
$lang->product->projects = "关联{$lang->projectCommon}数";
$lang->product->cases    = '用例数';
$lang->product->builds   = 'BUILD数';
$lang->product->roadmap  = '路线图';
$lang->product->doc      = '文档列表';
$lang->product->project  = $lang->projectCommon . '列表';

$lang->product->selectProduct   = "请选择{$lang->productCommon}";
$lang->product->saveButton      = " 保存 (S) ";
$lang->product->confirmDelete   = " 您确定删除该{$lang->productCommon}吗？";
$lang->product->ajaxGetProjects = "接口:{$lang->projectCommon}列表";
$lang->product->ajaxGetPlans    = "接口:计划列表";

$lang->product->errorFormat    = "{$lang->productCommon}数据格式不正确";
$lang->product->errorEmptyName = "{$lang->productCommon}名称不能为空";
$lang->product->errorEmptyCode = "{$lang->productCommon}代号不能为空";
$lang->product->errorNoProduct = "还没有创建{$lang->productCommon}！";
$lang->product->accessDenied   = "您无权访问该{$lang->productCommon}";

$lang->product->id        = '编号';
$lang->product->company   = '所属公司';
$lang->product->name      = "项目名称";
$lang->product->code      = "{$lang->productCommon}代号";
$lang->product->order     = '排序';
$lang->product->status    = '状态';
$lang->product->desc      = "{$lang->productCommon}描述";
$lang->product->PO        = "{$lang->productCommon}负责人";
$lang->product->QD        = '测试负责人';
$lang->product->RD        = '发布负责人';
$lang->product->acl       = '访问控制';
$lang->product->whitelist = '分组白名单';

//添加  2015-09-20
$lang->product->customer      = "客户名称";
$lang->product->project_name      = "测试项目";
$lang->product->quote      = "报价金额";
$lang->product->money      = "元";
$lang->product->quote_time      = "报价时间";
$lang->product->fare      = "目前进展";
$lang->product->person      = "负责人";
$lang->product->fares['0'] = "意向";
$lang->product->fares['1'] = "跟踪";
$lang->product->fares['2'] = "报价";
$lang->product->fares['3'] = "已知需求";
$lang->product->fares['3'] = "下单";
$lang->product->fares['3'] = "已收样品";
$lang->product->fares['3'] = "测试中";
$lang->product->fares['3'] = "已成交";
$lang->product->fares['3'] = "未成交";

$lang->product->moduleStory  = '按模块';
$lang->product->searchStory  = '搜索';
$lang->product->assignedToMe = '指派给我';
$lang->product->openedByMe   = '由我创建';
$lang->product->reviewedByMe = '由我评审';
$lang->product->closedByMe   = '由我关闭';
$lang->product->draftStory   = '草稿';
$lang->product->activeStory  = '激活';
$lang->product->changedStory = '已变更';
$lang->product->willClose    = '待关闭';
$lang->product->closedStory  = '已关闭';
$lang->product->unclosed     = '未关闭';

$lang->product->allStory    = '全部需求';
$lang->product->allProduct  = '全部' . $lang->productCommon;
$lang->product->allProductsOfProject = '全部关联' . $lang->productCommon;

$lang->product->statusList['']       = '';
$lang->product->statusList['normal'] = '正常';
$lang->product->statusList['closed'] = '结束';

$lang->product->aclList['open']    = "默认设置(有{$lang->productCommon}视图权限，即可访问)";
$lang->product->aclList['private'] = "私有{$lang->productCommon}(只有{$lang->projectCommon}团队成员才能访问)";
$lang->product->aclList['custom']  = '自定义白名单(团队成员和白名单的成员可以访问)';

$lang->product->storySummary = "本页共 <strong>%s</strong> 个需求，预计 <strong>%s</strong> 个工时，用例覆盖率<strong>%s</strong>。";
$lang->product->noMatched    = '找不到包含"%s"的' . $lang->productCommon;
