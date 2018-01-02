$(function()
	{
	$(document)
		.on("avCatalogRefresh", function()
			{
			var $basket = $(".av-basket-line");

			$.ajax
				({
				type   : "POST",
				url    : AvBasketLineUpdate,
				data   :
					{
					"params" : $basket.attr("data-params")
					},
				success: function(result)
					{
					if(result)
						$basket.after(result).remove();
					}
				});
			});
	});