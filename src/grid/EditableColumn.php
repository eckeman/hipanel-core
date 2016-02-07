<?php

/*
 * HiPanel core package
 *
 * @link      https://hipanel.com/
 * @package   hipanel-core
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2014-2016, HiQDev (http://hiqdev.com/)
 */

namespace hipanel\grid;

use hiqdev\higrid\FeaturedColumnTrait;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Class EditableColumn.
 */
class EditableColumn extends \kartik\grid\EditableColumn
{
    use FeaturedColumnTrait {
        init as initFeatured;
    }

    /**
     * @var string|array action for form
     */
    public $action = null;

    /** {@inheritdoc} */
    public function init()
    {
        $this->initFeatured();
        $this->initEditableOptions();
    }

    public function initEditableOptions()
    {
        $old = $this->editableOptions;
        $this->editableOptions = function ($model, $key, $index) use ($old) {
            $pkey = reset($model->primaryKey());
            $params = Html::hiddenInput($model->formName() . "[$index][$pkey]", $key);
            $ops = $old instanceof \Closure ? call_user_func($old, $model, $key, $index) : $old;
            if (!is_array($ops)) {
                $ops = [];
            };
            $action = $this->action;
            if ($action) {
                $ops['formOptions']['action'] = is_array($action) ? Url::toRoute($action) : $action;
            };
            $old = $ops['beforeInput'];
            $ops['beforeInput'] = function ($form, $widget) use ($old, $params) {
                return $params . ($old instanceof \Closure ? call_user_func($old, $form, $widget) : $old);
            };
            return $ops;
        };
    }
}
