<?php

/*
 * HiPanel core package
 *
 * @link      https://hipanel.com/
 * @package   hipanel-core
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2014-2016, HiQDev (http://hiqdev.com/)
 */

namespace hipanel\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Label widget displays bootstrap colored label.
 *
 * Usage:
 * Label::widget([
 *      'color' => 'warning',
 *      'label' => \Yii::t('app', 'Some label'),
 *      'tag'   => 'span',
 * ]);
 *
 * @var string
 */
class Label extends \yii\base\Widget
{
    /**
     * @var string
     */
    public $label;

    public $default = 'default';

    public $noneOptions = [];

    public $labelOptions = [];

    /**
     * Available types: label, text.
     */
    public $type = 'label';

    /**
     * @var string
     * Because $class is used by Yii::createObject
     */
    public $_color;

    /**
     * @var string
     */
    public $tag = 'span';

    public static function widget($config = [])
    {
        return parent::widget($config);
    }

    public function init()
    {
        $this->noneOptions = ArrayHelper::merge(['class' => 'text-muted'], $this->noneOptions);
        $this->labelOptions = ArrayHelper::merge(['class' => $this->buildClass()], $this->labelOptions);
    }

    public function run()
    {
        $this->renderLabel();
    }

    protected function renderLabel()
    {
        $color = $this->getColor();
        if ($color === 'none') {
            echo Html::tag('b', $this->label, $this->noneOptions);
        } else {
            echo Html::tag($this->tag, $this->label, $this->labelOptions);
        }
    }

    public function buildClass()
    {
        return $this->getCssClass() . ' ' . $this->getPrefix() . '-' . $this->getColor();
    }

    public function setColor($color)
    {
        $this->_color = $color;
    }

    public function getColor()
    {
        return $this->_color ?: $this->default;
    }

    public function getCssClass()
    {
        return $this->type === 'text' ? 'text-bold' : $this->type;
    }

    public function getPrefix()
    {
        return $this->type;
    }
}
