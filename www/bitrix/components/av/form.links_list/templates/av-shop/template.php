<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-links-list-shop">
	<div class="title-block" title="<?=$arResult["TITLE"]?>">
		<div class="title"><?=$arResult["VALUE"] ? $arResult["LIST"][$arResult["VALUE"]] : $arResult["TITLE"]?></div>
		<i class="arrow fa fa-angle-down"></i>
	</div>

	<div class="list">
	<?foreach($arParams["LIST"] as $link => $title):?>
		<?if($link == $arParams["VALUE"]):?><div class="list-item selected"><?=$title?></div>
		<?else:?>                           <a class="list-item" href="<?=$link?>"><?=$title?></a>
		<?endif?>
	<?endforeach?>
	</div>
</div>