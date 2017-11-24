$(function()
	{
	$(".av-links-list .list").mCustomScrollbar({"theme": "dark"});

	$(document)
		.on("vclick", ".av-links-list .title-block", function()
			{
			var
				$selectBlock = $(this).closest(".av-links-list"),
				$optionsList = $selectBlock.find(".list");

			if($optionsList.is(":visible"))
				{
				$selectBlock.removeClass("active");
				$optionsList.slideUp();
				}
			else
				{
				$selectBlock.addClass("active");
				$optionsList
					.css("width", $selectBlock[0].getBoundingClientRect().width)
					.slideDown();
				}
			})
		.on("vclick", function()
			{
			$(".av-links-list").each(function()
				{
				if(!$(this).isClicked())
					$(this)
						.removeClass("active")
						.children(".list").slideUp();
				});
			});

	$(window).resize(function()
		{
		$(".av-links-list")
			.removeClass("active")
			.children(".list").slideUp();
		});
	});