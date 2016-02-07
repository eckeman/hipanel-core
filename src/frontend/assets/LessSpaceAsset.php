<?php

/*
 * HiPanel core package
 *
 * @link      https://hipanel.com/
 * @package   hipanel-core
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2014-2016, HiQDev (http://hiqdev.com/)
 */

namespace hipanel\frontend\assets;

use yii\web\AssetBundle;

class LessSpaceAsset extends AssetBundle
{
    public $sourcePath = '@bower/less-space';

    public $css = [
        'dist/less-space.min.css',
    ];
}
