<?php

namespace Mak001\Portfolio\Model\Project;

class Language extends Uses
{
    /**
     * @return string
     */
    public function Link(): string
    {
        return $this->ProjectHolder()->LanguageLink($this->URLSegment);
    }

    /**
     * @return string
     */
    public function getAbsoluteLURL(): string
    {
        return $this->ProjectHolder()->LanguageLink() . '/';
    }
}
