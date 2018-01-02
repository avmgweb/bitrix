$(function()
	{
	$(document)
		.on("vclick", '.av-shop-menu-vertical-two-level .head .arrow', function()
			{
			var
				$menuBlock = $(this).closest('.av-shop-menu-vertical-two-level'),
			    $menuBody  = $menuBlock.find('.body');
			if(!$menuBody.length) return;

			if($menuBlock.hasClass("active"))
				{
				$menuBlock.removeClass("active");
				$menuBody.show().slideUp();
				}
			else
				{
				$menuBlock.addClass("active");
				$menuBody.hide().slideDown();
				}
			});
	});