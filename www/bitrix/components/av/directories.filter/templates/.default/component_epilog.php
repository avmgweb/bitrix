<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av"]);

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form.input",  "av-search")
	->setIncludings("av", "form.select", "av-alt")
	->setIncludings("av", "form.button", "av-alt2");