<div class=" av-steel-catalog-wrap" element-id="<?=$arElement["ID"]?>">
	<div class="text-center text-uppercase"><span name><strong><?=$arResult["NAME"]?></strong></span></div>
	<div class="catalog-img"  style="background: url('<? echo $arResult['PREVIEW_PICTURE']['SRC']; ?>') no-repeat center center;width: 100%; height: 140px;margin: 8px 0px;"></div>
<br>
			<table class=" text-center" style="width: 95%; margin: 0 auto;">
			  <tbody><tr>
				<td>толщина<br>металла1</td>
				<td>длина<br>листа</td>
				<td colspan="2">полиэстр</td>
			  </tr>
			<tr>
				<td>0,45 - 0,5мм</td>
				<td>до 12м</td>
				<td>глянцевый</td>
				<td>матовый</td>

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
						?>/<?echo($arResult["CATALOG_MEASURE_NAME"]);?>
					</span>
					</strong></td>
					<td><strong> <span data-red-text=""><?=$arResult["PRICE_MATRIX"]["MATRIX"]["2"]["ZERO-INF"]["PRICE"];?> 
						<?
						if($arResult["PRICE_MATRIX"]["MATRIX"]["2"]["ZERO-INF"]["CURRENCY"] == "UAH"){
						echo("грн");
						}
						if($arResult["PRICE_MATRIX"]["MATRIX"]["2"]["ZERO-INF"]["CURRENCY"] == "RUB"){
						echo("руб");
						}
						if($arResult["PRICE_MATRIX"]["MATRIX"]["2"]["ZERO-INF"]["CURRENCY"] == "USD"){
						echo("$");
						}
						?>/<?echo($arResult["CATALOG_MEASURE_NAME"]);?>
					</span></strong></td>
					</tr>
					</tbody></table>

</div>
