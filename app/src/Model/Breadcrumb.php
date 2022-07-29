<?php

namespace  Mak001\Portfolio\Model;

use SilverStripe\View\ViewableData;

/**
 * @property string|boolean $Link
 * @property string $MenuTitle
 * @property boolean $Unlinked
 * @property int $PageLevel
 */
class Breadcrumb extends ViewableData
{
    /**
     * Creates a breadcrumb
     *
     * @param string|bool $link
     * @param string $menuTitle
     * @param int $pageLevel
     */
    public function __construct($link, $menuTitle, $pageLevel)
    {
        $this->Link = $link;
        $this->MenuTitle = $menuTitle;
        $this->PageLevel = $pageLevel;
        $this->Unlinked = !(boolean) $link;
        parent::__construct();
    }
}
