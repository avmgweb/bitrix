<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetTitle("Каталог товаров");
/* -------------------------------------------------------------------- */
/* ---------------------------- constants ----------------------------- */
/* -------------------------------------------------------------------- */
$iblockType        = 'catalog_products';
$morePhotoPropCode = 'more_photo';
/* -------------------------------------------------------------------- */
/* --------------------------- iblock info ---------------------------- */
/* -------------------------------------------------------------------- */
$iblockCode = explode('/', str_replace('index.php', '', $_SERVER["SCRIPT_URL"]))[2];
$iblockInfo = $iblockCode
	? CIBlock::GetList
		(
		[],
			[
			"TYPE"              => $iblockType,
			"CODE"              => $iblockCode,
			"ACTIVE"            => 'Y',
			"CHECK_PERMISSIONS" => 'Y'
			]
		)->GetNext()
	: [];
/* -------------------------------------------------------------------- */
/* ----------------------- iblock url templates ----------------------- */
/* -------------------------------------------------------------------- */
if(count($iblockInfo))
	foreach(["LIST_PAGE_URL", "SECTION_PAGE_URL", "DETAIL_PAGE_URL"] as $index)
		$iblockInfo[$index] = str_replace
			(
			["#IBLOCK_ID#",     "#IBLOCK_CODE#",     "#SITE_DIR#"],
			[$iblockInfo["ID"], $iblockInfo["CODE"], ''],
			$iblockInfo[$index]
			);

$iblockListPage    = $iblockInfo["LIST_PAGE_URL"];
$iblockSectionPage = str_replace($iblockListPage, '', $iblockInfo["SECTION_PAGE_URL"]);
$iblockElementPage = str_replace($iblockListPage, '', $iblockInfo["DETAIL_PAGE_URL"]);
/* -------------------------------------------------------------------- */
/* --------------------- catalog/sku iblock props --------------------- */
/* -------------------------------------------------------------------- */
$iblockProps    = [];
$skuIblockProps = [];

if(count($iblockInfo))
	{
	$catalogInfo = CCatalog::GetList
		(
		[],
			[
			"IBLOCK_TYPE_ID" => $iblockType,
			"IBLOCK_ID"      => $iblockInfo["ID"],
			"ACTIVE"         => 'Y'
			],
		false, false
		)->GetNext();

	$queryList = CIBlockProperty::GetList(["SORT" => 'ASC'], ["IBLOCK_ID" => $catalogInfo["ID"]]);
	while($queryElement = $queryList->GetNext()) $iblockProps[] = $queryElement["CODE"] ? $queryElement["CODE"] : $queryElement["ID"];

	if($catalogInfo["OFFERS_IBLOCK_ID"] && $catalogInfo["OFFERS_PROPERTY_ID"])
		{
		$queryList = CIBlockProperty::GetList(["SORT" => 'ASC'], ["IBLOCK_ID" => $catalogInfo["OFFERS_IBLOCK_ID"]]);
		while($queryElement = $queryList->GetNext())
			if($queryElement["ID"] != $catalogInfo["OFFERS_PROPERTY_ID"])
				$skuIblockProps[] = $queryElement["CODE"] ? $queryElement["CODE"] : $queryElement["ID"];
		}
	}
/* -------------------------------------------------------------------- */
/* ----------------------- "more photo" prop id ----------------------- */
/* -------------------------------------------------------------------- */
$morePhotoPropId = count($iblockInfo)
	? CIBlockProperty::GetList([], ["IBLOCK_ID" => $iblockInfo["ID"], "CODE" => $morePhotoPropCode])->GetNext()["ID"]
	: '';
/* -------------------------------------------------------------------- */
/* ------------------------------- menu ------------------------------- */
/* -------------------------------------------------------------------- */
if(!count($iblockInfo))
	$APPLICATION->IncludeComponent
		(
		"bitrix:menu", "av_tablet",
			array(
			"ROOT_MENU_TYPE"     => 'left',
			"MAX_LEVEL"          => 1,
			"CHILD_MENU_TYPE"    => '',
			"USE_EXT"            => 'Y',
			"DELAY"              => 'N',
			"ALLOW_MULTI_SELECT" => 'Y',

			"MENU_CACHE_TYPE"       => 'A',
			"MENU_CACHE_TIME"       => 360000,
			"MENU_CACHE_USE_GROUPS" => 'Y'
			)
		);
/* -------------------------------------------------------------------- */
/* ----------------------------- catalog ------------------------------ */
/* -------------------------------------------------------------------- */
else
	{
	$APPLICATION->AddChainItem($iblockInfo["NAME"], $iblockInfo["LIST_PAGE_URL"]);
	$APPLICATION->IncludeComponent
		(
		"bitrix:catalog", "av",
			array(
			"IBLOCK_TYPE" => $iblockType,
			"IBLOCK_ID"   => $iblockInfo["ID"],

			"HIDE_NOT_AVAILABLE"        => 'Y',
			"HIDE_NOT_AVAILABLE_OFFERS" => 'Y',

			"SEF_MODE"          => 'Y',
			"SEF_FOLDER"        => $iblockListPage,
			"SEF_URL_TEMPLATES" =>
				array(
				"sections"     => '',
				"section"      => $iblockSectionPage,
				"element"      => $iblockElementPage,
				"compare"      => '',
				"smart_filter" => $iblockSectionPage.'filter/#SMART_FILTER_PATH#/apply/',
				),

			"AJAX_MODE"           => 'N',
			"AJAX_OPTION_JUMP"    => 'N',
			"AJAX_OPTION_STYLE"   => 'N',
			"AJAX_OPTION_HISTORY" => 'N',

			"CACHE_TYPE"   => 'A',
			"CACHE_TIME"   => 36000000,
			"CACHE_FILTER" => 'Y',
			"CACHE_GROUPS" => 'Y',

			"SET_LAST_MODIFIED"           => 'N',
			"USE_MAIN_ELEMENT_SECTION"    => 'Y',
			"DETAIL_STRICT_SECTION_CHECK" => 'Y',
			"SET_TITLE"                   => 'Y',
			"ADD_SECTIONS_CHAIN"          => 'Y',
			"ADD_ELEMENT_CHAIN"           => 'Y',

			"USE_FILTER"                  => 'Y',
			"FILTER_NAME"                 => '',
			"FILTER_FIELD_CODE"           => array(),
			"FILTER_PROPERTY_CODE"        => $iblockProps,
			"FILTER_PRICE_CODE"           => array('BASE'),
			"FILTER_OFFERS_FIELD_CODE"    => array(),
			"FILTER_OFFERS_PROPERTY_CODE" => $skuIblockProps,

			"USE_REVIEW"         => 'N',
			"MESSAGES_PER_PAGE"  => '',
			"USE_CAPTCHA"        => '',
			"REVIEW_AJAX_POST"   => '',
			"PATH_TO_SMILE"      => '',
			"FORUM_ID"           => '',
			"URL_TEMPLATES_READ" => '',
			"SHOW_LINK_TO_FORUM" => '',

			"ACTION_VARIABLE"     => '',
			"PRODUCT_ID_VARIABLE" => '',

			"USE_COMPARE"                  => 'N',
			"COMPARE_NAME"                 => '',
			"COMPARE_FIELD_CODE"           => '',
			"COMPARE_PROPERTY_CODE"        => '',
			"COMPARE_OFFERS_FIELD_CODE"    => '',
			"COMPARE_OFFERS_PROPERTY_CODE" => '',
			"COMPARE_ELEMENT_SORT_FIELD"   => '',
			"COMPARE_ELEMENT_SORT_ORDER"   => '',
			"DISPLAY_ELEMENT_SELECT_BOX"   => '',
			"ELEMENT_SORT_FIELD_BOX"       => '',
			"ELEMENT_SORT_ORDER_BOX"       => '',
			"ELEMENT_SORT_FIELD_BOX2"      => '',
			"ELEMENT_SORT_ORDER_BOX2"      => '',

			"PRICE_CODE"           => array('BASE'),
			"USE_PRICE_COUNT"      => 'N',
			"SHOW_PRICE_COUNT"     => 1,
			"PRICE_VAT_INCLUDE"    => 'Y',
			"PRICE_VAT_SHOW_VALUE" => 'N',
			"CONVERT_CURRENCY"     => 'Y',
			"CURRENCY_ID"          => 'UAH',

			"BASKET_URL"                 => '/personal/cart/',
			"USE_PRODUCT_QUANTITY"       => 'N',
			"PRODUCT_QUANTITY_VARIABLE"  => '',
			"ADD_PROPERTIES_TO_BASKET"   => 'N',
			"PRODUCT_PROPS_VARIABLE"     => '',
			"PARTIAL_PRODUCT_PROPERTIES" => 'Y',
			"PRODUCT_PROPERTIES"         => array(),
			"OFFERS_CART_PROPERTIES"     => array(),

			"SHOW_TOP_ELEMENTS"        => 'N',
			"TOP_ELEMENT_COUNT"        => '',
			"TOP_LINE_ELEMENT_COUNT"   => '',
			"TOP_ELEMENT_SORT_FIELD"   => '',
			"TOP_ELEMENT_SORT_ORDER"   => '',
			"TOP_ELEMENT_SORT_FIELD2"  => '',
			"TOP_ELEMENT_SORT_ORDER2"  => '',
			"TOP_PROPERTY_CODE"        => '',
			"TOP_OFFERS_FIELD_CODE"    => '',
			"TOP_OFFERS_PROPERTY_CODE" => '',
			"TOP_OFFERS_LIMIT"         => '',

			"SECTION_COUNT_ELEMENTS" => 'N',
			"SECTION_TOP_DEPTH"      => '',

			"PAGE_ELEMENT_COUNT"        => 25,
			"LINE_ELEMENT_COUNT"        => '',
			"ELEMENT_SORT_FIELD"        => 'NAME',
			"ELEMENT_SORT_ORDER"        => 'ASC',
			"ELEMENT_SORT_FIELD2"       => 'ID',
			"ELEMENT_SORT_ORDER2"       => 'DESC',
			"LIST_PROPERTY_CODE"        => $iblockProps,
			"INCLUDE_SUBSECTIONS"       => 'N',
			"LIST_META_KEYWORDS"        => '',
			"LIST_META_DESCRIPTION"     => '',
			"LIST_BROWSER_TITLE"        => '',
			"LIST_OFFERS_FIELD_CODE"    => array("NAME", "PREVIEW_PICTURE"),
			"LIST_OFFERS_PROPERTY_CODE" => $skuIblockProps,
			"LIST_OFFERS_LIMIT"         => '',
			"SECTION_BACKGROUND_IMAGE"  => '',

			"DETAIL_PROPERTY_CODE"             => $iblockProps,
			"DETAIL_META_KEYWORDS"             => '',
			"DETAIL_META_DESCRIPTION"          => '',
			"DETAIL_BROWSER_TITLE"             => '',
			"DETAIL_SET_CANONICAL_URL"         => 'N',
			"SECTION_ID_VARIABLE"              => '',
			"DETAIL_CHECK_SECTION_ID_VARIABLE" => 'N',
			"DETAIL_OFFERS_FIELD_CODE"         => array("ID", "NAME"),
			"DETAIL_OFFERS_PROPERTY_CODE"      => $skuIblockProps,
			"DETAIL_BACKGROUND_IMAGE"          => '',
			"SHOW_DEACTIVATED"                 => 'N',

			"LINK_IBLOCK_TYPE"  => '',
			"LINK_IBLOCK_ID"    => '',
			"LINK_PROPERTY_SID" => '',
			"LINK_ELEMENTS_URL" => '',

			"USE_ALSO_BUY"           => 'N',
			"ALSO_BUY_ELEMENT_COUNT" => '',
			"ALSO_BUY_MIN_BUYES"     => '',

			"USE_GIFTS_DETAIL" => 'N',
			"USE_STORE"        => 'N',

			"OFFERS_SORT_FIELD"  => 'SORT',
			"OFFERS_SORT_ORDER"  => 'ASC',
			"OFFERS_SORT_FIELD2" => 'NAME',
			"OFFERS_SORT_ORDER2" => 'ASC',

			"PAGER_TEMPLATE"       => 'av_corp',
			"DISPLAY_TOP_PAGER"    => 'N',
			"DISPLAY_BOTTOM_PAGER" => 'Y',

			"SET_STATUS_404" => 'Y',
			"SHOW_404"       => 'Y',
			"MESSAGE_404"    => '',
			"FILE_404"       => '',

			"USE_ELEMENT_COUNTER"            => 'Y',
			"DISABLE_INIT_JS_IN_COMPONENT"   => 'N',
			"DETAIL_SET_VIEWED_IN_COMPONENT" => 'N',

			"DETAIL_PICTURES_ALT"     => array($morePhotoPropId),
			"ASK_FORM_ID"             => 52,
			"ASK_FORM_LINK_FIELD_ID"  => 'form_text_334',
			"ASK_FORM_COUNT_FIELD_ID" => 'form_text_335',
			"CATALOG_MENU_TYPE"       => 'catalog',
			"PAGE_SIZE_VALUES"        => array(10, 20, 30)
			)
		);
	}

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';