<?php
/**
 * @link    http://hiqdev.com/hipanel
 * @license http://hiqdev.com/hipanel/license
 * @copyright Copyright (c) 2015 HiQDev
 */

namespace hipanel\grid;

use hipanel\widgets\Box;

class BoxedGridView extends GridView
{
    static public $detailViewClass = 'hipanel\grid\BoxedDetailView';
    /**
     * To grid options, for example, you may add something like this for customize boxes:
     *  'boxOptions' => ['options' => ['class' => 'box-primary']],
     * @var array
     */
    public $boxOptions = [];

    public function run() {
        Box::begin($this->boxOptions);
            parent::run();
        Box::end();
    }
}