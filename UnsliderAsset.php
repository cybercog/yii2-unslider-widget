<?php
namespace dd3v\unslider;

use yii\web\AssetBundle;

class UnsliderAsset extends AssetBundle
{
	public $sourcePath = '@app/components/unslider/assets/';
	public $baseUrl = '';
	public $css = ['site/style.css'];
	public $js = ['src/unslider.js'];
	public $depends = ['yii\web\JqueryAsset'];
} 
?>