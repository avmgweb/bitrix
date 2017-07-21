
<?/*****************************************************************    СВОЙСТВА    ******************************************************************************/?>
<?if(count($arResult["OFFERS"])):?>
	<div id="<?=$itemIds["TREE_ID"]?>">
		<div class="product-item-detail-info-container" data-entity="sku-line-block">
			<div class="product-item-scu-item-text-block table-title">
				<?foreach($arResult["ORIGINAL_PARAMETERS"]["OFFERS_FIELD_CODE"] as $field):?>
					<div class='product-item-scu-item-text'><?=$field?></div>
				<?endforeach?>

				<?foreach($arResult["ORIGINAL_PARAMETERS"]["OFFERS_PROPERTY_CODE"] as $field):?>
					<div class='product-item-scu-item-text'><?=$arResult["OFFERS"][0]["PROPERTIES"][$field]["NAME"]?></div>
				<?endforeach?>

				<div class='product-item-scu-item-text'><?=GetMessage("AV_CATALOG_ELEMENT_INFO_TABLE_COUNT")?></div>
				<div class='product-item-scu-item-text'><?=$arResult["OFFERS"]["0"]["CATALOG_GROUP_NAME_1"]?></div>
				<div class='product-item-scu-item-text'><?=GetMessage("AV_CATALOG_ELEMENT_INFO_TABLE_BUY")?></div>
			</div>
			<div class="product-item-scu-container">
				<div class="product-item-scu-block">
					<div class="product-item-scu-list">
						<ul class="product-item-scu-item-list">
							<?
							foreach ($skuProperty['VALUES'] as &$value)
								{

								$value['NAME'] = htmlspecialcharsbx($value['NAME']);

								if ($skuProperty['SHOW_MODE'] === 'PICT')
									{
									?>
										<li class="product-item-scu-item-color-container" title="<?=$value['NAME']?>"
											data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
											data-onevalue="<?=$value['ID']?>">
											<div class="product-item-scu-item-color-block">
												<div class="product-item-scu-item-color" title="<?=$value['NAME']?>"
													style="background-image: url(<?=$value['PICT']['SRC']?>);">
												</div>
											</div>
										</li>
										<?
									}
								else
									{
									foreach ($arResult["OFFERS"] as $offers => $valOffersMain) {
									?>
									<li  class="product-item-scu-item-text-container" title="<?=$value['NAME']?>"
										data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
										data-onevalue="<?=$value['ID']?>">
										<?
									foreach($valOffersMain["PROPERTIES"] as $prop => $valOffers){

									if($valOffers["VALUE_ENUM_ID"] == $value['ID'] && $valOffers["VALUE_ENUM_ID"] != 0){
									?><div class="product-item-scu-item-text-block"><?
									foreach( $arResult["OFFERS"][$offers]["DISPLAY_PROPERTIES"] as $finishKey => $finishVal){
									?><div class="product-item-scu-item-text"><?
									if($finishKey != "CML2_LINK"){

									if($finishKey == "ID"){
									echo($valOffersMain["ID"]);
									}
									if($finishVal["VALUE"] ){
									echo($finishVal["VALUE"]);
									}else{
									echo("-" );
									}
									?></div><?
									}
									}
									?><div class="product-item-scu-item-text"><?
									echo $arResult["OFFERS"][$offers]["PRICES"]["BASE"]["PRINT_VALUE_NOVAT"];
									?></div><?
									?></div><?
									}
									}
									?>
										</li><?
									}

									}
								}
							?>
						</ul>
						<div style="clear: both;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?endif?>







<div class="col-sm-4">
	<div class="product-item-detail-pay-block">
		<?
		foreach ($arParams['PRODUCT_PAY_BLOCK_ORDER'] as $blockName)
			{
			switch ($blockName)
				{
			case 'rating':
				if ($arParams['USE_VOTE_RATING'] === 'Y')
					{
					?>
						<div class="product-item-detail-info-container">
							<?
							$APPLICATION->IncludeComponent(
								'bitrix:iblock.vote',
								'stars',
								array(
									'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
									'IBLOCK_ID' => $arParams['IBLOCK_ID'],
									'ELEMENT_ID' => $arResult['ID'],
									'ELEMENT_CODE' => '',
									'MAX_VOTE' => '5',
									'VOTE_NAMES' => array('1', '2', '3', '4', '5'),
									'SET_STATUS_404' => 'N',
									'DISPLAY_AS_RATING' => $arParams['VOTE_DISPLAY_AS_RATING'],
									'CACHE_TYPE' => $arParams['CACHE_TYPE'],
									'CACHE_TIME' => $arParams['CACHE_TIME']
								),
								$component,
								array('HIDE_ICONS' => 'Y')
							);
							?>
						</div>
						<?
					}

				break;

			case 'price':
				?>
					<div class="product-item-detail-info-container">
						<?
						if ($arParams['SHOW_OLD_PRICE'] === 'Y')
							{
							?>
								<div class="product-item-detail-price-old" id="<?=$itemIds['OLD_PRICE_ID']?>"
										style="display: <?=($showDiscount ? '' : 'none')?>;">
									<?=($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '')?>
								</div>
								<?
							}
						?>
						<div class="product-item-detail-price-current" id="<?=$itemIds['PRICE_ID']?>">
							<?=$price['PRINT_RATIO_PRICE']?>
						</div>
						<?
						if ($arParams['SHOW_OLD_PRICE'] === 'Y')
							{
							?>
								<div class="item_economy_price" id="<?=$itemIds['DISCOUNT_PRICE_ID']?>"
										style="display: <?=($showDiscount ? '' : 'none')?>;">
									<?
									if ($showDiscount)
										{
										echo Loc::getMessage('CT_BCE_CATALOG_ECONOMY_INFO2', array('#ECONOMY#' => $price['PRINT_RATIO_DISCOUNT']));
										}
									?>
								</div>
								<?
							}
						?>
					</div>
					<?
				break;

			case 'priceRanges':
				if ($arParams['USE_PRICE_COUNT'])
					{
					$showRanges = !$haveOffers && count($actualItem['ITEM_QUANTITY_RANGES']) > 1;
					$useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';
					?>
						<div class="product-item-detail-info-container"
							<?=$showRanges ? '' : 'style="display: none;"'?>
								data-entity="price-ranges-block">
							<div class="product-item-detail-info-container-title">
								<?=$arParams['MESS_PRICE_RANGES_TITLE']?>
								<span data-entity="price-ranges-ratio-header">
														(<?=(Loc::getMessage(
										'CT_BCE_CATALOG_RATIO_PRICE',
										array('#RATIO#' => ($useRatio ? $measureRatio : '1').' '.$actualItem['ITEM_MEASURE']['TITLE'])
									))?>)
													</span>
							</div>
							<dl class="product-item-detail-properties" data-entity="price-ranges-body">
								<?
								if ($showRanges)
									{
									foreach ($actualItem['ITEM_QUANTITY_RANGES'] as $range)
										{
										if ($range['HASH'] !== 'ZERO-INF')
											{
											$itemPrice = false;

											foreach ($arResult['ITEM_PRICES'] as $itemPrice)
												{
												if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
													{
													break;
													}
												}

											if ($itemPrice)
												{
												?>
													<dt>
														<?
														echo Loc::getMessage(
																'CT_BCE_CATALOG_RANGE_FROM',
																array('#FROM#' => $range['SORT_FROM'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
															).' ';

														if (is_infinite($range['SORT_TO']))
															{
															echo Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
															}
														else
															{
															echo Loc::getMessage(
																'CT_BCE_CATALOG_RANGE_TO',
																array('#TO#' => $range['SORT_TO'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
															);
															}
														?>
													</dt>
													<dd><?=($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE'])?></dd>
													<?
												}
											}
										}
									}
								?>
							</dl>
						</div>
						<?
					unset($showRanges, $useRatio, $itemPrice, $range);
					}

				break;

			case 'quantityLimit':
				if ($arParams['SHOW_MAX_QUANTITY'] !== 'N')
					{
					if ($haveOffers)
						{
						?>
							<div class="product-item-detail-info-container" id="<?=$itemIds['QUANTITY_LIMIT']?>" style="display: none;">
								<div class="product-item-detail-info-container-title">
									<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
									<span class="product-item-quantity" data-entity="quantity-limit-value"></span>
								</div>
							</div>
							<?
						}
					else
						{
						if (
							$measureRatio
							&& (float)$actualItem['CATALOG_QUANTITY'] > 0
							&& $actualItem['CATALOG_QUANTITY_TRACE'] === 'Y'
							&& $actualItem['CATALOG_CAN_BUY_ZERO'] === 'N'
						)
							{
							?>
								<div class="product-item-detail-info-container" id="<?=$itemIds['QUANTITY_LIMIT']?>">
									<div class="product-item-detail-info-container-title">
										<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
										<span class="product-item-quantity" data-entity="quantity-limit-value">
																<?
																if ($arParams['SHOW_MAX_QUANTITY'] === 'M')
																	{
																	if ((float)$actualItem['CATALOG_QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR'])
																		{
																		echo $arParams['MESS_RELATIVE_QUANTITY_MANY'];
																		}
																	else
																		{
																		echo $arParams['MESS_RELATIVE_QUANTITY_FEW'];
																		}
																	}
																else
																	{
																	echo $actualItem['CATALOG_QUANTITY'].' '.$actualItem['ITEM_MEASURE']['TITLE'];
																	}
																?>
															</span>
									</div>
								</div>
								<?
							}
						}
					}

				break;

			case 'quantity':
				if ($arParams['USE_PRODUCT_QUANTITY'])
					{
					?>
						<div class="product-item-detail-info-container" style="<?=(!$actualItem['CAN_BUY'] ? 'display: none;' : '')?>"
								data-entity="quantity-block">
							<div class="product-item-detail-info-container-title"><?=Loc::getMessage('CATALOG_QUANTITY')?></div>
							<div class="product-item-amount">
								<div class="product-item-amount-field-container">
									<a class="product-item-amount-field-btn-minus" id="<?=$itemIds['QUANTITY_DOWN_ID']?>"
											href="javascript:void(0)" rel="nofollow">
									</a>
									<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY_ID']?>" type="tel"
											value="<?=$price['MIN_QUANTITY']?>">
									<a class="product-item-amount-field-btn-plus" id="<?=$itemIds['QUANTITY_UP_ID']?>"
											href="javascript:void(0)" rel="nofollow">
									</a>
									<span class="product-item-amount-description-container">
															<span id="<?=$itemIds['QUANTITY_MEASURE']?>">
																<?=$actualItem['ITEM_MEASURE']['TITLE']?>
															</span>
															<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
														</span>
								</div>
							</div>
						</div>
						<?
					}

				break;

			case 'buttons':
				?>
					<div data-entity="main-button-container">
						<div id="<?=$itemIds['BASKET_ACTIONS_ID']?>" style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;">
							<?
							if ($showAddBtn)
								{
								?>
									<div class="product-item-detail-info-container">
										<a class="btn <?=$showButtonClassName?> product-item-detail-buy-button" id="<?=$itemIds['ADD_BASKET_LINK']?>"
												href="javascript:void(0);">
											<span><?=$arParams['MESS_BTN_ADD_TO_BASKET']?></span>
										</a>
									</div>
									<?
								}

							if ($showBuyBtn)
								{
								?>
									<div class="product-item-detail-info-container">
										<a class="btn <?=$buyButtonClassName?> product-item-detail-buy-button" id="<?=$itemIds['BUY_LINK']?>"
												href="javascript:void(0);">
											<span><?=$arParams['MESS_BTN_BUY']?></span>
										</a>
									</div>
									<?
								}
							?>
						</div>
						<?
						if ($showSubscribe)
							{
							?>
								<div class="product-item-detail-info-container">
									<?
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.product.subscribe',
										'',
										array(
											'PRODUCT_ID' => $arResult['ID'],
											'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
											'BUTTON_CLASS' => 'btn btn-default product-item-detail-buy-button',
											'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									?>
								</div>
								<?
							}
						?>
						<div class="product-item-detail-info-container">
							<a class="btn btn-link product-item-detail-buy-button" id="<?=$itemIds['NOT_AVAILABLE_MESS']?>"
									href="javascript:void(0)"
									rel="nofollow" style="display: <?=(!$actualItem['CAN_BUY'] ? '' : 'none')?>;">
								<?=$arParams['MESS_NOT_AVAILABLE']?>
							</a>
						</div>
					</div>
					<?
				break;
				}
			}

		if ($arParams['DISPLAY_COMPARE'])
			{
			?>
				<div class="product-item-detail-compare-container">
					<div class="product-item-detail-compare">
						<div class="checkbox">
							<label id="<?=$itemIds['COMPARE_LINK']?>">
								<input type="checkbox" data-entity="compare-checkbox">
								<span data-entity="compare-title"><?=$arParams['MESS_BTN_COMPARE']?></span>
							</label>
						</div>
					</div>
				</div>
				<?
			}
		?>
	</div>
</div>


<!--Small Card-->
<div class="product-item-detail-short-card-fixed hidden-xs" id="<?=$itemIds['SMALL_CARD_PANEL_ID']?>">
	<div class="product-item-detail-short-card-content-container">
		<table>
			<tr>
				<td rowspan="2" class="product-item-detail-short-card-image">
					<img src="" style="height: 65px;" data-entity="panel-picture">
				</td>
				<td class="product-item-detail-short-title-container" data-entity="panel-title">
					<span class="product-item-detail-short-title-text"><?=$name?></span>
				</td>
				<td rowspan="2" class="product-item-detail-short-card-price">
					<?
					if ($arParams['SHOW_OLD_PRICE'] === 'Y')
						{
						?>
							<div class="product-item-detail-price-old" style="display: <?=($showDiscount ? '' : 'none')?>;"
									data-entity="panel-old-price">
								<?=($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '')?>
							</div>
							<?
						}
					?>
					<div class="product-item-detail-price-current" data-entity="panel-price">
						<?=$price['PRINT_RATIO_PRICE']?>
					</div>
				</td>
				<?
				if ($showAddBtn)
					{
					?>
						<td rowspan="2" class="product-item-detail-short-card-btn"
								style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;"
								data-entity="panel-add-button">
							<a class="btn <?=$showButtonClassName?> product-item-detail-buy-button"
									id="<?=$itemIds['ADD_BASKET_LINK']?>"
									href="javascript:void(0);">
								<span><?=$arParams['MESS_BTN_ADD_TO_BASKET']?></span>
							</a>
						</td>
						<?
					}

				if ($showBuyBtn)
					{
					?>
						<td rowspan="2" class="product-item-detail-short-card-btn"
								style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;"
								data-entity="panel-buy-button">
							<a class="btn <?=$buyButtonClassName?> product-item-detail-buy-button" id="<?=$itemIds['BUY_LINK']?>"
									href="javascript:void(0);">
								<span><?=$arParams['MESS_BTN_BUY']?></span>
							</a>
						</td>
						<?
					}
				?>
				<td rowspan="2" class="product-item-detail-short-card-btn"
						style="display: <?=(!$actualItem['CAN_BUY'] ? '' : 'none')?>;"
						data-entity="panel-not-available-button">
					<a class="btn btn-link product-item-detail-buy-button" href="javascript:void(0)"
							rel="nofollow">
						<?=$arParams['MESS_NOT_AVAILABLE']?>
					</a>
				</td>
			</tr>
			<?
			if ($haveOffers)
				{
				?>
					<tr>
						<td>
							<div class="product-item-selected-scu-container" data-entity="panel-sku-container">
								<?
								$i = 0;

								foreach ($arResult['SKU_PROPS'] as $skuProperty)
									{
									if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
										{
										continue;
										}

									$propertyId = $skuProperty['ID'];

									foreach ($skuProperty['VALUES'] as $value)
										{
										$value['NAME'] = htmlspecialcharsbx($value['NAME']);
										if ($skuProperty['SHOW_MODE'] === 'PICT')
											{
											?>
												<div class="product-item-selected-scu product-item-selected-scu-color selected"
														title="<?=$value['NAME']?>"
														style="background-image: url(<?=$value['PICT']['SRC']?>); display: none;"
														data-sku-line="<?=$i?>"
														data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
														data-onevalue="<?=$value['ID']?>">
												</div>
												<?
											}
										else
											{
											?>
												<div class="product-item-selected-scu product-item-selected-scu-text selected"
														title="<?=$value['NAME']?>"
														style="display: none;"
														data-sku-line="<?=$i?>"
														data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
														data-onevalue="<?=$value['ID']?>">
													<?=$value['NAME']?>
												</div>
												<?
											}
										}

									$i++;
									}
								?>
							</div>
						</td>
					</tr>
					<?
				}
			?>
		</table>
	</div>
</div>
