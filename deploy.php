<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/theLastKing711/cars_market_laravel.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('68.183.76.49')
// host('https:\\\digitaldomain.site')
    ->set('remote_user', 'lastking711')
    ->set('deploy_path', '/var/www/html/cars_market_laravel');
// ->set('remote_user', 'lastking711')
// ->set('deploy_path', '~/cars_market_laravel');

// Hooks

after('deploy:failed', 'deploy:unlock');
