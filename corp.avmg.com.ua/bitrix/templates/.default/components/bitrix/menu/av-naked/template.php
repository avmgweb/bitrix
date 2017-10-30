<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult))                                           return;
?>
<?foreach($arResult as $itemInfo):?>
<a href="<?=$itemInfo["LINK"]?>" rel="nofollow">
	<?=$itemInfo["TEXT"]?>
</a>
<?endforeach?>