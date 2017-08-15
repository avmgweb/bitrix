<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->IncludeComponent(
	"bitrix:sale.bestsellers", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"HIDE_NOT_AVAILABLE" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_NAME" => "Y",
		"SHOW_IMAGE" => "Y",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"PAGE_ELEMENT_COUNT" => "8",
		"LINE_ELEMENT_COUNT" => "",
		"TEMPLATE_THEME" => "",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "360000",
		"BY" => "AMOUNT",
		"PERIOD" => "0",
		"FILTER" => array(
		),
		"DISPLAY_COMPARE" => "N",
		"SHOW_OLD_PRICE" => "N",
		"PRICE_CODE" => array(
		),
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"SHOW_PRODUCTS_30" => "N",
		"PROPERTY_CODE_30" => array(
			0 => ",",
		),
		"CART_PROPERTIES_30" => array(
			0 => ",",
		),
		"ADDITIONAL_PICT_PROP_30" => "",
		"LABEL_PROP_30" => "-",
		"SHOW_PRODUCTS_39" => "N",
		"PROPERTY_CODE_39" => array(
			0 => ",",
		),
		"CART_PROPERTIES_39" => array(
			0 => ",",
		),
		"ADDITIONAL_PICT_PROP_39" => "",
		"LABEL_PROP_39" => "-",
		"SHOW_PRODUCTS_109" => "N",
		"PROPERTY_CODE_109" => array(
			0 => ",",
		),
		"CART_PROPERTIES_109" => array(
			0 => ",",
		),
		"ADDITIONAL_PICT_PROP_109" => "MORE_PHOTO",
		"LABEL_PROP_109" => "-",
		"PROPERTY_CODE_110" => array(
			0 => "",
			1 => "",
		),
		"CART_PROPERTIES_110" => array(
			0 => "",
			1 => "",
		),
		"ADDITIONAL_PICT_PROP_110" => "MORE_PHOTO",
		"OFFER_TREE_PROPS_110" => "",
		"SHOW_PRODUCTS_112" => "N",
		"PROPERTY_CODE_112" => array(
			0 => ",",
		),
		"CART_PROPERTIES_112" => array(
			0 => ",",
		),
		"ADDITIONAL_PICT_PROP_112" => "MORE_PHOTO",
		"LABEL_PROP_112" => "-",
		"PROPERTY_CODE_113" => array(
			0 => "",
			1 => "",
		),
		"CART_PROPERTIES_113" => array(
			0 => "",
			1 => "",
		),
		"ADDITIONAL_PICT_PROP_113" => "MORE_PHOTO",
		"OFFER_TREE_PROPS_113" => "",
		"SHOW_PRODUCTS_118" => "N",
		"PROPERTY_CODE_118" => array(
			0 => ",",
		),
		"CART_PROPERTIES_118" => array(
			0 => ",",
		),
		"ADDITIONAL_PICT_PROP_118" => "MORE_PHOTO",
		"LABEL_PROP_118" => "-",
		"SHOW_PRODUCTS_121" => "N",
		"PROPERTY_CODE_121" => array(
			0 => ",",
		),
		"CART_PROPERTIES_121" => array(
			0 => ",",
		),
		"ADDITIONAL_PICT_PROP_121" => "",
		"LABEL_PROP_121" => "-",
		"SHOW_PRODUCTS_130" => "N",
		"PROPERTY_CODE_130" => array(
			0 => ",",
		),
		"CART_PROPERTIES_130" => array(
			0 => ",",
		),
		"ADDITIONAL_PICT_PROP_130" => "",
		"LABEL_PROP_130" => "-",
		"SHOW_PRODUCTS_139" => "N",
		"PROPERTY_CODE_139" => array(
			0 => ",",
		),
		"CART_PROPERTIES_139" => array(
			0 => ",",
		),
		"ADDITIONAL_PICT_PROP_139" => "more_photo",
		"LABEL_PROP_139" => "-",
		"PROPERTY_CODE_140" => array(
			0 => "",
			1 => "",
		),
		"CART_PROPERTIES_140" => array(
			0 => "",
			1 => "",
		),
		"ADDITIONAL_PICT_PROP_140" => "",
		"OFFER_TREE_PROPS_140" => "",
		"PROPERTY_CODE_142" => array(
			0 => "",
			1 => "",
		),
		"CART_PROPERTIES_142" => array(
			0 => "",
			1 => "",
		),
		"ADDITIONAL_PICT_PROP_142" => "",
		"OFFER_TREE_PROPS_142" => "",
		"PROPERTY_CODE_144" => array(
			0 => "",
			1 => "",
		),
		"CART_PROPERTIES_144" => array(
			0 => "",
			1 => "",
		),
		"ADDITIONAL_PICT_PROP_144" => "",
		"OFFER_TREE_PROPS_144" => "",
		"PROPERTY_CODE_146" => array(
			0 => "",
			1 => "",
		),
		"CART_PROPERTIES_146" => array(
			0 => "",
			1 => "",
		),
		"ADDITIONAL_PICT_PROP_146" => "",
		"OFFER_TREE_PROPS_146" => "",
		"PROPERTY_CODE_148" => array(
			0 => "",
			1 => "",
		),
		"CART_PROPERTIES_148" => array(
			0 => "",
			1 => "",
		),
		"ADDITIONAL_PICT_PROP_148" => "",
		"OFFER_TREE_PROPS_148" => "",
		"PROPERTY_CODE_150" => array(
			0 => "",
			1 => "",
		),
		"CART_PROPERTIES_150" => array(
			0 => "",
			1 => "",
		),
		"ADDITIONAL_PICT_PROP_150" => "",
		"OFFER_TREE_PROPS_150" => ""
	),
	false
);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';