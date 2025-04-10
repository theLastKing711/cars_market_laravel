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
    ->set('remote_user', 'lastking711')
    ->set('deploy_path', '/var/www/html/cars_market_laravel');
// ->set('ssh_multiplexing', false)
// ->set('forward_agent', false)
// ->set('git_tty', false);

// Hooks

after('deploy:failed', 'deploy:unlock');

https:// www.youtube.com/watch?v=C9_O9dn7SzY
