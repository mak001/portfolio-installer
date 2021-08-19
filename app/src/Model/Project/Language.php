<?php

namespace Mak001\Portfolio\Model\Project;

use Mak001\Portfolio\Page\Project;

class Language extends Uses
{
    /**
     * @var string
     * @config
     */
    private static $table_name = 'Language';

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
        return $this->getProjectHolder()->LanguageLink($this->URLSegment);
    }

    /**
     * @return string
     */
    public function getAbsoluteLURL(): string
    {
        return $this->getProjectHolder()->LanguageLink() . '/';
    }
}
