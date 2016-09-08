<?php
namespace app\index\controller;

use think\Request;

//use think\Controller;
/**
 *	获取Request请求对象的4种方法
 */
class Index /*extends Controller*/
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }
	
	/*
	public function hello($name = 'World'){
		return 'Hello,' . $name . '!';
	}
	
	public function say($name='World', $city=''){
		return 'Hello,' . $name . '! You come from ' . $city . '.';
	}*/
	
	//-- 1. 不继承Controller类访问Request的方法 （传统的访问方法）
	/*
	public function hello($name = 'World'){
		$request = Request::instance();
		
		//-- 获取当前URL地址  不含域名
		echo 'url: ' . $request->url() . '<br/>';
		
		return 'Hello,' . $name . '!';
	}*/
	
	
	//-- 2. 继承think\Controller类访问request对象的方法
	/*
	public function hello($name = 'World'){
		//-- 获取当前URL地址，不含域名
		
		echo 'url: ' . $this->request->url() . '<br/>';
		return 'Hello,' . $name . '!';
	}*/
	
	//-- 3. 自动注入请求对象访问request对象的方法，类似于Spring mvc
	/*
	public function hello(Request $request, $name = 'World'){
		//-- 获取当前URL地址， 不含域名
		echo 'url: ' . $request->url() . '<br/>';
		return 'Hello,' . $name . '!';
	}*/
	
	//-- 4. 使用助手函数访问request对象
	public function hello($name = 'World'){
		echo 'url: ' . request()->url() . '<br/>';
		return 'Hello,' . $name . '!';
	}
	
}
