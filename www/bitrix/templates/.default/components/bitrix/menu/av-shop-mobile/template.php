<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult))                                           return;
?>
<ul class="av-shop-mobile-menu">
	<?foreach($arResult["ITEMS"][1] as $itemInfo):?>
	<li class="first-level-item">
		<?
		/* ------------------------------------------- */
		/* ------------------ head ------------------- */
		/* ------------------------------------------- */
		?>
		<div class="title-block">
			<?if($itemInfo["PERMISSION"] != "D" && $itemInfo["LINK"]):?>
				<a
					class="link<?if($itemInfo["ACTIVE"] || $itemInfo["SELECTED"]):?> selected<?endif?>"
					href="<?=$itemInfo["LINK"]?>"
					<?if($itemInfo["SELECTED"]):?>rel="nofollow"<?endif?>
				>
					<img
						src="<?=($itemInfo["PARAMS"]["ICON"] ? $itemInfo["PARAMS"]["ICON"] : $this->GetFolder()."/images/icon_default.svg")?>"
						alt="<?=$itemInfo["TEXT"]?>"
						title="<?=$itemInfo["TEXT"]?>"
					>
					<div><?=$itemInfo["TEXT"]?></div>
				</a>
			<?else:?>
				<div class="link<?if($itemInfo["ACTIVE"] || $itemInfo["SELECTED"]):?> selected<?endif?>">
					<img
						src="<?=($itemInfo["PARAMS"]["ICON"] ? $itemInfo["PARAMS"]["ICON"] : $this->GetFolder()."/images/icon_default.svg")?>"
						alt="<?=$itemInfo["TEXT"]?>"
						title="<?=$itemInfo["TEXT"]?>"
					>
					<div><?=$itemInfo["TEXT"]?></div>
				</div>
			<?endif?>
			<i class="arrow fa fa-angle-down"></i>
		</div>
		<?
		/* ------------------------------------------- */
		/* ------------------ body ------------------- */
		/* ------------------------------------------- */
		?>
		<?if(count($arResult["ITEMS"][2][$itemInfo["LINK"]])):?>
		<ul class="second-level-block">
			<?foreach($arResult["ITEMS"][2][$itemInfo["LINK"]] as $subitemInfo):?>
			<li>
				<a
					<?if($subitemInfo["ACTIVE"] || $subitemInfo["SELECTED"]):?>class="selected"<?endif?>
					href="<?=$subitemInfo["LINK"]?>"
					<?if($subitemInfo["SELECTED"]):?>rel="nofollow"<?endif?>
				>
					<?=$subitemInfo["TEXT"]?>
				</a>
			</li>
			<?endforeach?>
		</ul>
		<?endif?>
	</li>
	<?endforeach?>
</ul>