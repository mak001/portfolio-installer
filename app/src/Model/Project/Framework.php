<?php

namespace Mak001\Portfolio\Model\Project;

use Mak001\Portfolio\Page\Project;

class Framework extends Uses
{

    /**
     * @var string
     * @config
     */
    private static $table_name = 'Framework';

    /**
     * @var string[]
     * @config
     */
    private static $belongs_many_many = [
        'Projects' => Project::class,
    ];

    /**
     * @return string
     */
    public function Link(): string
    {
        return $this->getProjectHolder()->FrameworkLink($this->URLSegment);
    }

    /**
     * @return string
     */
    public function getAbsoluteLURL(): string
    {
        return $this->getProjectHolder()->FrameworkLink() . '/';
    }
}
