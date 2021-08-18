<?php

namespace Mak001\Portfolio\Page;

use Mak001\Portfolio\Model\Project\Framework;
use Mak001\Portfolio\Model\Project\Language;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\ManyManyList;

/**
 * @property string Teaser
 * @property bool MainImageHasLogo
 *
 * @property int MainPhotoID
 * @method Image MainPhoto()
 *
 * @method ManyManyList|Language[] Languages()
 * @method ManyManyList|Framework[] Frameworks()
 */
class Project extends \Page
{
    /**
     * @var bool
     * @config
     */
    private static $can_be_root = false;

    /**
     * @var string
     * @config
     */
    private static $allowed_children = 'none';

    /**
     * @var string
     * @config
     */
    private static $table_name = 'Project';

    /**
     * @var string[]
     * @config
     */
    private static $db = [
        'Teaser' => 'Text',
        'MainImageHasLogo' => 'Boolean',
    ];

    /**
     * @var string[]
     * @config
     */
    private static $has_one = [
        'MainPhoto' => Image::class,
    ];

    /**
     * @var string[]
     * @config
     */
    private static $has_many = [
        'Sources' => 'ProjectSource',
    ];

    /**
     * @var string[]
     * @config
     */
    private static $many_many = [
        'Languages' => Language::class,
        'Frameworks' => Framework::class,
    ];
}
