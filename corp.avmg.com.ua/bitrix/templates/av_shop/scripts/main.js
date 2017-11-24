$(function()
	{
	var
		$header            = $("#page-header"),
		$headerGhost       = $("<div></div>").attr("id", "page-header-ghost"),
		$callBackForm      = $("#page-header-call-back-form"),
		$sidebar           = $("#page-header-sidebar"),
		$sidebarCallButton = $("#page-header-sidebar-button");
	/* -------------------------------------------------------------------- */
	/* --------------------------- fixed header --------------------------- */
	/* -------------------------------------------------------------------- */
	$header
		.attr("data-offset-position", $header.offset().top)
		.css
			({
			"position": "absolute",
			"top"     : $header.offset().top,
			"left"    : 0,
			"right"   : 0,
			"z-index" : 200
			});
	$headerGhost
		.insertBefore($header)
		.height($header.height());

	$(window)
		.scroll(function()
			{
			var
				headerNativePosition = $header.attr("data-offset-position"),
			    headerCssParams      =
				    {
				    position: "absolute",
				    top     : headerNativePosition+"px"
				    };

			if($(window).scrollTop() > headerNativePosition)
				{
				headerCssParams.position = "fixed";
				headerCssParams.top      = 0;
				}

			$header.css(headerCssParams);
			})
		.resize(function()
			{
			$headerGhost.height($header.height());
			});
	/* -------------------------------------------------------------------- */
	/* -------------------- header desctop menu hiding -------------------- */
	/* -------------------------------------------------------------------- */
	$(window).scroll(function()
		{
		var
			$menuRow        = $header.find(".third-row"),
			scrollTop       = $(window).scrollTop(),
			windowWidth     = $(window).width(),
			lastScrollTop   = $header.data("data-scroll-top") ? $header.data("data-scroll-top") : 0,
			scrollDirection = scrollTop > lastScrollTop ? "down" : "up",
		    headerZindex    = parseInt($header.css("z-index")),
		    menuSlideDown   = function()
			    {
			    $header.addClass("in-process");
			    $menuRow.animate({"margin-top": 0}, 900, function()
				    {
				    $menuRow
					    .css("z-index", "")
					    .siblings().css
						    ({
						    "background": "",
						    "position"  : "",
						    "z-index"   : ""
						    });
				    $header
					    .removeClass("minimized")
					    .removeClass("in-process");
				    });
			    };

		if(windowWidth <= 991 || $menuRow.is(":hover") || $menuRow.is(":focus") || $header.hasClass("in-process")) return;
		$header.data("data-scroll-top", scrollTop);

		if(scrollDirection == "down" && scrollTop > $headerGhost.offset().top + $headerGhost.height() && !$header.hasClass("minimized"))
			{
			$header
				.addClass("in-process")
				.addClass("minimized");
			$menuRow.siblings().css
				({
				"background": "#FFF",
				"position"  : "relative",
				"z-index"   : headerZindex
				});
			$menuRow
				.css("z-index", headerZindex - 10)
				.animate({"margin-top": "-"+$menuRow.innerHeight()+"px"}, 900, function()
					{
					$header.removeClass("in-process");
					if($header.offset().top + $header.height() < $headerGhost.offset().top + $headerGhost.height())
						menuSlideDown();
					});
			}
		else if(scrollDirection == "up" && $header.hasClass("minimized"))
			menuSlideDown();
		});
	/* -------------------------------------------------------------------- */
	/* ------------------------ login/registration ------------------------ */
	/* -------------------------------------------------------------------- */

	/* -------------------------------------------------------------------- */
	/* -------------------------- call back form -------------------------- */
	/* -------------------------------------------------------------------- */
	$(document)
		.on("vclick", "[data-header-call-back-form-button]", function()
			{
			AvBlurScreen("on", 1000);
			$callBackForm
				.show()
				.positionCenter(1100, "Y", "Y")
				.onClickout(function()
					{
					$callBackForm.find(".close").click();
					})
				.on("vclick", ".close", function()
					{
					$callBackForm.hide();
					AvBlurScreen("off");
					});
			})
		.on("keyup", function(event)
			{
			if(event.keyCode == 27 && $callBackForm.is(":visible"))
				$callBackForm
					.find(".close")
					.click();
			});
	/* -------------------------------------------------------------------- */
	/* -------------------------- header search --------------------------- */
	/* -------------------------------------------------------------------- */
	$(document).on("avShopSearchTitleOpen avShopSearchTitleClose avShopSearchTitleNormolize", function(event)
		{
		var
			eventType       = event.type,
			speed           = parseInt($(this).data("avShopSearchTitleOpenSpeed")) ? parseInt($(this).data("avShopSearchTitleOpenSpeed")) : 400,
			windowWidth     = $(window).width(),
		    $searchRow      = $header.find(".second-row"),
			$searchCell     = $searchRow.find(".search-cell"),
		    $hotLine        = $searchRow.find(".hot-line"),
		    $callBackButton = $searchRow.find(".call-back-form-button"),
		    $logoMobile     = $searchRow.find(".logo-cell-mobile"),
			normolizeSearch = function()
				{
				$hotLine
					.add($callBackButton)
					.add($sidebarCallButton)
					.add($logoMobile)
					.css("display", "");
				$searchRow
					.css("height", "");
				$searchCell.css
					({
					"padding-left": "",
					"width"       : ""
					});
				};
		/* ------------------------------------------- */
		/* ---------------- normolize ---------------- */
		/* ------------------------------------------- */
		if(eventType == "avShopSearchTitleNormolize")
			normolizeSearch();
		/* ------------------------------------------- */
		/* ------------------ tablet ----------------- */
		/* ------------------------------------------- */
		else if(windowWidth >= 992 && windowWidth <= 1199)
			switch(eventType)
				{
				/* ---------------------------- */
				/* -------- search open ------- */
				/* ---------------------------- */
				case "avShopSearchTitleOpen":
					var searchCellWidth = $searchCell.offset().left + $searchCell.width() - $hotLine.offset().left;

					$hotLine
						.add($callBackButton)
						.hide();
					$searchCell
						.width(searchCellWidth)
						.css("padding-left", (searchCellWidth - 24)+"px")
						.animate({"padding-left": (searchCellWidth - 400)+"px"}, speed);
					break;
				/* ---------------------------- */
				/* ------- search close ------- */
				/* ---------------------------- */
				case "avShopSearchTitleClose":
					$searchCell.animate
						(
						{"padding-left": (parseInt($searchCell.css("width")) - 24)+"px"},
						speed,
						function() {normolizeSearch()}
						);
					break;
				default: break;
				}
		/* ------------------------------------------- */
		/* ------------------ mobile ----------------- */
		/* ------------------------------------------- */
		else if(windowWidth <= 991)
			switch(eventType)
				{
				/* ---------------------------- */
				/* -------- search open ------- */
				/* ---------------------------- */
				case "avShopSearchTitleOpen":
					$searchRow
						.height($searchRow.height());
					$sidebarCallButton
						.add($logoMobile)
						.hide();
					$searchCell
						.width($searchRow.width())
						.css("padding-left", ($searchRow.width() - 24)+"px")
						.animate({"padding-left": 0}, speed);
					break;
				/* ---------------------------- */
				/* ------- search close ------- */
				/* ---------------------------- */
				case "avShopSearchTitleClose":
					$searchCell.animate
						(
						{"padding-left": (parseInt($searchCell.css("width")) - 24)+"px"},
						speed,
						function() {normolizeSearch()}
						);
					break;
				default: break;
				}
		});
	/* -------------------------------------------------------------------- */
	/* -------------------------- header sidebar -------------------------- */
	/* -------------------------------------------------------------------- */
	$sidebarCallButton.on("vclick", function()
		{
		if($sidebar.is(":visible"))
			{
			AvBlurScreen("off");
			$sidebar
				.animate({"margin-left": "-100%"}, 600, function()
					{
					$sidebarCallButton.removeClass("active");
					$sidebar.hide();
					});
			}
		else
			{
			AvBlurScreen("on", 90);
			$sidebarCallButton
				.addClass("active");
			$sidebar
				.css
					({
					"display"    : "block",
					"position"   : "fixed",
					"top"        : $header.offset().top + $header.height() - $(window).scrollTop(),
					"margin-left": "-100%"
					})
				.animate({"margin-left": 0}, 600);
			}
		});
	$sidebar
		.css("z-index", 100)
		.on("vclick", ".user-block", function()
			{
			var
				$callBlock = $(this),
			    $menu      = $sidebar.find(".user-menu");

			if($menu.is(":visible"))
				{
				$callBlock.removeClass("active");
				$menu.slideUp(600);
				}
			else
				{
				$callBlock.addClass("active");
				$menu.slideDown(600);
				}
			});

	$(window)
		.scroll(function()
			{
			var
				scrollTop       = $(window).scrollTop(),
				windowBottom    = scrollTop + $(window).height(),
				sibebarTop      = $sidebar.offset().top,
				sibebarBottom   = sibebarTop + $sidebar.height(),
				sibebarPosition = $sidebar.css("position"),
				headerTop       = $header.offset().top,
				headerBottom    = headerTop + $header.height(),
			    lastScrollTop   = $sidebar.data("data-scroll-top") ? $sidebar.data("data-scroll-top") : 0,
			    scrollDirection = scrollTop > lastScrollTop ? "down" : "up";
			if(!$sidebar.is(":visible")) return;
			$sidebar.data("data-scroll-top", scrollTop);

			if(sibebarBottom > windowBottom && scrollDirection == "down" && sibebarPosition == "fixed")
				$sidebar.css
					({
					"position": "absolute",
					"top"     : sibebarTop
					});
			else if(sibebarTop > headerBottom || sibebarTop < headerBottom && sibebarPosition == "fixed")
				$sidebar.css
					({
					"position": "fixed",
					"top"     : headerBottom - scrollTop
					});
			if(sibebarBottom < windowBottom && scrollDirection == "down" && sibebarPosition != "fixed")
				{
				clearTimeout($(this).data("headerScrollTimer"));
				$(this).data("headerScrollTimer", setTimeout(function()
					{
					if($sidebar.offset().top + $sidebar.height() < $(window).scrollTop() + $(window).height())
						$sidebar.animate({"top": $(window).scrollTop() + $(window).height() - $sidebar.height()}, 300);
					}, 300));
				}
			})
		.resize(function()
			{
			if(!$sidebarCallButton.is(":visible") && $sidebar.is(":visible"))
				{
				AvBlurScreen("off");
				$sidebarCallButton.removeClass("active");
				$sidebar.hide();
				}
			});
	});