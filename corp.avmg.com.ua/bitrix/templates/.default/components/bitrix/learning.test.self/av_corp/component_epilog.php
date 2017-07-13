<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av_site"]);

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form.button",   "av_corp")
	->setIncludings("av", "form.select",   "av_corp")
	->setIncludings("av", "form.checkbox", "av_corp")
	->setIncludings("av", "form.checkbox", "av_corp_radio");