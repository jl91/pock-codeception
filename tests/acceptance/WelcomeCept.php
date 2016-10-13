<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('api/ping');
$I->see(json_encode(['ack' => 'a']));
