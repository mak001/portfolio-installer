<?php

namespace Mak001\Portfolio\Model;

use Mak001\Portfolio\Page\ResumePage;
use \SilverStripe\ORM\DataObject;

/**
 * @property string Title
 * @property string Location
 * @property string Degree
 * @property string Graduated
 * @property string Honors
 *
 * @property int ResumeID
 * @method ResumePage Resume
 */
class School extends DataObject
{
    /**
     * @var string
     * @config
     */
    private static $table_name = 'School';

    /**
     * @var string[]
     * @config
     */
    private static $db = [
        'Title' => 'Varchar',
        'Location' => 'Varchar',
        'Degree' => 'Varchar',
        'Graduated' => 'Varchar',
        'Honors' => 'Varchar',
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
        'Degree',
    ];
}
