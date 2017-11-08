$(function()
	{
	$(document)
		/* ------------------------------------------- */
		/* -------------- show/hide list ------------- */
		/* ------------------------------------------- */
		.on("hover", '.av-basket-line:not(.hidding)', function()
			{
			var $list = $(this).find('.items-list');
			if($list.is(':visible')) return;

			$list
				.show()
				.find('.body')
					.hide()
					.slideDown(400);
			})
		.on("mouseout", '.av-basket-line', function()
			{
			var $list = $(this).find('.items-list');

			setTimeout(function()
				{
				if(!$list.is(':hover'))
					$list
						.addClass("hidding")
						.find('.body')
							.slideUp(400, function()
								{
								$list
									.hide()
									.removeClass("hidding");
								});
				}, 2000);
			})
		/* ------------------------------------------- */
		/* --------------- delete item --------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-basket-line .items-list .delete', function()
			{
			var
				$basket   = $(this).closest('.av-basket-line'),
				$itemRow  = $(this).closest('.item-row'),
				elementId = $itemRow.attr("data-element-id");

			$.ajax
				({
				type   : 'POST',
				url    : AvBasketLineDelete,
				data   :
					{
					"site_id"   : $basket.attr("data-site"),
					"element_id": elementId
					},
				success: function(result)
					{
					var
						answerObj       = $.parseJSON(result),
						answerResult    = answerObj ? answerObj.result     : 'error',
						answerElementId = answerObj ? answerObj.element_id : 0;
					if(answerResult == 'error' || answerElementId != elementId) return;

					$(document)
						.data("catalog_element", $itemRow.attr("data-product-id"))
						.trigger("avCatalogRefresh");
					}
				});
			})
		/* ------------------------------------------- */
		/* ------------- refresh catalog ------------- */
		/* ------------------------------------------- */
		.on("avCatalogRefresh", function()
			{
			var
				$basket      = $('.av-basket-line'),
				needShowList = $basket.find('.items-list').is(':visible');

			$.ajax
				({
				type   : 'POST',
				url    : AvBasketLineUpdate,
				data   :
					{
					"params" : $basket.attr("data-params")
					},
				success: function(result)
					{
					if(!result) return;

					$basket.after(result).remove();
					if(needShowList) $('.av-basket-line .items-list').show();
					}
				});
			});
	});