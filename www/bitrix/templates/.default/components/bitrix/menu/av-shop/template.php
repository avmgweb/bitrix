<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult))                                           return;
?>
<div class="av-shop-menu-wraper">
	<ul class="av-shop-menu">
		<?foreach($arResult["ITEMS"][1] as $itemInfo):?>
		<li class="first-level-item">
			<?
			/* ------------------------------------------- */
			/* ------------------ head ------------------- */
			/* ------------------------------------------- */
			?>
			<?if($itemInfo["PERMISSION"] != "D" && $itemInfo["LINK"]):?>
				<a
					<?if($itemInfo["ACTIVE"] || $itemInfo["SELECTED"]):?>class="selected"<?endif?>
					href="<?=$itemInfo["LINK"]?>"
					<?if($itemInfo["SELECTED"]):?>rel="nofollow"<?endif?>
				>
					<img
						src="<?=($itemInfo["PARAMS"]["ICON"] ? $itemInfo["PARAMS"]["ICON"] : $this->GetFolder()."/images/icon_default.svg")?>"
						alt="<?=$itemInfo["TEXT"]?>"
						title="<?=$itemInfo["TEXT"]?>"
					>
					<div class="title"><?=$itemInfo["TEXT"]?></div>
				</a>
			<?else:?>
				<div<?if($itemInfo["ACTIVE"] || $itemInfo["SELECTED"]):?> class="selected"<?endif?>>
					<img
						src="<?=($itemInfo["PARAMS"]["ICON"] ? $itemInfo["PARAMS"]["ICON"] : $this->GetFolder()."/images/icon_default.svg")?>"
						alt="<?=$itemInfo["TEXT"]?>"
						title="<?=$itemInfo["TEXT"]?>"
					>
					<div class="title"><?=$itemInfo["TEXT"]?></div>
				</div>
			<?endif?>
			<?
			/* ------------------------------------------- */
			/* ------------------ body ------------------- */
			/* ------------------------------------------- */
			?>
			<?if(count($arResult["ITEMS"][2][$itemInfo["LINK"]])):?>
			<ul class="second-level-block">
				<?foreach($arResult["ITEMS"][2][$itemInfo["LINK"]] as $subitemInfo):?>
					<li class="second-level-item">
						<a
							<?if($subitemInfo["ACTIVE"] || $subitemInfo["SELECTED"]):?>class="selected"<?endif?>
							href="<?=$subitemInfo["LINK"]?>"
							<?if($subitemInfo["SELECTED"]):?>rel="nofollow"<?endif?>
						>
							<?=$subitemInfo["TEXT"]?>
						</a>
					</li>

					<?foreach($arResult["ITEMS"][3][$subitemInfo["LINK"]] as $subsubitemInfo):?>
					<li class="third-level-item">
						<a
							<?if($subsubitemInfo["ACTIVE"] || $subsubitemInfo["SELECTED"]):?>class="selected"<?endif?>
							href="<?=$subsubitemInfo["LINK"]?>"
							<?if($subsubitemInfo["SELECTED"]):?>rel="nofollow"<?endif?>
						>
							<?=$subsubitemInfo["TEXT"]?>
						</a>
					</li>
					<?endforeach?>
				<?endforeach?>
			</ul>
			<?endif?>
		</li>
		<?endforeach?>
	</ul>
</div>