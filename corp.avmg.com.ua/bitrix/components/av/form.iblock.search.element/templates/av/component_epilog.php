<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Page\Asset;

$templateFolder = get_class($this) == 'AvComponentsIncludings'
	? AvComponentsIncludings::getInstance()->getCurrentIncludingsParams()["dir_path"]
	: $this->GetTemplate()->GetFolder();

CJSCore::Init(["av_form_elements"]);
Asset::getInstance()->addString('<script>AvFormIblockSearchElement = "'.CURRENT_PROTOCOL.'://'.SITE_SERVER_NAME.$templateFolder.'/ajax/iblock_search.php";</script>');