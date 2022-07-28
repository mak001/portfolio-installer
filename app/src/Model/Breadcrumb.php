<?php

namespace  Mak001\Portfolio\Model;

use SilverStripe\View\ViewableData;

/**
 * @property string Link
 * @property string MenuTitle
 * @property boolean Unlinked
 * @property int PageLevel
 */
class Breadcrumb extends ViewableData
{
    public function __construct($link, $menuTitle, $pageLevel)
    {
        $this->Link = $link;
        $this->MenuTitle = $menuTitle;
        $this->PageLevel = $pageLevel;
        $this->Unlinked = !$link;
        parent::__construct();
    }
}
