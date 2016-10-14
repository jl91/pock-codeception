<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Eu quero cadastrar um livro');
$I->amOnPage('/');
$I->fillField('name', "a");
$I->click('save');
$I->see("OK");

$I->moveBack(1);
$I->see('# 	name 	data 	createdAt ');
