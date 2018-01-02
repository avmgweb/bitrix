<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av"]);

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form.button",   "av-corp")
	->setIncludings("av", "form.select",   "av-corp")
	->setIncludings("av", "form.checkbox", "av-corp")
	->setIncludings("av", "form.checkbox", "av-corp-radio");