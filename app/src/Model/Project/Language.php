<?php

namespace Mak001\Portfolio\Model\Project;

use Mak001\Portfolio\Page\Project;

/**
 * @method SilverStripe\ORM\ManyManyList|Project[] Projects()
 */
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
     * @inheritDoc
     */
    public function Link(): string
    {
        if ($this->getProjectHolder() == null) {
            return '';
        }
        return $this->getProjectHolder()->LanguageLink($this->URLSegment);
    }

    /**
     * @inheritDoc
     */
    public function getAbsoluteLURL(): string
    {
        if ($this->getProjectHolder() == null) {
            return '';
        }
        return $this->getProjectHolder()->LanguageLink() . '/';
    }
}
