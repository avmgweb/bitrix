<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

$formId = (int) $_POST["form_id"];
$APPLICATION->IncludeComponent("bitrix:form.result.new", "av", $arResult);