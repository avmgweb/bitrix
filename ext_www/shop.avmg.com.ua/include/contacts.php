<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="adress">
	<?=$arParams["COUNTRY"]?>, <?=$arParams["CITY"]?>, <br>
	<?=$arParams["STREET"]?>
</div>
<div class="phone-list">
	<?foreach($arParams["PHONES"] as $phone):?>
	<a href="tel:<?=str_replace(["(", ")", "-", " "], "", $phone)?>">
		<?=$phone?>
	</a>
	<?endforeach?>
</div>
<a href="mailto:<?=$arParams["EMAIL"]?>"><?=$arParams["EMAIL"]?></a>