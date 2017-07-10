<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Page\Asset;

$templateFolder = get_class($this) == 'AvComponentsIncludings'
	? AvComponentsIncludings::getInstance()->getCurrentIncludingsParams()["dir_path"]
	: $this->GetTemplate()->GetFolder();

CJSCore::Init(["wait_for_images"]);
Asset::getInstance()->addString('<script>AvVsCertifitacesListElementFile = "'.CURRENT_PROTOCOL.'://'.SITE_SERVER_NAME.$templateFolder.'/ajax/element.php";</script>');
AvComponentsIncludings::getInstance()->setIncludings("bitrix", "news.detail", "av_certificates");