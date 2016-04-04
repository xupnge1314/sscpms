<?php /* Smarty version 2.6.26, created on 2016-02-25 19:21:35
         compiled from dou_msg.dwt */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if ($this->_tpl_vars['url']): ?>
<meta http-equiv="refresh" content="<?php echo $this->_tpl_vars['time']; ?>
; URL=<?php echo $this->_tpl_vars['url']; ?>
" />
<?php endif; ?>
<meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
" />
<meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
" />
<meta name="generator" content="DouPHP v1.3" />
<title><?php echo $this->_tpl_vars['page_title']; ?>
</title>
<link href="http://www.44ce.cn/qiye/theme/default/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://www.44ce.cn/qiye/theme/default/images/jquery.min.js"></script>
<script type="text/javascript" src="http://www.44ce.cn/qiye/theme/default/images/global.js"></script>
<?php if (! $this->_tpl_vars['url']): ?>
<script type="text/javascript">
<?php echo '
function go() {
    window.history.go( - 1);
}
setTimeout("go()", 3000);
'; ?>

</script>
<?php endif; ?>
</head>
<body>
<div id="wrapper"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <div id="douMsg" class="wrap">
  <dl>
   <dt><?php echo $this->_tpl_vars['text']; ?>
</dt>
   <dd><?php echo $this->_tpl_vars['cue']; ?>
<a href="<?php if ($this->_tpl_vars['url']): ?><?php echo $this->_tpl_vars['url']; ?>
<?php else: ?>javascript:history.go(-1);<?php endif; ?>"><?php echo $this->_tpl_vars['lang']['dou_msg_back']; ?>
</a></dd>
  </dl>
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