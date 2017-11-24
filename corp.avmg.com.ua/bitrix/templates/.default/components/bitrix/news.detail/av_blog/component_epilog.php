<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

AvComponentsIncludings::getInstance()
	->setIncludings("bitrix", "news.list",   "av_same_articles")
	->setIncludings("bitrix", "iblock.vote", "av")
	->setIncludings("av",     "form.button", "av-alt");