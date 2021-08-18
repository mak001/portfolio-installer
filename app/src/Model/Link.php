<?php

namespace Mak001\Portfolio\Model;

use SilverStripe\ORM\DataObject;

/**
 * @property string Title
 * @property string Icon
 * @property string URL
 */
class Link extends DataObject
{
    /**
     * @var string
     * @config
     */
    private static $table_name = 'Link';

    /**
     * @var string[]
     * @config
     */
    private static $db = [
        'Title' => 'Varchar',
        'Icon' => 'Varchar',
        'URL' => 'Varchar',
    ];
}
