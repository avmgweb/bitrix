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
				scrollTop            = $(window).scrollTop(),
			    headerMinTopPosition = $header.attr("data-offset-position"),
				headerTopPosition    = scrollTop > headerMinTopPosition ? scrollTop : headerMinTopPosition;

			$header.css("top", headerTopPosition+"px");
			})
		.resize(function()
			{
			$headerGhost.height($header.height());
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
			var $callButton = $(this);

			AvBlurScreen("on", 1000);
			$callButton
				.addClass("active");
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
					$callButton.removeClass("active");
					AvBlurScreen("off");
					});
			})
		.on("keyup", function(event)
			{
			if(event.keyCode == 27 && $callBackForm.if(":visible"))
				$callBackForm
					.find(".close")
					.click();
			});
	/* -------------------------------------------------------------------- */
	/* -------------------------- header search --------------------------- */
	/* -------------------------------------------------------------------- */
	$(document)
		.on("avShopSearchTitleOpen avShopSearchTitleClose avShopSearchTitleNormolize", function(event)
			{
			var
				eventType       = event.type,
				windowMode      = "desktop",
				speed           = parseInt($(this).data("avShopSearchTitleOpenSpeed")) ? parseInt($(this).data("avShopSearchTitleOpenSpeed")) : 400,
				windowWidth     = $(window).width(),
			    $searchRow      = $header.find(".second-row"),
				$searchCell     = $searchRow.find(".search-cell"),
			    $hotLine        = $searchRow.find(".hot-line"),
			    $callBackButton = $searchRow.find("#page-header-call-back-form-button"),
			    $logoMobile     = $searchRow.find(".logo-cell-mobile");

			     if(windowWidth >= 992 && windowWidth <= 1199) windowMode = "tablet";
			else if(windowWidth <= 991)                        windowMode = "mobile";
			/* ------------------------------------------- */
			/* ------------ search open tablet ----------- */
			/* ------------------------------------------- */
			if(eventType == "avShopSearchTitleOpen" && windowMode == "tablet")
				{
				var searchCellWidth = $searchCell.offset().left + $searchCell.width() - $hotLine.offset().left;

				$hotLine
					.add($callBackButton)
					.hide();
				$searchCell
					.width(searchCellWidth)
					.css("padding-left", (searchCellWidth - 24)+"px")
					.animate({"padding-left": (searchCellWidth - 400)+"px"}, speed);
				}
			/* ------------------------------------------- */
			/* ------------ search open mobile ----------- */
			/* ------------------------------------------- */
			else if(eventType == "avShopSearchTitleOpen" && windowMode == "mobile")
				{
				$searchRow
					.height($searchRow.height());
				$sidebarCallButton
					.add($logoMobile)
					.hide();
				$searchCell
					.width($searchRow.width())
					.css("padding-left", ($searchRow.width() - 24)+"px")
					.animate({"padding-left": 0}, speed);
				}
			/* ------------------------------------------- */
			/* ----------- search close tablet ----------- */
			/* ------------------------------------------- */
			else if(eventType == "avShopSearchTitleClose" && windowMode == "tablet")
				$searchCell.animate
					(
					{"padding-left": (parseInt($searchCell.css("width")) - 24)+"px"},
					speed,
					function()
						{
						$hotLine
							.add($callBackButton)
							.add($searchCell)
							.removeAttr("style");
						}
					);
			/* ------------------------------------------- */
			/* ----------- search close mobile ----------- */
			/* ------------------------------------------- */
			else if(eventType == "avShopSearchTitleClose" && windowMode == "mobile")
				$searchCell.animate
					(
					{"padding-left": (parseInt($searchCell.css("width")) - 24)+"px"},
					speed,
					function()
						{
						$searchRow
							.add($sidebarCallButton)
							.add($logoMobile)
							.add($searchCell)
							.removeAttr("style");
						}
					);
			/* ------------------------------------------- */
			/* ------------ search normolize ------------- */
			/* ------------------------------------------- */
			else if(eventType == "avShopSearchTitleNormolize")
				$searchRow
					.add($searchCell)
					.add($hotLine)
					.add($callBackButton)
					.add($sidebarCallButton)
					.add($logoMobile)
					.removeAttr("style");
			});
	/* -------------------------------------------------------------------- */
	/* -------------------------- header sidebar -------------------------- */
	/* -------------------------------------------------------------------- */
	$sidebarCallButton
		.on("vclick", function()
			{
			if($sidebar.is(":visible"))
				{
				AvBlurScreen("off");
				$sidebar
					.animate({"margin-left": "-100%"}, 400, function()
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
						"position"   : "absolute",
						"top"        : $header.offset().top + $header.height(),
						"margin-left": "-100%"
						})
					.animate({"margin-left": 0}, 400);
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
				$menu.slideUp();
				}
			else
				{
				$callBlock.addClass("active");
				$menu.slideDown();
				}
			});

	$(window)
		.scroll(function()
			{
			var
				headerOffset  = $header .offset(),
				sidebarOffset = $sidebar.offset(),
				headerHeight  = $header .height(),
				sidebarHeight = $sidebar.height(),
			    scrollTop     = $(window).scrollTop(),
			    windowHeight  = $(window).height();
			if(!$sidebar.is(":visible")) return;

			if(sidebarOffset.top > headerOffset.top  + headerHeight || sidebarHeight < windowHeight)
				$sidebar.css("top", headerOffset.top  + headerHeight);

			else if(sidebarOffset.top + sidebarHeight < scrollTop + windowHeight)
				{
				clearTimeout($(this).data("scrollTimer"));
				$(this).data("scrollTimer", setTimeout(function()
					{
					$sidebar.animate({"top": scrollTop + windowHeight - sidebarHeight}, 300);
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