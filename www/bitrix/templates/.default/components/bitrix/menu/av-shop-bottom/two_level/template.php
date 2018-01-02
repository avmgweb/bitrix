<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-shop-menu-bottom-two-level columns-<?=$arParams["COLUMS_COUNT"]?>">
	<?foreach($arResult["ITEMS"][1] as $itemInfo):?>
	<div class="first-level-block">
		<a
			href="<?=$itemInfo["LINK"]?>"
			<?if($itemInfo["PARAMS"]["OPEN_NEW_TAB"] == "Y"):?>target="_blank"<?endif?>
			rel="nofollow"
		>
			<?=$itemInfo["TEXT"]?>
		</a>

		<?if(count($arResult["ITEMS"][2][$itemInfo["LINK"]])):?>
		<div class="second-level-block">
			<?foreach($arResult["ITEMS"][2][$itemInfo["LINK"]] as $subitemInfo):?>
			<a
				href="<?=$subitemInfo["LINK"]?>"
				<?if($subitemInfo["PARAMS"]["OPEN_NEW_TAB"] == "Y"):?>target="_blank"<?endif?>
				rel="nofollow"
			>
				<?=$subitemInfo["TEXT"]?>
			</a>
			<?endforeach?>
		</div>
		<?endif?>
	</div>
	<?endforeach?>
</div>