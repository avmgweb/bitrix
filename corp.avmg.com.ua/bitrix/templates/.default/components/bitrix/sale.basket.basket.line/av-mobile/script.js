$(function()
	{
	$(document)
		.on("avCatalogRefresh", 'body', function()
			{
			var $basket = $('.av-basket-line-mobile');

			$.ajax
				({
				type   : 'POST',
				url    : AvBasketLineMobileUpdate,
				data   :
					{
					"params": $basket.attr("data-params")
					},
				success: function(result)
					{
					if(result)
						$basket.after(result).remove();
					}
				});
			});
	});