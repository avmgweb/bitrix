<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av"]);

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form.button", "av")
	->setIncludings("av", "form.button", "av-alt");