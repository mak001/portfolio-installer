<?php

namespace Mak001\Portfolio\Model;

use Mak001\Portfolio\Page\ResumePage;
use SilverStripe\ORM\DataObject;

/**
 * @property string $Title
 * @property string $CompanyName
 * @property string $CompanyURL
 * @property string $Location
 * @property string $StartDate
 * @property string $EndDate
 * @property string $Description
 *
 * @property int $ResumeID
 * @method ResumePage Resume()
 */
class Job extends DataObject
{

    /**
     * @var string
     * @config
     */
    private static $table_name = 'Job';

    /**
     * @var string[]
     * @config
     */
    private static $db = [
        'Title' => 'Varchar',
        'CompanyName' => 'Varchar',
        'CompanyURL' => 'Varchar',
        'Location' => 'Varchar',
        'StartDate' => 'Varchar',
        'EndDate' => 'Varchar',
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
        'CompanyName',
        'StartDate',
    ];
}
