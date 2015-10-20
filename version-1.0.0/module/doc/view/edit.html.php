<?php
/**
 * The edit view of doc module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Jia Fu <fujia@cnezsoft.com>
 * @package     doc
 * @version     $Id: edit.html.php 975 2010-07-29 03:30:25Z jajacn@126.com $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php js::import($jsRoot . 'misc/date.js');?>
<script language='javascript'>
var type = '<?php echo $doc->type;?>';
$(document).ready(function()
{
    setType(type);
});
</script>
<div class='container mw-1400px'>
  <div id='titlebar'>
    <div class='heading'>
      <span class='prefix'><?php echo html::icon($lang->icons['doc']);?> <strong><?php echo $doc->id;?></strong></span>
      <strong><?php echo html::a($this->createLink('doc', 'view', "docID=$doc->id"), $doc->title);?></strong>
      <small class='text-muted'> <?php echo html::icon($lang->icons['edit']) . ' ' . $lang->doc->edit;?></small>
    </div>
  </div>
  <form class='form-condensed' method='post' enctype='multipart/form-data' target='hiddenwin' id='dataform'>
    <table class='table table-form'> <!-- 
      <tr>
        <th class='w-80px'><?php echo $lang->doc->lib;?></th>
        <td class='w-p25-f'><?php echo html::select('lib', $libs, $doc->lib, "class='form-control chosen' onchange='loadModule(this.value);changeByLib(this.value)'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-80px'><?php echo $lang->doc->project;?></th>
        <td class='w-p25-f'><?php echo html::select('project', $projects, $doc->project, "class='form-control chosen' onchange=loadProducts(this.value)");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-80px'><?php echo $lang->doc->product;?></th>
        <td class='w-p25-f'><?php echo html::select('product', $products, $doc->product, "class='form-control chosen'");?></td><td></td>
      </tr>  
      <tr>
        <th class='w-80px'><?php echo $lang->doc->module;?></th>
        <td class='w-p25-f'><?php echo html::select('module', $moduleOptionMenu, $doc->module, "class='form-control chosen'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->doc->type;?></th>
        <td colspan='2'><?php echo $lang->doc->types[$doc->type];?></td>
      </tr>
      <tr>
        <th><?php echo $lang->doc->title;?></th>
        <td colspan='2'><?php echo html::input('title', $doc->title, "class='form-control'");?></td>
      </tr>    -->
      
      <tr >
        <th><?php echo $lang->doc->title;?></th>
        <td colspan='2'><?php echo html::input('title', $doc->title, "class='form-control'");?></td>
      </tr>  
      <tr >
        <th><?php echo $lang->doc->organization;?></th>
        <td colspan='2'><?php echo html::input('organization', $doc->organization, "class='form-control'");?></td>
      </tr>  
      <tr >
        <th><?php echo $lang->doc->money;?></th>
        <td colspan='2'>
        <div class='input-group'>
          <?php echo html::input('money', $doc->money, "class='form-control'");?>
            <span class='input-group-addon'><?php echo $lang->doc->moneys;?></span>
          </div>
        </td>
      </tr>  
      <tr  id='contentBox' >
        <th><?php echo $lang->doc->day;?></th>
        <td>
          <div class='input-group'>
          <?php echo html::input('day', $doc->day, "class='form-control'");?>
            <span class='input-group-addon'><?php echo $lang->doc->days;?></span>
          </div>
        </td>
      </tr>  
      <tr>
        <th><?php echo $lang->doc->info;?></th>
        <td colspan='2'><?php echo html::textarea('info', $doc->info, "rows='8' class='form-control'");?></td>
      </tr>
      <tr >
        <th><?php echo $lang->doc->remark;?></th>
        <td colspan='2'><?php echo html::textarea('remark', $doc->remark, "rows='8' class='form-control'");?></td>
      </tr>  
      <tr >
        <th><?php echo $lang->doc->add_user;?></th>
        <td colspan='2'><?php echo html::input('add_user', $doc->add_user, "class='form-control'");?></td>
      </tr>  
      <tr >
        <th><?php echo $lang->doc->add_time;?></th>
        <td colspan='2'><?php echo html::input('add_time',$doc->add_time, "class='form-control w-100px form-date' onchange='computeWorkDays()' placeholder='" . $lang->doc->add_time . "'");?></td>
      </tr>  
      
      <tr>
        <th><?php echo $lang->doc->keywords;?></th>
        <td colspan='2'><?php echo html::input('keywords', $doc->keywords, "class='form-control'");?></td>
      </tr>  
      <tr id='urlBox' class='hide'>
        <th><?php echo $lang->doc->url;?></th>
        <td colspan='2'><?php echo html::input('url', urldecode($doc->url), "class='form-control'");?></td>
      </tr>  
      <tr id='contentBox' class='hide'>
        <th><?php echo $lang->doc->content;?></th>
        <td colspan='2'><?php echo html::textarea('content', htmlspecialchars($doc->content), "class='form-control' rows='8' style='width:90%; height:200px'");?></td>
      </tr>  
      <tr  class='hide'>
        <th><?php echo $lang->doc->digest;?></th>
        <td colspan='2'><?php echo html::textarea('digest', htmlspecialchars($doc->digest), "class='form-control' rows=3");?></td>
      </tr>  
      <tr  class='hide'>
        <th><?php echo $lang->doc->comment;?></th>
        <td colspan='2'><?php echo html::textarea('comment','', "class='form-control' rows=3");?></td>
      </tr> 
      <tr id='fileBox' class='hide'>
        <th><?php echo $lang->doc->files;?></th>
        <td colspan='2'><?php echo $this->fetch('file', 'buildform');?></td>
      </tr>
      <tr>
        <td></td>
        <td colspan='2'>
          <?php echo html::submitButton() . html::backButton();?>
        </td>
      </tr>
    </table>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
