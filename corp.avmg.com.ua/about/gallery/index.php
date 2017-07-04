<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/intranet/public/about/gallery/index.php");
$APPLICATION->SetTitle(GetMessage("ABOUT_TITLE"));
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:photogallery", 
	".default", 
	array(
		"USE_LIGHT_VIEW" => "Y",
		"IBLOCK_TYPE" => "photos",
		"IBLOCK_ID" => "15",
		"SEF_MODE" => "N",
		"SEF_FOLDER" => "/about/gallery/",
		"PATH_TO_USER" => "/company/personal/user/#user_id#/",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600000",
		"USE_RATING" => "Y",
		"DISPLAY_AS_RATING" => "rating_main",
		"SHOW_TAGS" => "Y",
		"USE_COMMENTS" => "N",
		"SHOW_LINK_ON_MAIN_PAGE" => array(
			0 => "id",
			1 => "shows",
			2 => "rating",
			3 => "comments",
		),
		"SHOW_ON_MAIN_PAGE" => "none",
		"SHOW_ON_MAIN_PAGE_POSITION" => "left",
		"SHOW_ON_MAIN_PAGE_TYPE" => "none",
		"SHOW_ON_MAIN_PAGE_COUNT" => "",
		"SHOW_PHOTO_ON_DETAIL_LIST" => "none",
		"SHOW_PHOTO_ON_DETAIL_LIST_COUNT" => "500",
		"PAGE_NAVIGATION_TEMPLATE" => "",
		"ORIGINAL_SIZE" => "1280",
		"UPLOADER_TYPE" => "form",
		"WATERMARK_COLORS" => array(
			0 => "FF0000",
			1 => "FFFF00",
			2 => "FFFFFF",
			3 => "000000",
			4 => "",
		),
		"TEMPLATE_LIST" => ".default",
		"CELL_COUNT" => "0",
		"COMPONENT_TEMPLATE" => ".default",
		"SECTION_SORT_BY" => "UF_DATE",
		"SECTION_SORT_ORD" => "DESC",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "desc",
		"DRAG_SORT" => "Y",
		"DATE_TIME_FORMAT_DETAIL" => "d.m.Y",
		"DATE_TIME_FORMAT_SECTION" => "d.m.Y",
		"SET_TITLE" => "Y",
		"ALBUM_PHOTO_SIZE" => "120",
		"THUMBNAIL_SIZE" => "100",
		"JPEG_QUALITY1" => "100",
		"JPEG_QUALITY" => "100",
		"ADDITIONAL_SIGHTS" => array(
		),
		"PHOTO_LIST_MODE" => "Y",
		"SHOWN_ITEMS_COUNT" => "6",
		"SHOW_NAVIGATION" => "N",
		"MAX_VOTE" => "5",
		"VOTE_NAMES" => array(
			0 => "1",
			1 => "2",
			2 => "3",
			3 => "4",
			4 => "5",
			5 => "",
		),
		"RATING_MAIN_TYPE" => "",
		"TAGS_PAGE_ELEMENTS" => "150",
		"TAGS_PERIOD" => "",
		"TAGS_INHERIT" => "Y",
		"TAGS_FONT_MAX" => "30",
		"TAGS_FONT_MIN" => "10",
		"TAGS_COLOR_NEW" => "3E74E6",
		"TAGS_COLOR_OLD" => "C0C0C0",
		"TAGS_SHOW_CHAIN" => "Y",
		"UPLOAD_MAX_FILE_SIZE" => "1024",
		"USE_WATERMARK" => "Y",
		"WATERMARK_RULES" => "USER",
		"PATH_TO_FONT" => "default.ttf",
		"WATERMARK_MIN_PICTURE_SIZE" => "800",
		"VARIABLE_ALIASES" => array(
			"SECTION_ID" => "SECTION_ID",
			"ELEMENT_ID" => "ELEMENT_ID",
			"PAGE_NAME" => "PAGE_NAME",
			"ACTION" => "ACTION",
		)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>