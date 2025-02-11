<?php
namespace Deployer;

require 'vendor/deployer/deployer/recipe/typo3.php';
require 'vendor/deployer/deployer/contrib/rsync.php';
require 'vendor/deployer/deployer/recipe/common.php';

// Hosts
host('staging')
    ->set('hostname','lmr-nrw.failx.de')
    ->set('php_path', '/usr/bin/php8.1')
    ->set('remote_user','c1_ssh_lmr')
    ->set('deploy_path', '/var/www/clients/client1/web1025/web');

host('prod')
    ->set('hostname','lmr-nrw.de')
    ->set('php_path', '/usr/bin/php8.1')
    ->set('remote_user','c116_ssh')
    ->set('deploy_path', '/var/www/clients/client116/web1001/web');

// Config
set('bin_folder', './vendor/bin/');
set('typo3_webroot', 'public');
set('keep_releases', 5);
set('strategy', 'rsync');
set('bin/composer', '/usr/local/bin/composer.phar');
set('composer_options', '--verbose --prefer-dist --no-progress --no-interaction --no-dev --optimize-autoloader');

set('env', [
    'PHP_CLI_SERVER_WORKERS' => 4,
    'PATH' => '/usr/local/bin:/usr/bin:/bin:/usr/games',
    'PHP_PATH' => '/usr/bin/php8.1'
]);
set('php_path', '/usr/bin/php8.1');
// Shared Directories und Files
set('shared_dirs', [
    '{{typo3_webroot}}/fileadmin',
    '{{typo3_webroot}}/typo3temp',
    '{{typo3_webroot}}/uploads'
]);

set('writable_dirs', [
    '{{typo3_webroot}}/fileadmin',
    '{{typo3_webroot}}/typo3temp',
    '{{typo3_webroot}}/_assets',
    '{{typo3_webroot}}/typo3conf',
    '{{typo3_webroot}}/uploads'
]);

add('shared_files', [
    '.env',
    'public/.htaccess',
]);

set('rsync_src', './');

set('rsync',[
    'exclude'      => [
        'deploy.php',
        '.docker*',
        '.editorconfig',
        '.env',
        './*.sql',
        './*.json',
        '.git*',
        '.surf',
        '.deployer',
        '.database',
        'docker-compose.yml',
        'public/fileadmin',
        'public/uploads',
        'public/_assets',
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
    'flags'        => 'rz',
    'options'      => ['delete', 'times', 'perms', 'links', 'delete-excluded'],
    'timeout'      => 600,
]);

// Tasks
task('build', function () {
    run('cd {{release_path}} && COMPOSER_MEMORY_LIMIT=-1 {{php_path}} {{bin/composer}} update {{composer_options}} --ignore-platform-req=php');
});
task('typo3', function () {
    run('cd {{release_path}} && PATH=/usr/local/bin:/usr/bin:/bin PHP_PATH={{php_path}} {{php_path}} {{bin_folder}}typo3 install:fixfolderstructure');
    run('cd {{release_path}} && PATH=/usr/local/bin:/usr/bin:/bin PHP_PATH={{php_path}} {{php_path}} {{bin_folder}}typo3 database:updateschema *.add,*.change');
    run('cd {{release_path}} && PATH=/usr/local/bin:/usr/bin:/bin PHP_PATH={{php_path}} {{php_path}} {{bin_folder}}typo3 language:update');
    run('cd {{release_path}} && PATH=/usr/local/bin:/usr/bin:/bin PHP_PATH={{php_path}} {{php_path}} {{bin_folder}}typo3 cache:flush');
});

task('deploy', [
    'deploy:unlock',
    'deploy:release',
    'rsync',
    'deploy:shared',
    'build',
    'typo3',
    'deploy:unlock',
    'deploy:clear_paths',
    'deploy:publish'
])->desc('Deploy TYPO3');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
