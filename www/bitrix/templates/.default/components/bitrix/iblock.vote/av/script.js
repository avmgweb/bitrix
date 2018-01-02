$(function()
	{
	$(document)
		.on("mouseover", ".av-iblock-rating.vote-available > .item", function()
			{
			var inedx = $(this).index();
			$(this).parent()
				.addClass("hovered")
				.children(".item").each(function()
					{
					if($(this).index() <= inedx) $(this).addClass("hovered");
					});
			})
		.on("mouseout", ".av-iblock-rating", function()
			{
			$(this).removeClass("hovered")
				.children(".item").removeClass("hovered");
			})
		.on("vclick", ".av-iblock-rating.vote-available > .item", function()
			{
			var
				$voteBlock = $(this).parent(),
				arParams   = BX.parseJSON($voteBlock.attr("data-ajax-params"));

			arParams.vote    = "Y";
			arParams.vote_id = $voteBlock.attr("data-vote-id");
			arParams.rating  = $(this).attr("data-value");

			BX.ajax.post
				(
				"/bitrix/components/bitrix/iblock.vote/component.php",
				arParams,
				function(data)
					{
					$voteBlock
						.after(data)
						.remove();
					}
				);
			});
	});