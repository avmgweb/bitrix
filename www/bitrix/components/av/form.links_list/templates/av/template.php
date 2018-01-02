<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-links-list">
	<div class="title-block" title="<?=$arResult["TITLE"]?>">
		<div class="title"><?=$arResult["VALUE"] ? $arResult["LIST"][$arResult["VALUE"]] : $arResult["TITLE"]?></div>
		<input class="search-input" type="text" title="">
		<i class="arrow fa fa-angle-down"></i>
	</div>

	<div class="list">
	<?foreach($arParams["LIST"] as $link => $title):?>
		<a
			class="list-item<?if($link == $arParams["VALUE"]):?> selected<?endif?>"
			href="<?=$link?>"
			<?if($link == $arParams["VALUE"]):?>rel="nofollow"<?endif?>
		>
			<?=$title?>
		</a>
	<?endforeach?>
	</div>
</div>