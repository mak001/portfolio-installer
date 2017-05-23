<?php

global $project;
$project = 'mysite';

global $database;
$database = '';
require_once('conf/ConfigureFromEnv.php');

// Set the site locale
i18n::set_locale('en_US');

if (Director::isDev()) {
    SS_Log::add_writer(new SS_LogFileWriter('../ss_error-warning.log', SS_Log::WARN, '<='));
    SS_Log::add_writer(new SS_LogFileWriter('../ss_error.log', SS_Log::ERR));
    SS_Log::add_writer(new SS_LogFileWriter('../ss_notices.log', SS_Log::NOTICE));
}

?>
