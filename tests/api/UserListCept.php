<?php

$I = new ApiTester($scenario);

$I->wantTo("ユーザ一覧APIの検証");

$I->sendGET("/users/list",[]);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    "list" => "array"
]);

$firstResponse = $I->grabResponse();


