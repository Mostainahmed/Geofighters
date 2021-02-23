<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class EasyuiLayout
{
	
	function getEasyuiCss()
	{
		$array = array(
			'css/layout',
			'easyui/themes/sunny/easyui',
			'easyui/themes/icon',
			'css/font-awesome',
			'css/bootstrap-less',
			'css/override'
		);
		
		$data = '';
		
		foreach ($array as $value)
		{
			$data .= '<link rel="stylesheet" type="text/css" href="'.base_url().'assets/easyui/cis/base/'.$value.'.css" />'.PHP_EOL;
		}
		
		return $data;
	}
	
	
	function getEasyuiJs()
	{
		$array = array(
			'js/jquery.min',
			'easyui/jquery.easyui.min',
			'easyui/easyui-lang-en',
			'easyui/cellediting',
			'easyui/easyui-ext'
		);
		
		$data = '';
		
		foreach ($array as $value)
		{
			$data .= '<script type="text/javascript" src="'.base_url().'assets/easyui/cis/base/'.$value.'.js"></script>'.PHP_EOL;
		}
		
		$data .= ''.PHP_EOL;
		
		return $data;
	}
	
	
	function __get($var)
	{
		static $ZW;
		
		(is_object($ZW)) OR $ZW = get_instance();
		
		return $ZW->$var;
	}
	
}


/* End of file EasyuiLayout.php */
/* Location: ./app/libraries/EasyuiLayout.php */