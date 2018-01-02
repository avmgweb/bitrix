<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-learning-course">
	<div class="menu">
		<?=$arResult["MENU_HTML"]?>
	</div>

	<div class="page<?if($arResult["PAGE_TYPE"] == 'course.detail'):?> start<?endif?>">
		<div>
			<?=$arResult["CONTENT_HTML"]?>
		</div>

		<?if($arResult["NAVIGATION_HTML"]):?>
		<div class="course-navigation<?if(!($arResult["PAGE_TYPE"] == 'course.detail' && !$arResult["CONTENT_HTML"])):?> separate<?endif?>">
			<?=$arResult["NAVIGATION_HTML"]?>
		</div>
		<?endif?>
	</div>
</div>