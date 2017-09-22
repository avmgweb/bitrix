<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* --------------------------- image block ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="main-image-wraper">
	<?if(!count($arResult["IMAGES"][0])):?>
		<img
			class="default"
			src="<?=$this->GetFolder()?>/images/default_image.jpg"
			alt="<?=$arResult["NAME"]?>"
			title="<?=$arResult["NAME"]?>"
		>
	<?else:?>
		<img
			src="<?=$arResult["IMAGES"][0]["SRC"]?>"
			alt="<?=$arResult["IMAGES"][0]["ALT"]?>"
			title="<?=$arResult["IMAGES"][0]["TITLE"]?>"
		>
	<?endif?>
</div>

<?if(count($arResult["IMAGES"]) > 1):?>
<div
	class="slider"
	data-slides-count="3"
	data-slides-count-mobile="2"
>
	<div class="navigation prev"></div>

	<div class="slider-block">
		<?for($i = 0;$i <= count($arResult["IMAGES"]) - 1;$i++):?>
		<div class="slider-image">
			<img
				src="<?=$arResult["IMAGES"][$i]["SRC"]?>"
				alt="<?=$arResult["IMAGES"][$i]["ALT"]?>"
				title="<?=$arResult["IMAGES"][$i]["TITLE"]?>"
			>
		</div>
		<?endfor?>
	</div>

	<div class="navigation next"></div>
</div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- big slider ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["IMAGES"][0])):?>
<div class="av-catalog-element-image-viewer<?if(count($arResult["IMAGES"]) > 1):?> has-slider<?endif?>">
	<div class="close"></div>
	<div class="body">
		<div class="slider-main" data-slides-count="1" data-slides-count-mobile="1">
			<div class="navigation prev"></div>

			<div class="slider-block">
				<?for($i = 0;$i <= count($arResult["IMAGES"]) - 1;$i++):?>
				<div class="slider-image">
					<img
						src="<?=$arResult["IMAGES"][$i]["SRC"]?>"
						alt="<?=$arResult["IMAGES"][$i]["ALT"]?>"
						title="<?=$arResult["IMAGES"][$i]["TITLE"]?>"
					>
				</div>
				<?endfor?>
			</div>

			<div class="navigation next"></div>
		</div>

		<?if(count($arResult["IMAGES"]) > 1):?>
		<div
			class="slider-vertical"
			data-slides-count="5"
			data-slides-count-mobile="3"
		>
			<div class="navigation prev"></div>

			<div class="slider-block">
				<?for($i = 0;$i <= count($arResult["IMAGES"]) - 1;$i++):?>
				<div class="slider-image">
					<img
						src="<?=$arResult["IMAGES"][$i]["SRC"]?>"
						alt="<?=$arResult["IMAGES"][$i]["ALT"]?>"
						title="<?=$arResult["IMAGES"][$i]["TITLE"]?>"
					>
				</div>
				<?endfor?>
			</div>

			<div class="navigation next"></div>
		</div>
		<?endif?>
	</div>
</div>
<?endif?>