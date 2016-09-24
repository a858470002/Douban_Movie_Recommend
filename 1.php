<?php
    $url = $_GET['url'];
    $info = file_get_contents($url);
    preg_match('|<div id="recommendations"(.*?)<\/div>|s',$info,$m);
    if($url==null){
        $result = '这里是推荐结果';
    }else{
        $result = $m[0];
    }

    $title = "豆瓣电影推荐测试";
    $content = "您好我叫梁天意，这是我的小样，使用了Smarty模板.如果要加CSS或Ajax，可能还需要点时间，\r我的原理是通过url获取豆瓣页面的推荐内容
    然后直接抓取过来就可以了";

    //导入自定义的模板类
    require("mysmarty.php");

    //实例化
    $smarty = new MySmarty();

    //向模板中放置信息
    $smarty->assign("title",$title); //将title变量信息以title名放入到模板中
    $smarty->assign("content",$content);
    $smarty->assign("date",date("Y-m-d"));
    $smarty->assign("result",$result);

    //加载模板并输出
    $smarty->display("1.html");
