<?php

namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'Alexa');

// Project repository
set('repository', 'git@github.com:CorentinCrz/web2_alexa_api.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false);

// Shared files/dirs between deploys
set('shared_files', ['.env.local', 'composer.json', 'composer.lock', 'public/.htaccess']);
set('shared_dirs', ['var/log', 'var/sessions']);

// Writable dirs by web server
set('writable_dirs', ['var/cache', 'var/log']);
set('writable_mode', 'chmod');

// Hosts
host('prod')
    ->hostname('142.93.104.14')
    ->user('formula')
    ->set('deploy_path', '/home/formula/alexa')
    ->stage('test')
    ->set('branch', 'master')
    ->multiplexing(false);


// Tasks
/*set('copy_dirs', ['vendor']);
before('deploy:vendors', 'deploy:copy_dirs');*/
desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:vendors',
    'deploy:unlock',
    'cleanup',
    'success'
]);

task('deploy:vendors', function() {
    run('cd {{release_path}} && composer install');
});

//task('reload:php-fpm', function () {
//    run('sudo service php-fpm reload'); // Using SysV Init scripts
//});

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
//after('deploy', 'reload:php-fpm');