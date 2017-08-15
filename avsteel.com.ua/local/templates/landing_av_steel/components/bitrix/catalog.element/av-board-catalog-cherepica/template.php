<?
CJSCore::Init(["jquery"]);

$APPLICATION->SetAdditionalCss($templateFolder."/style.css");
?>
<div id="av-steel-catalog-wrap-cherepica" data-element-id="<?=$arResult["ID"]?>" data-element-name="<?=$arResult["NAME"]?>">
<table class=" text-center">
			  <tbody><tr>
				<td>толщина металла</td>
				<td>длина листа</td>
				<td colspan="2">полиэстр</td>
			  </tr>
			<tr>
				<td>0,45 - 0,5мм</td>
				<td>до 12м</td>
				<td>глянцевый</td>
				<td>матовый</td>
			  </tr>
			  <tr>
				  <td colspan="2">ЦЕНА ОТ:</td>
				  <td><strong> <span  data-red-text=""><?=$arResult["PRICE_MATRIX"]["MATRIX"]["1"]["ZERO-INF"]["PRICE"];?> 
						<?
						if($arResult["PRICE_MATRIX"]["MATRIX"]["1"]["ZERO-INF"]["CURRENCY"] == "UAH"){
						echo("грн");
						}
						if($arResult["PRICE_MATRIX"]["MATRIX"]["1"]["ZERO-INF"]["CURRENCY"] == "RUB"){
						echo("руб");
						}
						if($arResult["PRICE_MATRIX"]["MATRIX"]["1"]["ZERO-INF"]["CURRENCY"] == "USD"){
						echo("$");
						}
					  ?>/<?echo($arResult["CATALOG_MEASURE_NAME"]);?></span>
					</strong></td>
					<td><strong> <span data-red-text=""><?=$arResult["PRICE_MATRIX"]["MATRIX"]["2"]["ZERO-INF"]["PRICE"];?> 
						<?
						if($arResult["PRICE_MATRIX"]["MATRIX"]["1"]["ZERO-INF"]["CURRENCY"] == "UAH"){
						echo("грн");
						}
						if($arResult["PRICE_MATRIX"]["MATRIX"]["1"]["ZERO-INF"]["CURRENCY"] == "RUB"){
						echo("руб");
						}
						if($arResult["PRICE_MATRIX"]["MATRIX"]["1"]["ZERO-INF"]["CURRENCY"] == "USD"){
						echo("$");
						}
						?>/<?echo($arResult["CATALOG_MEASURE_NAME"]);?>
					</span></strong></td>
			  </tr>
					</tbody></table>
						<br>

</div>
