<?php /* Smarty version 2.6.26, created on 2016-02-14 11:13:07
         compiled from download_category.dwt */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
" />
<meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
" />
<meta name="generator" content="DouPHP v1.3" />
<title><?php echo $this->_tpl_vars['page_title']; ?>
</title>
<link href="http://localhost/qiye/theme/default/style.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/qiye/theme/default/download.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://localhost/qiye/theme/default/images/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost/qiye/theme/default/images/global.js"></script>
</head>
<body>
<div id="wrapper"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <div class="wrap mb">
  <div id="pageLeft"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/download_tree.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div>
  <div id="pageIn"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/ur_here.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   <div id="downloadList"> 
    <?php $_from = $this->_tpl_vars['download_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['download'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['download']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['download']):
        $this->_foreach['download']['iteration']++;
?> 
    <dl<?php if ($this->_foreach['download']['iteration'] % 4 == 0): ?> class="last"<?php endif; ?>>
     <dt><a href="<?php echo $this->_tpl_vars['download']['url']; ?>
"><?php echo $this->_tpl_vars['download']['title']; ?>
</a></dt>
     <dd><?php echo $this->_tpl_vars['lang']['add_time']; ?>
：<?php echo $this->_tpl_vars['download']['add_time']; ?>
 <?php echo $this->_tpl_vars['lang']['click']; ?>
：<?php echo $this->_tpl_vars['download']['click']; ?>
</dd>
    </dl>
    <?php endforeach; endif; unset($_from); ?> 
   </div>
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/pager.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div>
  <div class="clear"></div>
 </div>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/online_service.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div>
</body>
</html>