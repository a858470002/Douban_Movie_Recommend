<?php
//自定义模板类

class MySmarty
{
    private $data = array();
    
    //放置信息
    public function assign($key,$value)
    {
        $this->data[$key] = $value;
    }
    
    //加载模板并信息置换
    public function display($tpl)
    {
        //读出模板文件信息
        $info = file_get_contents($tpl);
        //遍历对象的属性并置换
        foreach($this->data as $k=>$v){
            $info = str_replace('{$'.$k.'}',$v,$info);
        }
        //输出
        file_put_contents("./cache/c_{$tpl}",$info); //静态缓存
        echo $info;
    }
}