<?php
/**
 * HiPanel core package.
 *
 * @link      https://hipanel.com/
 * @package   hipanel-core
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2014-2017, HiQDev (http://hiqdev.com/)
 */

namespace hipanel\widgets\filePreview\types;

use hipanel\widgets\filePreview\Dimensions;
use hipanel\widgets\filePreview\DimensionsInterface;

interface PreviewGeneratorInterface
{
    /**
     * PreviewGeneratorInterface constructor.
     * @param string $path to the file that should be previewer
     */
    public function __construct($path);

    /**
     * @param DimensionsInterface $dimensions
     * @return string
     */
    public function asBytes(DimensionsInterface $dimensions);

    /**
     * @return string
     */
    public function getContentType();

    /**
     * @return int
     */
    public function getWidth();

    /**
     * @return int
     */
    public function getHeight();

    /**
     * @return Dimensions
     */
    public function getDimensions();
}
