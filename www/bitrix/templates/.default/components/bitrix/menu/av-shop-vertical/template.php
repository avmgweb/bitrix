<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult))                                           return;
/* -------------------------------------------------------------------- */
/* -------------------------- one level menu -------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["MAX_LEVEL"] == 1):?>
	<div class="av-shop-menu-vertical-one-level">
	<?foreach($arResult as $itemInfo):?>
		<?if($itemInfo["DEPTH_LEVEL"] == 1):?>
			<a
				<?if($itemInfo["SELECTED"]):?>
				class="selected"
				rel="nofollow"
				<?endif?>
				href="<?=$itemInfo["LINK"]?>"
			>
				<div class="title"><?=$itemInfo["TEXT"]?></div>
				<i class="arrow fa fa-angle-right"></i>
			</a>
		<?endif?>
	<?endforeach?>
	</div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* -------------------------- two level menu -------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["MAX_LEVEL"] == 2):?>
	<?foreach($arResult as $index => $itemInfo):?>
		<?if($itemInfo["DEPTH_LEVEL"] == 1):?>
			<?$nextIndex = $index + 1?>
			<div class="
				av-shop-menu-vertical-two-level
				<?if($arResult[$nextIndex]["DEPTH_LEVEL"] == 2):?>parent<?endif?>
				<?if($itemInfo["ACTIVE"] || $itemInfo["SELECTED"]):?>active<?endif?>
				"
			>
				<?
				/* ------------------------------------------- */
				/* ------------------ head ------------------- */
				/* ------------------------------------------- */
				?>
				<div class="head">
					<?if($itemInfo["LINK"]):?>
						<a class="title<?if($itemInfo["SELECTED"]):?> selected<?endif?>" href="<?=$itemInfo["LINK"]?>">
							<?=$itemInfo["TEXT"]?>
						</a>
					<?else:?>
						<div class="title<?if($itemInfo["SELECTED"]):?> selected<?endif?>">
							<?=$itemInfo["TEXT"]?>
						</div>
					<?endif?>

					<?if($arResult[$nextIndex]["DEPTH_LEVEL"] == 2):?>
					<i class="arrow fa fa-times"></i>
					<?endif?>
				</div>
				<?
				/* ------------------------------------------- */
				/* ------------------ body ------------------- */
				/* ------------------------------------------- */
				?>
				<?if($arResult[$nextIndex]["DEPTH_LEVEL"] == 2):?>
				<div class="body">
					<?while($arResult[$nextIndex]["DEPTH_LEVEL"] == 2):?>
						<?if($arResult[$nextIndex]["LINK"]):?>
						<a
							<?if($arResult[$nextIndex]["SELECTED"]):?>
							class="selected"
							rel="nofollow"
							<?endif?>
							href="<?=$arResult[$nextIndex]["LINK"]?>"
						>
							<div class="title"><?=$arResult[$nextIndex]["TEXT"]?></div>
							<i class="arrow fa fa-angle-right"></i>
						</a>
						<?endif?>

						<?$nextIndex++?>
					<?endwhile?>
				</div>
				<?endif?>
			</div>
		<?endif?>
	<?endforeach?>
<?endif?>