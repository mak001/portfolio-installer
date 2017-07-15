<?php

use SilverStripe\ORM\DB;
use SilverStripe\Control\Director;

DB::setConfig([
    'type' => 'MySQLPDODatabase',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'database' => 'SS_ss4',
    'path' => ''
]);

if(Director::isDev()) {
    if($db = @$_GET['db']) {
        global $databaseConfig;
        if($db == 'sqlite3') $databaseConfig['type'] = 'SQLite3Database';
    }
}
