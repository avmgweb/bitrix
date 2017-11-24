<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------ old params refactor ----------------------- */
/* -------------------------------------------------------------------- */
$arTemplateParameters["HIDE_NOT_AVAILABLE"] =
	[
	"NAME"   => Loc::getMessage("AV_CATALOG_INDEX_PARAMS_HIDE_NOT_AVAILABLE"),
	"TYPE"   => "CHECKBOX",
	"PARENT" => "BASE"
	];
$arTemplateParameters["HIDE_NOT_AVAILABLE_OFFERS"] =
	[
	"NAME"   => Loc::getMessage("AV_CATALOG_INDEX_PARAMS_HIDE_NOT_AVAILABLE_OFFERS"),
	"TYPE"   => "CHECKBOX",
	"PARENT" => "BASE"
	];

$arTemplateParameters["SET_TITLE"] =
	[
	"NAME"   => Loc::getMessage("AV_CATALOG_INDEX_PARAMS_SET_TITLE"),
	"TYPE"   => "CHECKBOX",
	"PARENT" => "EXTENDED_SETTINGS"
	];

$arTemplateParameters["FILTER_FIELD_CODE"]           = ["HIDDEN" => "Y"];
$arTemplateParameters["FILTER_OFFERS_FIELD_CODE"]    = ["HIDDEN" => "Y"];
$arTemplateParameters["FILTER_PROPERTY_CODE"]        = ["HIDDEN" => "Y"];
$arTemplateParameters["FILTER_OFFERS_PROPERTY_CODE"] = ["HIDDEN" => "Y"];

$arTemplateParameters["LIST_PROPERTY_CODE"]          = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_PROPERTY_CODE"]        = ["HIDDEN" => "Y"];
$arTemplateParameters["LIST_OFFERS_PROPERTY_CODE"]   = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_OFFERS_PROPERTY_CODE"] = ["HIDDEN" => "Y"];

$arTemplateParameters["BASKET_URL"]              = ["HIDDEN" => "Y"];
$arTemplateParameters["USER_CONSENT"]            = ["HIDDEN" => "Y"];
$arTemplateParameters["USER_CONSENT_ID"]         = ["HIDDEN" => "Y"];
$arTemplateParameters["USER_CONSENT_IS_CHECKED"] = ["HIDDEN" => "Y"];
$arTemplateParameters["USER_CONSENT_IS_LOADED"]  = ["HIDDEN" => "Y"];

$arTemplateParameters["AJAX_MODE"]              = ["HIDDEN" => "Y"];
$arTemplateParameters["AJAX_OPTION_JUMP"]       = ["HIDDEN" => "Y"];
$arTemplateParameters["AJAX_OPTION_STYLE"]      = ["HIDDEN" => "Y"];
$arTemplateParameters["AJAX_OPTION_HISTORY"]    = ["HIDDEN" => "Y"];
$arTemplateParameters["AJAX_OPTION_ADDITIONAL"] = ["HIDDEN" => "Y"];
$arTemplateParameters["SET_LAST_MODIFIED"]      = ["HIDDEN" => "Y"];
$arTemplateParameters["USE_REVIEW"]             = ["HIDDEN" => "Y"];
$arTemplateParameters["ACTION_VARIABLE"]        = ["HIDDEN" => "Y"];
$arTemplateParameters["PRODUCT_ID_VARIABLE"]    = ["HIDDEN" => "Y"];
$arTemplateParameters["USE_COMPARE"]            = ["HIDDEN" => "Y"];

$arTemplateParameters["FILTER_PRICE_CODE"]    = ["HIDDEN" => "Y"];
$arTemplateParameters["USE_PRICE_COUNT"]      = ["HIDDEN" => "Y"];
$arTemplateParameters["SHOW_PRICE_COUNT"]     = ["HIDDEN" => "Y"];
$arTemplateParameters["PRICE_VAT_SHOW_VALUE"] = ["HIDDEN" => "Y"];

$arTemplateParameters["USE_PRODUCT_QUANTITY"]       = ["HIDDEN" => "Y"];
$arTemplateParameters["ADD_PROPERTIES_TO_BASKET"]   = ["HIDDEN" => "Y"];
$arTemplateParameters["PRODUCT_PROPS_VARIABLE"]     = ["HIDDEN" => "Y"];
$arTemplateParameters["PARTIAL_PRODUCT_PROPERTIES"] = ["HIDDEN" => "Y"];
$arTemplateParameters["PRODUCT_PROPERTIES"]         = ["HIDDEN" => "Y"];
$arTemplateParameters["OFFERS_CART_PROPERTIES"]     = ["HIDDEN" => "Y"];

$arTemplateParameters["SHOW_TOP_ELEMENTS"]      = ["HIDDEN" => "Y"];
$arTemplateParameters["SECTION_COUNT_ELEMENTS"] = ["HIDDEN" => "Y"];
$arTemplateParameters["SECTION_TOP_DEPTH"]      = ["HIDDEN" => "Y"];

$arTemplateParameters["TOP_ELEMENT_COUNT"]       = ["HIDDEN" => "Y"];
$arTemplateParameters["TOP_LINE_ELEMENT_COUNT"]  = ["HIDDEN" => "Y"];
$arTemplateParameters["TOP_ELEMENT_SORT_FIELD"]  = ["HIDDEN" => "Y"];
$arTemplateParameters["TOP_ELEMENT_SORT_ORDER"]  = ["HIDDEN" => "Y"];
$arTemplateParameters["TOP_ELEMENT_SORT_FIELD2"] = ["HIDDEN" => "Y"];
$arTemplateParameters["TOP_ELEMENT_SORT_ORDER2"] = ["HIDDEN" => "Y"];
$arTemplateParameters["TOP_PROPERTY_CODE"]       = ["HIDDEN" => "Y"];

$arTemplateParameters["PAGE_ELEMENT_COUNT"]       = ["HIDDEN" => "Y"];
$arTemplateParameters["LINE_ELEMENT_COUNT"]       = ["HIDDEN" => "Y"];
$arTemplateParameters["LIST_META_KEYWORDS"]       = ["HIDDEN" => "Y"];
$arTemplateParameters["LIST_META_DESCRIPTION"]    = ["HIDDEN" => "Y"];
$arTemplateParameters["LIST_BROWSER_TITLE"]       = ["HIDDEN" => "Y"];
$arTemplateParameters["SECTION_BACKGROUND_IMAGE"] = ["HIDDEN" => "Y"];

$arTemplateParameters["DETAIL_META_KEYWORDS"]             = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_META_DESCRIPTION"]          = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_BROWSER_TITLE"]             = ["HIDDEN" => "Y"];
$arTemplateParameters["SECTION_ID_VARIABLE"]              = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_CHECK_SECTION_ID_VARIABLE"] = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_BACKGROUND_IMAGE"]          = ["HIDDEN" => "Y"];
$arTemplateParameters["SHOW_DEACTIVATED"]                 = ["HIDDEN" => "Y"];

$arTemplateParameters["LINK_IBLOCK_TYPE"]  = ["HIDDEN" => "Y"];
$arTemplateParameters["LINK_IBLOCK_ID"]    = ["HIDDEN" => "Y"];
$arTemplateParameters["LINK_PROPERTY_SID"] = ["HIDDEN" => "Y"];
$arTemplateParameters["LINK_ELEMENTS_URL"] = ["HIDDEN" => "Y"];

$arTemplateParameters["USE_ALSO_BUY"]                   = ["HIDDEN" => "Y"];
$arTemplateParameters["USE_GIFTS_DETAIL"]               = ["HIDDEN" => "Y"];
$arTemplateParameters["USE_GIFTS_SECTION"]              = ["HIDDEN" => "Y"];
$arTemplateParameters["USE_GIFTS_MAIN_PR_SECTION_LIST"] = ["HIDDEN" => "Y"];

$arTemplateParameters["GIFTS_DETAIL_PAGE_ELEMENT_COUNT"]              = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_DETAIL_HIDE_BLOCK_TITLE"]                = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_DETAIL_BLOCK_TITLE"]                     = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_DETAIL_TEXT_LABEL_GIFT"]                 = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT"]        = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE"]          = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_SECTION_LIST_BLOCK_TITLE"]               = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_SECTION_LIST_TEXT_LABEL_GIFT"]           = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_SHOW_DISCOUNT_PERCENT"]                  = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_SHOW_OLD_PRICE"]                         = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_SHOW_NAME"]                              = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_SHOW_IMAGE"]                             = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT"] = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_MESS_BTN_BUY"]                           = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE"]   = ["HIDDEN" => "Y"];
$arTemplateParameters["GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE"]        = ["HIDDEN" => "Y"];

$arTemplateParameters["USE_STORE"]                       = ["HIDDEN" => "Y"];
$arTemplateParameters["PAGER_TITLE"]                     = ["HIDDEN" => "Y"];
$arTemplateParameters["PAGER_SHOW_ALWAYS"]               = ["HIDDEN" => "Y"];
$arTemplateParameters["PAGER_DESC_NUMBERING"]            = ["HIDDEN" => "Y"];
$arTemplateParameters["PAGER_SHOW_ALL"]                  = ["HIDDEN" => "Y"];
$arTemplateParameters["PAGER_BASE_LINK_ENABLE"]          = ["HIDDEN" => "Y"];
$arTemplateParameters["PAGER_DESC_NUMBERING_CACHE_TIME"] = ["HIDDEN" => "Y"];
$arTemplateParameters["PAGER_TEMPLATE"]                  = ["HIDDEN" => "Y"];
$arTemplateParameters["DISPLAY_TOP_PAGER"]               = ["HIDDEN" => "Y"];
$arTemplateParameters["DISPLAY_BOTTOM_PAGER"]            = ["HIDDEN" => "Y"];

$arTemplateParameters["COMPATIBLE_MODE"]                = ["HIDDEN" => "Y"];
$arTemplateParameters["DISABLE_INIT_JS_IN_COMPONENT"]   = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_SET_VIEWED_IN_COMPONENT"] = ["HIDDEN" => "Y"];

$arTemplateParameters["TOP_OFFERS_FIELD_CODE"]    = ["HIDDEN" => "Y"];
$arTemplateParameters["TOP_OFFERS_PROPERTY_CODE"] = ["HIDDEN" => "Y"];
$arTemplateParameters["TOP_OFFERS_LIMIT"]         = ["HIDDEN" => "Y"];
$arTemplateParameters["LIST_OFFERS_LIMIT"]        = ["HIDDEN" => "Y"];

$arTemplateParameters["DETAIL_SET_CANONICAL_URL"] = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_OFFERS_FIELD_CODE"] = ["HIDDEN" => "Y"];

$arTemplateParameters["OFFERS_SORT_FIELD"]  = ["HIDDEN" => "Y"];
$arTemplateParameters["OFFERS_SORT_ORDER"]  = ["HIDDEN" => "Y"];
$arTemplateParameters["OFFERS_SORT_FIELD2"] = ["HIDDEN" => "Y"];
$arTemplateParameters["OFFERS_SORT_ORDER2"] = ["HIDDEN" => "Y"];

$arTemplateParameters["USE_MAIN_ELEMENT_SECTION"]    = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_STRICT_SECTION_CHECK"] = ["HIDDEN" => "Y"];
$arTemplateParameters["ADD_SECTIONS_CHAIN"]          = ["HIDDEN" => "Y"];
$arTemplateParameters["ADD_ELEMENT_CHAIN"]           = ["HIDDEN" => "Y"];
$arTemplateParameters["USE_ELEMENT_COUNTER"]         = ["HIDDEN" => "Y"];