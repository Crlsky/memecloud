<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/extension/get_dirs' => [[['_route' => 'api_extension_dirs', '_controller' => 'App\\Controller\\API\\ApiExtensionController::directoriesChilds'], null, null, null, false, false, null]],
        '/api/extension/header' => [[['_route' => 'api_extension_child_dirs', '_controller' => 'App\\Controller\\API\\ApiExtensionController::returnHeader'], null, null, null, false, false, null]],
        '/contact' => [[['_route' => 'contact', '_controller' => 'App\\Controller\\ContactController::index'], null, null, null, false, false, null]],
        '/directories/add' => [[['_route' => 'directories_add', '_controller' => 'App\\Controller\\DirectoriesController::addDirectory'], null, null, null, false, false, null]],
        '/meme/add' => [[['_route' => 'memes_add', '_controller' => 'App\\Controller\\DirectoriesController::addMeme'], null, null, null, false, false, null]],
        '/directories/rename' => [[['_route' => 'directories_rename', '_controller' => 'App\\Controller\\DirectoriesController::renameDirOrImg'], null, null, null, false, false, null]],
        '/delete/meme' => [[['_route' => 'delete_meme', '_controller' => 'App\\Controller\\DirectoriesController::deleteMeme'], null, null, null, false, false, null]],
        '/delete/dir' => [[['_route' => 'delete_dir', '_controller' => 'App\\Controller\\DirectoriesController::deleteDirectory'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'main', '_controller' => 'App\\Controller\\MainController::index'], null, null, null, false, false, null]],
        '/meme' => [[['_route' => 'meme_panel', '_controller' => 'App\\Controller\\MemePanelController::index'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/api/login_check' => [[['_route' => 'api_login_check'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/meme/([^/]++)(*:56)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        56 => [
            [['_route' => 'directory', '_controller' => 'App\\Controller\\MemePanelController::showDirectories'], ['slug'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
