$(function()
	{
	SetFormElementsCurrentLibrary("av_site");

	$(document)
		.on("vclick", '.av-catalog-element .ask-price-call-form', function()
			{
			var
				$askFormOrigin   = $('.av-catalog-element-ask-form-origin'),
				$askForm         = $('<div class="av-catalog-element-ask-form"></div>').appendTo('body'),
				$itemRow         = $(this).closest('.item-row'),
				elementId        = $itemRow.attr("data-element-id"),
				iblockId         = $itemRow.attr("data-iblock-id"),
				elementName      = $itemRow.attr("data-element-name"),
				elementLink      = $askFormOrigin.attr("data-element-link-template").replace("#IBLOCK_ID#", iblockId).replace("#ELEMENT_ID#", elementId),
				positionQuantity = $itemRow.find('.counter input').val();
			if(!$askFormOrigin.length) return;

			AvBlurScreen("on", 1000);
			$askForm
				.html($askFormOrigin.html())
				.positionCenter(1100, 'Y', 'Y')
				.onClickout(function()
					{
					$(this).find('.close').click();
					})
				.on("vclick", '.close', function()
					{
					$askForm.remove();
					AvBlurScreen("off");
					});
			$askForm.children('.title')
				.text(elementName);
			$askForm.getFormElememt({name: $askFormOrigin.attr("data-link-field-id")})
		        .setFormElememtParam("value", elementLink)
				.hide();
			$askForm.getFormElememt({name: $askFormOrigin.attr("data-name-field-id")})
		        .setFormElememtParam("value", elementName)
		        .hide();
			$askForm.getFormElememt({name: $askFormOrigin.attr("data-count-field-id")})
		        .setFormElememtParam
		            (
	                "value",
		            positionQuantity
			            ? positionQuantity+' '+$itemRow.find('.measure').text()
			            : ''
		            );
			});
	});