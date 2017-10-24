<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arResult)                                                  return;

$output     = "";
$itemsCount = count($arResult);

foreach($arResult as $index => $itemInfo)
	{
	if($itemInfo["LINK"] && $index != $itemsCount - 1)
		$output .= "
			<a
				class=\"item\"
				href=\"".$itemInfo["LINK"]."\"
				title=\"".$itemInfo["TITLE"]."\"
				".($index != $itemsCount - 2 ? "rel=\"nofollow\"" : "")."
			>
				".$itemInfo["TITLE"]."
			</a>";
	else
		$output .= "<span class=\"item\">".$itemInfo["TITLE"]."</span>";

	$output .= "
		<span itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\">
			<span itemprop=\"title\" content=\"".$itemInfo["TITLE"]."\"></span>
			<span itemprop=\"url\"   content=\"".CURRENT_PROTOCOL."://".$_SERVER["SERVER_NAME"].($itemInfo["LINK"] ? $itemInfo["LINK"] : $_SERVER["REQUEST_URI"])."\"></span>
		</span>";

	if($index != $itemsCount - 1) $output .= "<div class=\"separator\">/</div>";
	}

return "<div class=\"av-breadcrumb\">".$output."</div>";