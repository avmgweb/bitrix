$(function()
	{
	/* -------------------------------------------------------------------- */
	/* -------------------------- call back form -------------------------- */
	/* -------------------------------------------------------------------- */
	$("#page-header")
		.on("vclick", "[data-call-back-form-button]", function()
			{
			var
				$callButton   = $(this),
				$callBackForm = $("#page-header").find(".call-back-form");

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
			});
	$(document)
		.on("keyup", function(event)
			{
			var $callBackForm = $("#page-header").find(".call-back-form:visible");
			if(event.keyCode == 27 && $callBackForm.length)
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
				eventType          = event.type,
				windowMode         = "desktop",
				speed              = parseInt($(this).data("avShopSearchTitleOpenSpeed")) ? parseInt($(this).data("avShopSearchTitleOpenSpeed")) : 400,
				windowWidth        = $(window).width(),
			    $searchRow         = $("#page-header").find(".second-row"),
				$searchCell        = $searchRow.find(".search-cell"),
			    $hotLine           = $searchRow.find(".hot-line"),
			    $callBackButton    = $searchRow.find(".call-back-form-button"),
			    $sidebarCallButton = $searchRow.find(".sidebar-call-button"),
			    $logoMobile        = $searchRow.find(".logo-cell-mobile");

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
					.add($searchRow.find(".logo-cell"))
					.add($sidebarCallButton)
					.add($logoMobile)
					.removeAttr("style");
			});
	});