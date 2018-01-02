<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult))                                           return;
?>
<ul class="av-menu-bottom">
	<?foreach($arResult as $index => $itemInfo):?>
		<?if($itemInfo["DEPTH_LEVEL"] == 1):?>
			<?$nextIndex = $index + 1?>
			<li>
				<a
					class="main-link<?if($itemInfo["PARAMS"]["important"] == 'Y'):?> important-link<?endif?>"
					<?if(str_replace('index.php', '', explode('?', $itemInfo["LINK"])[0]) != $APPLICATION->GetCurPage(false) && $itemInfo["PERMISSION"] != 'D'):?>
					href="<?=$itemInfo["LINK"]?>" rel="nofollow"
					<?endif?>
				>
					<?=$itemInfo["TEXT"]?>
				</a>

				<?if(count($arResult[$nextIndex]) && $arResult[$nextIndex]["DEPTH_LEVEL"] == 2):?>
				<ul>
					<?while(count($arResult[$nextIndex]) && $arResult[$nextIndex]["DEPTH_LEVEL"] == 2):?>
						<?if($arResult[$nextIndex]["PARAMS"]["space"] == 'top'):?>
						<li>&nbsp;</li>
						<?endif?>

						<li>
							<a
								class="sub-link<?if($arResult[$nextIndex]["PARAMS"]["important"] == 'Y'):?> important-link<?endif?>"
								<?if(str_replace('index.php', '', explode('?', $arResult[$nextIndex]["LINK"])[0]) != $APPLICATION->GetCurPage(false) && $arResult[$nextIndex]["PERMISSION"] != 'D'):?>
								href="<?=$arResult[$nextIndex]["LINK"]?>" rel="nofollow"
								<?endif?>
							>
								<?=$arResult[$nextIndex]["TEXT"]?>
							</a>
						</li>

						<?if($arResult[$nextIndex]["PARAMS"]["space"] == 'bottom'):?>
						<li>&nbsp;</li>
						<?endif?>
						<?$nextIndex++?>
					<?endwhile?>
				</ul>
				<?endif?>
			</li>
		<?endif?>
	<?endforeach?>
</ul>