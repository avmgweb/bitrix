<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult))                                           return;
/* -------------------------------------------------------------------- */
/* -------------------------- two level menu -------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["MAX_LEVEL"] == 2):?>
<ul class="av-menu-two-level" data-av-at-avmg-main-menu="menu">
	<?foreach($arResult as $index => $itemInfo):?>
		<?if($itemInfo["DEPTH_LEVEL"] == 1):?>
		<li>
			<a
				<?if($itemInfo["SELECTED"]):?>class="selected"<?endif?>

				<?if($itemInfo["LINK"] && $itemInfo["PERMISSION"] != "D"):?>
				href="<?=$itemInfo["LINK"]?>"
				<?endif?>

				<?if($itemInfo["SELECTED"]):?>
				rel="nofollow"
				<?endif?>
			>
				<?=$itemInfo["TEXT"]?>
			</a>

			<?if($itemInfo["LINK"] && $itemInfo["PERMISSION"] != "D"):?>
			<div itemscope itemtype="http://www.schema.org/SiteNavigationElement">
				<span itemprop="name" content="<?=$itemInfo["TEXT"]?>"></span>
				<span itemprop="url"  content="<?=$itemInfo["LINK"]?>"></span>
			</div>
			<?endif?>

			<?$nextIndex = $index + 1?>
			<?if($arResult[$nextIndex]["DEPTH_LEVEL"] == 2):?>
			<ul>
				<?while($arResult[$nextIndex]["DEPTH_LEVEL"] == 2):?>
				<li>
					<a
						<?if($arResult[$nextIndex]["SELECTED"]):?>class="selected"<?endif?>

						href="<?=$arResult[$nextIndex]["LINK"]?>"

						<?if($arResult[$nextIndex]["SELECTED"]):?>
						rel="nofollow"
						<?endif?>
					>
						<?=$arResult[$nextIndex]["TEXT"]?>
					</a>
				</li>
				<?$nextIndex++?>
				<?endwhile?>
			</ul>
			<?endif?>
		</li>
		<?endif?>
	<?endforeach?>
</ul>
<?endif?>