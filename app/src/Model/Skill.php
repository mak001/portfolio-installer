<?php

namespace Mak001\Portfolio\Model;

use Mak001\Portfolio\Page\ResumePage;
use SilverStripe\ORM\DataObject;

/**
 * @property string Title
 * @property string Description
 *
 * @property int ResumeID
 * @method ResumePage Resume
 */
class Skill extends DataObject
{

    /**
     * @var string
     * @config
     */
    private static $table_name = 'Skill';

    /**
     * @var string[]
     * @config
     */
    private static $db = [
        'Title' => 'Varchar',
        'Description' => 'HTMLText',
    ];

    /**
     * @var string[]
     * @config
     */
    private static $has_one = [
        'Resume' => ResumePage::class,
    ];

    /**
     * @var string[]
     * @config
     */
    private static $summary_fields = [
        'Title',
    ];
}
