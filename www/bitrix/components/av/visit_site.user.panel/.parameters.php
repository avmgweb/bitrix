<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/* -------------------------------------------------------------------- */
/* ---------------------------- variables ----------------------------- */
/* -------------------------------------------------------------------- */
$userFields =
	[
	"EMAIL",
	"TITLE",
	"NAME",
	"SECOND_NAME",
	"LAST_NAME",
	"PERSONAL_PROFESSION",
	"PERSONAL_WWW",
	"PERSONAL_ICQ",
	"PERSONAL_GENDER",
	"PERSONAL_BIRTHDAY",
	"PERSONAL_PHOTO",
	"PERSONAL_PHONE",
	"PERSONAL_FAX",
	"PERSONAL_MOBILE",
	"PERSONAL_PAGER",
	"PERSONAL_STREET",
	"PERSONAL_MAILBOX",
	"PERSONAL_CITY",
	"PERSONAL_STATE",
	"PERSONAL_ZIP",
	"PERSONAL_COUNTRY",
	"PERSONAL_NOTES",
	"WORK_COMPANY",
	"WORK_DEPARTMENT",
	"WORK_POSITION",
	"WORK_WWW",
	"WORK_PHONE",
	"WORK_FAX",
	"WORK_PAGER",
	"WORK_STREET",
	"WORK_MAILBOX",
	"WORK_CITY",
	"WORK_STATE",
	"WORK_ZIP",
	"WORK_COUNTRY",
	"WORK_PROFILE",
	"WORK_LOGO",
	"WORK_NOTES"
	];
if(CTimeZone::Enabled()) $userFields[] = 'AUTO_TIME_ZONE';

$userFieldsArray = [];
$userPropsArray  = [];
foreach($userFields as $property)
	$userFieldsArray[$property] = Loc::getMessage("REGISTER_FIELD_".$property);
foreach($GLOBALS["USER_FIELD_MANAGER"]->GetUserFields("USER", 0, LANGUAGE_ID) as $property)
	$userPropsArray[$property["FIELD_NAME"]] = $property["EDIT_FORM_LABEL"] ? $property["EDIT_FORM_LABEL"] : $property["FIELD_NAME"];

$menuTypes = [];
$queryList = CSite::GetList();
while($queryElement = $queryList->GetNext())
	foreach(GetMenuTypes($queryElement["ID"]) as $menuType => $menuTitle)
		if(!$menuTypes[$menuType])
			$menuTypes[$menuType] = $menuTitle;
/* -------------------------------------------------------------------- */
/* ------------------------------ groups ------------------------------ */
/* -------------------------------------------------------------------- */
$arComponentParameters["GROUPS"] =
	[
	"LINKS"        => ["NAME" => Loc::getMessage("AV_AUTH_PARAMS_GROUP_LINKS"),        "SORT" => 10],
	"REGISTRATION" => ["NAME" => Loc::getMessage("AV_AUTH_PARAMS_GROUP_REGISTRATION"), "SORT" => 20]
	];
/* -------------------------------------------------------------------- */
/* --------------------------- links params --------------------------- */
/* -------------------------------------------------------------------- */
if(count($menuTypes))
	$arComponentParameters["PARAMETERS"]["USER_MENU_TYPE"] =
		[
		"NAME"   => Loc::getMessage("AV_AUTH_USER_MENU_TYPE"),
		"TYPE"   => 'LIST',
		"VALUES" => $menuTypes,
		"PARENT" => 'LINKS'
		];
/* -------------------------------------------------------------------- */
/* ------------------------ registration params ----------------------- */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["REGISTRATION_SHOW_FIELDS"] =
	[
	"NAME"     => Loc::getMessage("AV_AUTH_REGISTRATION_SHOW_FIELDS"),
	"TYPE"     => 'LIST',
	"MULTIPLE" => 'Y',
	"SIZE"     => 5,
	"VALUES"   => $userFieldsArray,
	"PARENT"   => 'REGISTRATION'
	];
$arComponentParameters["PARAMETERS"]["REGISTRATION_SHOW_USER_PROPS"] =
	[
	"NAME"     => Loc::getMessage("AV_AUTH_REGISTRATION_SHOW_USER_PROPS"),
	"TYPE"     => 'LIST',
	"MULTIPLE" => 'Y',
	"SIZE"     => 5,
	"VALUES"   => $userPropsArray,
	"PARENT"   => 'REGISTRATION'
	];
$arComponentParameters["PARAMETERS"]["REGISTRATION_REQUIRED_FIELDS"] =
	[
	"NAME"     => Loc::getMessage("AV_AUTH_REGISTRATION_REQUIRED_FIELDS"),
	"TYPE"     => 'LIST',
	"MULTIPLE" => 'Y',
	"SIZE"     => 5,
	"VALUES"   => $userFieldsArray,
	"PARENT"   => 'REGISTRATION'
	];
$arComponentParameters["PARAMETERS"]["REGISTRATION_REQUIRED_USER_PROPS"] =
	[
	"NAME"     => Loc::getMessage("AV_AUTH_REGISTRATION_REQUIRED_USER_PROPS"),
	"TYPE"     => 'LIST',
	"MULTIPLE" => 'Y',
	"SIZE"     => 5,
	"VALUES"   => $userPropsArray,
	"PARENT"   => 'REGISTRATION'
	];