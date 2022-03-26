<?php

use SilverStripe\ORM\DataList;
use SilverStripe\Security\PasswordValidator;
use SilverStripe\Security\Member;
use Wilr\GoogleSitemaps\GoogleSitemap;
use Mak001\Portfolio\Model\Project\Framework;
use Mak001\Portfolio\Model\Project\Language;
use Mak001\Portfolio\Page\ProjectHolder;
use SilverStripe\Core\Config\Config;
use SilverStripe\ORM\DB;

// remove PasswordValidator for SilverStripe 5.0
$validator = PasswordValidator::create();
// Settings are registered via Injector configuration - see passwords.yml in framework
Member::set_password_validator($validator);

GoogleSitemap::register_dataobject(Framework::class);
GoogleSitemap::register_dataobject(Language::class);

$tables = DB::table_list();
if (count($tables) && array_key_exists(Config::inst()->get(ProjectHolder::class, 'table_name'), $tables)) {
    /** @var DataList|ProjectHolder[] $projectHolder */
    $projectHolders = ProjectHolder::get();
    $routes = [];
    foreach ($projectHolders as $holder) {
        $routes[] = $holder->LanguageLink();
        $routes[] = $holder->FrameworkLink();
    }
    GoogleSitemap::register_routes($routes);
}
