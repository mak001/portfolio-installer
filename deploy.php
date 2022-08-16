<?php

namespace Deployer;

require 'recipe/silverstripe.php';

set('application', 'portfolio');

set('repository', 'https://github.com/mak001/portfolio-installer.git');

// Shared files/dirs between deploys
set('shared_files', [
    '.env',
    'silverstripe.log',
]);

set('shared_dirs', [
    'public/assets',
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
    //'silverstripe:sspak',
    'deploy:release',
    'deploy:update_code',
    'gulp',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'silverstripe:buildflush',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
])->desc('Deploy your project');

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Backup existing data via SSPAK
task('silverstripe:sspak', function () {
    // phpcs:ignore
    run("sspak save {{deploy_path}}/current/ {{deploy_path}}/current/sspaks/{{application}}-{{stage}}-" . strtotime('now') . ".sspak");
    write('SSPAK created!');
})->desc('Backup existing data via SSPAK');

task('gulp', function () {
    cd("{{release_path}}/themes/portfolio-openprops");
    run("npm ci");
    run("gulp build -prod");
    run("rm -rf node_modules");
    write('Built CSS and JavaScript');
})->desc('Builds CSS and JavaScript and then removes node_modules');
