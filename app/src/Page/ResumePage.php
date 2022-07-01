<?php

namespace Mak001\Portfolio\Page;

use Mak001\Portfolio\Model\Job;
use Mak001\Portfolio\Model\School;
use Mak001\Portfolio\Model\Skill;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\ORM\HasManyList;

/**
 * @method HasManyList|School[] Schools
 * @method HasManyList|Skill[] Skills
 * @method HasManyList|Job[] Jobs
 */
class ResumePage extends \Page
{
    /**
     * @var string
     * @config
     */
    private static $table_name = 'ResumePage';

    /**
     * @var array
     * @config
     */
    private static $has_many = [
        'Schools' => School::class,
        'Skills' => Skill::class,
        'Jobs' => Job::class,
    ];

    /**
     * @inheritDoc
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function(FieldList $fields) {
            $schoolsField = GridField::create('Schools', 'Schools', $this->Schools())
                ->setConfig(GridFieldConfig_RelationEditor::create());
            $fields->addFieldToTab('Root.Schools', $schoolsField);

            $skillsField = GridField::create('Skills', 'Skills', $this->Skills())
                ->setConfig(GridFieldConfig_RelationEditor::create());
            $fields->addFieldToTab('Root.Skills', $skillsField);

            $jobsField = GridField::create('Jobs', 'Jobs', $this->Jobs())
                ->setConfig(GridFieldConfig_RelationEditor::create());
            $fields->addFieldToTab('Root.Jobs', $jobsField);
        });
        return parent::getCMSFields();
    }
}
