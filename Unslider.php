<?php
namespace dd3v\unslider;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;
use dd3v\unslider\UnsliderAsset;

/**
 * Class Unslider
 * @package app\components\unslider
 */

class Unslider extends Widget
{
    public $selector = 'banner';
    public $slides = [];
    public $options = [
        'dots' => true,
        'keys' => true,
        'fluid' => true
    ];

    public function init()
    {
        parent::init();
    }

    public function run()
    {

        $this->registerAssets();

        $slider = Html::beginTag('div', ['class' => $this->selector]);
        $slider .= Html::beginTag('ul');
        foreach ($this->slides as $slide) {
            $slider .= '<li style="background-image: url(' . $slide['img'] . ')">';
            $slider .= Html::beginTag('div', ['class' => 'inner']);
            $slider .= isset($slide['title']) ? Html::tag('h1', $slide['title']) : null;
            $slider .= isset($slide['body']) ? Html::tag('p', $slide['body']) : null;
            $slider .= isset($slide['button']) ? Html::a($slide['button']['title'], '', ['class' => 'btn']) : null;
            $slider .= Html::endTag('div');
            $slider .= '</li>';
        }
        $slider .= Html::endTag('ul');
        $slider .= Html::endTag('div');


        return $slider;
    }

    protected function registerAssets()
    {

        $view = $this->getView();
        UnsliderAsset::register($view);
        $options = Json::encode($this->options);

        $view->registerJs("jQuery('.$this->selector').unslider({dots:true, keys:true, fluid: true});");

    }
}