<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$displayValue = 0;

if($arParams["DISPLAY_AS_RATING"] == "vote_avg")
	$displayValue = $arResult["PROPERTIES"]["vote_count"]["VALUE"]
		? round($arResult["PROPERTIES"]["vote_sum"]["VALUE"] / $arResult["PROPERTIES"]["vote_count"]["VALUE"], 2)
		: 0;
else
	$displayValue = $arResult["PROPERTIES"]["rating"]["VALUE"];
?>
<div
	class="av-iblock-rating<?if(!$arResult["VOTED"]):?> vote-available<?endif?>"

	data-vote-id="<?=$arResult["ID"]?>"
	data-ajax-params="<?=$arResult["AJAX_PARAMS"]?>"

	itemprop="aggregateRating"
	itemscope
	itemtype="http://schema.org/AggregateRating"

	<?if($arResult["VOTED"]):?>
	title="<?=round($displayValue)?>"
	<?endif?>
>
	<?foreach($arResult["VOTE_NAMES"] as $index => $name):?>
	<i
		class="item fa fa-star<?if($displayValue && round($displayValue) > $index):?> active<?endif?>"
		data-value="<?=$index?>"

		<?if(!$arResult["VOTED"]):?>
		title="<?=$name?>"
		<?endif?>
	></i>
	<?endforeach?>

	<span itemprop="worstRating" content="<?=$arResult["VOTE_NAMES"][0]?>"></span>
	<span itemprop="bestRating"  content="<?=$arResult["VOTE_NAMES"][count($arResult["VOTE_NAMES"]) - 1]?>"></span>
	<span itemprop="ratingValue" content="<?=$displayValue?>"></span>
	<span itemprop="reviewCount" content="<?=$arResult["PROPERTIES"]["vote_count"]["VALUE"]?>"></span>
</div>