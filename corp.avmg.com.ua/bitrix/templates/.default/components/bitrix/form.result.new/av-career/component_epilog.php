<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av_form_elements"]);

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form.input",       "av-form")
	->setIncludings("av", "form.input.phone", "av-form")
	->setIncludings("av", "form.file",        "av-form")
	->setIncludings("av", "form.checkbox",    "av-form")
	->setIncludings("av", "form.textarea",    "av-form");