<?php

/*
 * 미션 1 PDO -> mysqli로 변경하세요.
 *
 * 미션 2 DB를 재사용할 수 있도록 클래스로 변경하세요.
 *
 * 미션 3 Todo기능을 추가하고 백엔드와 연결하세요.
 *
 * 미션 4 완성된 앱을 클라우드에 배포하세요.
 */
if ( str_contains($_SERVER['REQUEST_URI'], 'favicon.ico')) exit;

header('Content-Type: application/json');

include __DIR__ . "/core/db.php";
include __DIR__ . "/model/user/list.php";
include __DIR__ . "/model/user/create.php";

if (!isset($_REQUEST['route'])) {
    echo json_encode([
        'response' => 'error_route_is_not_set',
        'request' => $_REQUEST,
    ]);
}

$route = $_REQUEST['route'];
$arr = explode('.', $route); // ['user', 'list']
include __DIR__ . "/controller/{$arr[0]}/{$arr[0]}.controller.php"; //controller/user/user.controller.php
$method = str_replace('.', '_', $route);
echo json_encode($method());

