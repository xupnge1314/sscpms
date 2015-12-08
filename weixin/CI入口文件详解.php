<?php
/*
 * 
 * CI 入口文件解析
 *   
 */

// 在入口文件可以配置你的报错等级，开发环境-development，测试环境-test，生产环境-production，当然如果有需要，也可以在此处自定义选项来控制需要的报错选项。
define('ENVIRONMENT', 'development');
if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            break;
        case 'testing':
        case 'production':
            error_reporting(0);
            break;
        default:
            exit('The application environment is not set correctly.');
    }
}


$system_path = 'system';//CI的系统文件夹
$application_folder = 'application';//自定义应用目录，没有斜线

// 接下来讲讲，在入口文件当中，指定访问的目录、控制器、方法

$routing['directory'] = '';//指定目录
$routing['controller'] = '';//指定控制器
$routing['function']	= '';//指定的方法

// 此操作可以指定访问的地方，举个例子来说，比方说 前台应用index，后台应用admin是分开的，前台入口是index.php 那么可以在directory当中指定前台应用的目录如index，那么在这个入口当中，只能访问index下的，其他admin是不能访问的。

$assign_to_config['name_of_config_item']//需要设定一个数组


// 这个是用来指定自己的配置文件，或者来覆盖config.php值的一个设置，比较有用。

if (defined('STDIN'){
    chdir(dirname(__FILE__));//用来指定工作环境是当前目录
}
//存在这个目录，尾部斜杠
if (realpath($system_path) !== FALSE) {
    $system_path = realpath($system_path).'/';
}
//确保尾部加斜杠
$system_path = rtrim($system_path, '/').'/';
//如果不存在这个目录，或者不识别，报错
if ( ! is_dir($system_path)) {
    exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}

define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));//这个入口文件的名字
define('EXT', '.php');//php后缀名
define('BASEPATH', str_replace("\\", "/", $system_path));//system的绝对路径，/结尾
define('FCPATH', str_replace(SELF, '', __FILE__));//index.php所在的绝对路径，/结尾
define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));//system这个目录名字
if (is_dir($application_folder)) {
    //存在应用目录，则定义
    define('APPPATH', $application_folder.'/');
} else {
    //不存在，就从system目录来找
    if ( ! is_dir(BASEPATH.$application_folder.'/')) {
        //system没有，则exit报错
        exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
    }
    //存在，定义system/application这个目录是APPPATH
    define('APPPATH', BASEPATH.$application_folder.'/');
}
require_once BASEPATH.'core/CodeIgniter.php';//引入ci核心文件
