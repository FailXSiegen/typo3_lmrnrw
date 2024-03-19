<?php

namespace Failx\LmrNrw\Domain\Model;

/**
 * This file is part of the "news" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

/**
 * News model
 */
class NewsDefault extends \GeorgRinger\News\Domain\Model\NewsDefault
{
    /**
     * @var int
     */
    protected $textColumns;

    /**
     * Get text columns
     *
     * @return int
     */
    public function getTextColumns()
    {
        return (int)$this->textColumns;
    }

    /**
     * Set author's email
     *
     * @param int $textColumns
     */
    public function setTextColumns($textColumns)
    {
        $this->textColumns = $textColumns;
    }
}
