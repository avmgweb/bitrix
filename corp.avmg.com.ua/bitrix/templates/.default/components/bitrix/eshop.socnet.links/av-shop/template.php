<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["SOCSERV"]))                                return;
?>
<div class="av-shop-soc-links">
	<?foreach($arResult["SOCSERV"] as $socServType => $socServInfo):?>
	<a
		class="<?=strtolower($socServType)?>"
		href="<?=$socServInfo["LINK"]?>"
		target="_blank"
		rel="nofollow"
	>
		<?
		switch(strtolower($socServType))
			{
			case "facebook": echo "<i class=\"icon fa fa-facebook\"></i>";   break;
			case "google"  : echo "<i class=\"icon fa fa-google-plus\"></i>";break;
			case "twitter" : echo "<i class=\"icon fa fa-twitter\"></i>";    break;
			}
		?>
	</a>
	<?endforeach?>
</div>