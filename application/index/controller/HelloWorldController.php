<?php
namespace app\index\controller;

class HelloWorldController{
	public function index($name = 'World'){
		return 'Hello,' . $name . '!';
	}
}