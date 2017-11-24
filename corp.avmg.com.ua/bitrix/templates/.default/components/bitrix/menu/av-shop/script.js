$(function()
	{
	/* -------------------------------------------------------------------- */
	/* -------------------------- hover/hoverout -------------------------- */
	/* -------------------------------------------------------------------- */
	$(".av-shop-menu")
		.on("mouseover focus", ".first-level-item", function()
			{
			var
				$currentItem            = $(this),
				$fullMenu               = $currentItem.closest(".av-shop-menu"),
				$submenu                = $currentItem.children(".second-level-block"),
				currentItemWidth        = $currentItem.innerWidth(),
				fullMenuWidth           = $fullMenu.innerWidth(),
				fullMenuLeft            = $fullMenu.offset().left,
				submenuWidth            = 0,
				submenuLeft             = $currentItem.offset().left,
				submenuItemsInfo        = {},
				submenuItemsOffsetArray = [],
				offsetMinValue, offsetMaxValue;
			if($submenu.length && $submenu.is(":visible")) return;

			$currentItem.siblings().children(".second-level-block:visible")
				.animate({"opacity": 0}, 300, function()
					{
					$(this).hide();
					})
		        .closest(".first-level-item")
                    .removeClass("active");
			if(!$submenu.length) return;

			$fullMenu
				.addClass("active");
			$submenu.css
				({
				"display": "flex",
				"left"   : 0,
				"opacity": 0,
				"width"  : ""
				});

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

			if(submenuLeft + submenuWidth > fullMenuLeft + fullMenuWidth) submenuLeft += currentItemWidth - submenuWidth;
			if(submenuLeft < fullMenuLeft)                                submenuLeft =  fullMenuLeft;
			if(submenuLeft + submenuWidth > fullMenuLeft + fullMenuWidth) $submenu.css("width", fullMenuWidth);

			$currentItem
				.addClass("active");
			$submenu
				.css
					({
					"left" : submenuLeft,
					"width": submenuWidth >= currentItemWidth ? submenuWidth : currentItemWidth
					})
				.animate({"opacity": 1}, 300);
			})
		.on("mouseout focusout", function()
			{
			var $fullMenu = $(this);

			setTimeout(function()
				{
				if($fullMenu.is(":hover") || $fullMenu.is(":focus") || $fullMenu.find("a:focus").length) return;

				$fullMenu
					.removeClass("active")
					.find(".second-level-block:visible")
						.animate({"opacity": 0}, 300, function()
							{
							$(this).hide();
							})
						.closest(".first-level-item")
						     .removeClass("active");
				}, 1500);
			});
	/* -------------------------------------------------------------------- */
	/* -------------------------- key navigation -------------------------- */
	/* -------------------------------------------------------------------- */
	$(document).keydown(function(event)
		{
		var
			keyCode             = event.keyCode,
			$fullMenu           = $(".av-shop-menu.active"),
			$currentActiveBlock = $fullMenu.find(".first-level-item.active"),
		    $currentSubmenu     = $currentActiveBlock.find(".second-level-block"),
			$currentSubItem     = $currentSubmenu.find("a:focus").parent("li");
		if(!$currentActiveBlock.length || $.inArray(keyCode, [37, 38, 39, 40] ) == -1) return;

		event.preventDefault();
		if(keyCode == 39)
			{
			if($currentActiveBlock.next(".first-level-item").length) $currentActiveBlock.next()                 .focus().children("a").focus();
			else                                                     $fullMenu.find(".first-level-item").first().focus().children("a").focus();
			}
		else if(keyCode == 37)
			{
			if($currentActiveBlock.prev(".first-level-item").length) $currentActiveBlock.prev()                .focus().children("a").focus();
			else                                                     $fullMenu.find(".first-level-item").last().focus().children("a").focus();
			}
		else if(keyCode == 40 && $currentSubmenu.length)
			{
			if($currentSubItem.next("li").length) $currentSubItem.next()            .find("a").focus();
			else                                  $currentSubmenu.find("li").first().find("a").focus();
			}
		else if(keyCode == 38 && $currentSubmenu.length)
			{
			if($currentSubItem.prev("li").length) $currentSubItem.prev()           .find("a").focus();
			else                                  $currentSubmenu.find("li").last().find("a").focus();
			}
		});
	});