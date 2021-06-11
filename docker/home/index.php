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


header('Content-Type: application/json');


if (!isset($_REQUEST['route'])) {
    echo json_encode([
        'response' => 'error_route_is_not_set',
        'request' => $_REQUEST,
    ]);
} else if ($_REQUEST['route'] == 'user.list') {
    include __DIR__ . "/flutter_api/db.php";
    include __DIR__ . "/flutter_api/list.php";
}
//    echo json_encode([
//        'response' => 'error_route_is_not_set',
//        'request' => $_REQUEST,
//    ]);
//}