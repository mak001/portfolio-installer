<?php

namespace Mak001\Portfolio\Model\Project;

use Mak001\Portfolio\Page\Project;
use SilverStripe\ORM\ManyManyList;

/**
 * @method ManyManyList|Project[] Projects()
 */
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
        if ($this->getProjectHolder() == null) {
            return '';
        }
        return $this->getProjectHolder()->FrameworkLink($this->URLSegment);
    }

    /**
     * @return string
     */
    public function getAbsoluteLURL(): string
    {
        if ($this->getProjectHolder() == null) {
            return '';
        }
        return $this->getProjectHolder()->FrameworkLink() . '/';
    }
}
