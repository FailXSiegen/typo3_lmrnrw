<?php
namespace Deployer;

require 'vendor/deployer/deployer/recipe/typo3.php';
require 'vendor/deployer/recipes/recipe/rsync.php';

// Hosts
host('staging')
    ->hostname('lmr-nrw.failx.de')
    ->set('php_path', '/usr/bin/php8.1')
    ->user('c1_ssh_lmr')
    ->set('deploy_path', '/var/www/clients/client1/web1025/web');

host('prod')
    ->hostname('lmr-nrw.de')
    ->set('php_path', '/usr/bin/php8.1')
    ->user('c116_ssh')
    ->set('deploy_path', '/var/www/clients/client116/web1001/web');

// Config
set('bin_folder', './vendor/bin/');
set('typo3_webroot', 'public');
//set('yarn_path', 'public/typo3conf/ext/fx_templates_jungerkammerchor/');

add('shared_files', [
    '.env'
]);

set('rsync_src', './');

set('rsync',[
    'exclude'      => [
        'deploy.php',
        '.docker*',
        '.editorconfig',
        '.env',
        '.git*',
        '.surf',
        '.deployer',
        '.database',
        'docker-compose.yml',
        'public/fileadmin',
        'public/uploads',
        'var/log',
        'README.md',
        'deploy_rsa',
        'deploy_rsa.enc',
        '.travis.yml'
    ],
    'exclude-file' => false,
    'include'      => [],
    'include-file' => false,
    'filter'       => [],
    'filter-file'  => false,
    'filter-perdir'=> false,
    'flags'        => 'rz', // Recursive, with compress
    'options'      => ['delete', 'times', 'perms', 'links', 'delete-excluded'],
    'timeout'      => 600,
]);

// Tasks
task('build', function () {
    run('composer update');
})->local();

task('typo3', function () {
    run('cd {{release_path}} && {{php_path}} {{bin_folder}}typo3cms install:fixfolderstructure');
    run('cd {{release_path}} && {{php_path}} {{bin_folder}}typo3cms database:updateschema *.add,*.change');
    run('cd {{release_path}} && {{php_path}} {{bin_folder}}typo3cms language:update');
    run('cd {{release_path}} && {{php_path}} {{bin_folder}}typo3cms cache:flush');
});

//task('yarn', function () {
//    run('cd {{yarn_path}} && yarn install --silent --non-interactive');
//})->local();

// task('opcache', function () {
//     run('cd {{release_path}} && {{bin_folder}}cachetool opcache:reset');
// });

task('deploy', [
    'deploy:unlock',
    'deploy:prepare',
    'deploy:lock',
    'build',
//    'yarn',
    'deploy:release',
    'rsync',
    'deploy:shared',
    'typo3',
    'deploy:symlink',
    // 'opcache',
    'deploy:unlock',
    'cleanup',
    'success'
])->desc('Deploy TYPO3');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
