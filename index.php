<?php

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    filter_var($url, FILTER_VALIDATE_URL);
    if ($url) {
        $info = file_get_contents($url);
        preg_match('|<div id="recommendations"(.*?)<\/div>|s', $info, $m);
        $result = $m[0];
    }
} else {
    $result  = '这里是推荐结果';
}

$title   = '豆瓣电影推荐测试';
$content = '粘贴豆瓣的电影链接，自动抓取推荐电影';

//导入自定义的模板类
require('mysmarty.php');

//实例化
$smarty = new MySmarty();

//向模板中放置信息
$smarty->assign('title', $title);
$smarty->assign('content', $content);
$smarty->assign('date', date('Y-m-d'));
$smarty->assign('result', $result);

//加载模板并输出
$smarty->display('templet.html');
