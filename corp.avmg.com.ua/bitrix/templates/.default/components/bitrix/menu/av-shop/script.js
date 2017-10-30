$(function()
	{
	$(".av-shop-menu").children()
		.mouseover(function()
			{
			var
				$submenu                = $(this).children(".second-level-block"),
				$parentItem             = $submenu.parent(),
				$fullMenu               = $(this).closest(".av-shop-menu"),
				parentWidth             = $parentItem.width(),
				parentOffset            = $parentItem.offset(),
				fullMenuWidth           = $fullMenu.innerWidth(),
				fullMenuOffset          = $fullMenu.offset(),
				submenuWidth            = 0,
				submenuLeft             = parentOffset.left,
				submenuItemsInfo        = {},
				submenuItemsOffsetArray = [],
				offsetMinValue, offsetMaxValue;

			$fullMenu
				.find(".second-level-block")
				.hide();
			$submenu
				.removeAttr("style")
				.css({"display": "flex", "left": 0});

			$submenu.children().each(function()
				{
				var offsetLeft = $(this).offset().left;
				if(typeof submenuItemsInfo[offsetLeft] === "undefined") submenuItemsInfo[offsetLeft] = 0;

				submenuItemsOffsetArray.push(offsetLeft);
				submenuItemsInfo[offsetLeft] = $(this).innerWidth() - parseInt($(this).css("padding-right"));
				});
			offsetMinValue = Math.min.apply(Math, submenuItemsOffsetArray);
			offsetMaxValue = Math.max.apply(Math, submenuItemsOffsetArray);

			if(offsetMinValue == offsetMaxValue) submenuWidth = submenuItemsInfo[offsetMaxValue];
			else                                 submenuWidth = offsetMaxValue - offsetMinValue + submenuItemsInfo[offsetMaxValue];
			submenuWidth += parseInt($submenu.css("padding-left")) + parseInt($submenu.css("padding-right"));

			if(submenuLeft + submenuWidth > fullMenuOffset.left + fullMenuWidth) submenuLeft = parentOffset.left + parentWidth - submenuWidth;
			if(submenuLeft < fullMenuOffset.left)                                submenuLeft = fullMenuOffset.left;
			if(submenuLeft + submenuWidth > fullMenuOffset.left + fullMenuWidth) $submenu.css("width", fullMenuWidth);

			$submenu
				.css
					({
					"left" : submenuLeft,
					"width": submenuWidth >= parentWidth ? submenuWidth : parentWidth
					});
			})
		.mouseout(function()
			{
			var
				$item    = $(this),
				$submenu = $item.children(".second-level-block");

			setTimeout(function()
				{
				if(!$item.is(":hover")) $submenu.hide();
				}, 800);
			});
	});