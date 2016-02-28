<?php
/**
 * DouPHP
 * --------------------------------------------------------------------------------------------------
 * 版权所有 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.douco.com
 * --------------------------------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在遵守授权协议前提下对程序代码进行修改和使用；不允许对程序代码以任何形式任何目的的再发布。
 * 授权协议：http://www.douco.com/license.html
 * --------------------------------------------------------------------------------------------------
 * Author: DouCo
 * Release Date: 2015-06-10
 */
define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');

// rec操作项的初始化
$rec = $check->is_rec($_REQUEST['rec']) ? $_REQUEST['rec'] : 'default';

// 图片上传
include_once (ROOT_PATH . 'include/upload.class.php');
$images_dir = 'images/download/'; // 文件上传路径，结尾加斜杠
$thumb_dir = ''; // 缩略图路径（相对于$images_dir） 结尾加斜杠，留空则跟$images_dir相同
$img = new Upload(ROOT_PATH . $images_dir, $thumb_dir); // 实例化类文件
if (!file_exists(ROOT_PATH . $images_dir)) {
    mkdir(ROOT_PATH . $images_dir, 0777);
}

// 赋值给模板
$smarty->assign('rec', $rec);
$smarty->assign('cur', 'download');

/**
 * +----------------------------------------------------------
 * 下载列表
 * +----------------------------------------------------------
 */
if ($rec == 'default') {
    $smarty->assign('ur_here', $_LANG['download']);
    $smarty->assign('action_link', array (
            'text' => $_LANG['download_add'],
            'href' => 'download.php?rec=add' 
    ));
    
    // 获取参数
    $cat_id = $check->is_number($_REQUEST['cat_id']) ? $_REQUEST['cat_id'] : 0;
    $keyword = isset($_REQUEST['keyword']) ? trim($_REQUEST['keyword']) : '';
    
    // 筛选条件
    $where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('download_category', $cat_id) . ')';
    if ($keyword) {
        $where = $where . " AND title LIKE '%$keyword%'";
        $get = '&keyword=' . $keyword;
    }
    
    // 分页
    $page = $check->is_number($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $page_url = 'download.php' . ($cat_id ? '?cat_id=' . $cat_id : '');
    $limit = $dou->pager('download', 15, $page, $page_url, $where, $get);
    
    $sql = "SELECT id, title, cat_id, image, size, add_time FROM " . $dou->table('download') . $where . " ORDER BY id DESC" . $limit;
    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {
        $cat_name = $dou->get_one("SELECT cat_name FROM " . $dou->table('download_category') . " WHERE cat_id = '$row[cat_id]'");
        $add_time = date("Y-m-d", $row['add_time']);
        
        $download_list[] = array (
                "id" => $row['id'],
                "cat_id" => $row['cat_id'],
                "cat_name" => $cat_name,
                "title" => $row['title'],
                "image" => $row['image'],
                "size" => $row['size'],
                "add_time" => $add_time 
        );
    }
    
    // 首页显示下载数量限制框
    for($i = 1; $i <= $_CFG['home_display_download']; $i++) {
        $sort_bg .= "<li><em></em></li>";
    }
    
    // 赋值给模板
    $smarty->assign('if_sort', $_SESSION['if_sort']);
    $smarty->assign('sort', get_sort_download());
    $smarty->assign('sort_bg', $sort_bg);
    $smarty->assign('cat_id', $cat_id);
    $smarty->assign('keyword', $keyword);
    $smarty->assign('download_category', $dou->get_category_nolevel('download_category'));
    $smarty->assign('download_list', $download_list);
    
    $smarty->display('download.htm');
} 

/**
 * +----------------------------------------------------------
 * 下载添加
 * +----------------------------------------------------------
 */
elseif ($rec == 'add') {
    $smarty->assign('ur_here', $_LANG['download_add']);
    $smarty->assign('action_link', array (
            'text' => $_LANG['download'],
            'href' => 'download.php' 
    ));
    
    // 格式化自定义参数，并存到数组$download，下载编辑页面中调用下载详情也是用数组$download，
    if ($_DEFINED['download']) {
        $defined = explode(',', $_DEFINED['download']);
        foreach ($defined as $row) {
            $defined_download .= $row . "：\n";
        }
        $download['defined'] = trim($defined_download);
        $download['defined_count'] = count(explode("\n", $download['defined'])) * 2;
    }
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('download_add'));
    
    // 赋值给模板
    $smarty->assign('form_action', 'insert');
    $smarty->assign('download_category', $dou->get_category_nolevel('download_category'));
    $smarty->assign('download', $download);
    
    $smarty->display('download.htm');
} 

elseif ($rec == 'insert') {
    if (empty($_POST['title']))
        $dou->dou_msg($_LANG['download_name'] . $_LANG['is_empty']);
    
    // 判断是否有上传图片/上传图片生成
    if ($_FILES['image']['name'] != "") {
        // 生成图片文件名
        $file_name = date('Ymd');
        for($i = 0; $i < 6; $i++) {
            $file_name .= chr(mt_rand(97, 122));
        }
        
        // 其中image指的是上传的文本域名称，$file_name指的是生成的图片文件名
        $upfile = $img->upload_image('image', $file_name);
        $file = $images_dir . $upfile;
        $link = $_SERVER['HTTP_HOST'].'/qiye/'.$file;
        $img->make_thumb($upfile, 100, 100); // 生成缩略图
    }
    //echo $link;exit;
    $add_time = time();
    
    // 格式化自定义参数
    $_POST['defined'] = str_replace("\r\n", ',', $_POST['defined']);
        
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'download_add');
    
    //$sql = "INSERT INTO " . $dou->table('download') . " (id, cat_id, title, defined, content, image, download_link, size ,keywords, add_time, description)" . " VALUES (NULL, '$_POST[cat_id]', '$_POST[title]', '$_POST[defined]', '$_POST[content]', '$file', '$_POST[download_link]', '$_POST[size]', '$_POST[keywords]', '$add_time', '$_POST[description]','$_POST[sign]')";
    $sql = "INSERT INTO " . $dou->table('download') . "( cat_id, title,  image, download_link, add_time,sign)" . " VALUES ( '$_POST[cat_id]', '$_POST[title]', '$file', '$link','$add_time', '$_POST[sign]')";
    $dou->query($sql);
    
    $dou->create_admin_log($_LANG['download_add'] . ': ' . $_POST['title']);
    $dou->dou_msg($_LANG['download_add_succes'], 'download.php');
} 

/**
 * +----------------------------------------------------------
 * 下载编辑
 * +----------------------------------------------------------
 */
elseif ($rec == 'edit') {
    $smarty->assign('ur_here', $_LANG['download_edit']);
    $smarty->assign('action_link', array (
            'text' => $_LANG['download'],
            'href' => 'download.php' 
    ));
    
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : '';
    
    $query = $dou->select($dou->table('download'), '*', '`id` = \'' . $id . '\'');
    $download = $dou->fetch_array($query);
    
    // 格式化自定义参数
    if ($_DEFINED['download'] || $download['defined']) {
        $defined = explode(',', $_DEFINED['download']);
        foreach ($defined as $row) {
            $defined_download .= $row . "：\n";
        }
        // 如果下载中已经写入自定义参数则调用已有的
        $download['defined'] = $download['defined'] ? str_replace(",", "\n", $download['defined']) : trim($defined_download);
        $download['defined_count'] = count(explode("\n", $download['defined'])) * 2;
    }
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('download_edit'));
    
    // 赋值给模板
    $smarty->assign('form_action', 'update');
    $smarty->assign('download_category', $dou->get_category_nolevel('download_category'));
    $smarty->assign('download', $download);
    
    $smarty->display('download.htm');
} 

elseif ($rec == 'update') {
    if (empty($_POST['title']))
        $dou->dou_msg($_LANG['download_name'] . $_LANG['is_empty']);
        
    // 上传图片生成
    if ($_FILES['image']['name'] != "") {
        // 获取图片文件名
        $basename = basename($_POST['image']);
        $file_name = substr($basename, 0, strrpos($basename, '.'));
        
        $upfile = $img->upload_image('image', "$file_name"); // 上传的文件域
        $file = $images_dir . $upfile;
        // $img->make_thumb($upfile, 100, 100); // 生成缩略图
        
        $up_file = ", image='$file'";
    }
    
    // 格式化自定义参数
    $_POST['defined'] = str_replace("\r\n", ',', $_POST['defined']);
    
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'download_edit');
    
    $sql = "UPDATE " . $dou->table('download') . " SET cat_id = '$_POST[cat_id]', title = '$_POST[title]', defined = '$_POST[defined]' ,content = '$_POST[content]'" . $up_file . ", download_link = '$_POST[download_link]', size = '$_POST[size]', keywords = '$_POST[keywords]', description = '$_POST[description]' WHERE id = '$_POST[id]'";
    $dou->query($sql);
    
    $dou->create_admin_log($_LANG['download_edit'] . ': ' . $_POST['title']);
    $dou->dou_msg($_LANG['download_edit_succes'], 'download.php');
} 

/**
 * +----------------------------------------------------------
 * 首页商品筛选
 * +----------------------------------------------------------
 */
elseif ($rec == 'sort') {
    $_SESSION['if_sort'] = $_SESSION['if_sort'] ? false : true;
    
    // 跳转到上一页面
    $dou->dou_header($_SERVER['HTTP_REFERER']);
} 

/**
 * +----------------------------------------------------------
 * 设为首页显示商品
 * +----------------------------------------------------------
 */
elseif ($rec == 'set_sort') {
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'download.php');
    
    $max_sort = $dou->get_one("SELECT sort FROM " . $dou->table('download') . " ORDER BY sort DESC");
    $new_sort = $max_sort + 1;
    $dou->query("UPDATE " . $dou->table('download') . " SET sort = '$new_sort' WHERE id = '$id'");
    
    $dou->dou_header($_SERVER['HTTP_REFERER']);
} 

/**
 * +----------------------------------------------------------
 * 取消首页显示商品
 * +----------------------------------------------------------
 */
elseif ($rec == 'del_sort') {
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'download.php');
    
    $dou->query("UPDATE " . $dou->table('download') . " SET sort = '' WHERE id = '$id'");
    
    $dou->dou_header($_SERVER['HTTP_REFERER']);
} 

/**
 * +----------------------------------------------------------
 * 下载删除
 * +----------------------------------------------------------
 */
elseif ($rec == 'del') {
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'download.php');
    $title = $dou->get_one("SELECT title FROM " . $dou->table('download') . " WHERE id = '$id'");
    
    if (isset($_POST['confirm']) ? $_POST['confirm'] : '') {
        // 删除相应商品图片
        $image = $dou->get_one("SELECT image FROM " . $dou->table('download') . " WHERE id = '$id'");
        $dou->del_image($image);
        
        $dou->create_admin_log($_LANG['download_del'] . ': ' . $title);
        $dou->delete($dou->table('download'), "id = $id", 'download.php');
    } else {
        $_LANG['del_check'] = preg_replace('/d%/Ums', $title, $_LANG['del_check']);
        $dou->dou_msg($_LANG['del_check'], 'download.php', '', '30', "download.php?rec=del&id=$id");
    }
} 

/**
 * +----------------------------------------------------------
 * 批量操作选择
 * +----------------------------------------------------------
 */
elseif ($rec == 'action') {
    if (is_array($_POST['checkbox'])) {
        if ($_POST['action'] == 'del_all') {
            // 批量下载删除
            $dou->del_all('download', $_POST['checkbox'], 'id', 'image');
        } elseif ($_POST['action'] == 'category_move') {
            // 批量移动分类
            $dou->category_move('download', $_POST['checkbox'], $_POST['new_cat_id']);
        } else {
            $dou->dou_msg($_LANG['select_empty']);
        }
    } else {
        $dou->dou_msg($_LANG['download_select_empty']);
    }
}

/**
 * +----------------------------------------------------------
 * 获取首页显示下载
 * +----------------------------------------------------------
 */
function get_sort_download() {
    $limit = $GLOBALS['_DISPLAY']['home_download'] ? ' LIMIT ' . $GLOBALS['_DISPLAY']['home_download'] : '';
    $sql = "SELECT id, title FROM " . $GLOBALS['dou']->table('download') . " WHERE sort > 0 ORDER BY sort DESC" . $limit;
    $query = $GLOBALS['dou']->query($sql);
    while ($row = $GLOBALS['dou']->fetch_array($query)) {
        $sort[] = array (
                "id" => $row['id'],
                "title" => $row['title'] 
        );
    }
    
    return $sort;
}
?>