<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av_site"]);

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form.iblock.search.element", "av")
	->setIncludings("av", "form.select",                "av")
	->setIncludings("av", "form.select.multiple",       "av")
	->setIncludings("av", "form.select",                "av_alt")
	->setIncludings("av", "form.links_list",            "av")
	->setIncludings("av", "form.input",                 "av_search");