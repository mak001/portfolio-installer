<?php

namespace Mak001\Portfolio\Page;

use DNADesign\Elemental\Extensions\ElementalPageExtension;
use DNADesign\Elemental\Models\ElementContent;
use Mak001\Portfolio\Controller\ProjectController;
use Mak001\Portfolio\Model\Link;
use Mak001\Portfolio\Model\Project\Framework;
use Mak001\Portfolio\Model\Project\Language;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\HasManyList;
use SilverStripe\ORM\ManyManyList;

/**
 * @property string $Teaser
 * @property bool $MainImageHasLogo
 *
 * @property int $MainPhotoID
 * @method Image MainPhoto()
 *
 * @method HasManyList Sources()
 *
 * @method ManyManyList|Language[] Languages()
 * @method ManyManyList|Framework[] Frameworks()
 *
 * @mixin ElementalPageExtension
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
    private static $extensions = [
        ElementalPageExtension::class,
    ];

    /**
     * @var string[]
     * @config
     */
    private static $disallowed_elements = [
        ElementContent::class,
    ];

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
    private static $many_many = [
        'Languages' => Language::class,
        'Frameworks' => Framework::class,
        'Sources' => Link::class,
    ];

     /**
     * @var string
     * @config
     */
    private static $controller_name = ProjectController::class;


    /**
     * @inheritDoc
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->addFieldsToTab('Root.Main', [
                TextareaField::create('Teaser'),
                UploadField::create('MainPhoto'),
                CheckboxField::create('MainImageHasLogo'),
            ], 'Content');

            $languageField = GridField::create('Languages', 'Languages', $this->Languages())
                ->setConfig(GridFieldConfig_RelationEditor::create());
            $fields->addFieldToTab('Root.Languages', $languageField);

            $frameworkField = GridField::create('Frameworks', 'Frameworks', $this->Frameworks())
                ->setConfig(GridFieldConfig_RelationEditor::create());
            $fields->addFieldToTab('Root.Frameworks', $frameworkField);

            $sourcesField = GridField::create('Sources', 'Sources', $this->Sources())
                ->setConfig(GridFieldConfig_RelationEditor::create());
            $fields->addFieldToTab('Root.Sources', $sourcesField);
        });
        return parent::getCMSFields();
    }
}
