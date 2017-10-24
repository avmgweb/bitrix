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
				$block.removeClass("active");
				$subMenu.show().slideUp();
				}
			else
				{
				$block.addClass("active");
				$subMenu.hide().slideDown();
				}
			});
	});