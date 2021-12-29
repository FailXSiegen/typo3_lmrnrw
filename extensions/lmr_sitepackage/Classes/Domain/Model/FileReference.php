<?php

namespace HauptwegNebenwege\LmrSitepackage\Domain\Model;

use HauptwegNebenwege\LmrSitepackage\Enumeration\ImageStyleEnumeration;

class FileReference
{

    /**
     * @var string
     */
    protected $imageStyle;

    /**
     * @return string
     */
    public function getImageStyle()
    {
        if (empty($this->imageStyle)) {
            return ImageStyleEnumeration::DEFAULT;
        }
        return $this->imageStyle;
    }

    /**
     * @param string $imageStyle
     */
    public function setImageStyle(string $imageStyle): void
    {
        $this->imageStyle = $imageStyle;
    }

}
