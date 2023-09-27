<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => 'homepage', '_controller' => 'App\\Controller\\DefaultController::indexAction'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'login', '_controller' => 'App\\Controller\\SecurityController::loginAction'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'logout', '_controller' => 'App\\Controller\\SecurityController::logoutCheck'], null, null, null, false, false, null]],
        '/tasks' => [[['_route' => 'task_list', '_controller' => 'App\\Controller\\TaskController::listAction'], null, null, null, false, false, null]],
        '/tasks/create' => [[['_route' => 'task_create', '_controller' => 'App\\Controller\\TaskController::createAction'], null, null, null, false, false, null]],
        '/tasks/done' => [[['_route' => 'task_list_done', '_controller' => 'App\\Controller\\TaskController::listTasksDone'], null, null, null, false, false, null]],
        '/users' => [[['_route' => 'user_list', '_controller' => 'App\\Controller\\UserController::listAction'], null, null, null, true, false, null]],
        '/users/create' => [[['_route' => 'user_create', '_controller' => 'App\\Controller\\UserController::createAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/tasks/([^/]++)/(?'
                    .'|edit(*:30)'
                    .'|toggle(*:43)'
                    .'|delete(*:56)'
                .')'
                .'|/users/([^/]++)/edit(*:84)'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:119)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        30 => [[['_route' => 'task_edit', '_controller' => 'App\\Controller\\TaskController::editAction'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        43 => [[['_route' => 'task_toggle', '_controller' => 'App\\Controller\\TaskController::toggleTaskAction'], ['id'], ['POST' => 0], null, false, false, null]],
        56 => [[['_route' => 'task_delete', '_controller' => 'App\\Controller\\TaskController::deleteTaskAction'], ['id'], ['POST' => 0, 'DELETE' => 1], null, false, false, null]],
        84 => [[['_route' => 'user_edit', '_controller' => 'App\\Controller\\UserController::editAction'], ['id'], null, null, false, false, null]],
        119 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
