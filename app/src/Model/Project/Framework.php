<?php

namespace Mak001\Portfolio\Model\Project;

class Framework extends Uses
{

    /**
     * @var string
     * @config
     */
    private static $table_name = 'Framework';

    /**
     * @return string
     */
    public function Link(): string
    {
        return $this->ProjectHolder()->FrameworkLink($this->URLSegment);
    }

    /**
     * @return string
     */
    public function getAbsoluteLURL(): string
    {
        return $this->ProjectHolder()->FrameworkLink() . '/';
    }
}
