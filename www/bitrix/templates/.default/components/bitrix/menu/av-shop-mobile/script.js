$(function()
	{
	$(".av-shop-mobile-menu")
		.find(".first-level-item .title-block").on("vclick", function(event)
			{
			if($(event.target).closest('.link').length) return;

			var
				$fullBlock = $(this).closest(".first-level-item"),
			    $submenu   = $fullBlock.find(".second-level-block");

			if($submenu.is(":visible"))
				{
				$fullBlock.removeClass("active");
				$submenu.slideUp(600);
				}
			else
				{
				$fullBlock.addClass("active");
				$submenu.slideDown(600);
				}
			});
	});