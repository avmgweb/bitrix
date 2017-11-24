<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av"]);

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form.iblock.search.element", "av")
	->setIncludings("av", "form.select",                "av")
	->setIncludings("av", "form.select",                "av-form-checkbox-styled")
	->setIncludings("av", "form.select",                "av-alt")
	->setIncludings("av", "form.links_list",            "av")
	->setIncludings("av", "form.input",                 "av-search");