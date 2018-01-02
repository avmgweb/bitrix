<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av"]);

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form.button",   "av-corp")
	->setIncludings("av", "form.button",   "av-corp-alt3")
	->setIncludings("av", "form.button",   "av-corp-alt4")
	->setIncludings("av", "form.textarea", "av-corp")
	->setIncludings("av", "form.select",   "av-corp")
	->setIncludings("av", "form.checkbox", "av-corp")
	->setIncludings("av", "form.checkbox", "av-corp-radio");