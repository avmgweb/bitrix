<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "профнастил, профлист, металлочерепица");
$APPLICATION->SetPageProperty("description", "Полезные советы про металлочерепицу и профнастил! Звоните ☎(067)566-05-54 Мы расскажем как правильно рассчитать✔выбрать✔крепить профлист!");
$APPLICATION->SetTitle("Профнастил и металлочерепица: выбор, стоимость, применение и монтаж 🏠 | Статьи AVsteel ✏ avsteel.com.ua");
CJSCore::Init(["jquery", "fx"]);
$APPLICATION->SetAdditionalCSS(implode('/', $pageUrlArray).'/style.css');

CPageOption::SetOptionString("main", "nav_page_in_session", "N");
?><div class="container av-vs-blog-wrap">
	<div class="text-center" id="h1Blog">
		<h1 class="text-uppercase" red-text="">БЛОГ</h1>
	<span>
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/blog/blog-under-h1.php"
				)
			);?>
	</span>
	</div>
	<br>
<?$APPLICATION->IncludeComponent(
	"bitrix:blog", 
	"av-steel-blog", 
	array(
		"AJAX_POST" => "N",
		"ALLOW_POST_CODE" => "Y",
		"ALLOW_POST_MOVE" => "N",
		"BLOG_COUNT" => "20",
		"BLOG_COUNT_MAIN" => "6",
		"BLOG_PROPERTY" => array(
		),
		"BLOG_PROPERTY_LIST" => array(
		),
		"BLOG_URL" => "proflist",
		"CACHE_TIME" => "3600",
		"CACHE_TIME_LONG" => "604800",
		"CACHE_TYPE" => "A",
		"COLOR_TYPE" => "Y",
		"COMMENTS_COUNT" => "25",
		"COMMENT_ALLOW_IMAGE_UPLOAD" => "A",
		"COMMENT_ALLOW_VIDEO" => "Y",
		"COMMENT_EDITOR_CODE_DEFAULT" => "N",
		"COMMENT_EDITOR_DEFAULT_HEIGHT" => "200",
		"COMMENT_EDITOR_RESIZABLE" => "Y",
		"COMMENT_PROPERTY" => array(
		),
		"DATE_TIME_FORMAT" => "d.m.Y H:i:s",
		"DO_NOT_SHOW_MENU" => "N",
		"DO_NOT_SHOW_SIDEBAR" => "N",
		"EDITOR_CODE_DEFAULT" => "N",
		"EDITOR_DEFAULT_HEIGHT" => "300",
		"EDITOR_RESIZABLE" => "Y",
		"GROUP_ID" => array(
			0 => "3",
			1 => "",
		),
		"IMAGE_MAX_HEIGHT" => "800",
		"IMAGE_MAX_WIDTH" => "800",
		"MESSAGE_COUNT" => "6",
		"MESSAGE_COUNT_MAIN" => "6",
		"MESSAGE_LENGTH" => "100",
		"NAME_TEMPLATE" => "#NOBR##LAST_NAME# #NAME##/NOBR#",
		"NAV_TEMPLATE" => "",
		"NOT_USE_COMMENT_TITLE" => "N",
		"NO_URL_IN_COMMENTS" => "",
		"NO_URL_IN_COMMENTS_AUTHORITY" => "",
		"PATH_TO_CONPANY_DEPARTMENT" => "/company/structure.php?set_filter_structure=Y&structure_UF_DEPARTMENT=#ID#",
		"PATH_TO_MESSAGES_CHAT" => "/company/personal/messages/chat/#user_id#/",
		"PATH_TO_SMILE" => "/bitrix/images/blog/smile/",
		"PATH_TO_SONET_USER_PROFILE" => "/company/personal/user/#user_id#/",
		"PERIOD" => "",
		"PERIOD_DAYS" => "30",
		"PERIOD_NEW_TAGS" => "",
		"POST_PROPERTY" => array(
		),
		"POST_PROPERTY_LIST" => array(
		),
		"RATING_TYPE" => "",
		"SEF_MODE" => "N",
		"SEO_USE" => "Y",
		"SEO_USER" => "N",
		"SET_NAV_CHAIN" => "N",
		"SET_TITLE" => "Y",
		"SHOW_LOGIN" => "Y",
		"SHOW_NAVIGATION" => "Y",
		"SHOW_RATING" => "",
		"SHOW_SPAM" => "N",
		"SMILES_COUNT" => "4",
		"THEME" => "blue",
		"USER_PROPERTY" => array(
		),
		"USER_PROPERTY_NAME" => "",
		"USE_ASC_PAGING" => "N",
		"USE_GOOGLE_CODE" => "Y",
		"USE_SHARE" => "N",
		"WIDTH" => "100%",
		"COMPONENT_TEMPLATE" => "av-steel-blog",
		"SEF_FOLDER" => "/blog/",
		"VARIABLE_ALIASES" => array(
			"blog" => "blog",
			"post_id" => "post_id",
			"user_id" => "user_id",
			"page" => "page",
			"group_id" => "group_id",
		)
	),
	false
);?><br>
	</div>
	<br>
	<br>
	<br>
	<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>