<?php
namespace HauptwegNebenwege\LmrSitepackage\ViewHelpers\Php;


use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ArraySumViewHelper extends AbstractViewHelper
{
    /**
     * Initialize arguments
     *
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument(
            'array',
            'array',
            'Array'
        );
    }


    /**
     * "Render" method - sorts a target list-type target. Either $array or
     * $objectStorage must be specified. If both are, ObjectStorage takes precedence.
     *
     * Returns the same type as $subject. Ignores NULL values which would be
     * OK to use in an f:for (empty loop as result)
     *
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return mixed
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        return array_sum($arguments['array']);
    }

}
