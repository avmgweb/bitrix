<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-links-list">
	<div class="title-label" title="<?=$arResult["TITLE"]?>">
		<div><?=$arResult["VALUE"] ? $arResult["LIST"][$arResult["VALUE"]] : $arParams["TITLE"]?></div>
		<div></div>
	</div>

	<div class="list">
	<?foreach($arParams["LIST"] as $link => $title):?>
		<?if($link == $arParams["VALUE"]):?><div class="list-item selected"><?=$title?></div>
		<?else:?>                           <a class="list-item" href="<?=$link?>"><?=$title?></a>
		<?endif?>
	<?endforeach?>
	</div>
</div>