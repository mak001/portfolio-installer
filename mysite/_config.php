<?php

use SilverStripe\ORM\DB;

DB::setConfig([
    'type' => 'MySQLPDODatabase',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'database' => 'SS_ss4',
    'path' => ''
]);
