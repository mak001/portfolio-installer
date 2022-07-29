<?php

namespace Mak001\Portfolio\Controller;

use Mak001\Portfolio\Model\Project\Framework;
use Mak001\Portfolio\Model\Project\Language;
use Mak001\Portfolio\Page\Project;
use Mak001\Portfolio\Page\ProjectHolder;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\DataList;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\View\Requirements;
use SilverStripe\View\ViewableData_Customised;

/**
 * @mixin ProjectHolder
 */
class ProjectHolderController extends \PageController
{

    /**
     * @var string[]
     * @config
     */
    private static $allowed_actions = [
        'languages',
        'frameworks',
    ];

    /**
     * @inheritDoc
     */
    protected function init(): void
    {
        parent::init();

        Requirements::themedCSS("dist/css/project_holder.css", null, ['preload' => true]);
    }

    /**
     * @param HTTPRequest $request
     * @return ViewableData_Customised
     */
    public function languages(HTTPRequest $request): ViewableData_Customised
    {
        if ($language = $this->getLanguage()) {
            return $this->customise([
                'Title' => $language->Title,
            ]);
        }
        return $this->customise([
            'Title' => 'Languages',
        ]);
    }

    /**
     * @param HTTPRequest|null $request
     * @return Language|null
     */
    public function getLanguage(HTTPRequest $request = null): ?Language
    {
        if ($request === null) {
            $request = $this->getRequest();
        }

        if (!$request->param('ID')) {
            return null;
        }

        return Language::get()->find('URLSegment', $request->param('ID'));
    }

    /**
     * @param HTTPRequest $request
     * @return ViewableData_Customised
     */
    public function frameworks(HTTPRequest $request): ViewableData_Customised
    {
        if ($framework = $this->getFramework()) {
            return $this->customise([
                'Title' => $framework->Title,
            ]);
        }
        return $this->customise([
            'Title' => 'Frameworks',
        ]);
    }

    /**
     * @param HTTPRequest|null $request
     * @return Framework|null
     */
    public function getFramework(HTTPRequest $request = null): ?Framework
    {
        if ($request === null) {
            $request = $this->getRequest();
        }

        if (!$request->param('ID')) {
            return null;
        }

        return Framework::get()->find('URLSegment', $request->param('ID'));
    }

    /**
     * @return DataList
     */
    public function getProjects(): DataList
    {
        $filter = [
            'ParentID' => $this->ID,
        ];

        if ($language = $this->getLanguage()) {
            $filter['Languages.ID'] = $language->ID;
        }

        if ($framework = $this->getFramework()) {
            $filter['Frameworks.ID'] = $framework->ID;
        }

        return Project::get()->filter($filter);
    }

    /**
     * @param int $num
     * @return PaginatedList
     */
    public function getPaginatedProjects(int $num = 6): PaginatedList
    {
        $filter = [
            'ParentID' => $this->ID,
        ];

        if ($language = $this->getLanguage()) {
            $filter['Languages.ID'] = $language->ID;
        }

        if ($framework = $this->getFramework()) {
            $filter['Frameworks.ID'] = $framework->ID;
        }

        return PaginatedList::create($this->getProjects(), $this->getRequest())
            ->setPageLength($num);
    }

    /**
     * @return DataList
     */
    public function getLanguages(): DataList
    {
        return Language::get()->filter([
            'Projects.ID' => $this->Children()->column('ID'),
        ]);
    }

    /**
     * @param int $num
     * @return PaginatedList|null
     */
    public function getPaginatedLanguages(int $num = 12): ?PaginatedList
    {
        return PaginatedList::create($this->getLanguages(), $this->getRequest())
            ->setPageLength($num);
    }

    /**
     * @return DataList
     */
    public function getFrameworks(): DataList
    {
        return Framework::get()->filter([
            'Projects.ID' => $this->Children()->column('ID'),
        ]);
    }

    /**
     * @param int $num
     * @return PaginatedList|null
     */
    public function getPaginatedFrameworks(int $num = 12): ?PaginatedList
    {
        return PaginatedList::create($this->getFrameworks(), $this->getRequest())
            ->setPageLength($num);
    }

    /**
     * If the request should be shown in a table
     *
     * @param HTTPRequest|null $request
     * @return bool
     */
    public function getIsTable(HTTPRequest $request = null): bool
    {
        if ($request == null) {
            $request = $this->getRequest();
        }

        return $request->getVar('table') == true;
    }
}
