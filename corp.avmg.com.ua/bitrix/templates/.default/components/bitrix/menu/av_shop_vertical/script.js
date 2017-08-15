$(function()
	{
	$(document)
		.on("vclick", '.av-shop-menu-vertical .item .arrow', function()
			{
			var
				$block   = $(this).closest('li'),
				$subMenu = $block.children('ul');

			if($subMenu.is(':visible'))
				{
				$subMenu.slideUp();
				$block.removeClass("active");
				}
			else
				{
				$subMenu.slideDown();
				$block.addClass("active");
				}
			});
	});