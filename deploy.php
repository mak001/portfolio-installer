<?php

namespace Deployer;

require 'recipe/silverstripe.php';

set('application', 'portfolio');

// Shared files/dirs between deploys
set('shared_files', [
    '_ss_environment.php',
    'sspak.phar',
    'silverstripe.log',
]);

set('shared_dirs', [
    'assets',
    'sspaks',
    'silverstripe-cache',
]);

// Writable dirs by web server
set('writable_dirs', []);

host('67.207.94.179')
    ->stage('production')
    ->set('deploy_path', '/var/www')
    ->user('portfolio')
    ->set('branch', 'master')
    ->set('bin/composer', 'composer')
    ->set('bin/php', 'php');

task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'silverstripe:sspak',
    'deploy:release',
    'deploy:update_code',
    'gulp',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'silverstripe:buildflush',
    'deploy:clear_paths',
    'deploy:symlink',
    'serverpilot:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
])->desc('Deploy your project');

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Serverpilot symlink to webroot task
task('serverpilot:symlink', function () {
    run("ln -s {{deploy_path}}/current {{deploy_path}}/html");
    write('Symlink created!');
})->desc('Create symlink to public webroot');

// Backup existing data via SSPAK
task('silverstripe:sspak', function () {
    // phpcs:ignore
    run("sspak save {{deploy_path}}/current/ {{deploy_path}}/current/sspaks/{{application}}-{{stage}}-" . strtotime('now') . ".sspak");
    write('SSPAK created!');
})->desc('Backup existing data via SSPAK');

task('gulp', function () {
    run("cd {{deploy_path}}/themes/portfolio-openprops");
    run("npm i");
    run("gulp build -prod");
    run("rm -rf node_modules");
    run("cd {{deploy_path}}");
    write('Built CSS and JavaScript');
})->desc('Builds CSS and JavaScript and then removes node_modules');
