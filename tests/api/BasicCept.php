<?php

$I = new ApiTester($scenario);

$I->sendGET("/",[]);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(["message"=>"hello world"]);

$I->amGoingTo("レスポンスのエントリが3つであることの確認");
$response = json_decode($I->grabResponse(),true);
PHPUnit_Framework_Assert::assertEquals(3,count($response));