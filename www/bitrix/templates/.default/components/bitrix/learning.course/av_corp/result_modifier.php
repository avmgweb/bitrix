<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult["PAGE_TYPE"]       = $this->__page;
$arResult["MENU_HTML"]       = '';
$arResult["CONTENT_HTML"]    = '';
$arResult["NAVIGATION_HTML"] = '';
/* -------------------------------------------------------------------- */
/* ------------------------------- menu ------------------------------- */
/* -------------------------------------------------------------------- */
ob_start();
$APPLICATION->IncludeComponent
	(
	"bitrix:learning.course.tree", "av_corp",
		[
		"COURSE_ID"         => $arParams["COURSE_ID"],
		"CHECK_PERMISSIONS" => $arParams["CHECK_PERMISSIONS"],
		"SET_TITLE"         => $arParams["SET_TITLE"],

		"COURSE_DETAIL_TEMPLATE"  => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["course.detail"],
		"CHAPTER_DETAIL_TEMPLATE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["chapter.detail"],
		"LESSON_DETAIL_TEMPLATE"  => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["lesson.detail"],
		"SELF_TEST_TEMPLATE"      => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["test.self"],
		"TESTS_LIST_TEMPLATE"     => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["test.list"],
		"TEST_DETAIL_TEMPLATE"    => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["test"],

		"LEARNING_GROUP_ACTIVE_FROM"          => $arResult["LEARNING_GROUP_ACTIVE_FROM"],
		"LEARNING_GROUP_ACTIVE_TO"            => $arResult["LEARNING_GROUP_ACTIVE_TO"],
		"LEARNING_GROUP_CHAPTERS_ACTIVE_FROM" => $arResult["LEARNING_GROUP_CHAPTERS_ACTIVE_FROM"]
		],
	$this->getComponent()
	);
$arResult["MENU_HTML"] = ob_get_contents();
ob_end_clean();
/* -------------------------------------------------------------------- */
/* -------------------------- chapter detail -------------------------- */
/* -------------------------------------------------------------------- */
if($arResult["PAGE_TYPE"] == 'chapter.detail')
	{
	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:learning.chapter.detail", "av_corp",
			[
			"CHAPTER_ID"           => $arResult["VARIABLES"]["CHAPTER_ID"],
			"COURSE_ID"            => $arParams["COURSE_ID"],
			"CHECK_PERMISSIONS"    => $arParams["CHECK_PERMISSIONS"],
			"SET_TITLE"            => $arParams["SET_TITLE"],
			"PATH_TO_USER_PROFILE" => $arParams["PATH_TO_USER_PROFILE"],

			"CHAPTER_DETAIL_TEMPLATE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["chapter.detail"],
			"LESSON_DETAIL_TEMPLATE"  => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["lesson.detail"],
			"SELF_TEST_TEMPLATE"      => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["test.self"],

			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"]
			],
		$this->getComponent()
		);
	$arResult["CONTENT_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* -------------------------- course contents ------------------------- */
/* -------------------------------------------------------------------- */
if($arResult["PAGE_TYPE"] == 'course.contents')
	{
	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:learning.course.contents", "av_corp",
			[
			"COURSE_ID"         => $arParams["COURSE_ID"],
			"CHECK_PERMISSIONS" => $arParams["CHECK_PERMISSIONS"],
			"SET_TITLE"         => $arParams["SET_TITLE"],
			"CACHE_TYPE"        => $arParams["CACHE_TYPE"],
			"CACHE_TIME"        => $arParams["CACHE_TIME"]
			],
		$this->getComponent()
		);
	$arResult["CONTENT_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* -------------------------- course detail --------------------------- */
/* -------------------------------------------------------------------- */
if($arResult["PAGE_TYPE"] == 'course.detail')
	{
	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:learning.course.detail", "av_corp",
			[
			"COURSE_ID"         => $arParams["COURSE_ID"],
			"CHECK_PERMISSIONS" => $arParams["CHECK_PERMISSIONS"],
			"SET_TITLE"         => $arParams["SET_TITLE"],
			"CACHE_TYPE"        => $arParams["CACHE_TYPE"],
			"CACHE_TIME"        => $arParams["CACHE_TIME"]
			],
		$this->getComponent()
		);
	$arResult["CONTENT_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ---------------------------- gradebook ----------------------------- */
/* -------------------------------------------------------------------- */
if($arResult["PAGE_TYPE"] == 'gradebook')
	{
	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:learning.student.gradebook", "av_corp",
			[
			"TEST_ID_VARIABLE" => $arParams["SEF_MODE"] == 'Y' ? $arResult["ALIASES"]["gradebook"]["FOR_TEST_ID"] : $arResult["ALIASES"]["FOR_TEST_ID"],
			"SET_TITLE"        => $arParams["SET_TITLE"],

			"TEST_DETAIL_TEMPLATE"   => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["test"],
			"COURSE_DETAIL_TEMPLATE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["course.detail"]
			],
		$this->getComponent()
		);
	$arResult["CONTENT_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* -------------------------- lesson detail --------------------------- */
/* -------------------------------------------------------------------- */
if($arResult["PAGE_TYPE"] == 'lesson.detail')
	{
	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:learning.lesson.detail", "av_corp",
			[
			"LESSON_ID"            => $arResult["VARIABLES"]["LESSON_ID"],
			"LESSON_PATH"          => $arResult["VARIABLES"]["LESSON_PATH"],
			"COURSE_ID"            => $arParams["COURSE_ID"],
			"CHECK_PERMISSIONS"    => $arParams["CHECK_PERMISSIONS"],
			"SET_TITLE"            => $arParams["SET_TITLE"],
			"PATH_TO_USER_PROFILE" => $arParams["PATH_TO_USER_PROFILE"],

			"SELF_TEST_TEMPLATE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["test.self"],

			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"]
			],
		$this->getComponent()
		);
	$arResult["CONTENT_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ search ------------------------------ */
/* -------------------------------------------------------------------- */
if($arResult["PAGE_TYPE"] == 'search')
	{
	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:learning.search", "av_corp",
			[
			"COURSE_ID"            => $arParams["COURSE_ID"],
			"PAGE_RESULT_COUNT"    => 10,
			"DISPLAY_TOP_PAGER"    => 'Y',
			"DISPLAY_BOTTOM_PAGER" => 'Y'
			],
		$this->getComponent()
		);
	$arResult["CONTENT_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- test list ---------------------------- */
/* -------------------------------------------------------------------- */
if($arResult["PAGE_TYPE"] == 'test.list')
	{
	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:learning.test.list", "av_corp",
			[
			"COURSE_ID"         => $arParams["COURSE_ID"],
			"CHECK_PERMISSIONS" => $arParams["CHECK_PERMISSIONS"],
			"TESTS_PER_PAGE"    => $arParams["TESTS_PER_PAGE"],
			"SET_TITLE"         => $arParams["SET_TITLE"],

			"TEST_DETAIL_TEMPLATE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["test"]
			],
		$this->getComponent()
		);
	$arResult["CONTENT_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ------------------------------- test ------------------------------- */
/* -------------------------------------------------------------------- */
if($arResult["PAGE_TYPE"] == 'test')
	{
	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:learning.test", "av_corp",
			[
			"TEST_ID"              => $arResult["VARIABLES"]["TEST_ID"],
			"COURSE_ID"            => $arParams["COURSE_ID"],
			"PAGE_WINDOW"          => $arParams["PAGE_WINDOW"],
			"SHOW_TIME_LIMIT"      => $arParams["SHOW_TIME_LIMIT"],
			"CHECK_PERMISSIONS"    => $arParams["CHECK_PERMISSIONS"],
			"PAGE_NUMBER_VARIABLE" => $arParams["PAGE_NUMBER_VARIABLE"],
			"SET_TITLE"            => 'Y',

			"GRADEBOOK_TEMPLATE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["gradebook"]
			],
		$this->getComponent()
		);
	$arResult["CONTENT_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- test self ---------------------------- */
/* -------------------------------------------------------------------- */
if($arResult["PAGE_TYPE"] == 'test.self')
	{
	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:learning.test.self", "av_corp",
			[
			"LESSON_ID"         => $arResult["VARIABLES"]["SELF_TEST_ID"],
			"COURSE_ID"         => $arParams["COURSE_ID"],
			"CHECK_PERMISSIONS" => $arParams["CHECK_PERMISSIONS"],
			"SET_TITLE"         => $arParams["SET_TITLE"],

			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"]
			],
		$this->getComponent()
		);
	$arResult["CONTENT_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ---------------------------- navigation ---------------------------- */
/* -------------------------------------------------------------------- */
if(in_array($arResult["PAGE_TYPE"], ["chapter.detail", "course.detail", "lesson.detail", "test.self"]))
	{
	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:learning.course.tree", "av_corp_navigation",
			[
			"COURSE_ID"	                          => $arParams["COURSE_ID"],
			"LEARNING_GROUP_CHAPTERS_ACTIVE_FROM" => $arResult["LEARNING_GROUP_CHAPTERS_ACTIVE_FROM"],
			"CHECK_PERMISSIONS"                   => $arParams["CHECK_PERMISSIONS"],
			"SET_TITLE"                           => 'N',

			"COURSE_DETAIL_TEMPLATE"  => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["course.detail"],
			"CHAPTER_DETAIL_TEMPLATE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["chapter.detail"],
			"LESSON_DETAIL_TEMPLATE"  => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["lesson.detail"],
			"SELF_TEST_TEMPLATE"      => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["test.self"],
			"TESTS_LIST_TEMPLATE"     => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["test.list"],
			"TEST_DETAIL_TEMPLATE"    => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["test"],

			"LEARNING_GROUP_ACTIVE_FROM" => $arResult["LEARNING_GROUP_ACTIVE_FROM"],
			"LEARNING_GROUP_ACTIVE_TO"   => $arResult["LEARNING_GROUP_ACTIVE_TO"]
			],
		$this->getComponent()
		);
	$arResult["NAVIGATION_HTML"] = ob_get_contents();
	ob_end_clean();
	}