<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["SOCSERV"]))                                return;

foreach($arResult["SOCSERV"] as $index => $socServInfo)
	{
	$imgName     = "";
	$socServType = strtolower($index);

	switch($socServType)
		{
		case "facebook": $imgName = "facebook.png";break;
		case "twitter" : $imgName = "twitter.png"; break;
		case "google"  : $imgName = "google.png";  break;
		}

	if(!$imgName)
		{
		unset($arResult["SOCSERV"][$index]);
		continue;
		}

	$arResult["SOCSERV"][$index]["TYPE"] = $socServType;
	$arResult["SOCSERV"][$index]["IMG"]  = $imgName;
	}

$arResult["SOCSERV"] = array_values($arResult["SOCSERV"]);
/* -------------------------------------------------------------------- */
/* ---------------------------- socservcs ----------------------------- */
/* -------------------------------------------------------------------- */
?>
<?foreach($arResult["SOCSERV"] as $index => $socServInfo):?>
<a
	target="_blank"
	href="<?=$socServInfo["LINK"]?>"
	style=
		"
		display: inline-block;
		<?if($index + 1 != count($arResult["SOCSERV"])):?>margin-right: 10px;<?endif?>
		width:  32px;
		height: 32px;
		"
>
	<img
		src="<?=CURRENT_PROTOCOL?>://<?=SITE_SERVER_NAME?><?=$this->GetFolder()?>/images/<?=$socServInfo["IMG"]?>"
		alt="<?=$socServInfo["TYPE"]?>"
		title="<?=$socServInfo["TYPE"]?>"
	>
</a>
<?endforeach?>