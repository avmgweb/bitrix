/* -------------------------------------------------------------------- */
/* ----------------------------- methods ------------------------------ */
/* -------------------------------------------------------------------- */
(function($)
	{
	/* ------------------------------------------- */
	/* ------------- prepare search -------------- */
	/* ------------------------------------------- */
	jQuery.fn.prepareAvShopSearchTitle = function()
		{
		return this.each(function()
			{
			var
				$searchBlock       = $(this).filter(".av-shop-search-title"),
				$seacrhResultBlock = $(".av-shop-search-title-result[data-search-id=\""+$searchBlock.attr("data-search-id")+"\"]"),
				windowWidth        = $(window).width(),
				currentMode        = $searchBlock.attr("data-mode-type"),
			    needMode           = "huge",
				transformed        = false;

			     if(windowWidth <= 767)  needMode = "mobile";
			else if(windowWidth <= 991)  needMode = "tablet";
			else if(windowWidth <= 1199) needMode = "standart";
			if(needMode != "huge") transformed = true;

			$searchBlock.attr("data-mode-type", needMode);
			if(transformed) $searchBlock   .addClass("transformed");
			else            $searchBlock.removeClass("transformed");

			if(currentMode != needMode)
				{
				$(document).trigger("avShopSearchTitleNormolize");
				$searchBlock.removeClass("active");
				$seacrhResultBlock.hide();

				if(transformed)
					$searchBlock.find(":text, .placeholder").hide();
				else
					{
					$searchBlock.find(":text").hide();
					$searchBlock.find(".placeholder").show();
					}
				}
			});
		};
	/* ------------------------------------------- */
	/* ------------- activate search ------------- */
	/* ------------------------------------------- */
	jQuery.fn.activateAvShopSearchTitle = function(callback)
		{
		return this.each(function()
			{
			var
				$searchBlock = $(this).filter(".av-shop-search-title"),
				$input       = $searchBlock.find(":text"),
				$placeholder = $searchBlock.find(".placeholder");
			if(!$searchBlock.length || (callback && typeof callback != "function")) return;

			if($searchBlock.hasClass("transformed") && !$input.is(":visible"))
				{
				$(document)
					.data("avShopSearchTitleOpenSpeed", 800)
					.trigger("avShopSearchTitleOpen");
				$placeholder
					.hide();
				$searchBlock
					.addClass("active")
					.css("overflow", "hidden");
				$input
					.css
						({
						"display"     : "block",
						"margin-right": "-"+$input.css("width")
						})
					.animate({"margin-right": 0}, 800, function()
						{
						$searchBlock
							.css("overflow", "");
						$input
							.css("display", "")
							.show()
							.focus();
						if(callback) callback.call($searchBlock);
						});
				}
			else
				{
				$searchBlock.addClass("active");
				$input.show();
				$placeholder.hide();
				if(callback) callback.call($searchBlock);
				}
			});
		};
	/* ------------------------------------------- */
	/* ------------ diactivate search ------------ */
	/* ------------------------------------------- */
	jQuery.fn.diactivateAvShopSearchTitle = function(callback)
		{
		return this.each(function()
			{
			var
				$searchBlock = $(this).filter(".av-shop-search-title"),
				$input       = $searchBlock.find(":text"),
				$placeholder = $searchBlock.find(".placeholder");
			if(!$searchBlock.length || (callback && typeof callback != "function")) return;

			if($searchBlock.hasClass("transformed") && $input.is(":visible"))
				{
				$(document)
					.data("avShopSearchTitleCloseSpeed", 800)
					.trigger("avShopSearchTitleClose");
				$placeholder
					.hide();
				$searchBlock
					.css("overflow", "hidden");
				$input
					.animate({"margin-right": "-"+$input.width()}, 800, function()
						{
						$searchBlock
							.removeClass("active")
							.removeClass("run")
							.css("overflow", "");
						$input
							.css("margin-right", "")
							.hide();
						if(callback) callback.call($searchBlock);
						});
				}
			else if($searchBlock.hasClass("transformed") && !$input.is(":visible"))
				{
				$input.hide();
				$placeholder.hide();
				$searchBlock.removeClass("active");
				if(callback) callback.call($searchBlock);
				}
			else
				{
				$input.hide();
				$placeholder.show();
				$searchBlock.removeClass("active");
				if(callback) callback.call($searchBlock);
				}
			});
		};
	/* ------------------------------------------- */
	/* --------------- show result --------------- */
	/* ------------------------------------------- */
	jQuery.fn.showAvShopSearchTitleResult = function(callback)
		{
		return this.each(function()
			{
			var
				$seacrhResultBlock = $(this).filter(".av-shop-search-title-result"),
				$searchBlock       = $(".av-shop-search-title[data-search-id=\""+$seacrhResultBlock.attr("data-search-id")+"\"]");
			if(!$searchBlock.length || !$seacrhResultBlock.length || (callback && typeof callback != "function")) return;

			$seacrhResultBlock
				.css
					({
					"position": "fixed",
					"top"     : $searchBlock.offset().top + $searchBlock.height() + 5 - $(window).scrollTop(),
					"left"    : $searchBlock.offset().left,
					"width"   : $searchBlock.width(),
					"z-index" : 500
					});

			if(!$seacrhResultBlock.is(":visible") && $seacrhResultBlock.attr("data-empty") != "Y")
				$seacrhResultBlock.slideDown(600, function()
					{
					if(callback) callback.call($seacrhResultBlock);
					});
			else if(callback)
				callback.call($seacrhResultBlock);
			});
		};
	/* ------------------------------------------- */
	/* --------------- hide result --------------- */
	/* ------------------------------------------- */
	jQuery.fn.hideAvShopSearchTitleResult = function(callback)
		{
		return this.each(function()
			{
			var
				$seacrhResultBlock = $(this).filter(".av-shop-search-title-result"),
				$searchBlock       = $(".av-shop-search-title[data-search-id=\""+$seacrhResultBlock.attr("data-search-id")+"\"]");
			if(!$searchBlock.length || !$seacrhResultBlock.length || (callback && typeof callback != "function")) return;if(!$searchBlock.length || !$seacrhResultBlock.length) return;

			if($seacrhResultBlock.is(":visible"))
				$seacrhResultBlock.slideUp(600, function()
					{
					if(callback) callback.call($seacrhResultBlock);
					});
			else if(callback)
				callback.call($seacrhResultBlock);
			});
		};
	/* ------------------------------------------- */
	/* ------------- position result ------------- */
	/* ------------------------------------------- */
	jQuery.fn.positionAvShopSearchTitle = function()
		{
		return this.each(function()
			{
			var
				$seacrhResultBlock      = $(this).filter(".av-shop-search-title-result"),
				$searchBlock            = $(".av-shop-search-title[data-search-id=\""+$seacrhResultBlock.attr("data-search-id")+"\"]"),
				scrollTop               = $(window).scrollTop(),
				scrollBottom            = scrollTop + $(window).height(),
				seacrhResultBlockTop    = $seacrhResultBlock.offset().top,
				seacrhResultBlockBottom = seacrhResultBlockTop + $seacrhResultBlock.height(),
				searchBlockBottom       = $searchBlock.offset().top + $searchBlock.height(),
				lastScrollTop           = $seacrhResultBlock.data("data-scroll-top") ? $seacrhResultBlock.data("data-scroll-top") : 0,
				scrollDirection         = scrollTop > lastScrollTop ? "down" : "up";
			if(!$searchBlock.length || !$seacrhResultBlock.length || !$seacrhResultBlock.is(":visible")) return;
			$seacrhResultBlock.data("data-scroll-top", scrollTop);

			if(seacrhResultBlockBottom > scrollBottom && scrollDirection == "down")
				$seacrhResultBlock.css
					({
					"position": "absolute",
					"top"     : seacrhResultBlockTop,
					"z-index" : 50
					});
			else if(seacrhResultBlockTop > searchBlockBottom && scrollDirection == "up")
				$seacrhResultBlock.css
					({
					"position": "fixed",
					"top"     : searchBlockBottom - scrollTop + 5,
					"z-index" : 500
					});
			});
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	var
		$searchBlock       = $(".av-shop-search-title").prepareAvShopSearchTitle(),
		$seacrhResultBlock = $(".av-shop-search-title-result").appendTo("body");
	/* ------------------------------------------- */
	/* -------------- activate field ------------- */
	/* ------------------------------------------- */
	$searchBlock
		.on("vclick", ".placeholder, .icon", function()
			{
			$(this).parent().find(":text").focus();
			})
		.on("focus", ":text", function()
			{
			var
				$searchBlockItem       = $(this).parent(),
				$seacrhResultBlockItem = $seacrhResultBlock.filter("[data-search-id=\""+$searchBlockItem.attr("data-search-id")+"\"]");

			if(!$searchBlockItem.hasClass("active"))
				$searchBlockItem.activateAvShopSearchTitle(function()
					{
					$seacrhResultBlockItem.showAvShopSearchTitleResult();
					});
			});
	/* ------------------------------------------- */
	/* ------------- diactivate field ------------ */
	/* ------------------------------------------- */
	$searchBlock
		.on("focusout", ":text", function()
			{
			var
				$searchBlockItem       = $(this).parent(),
				$seacrhResultBlockItem = $seacrhResultBlock.filter("[data-search-id=\""+$searchBlockItem.attr("data-search-id")+"\"]");

			if($searchBlockItem.hasClass("active"))
				$seacrhResultBlockItem.hideAvShopSearchTitleResult(function()
					{
					$searchBlockItem.diactivateAvShopSearchTitle();
					});
			});
	/* ------------------------------------------- */
	/* ------------------ keyup ------------------ */
	/* ------------------------------------------- */
	$searchBlock
		.on("keyup", ":text", function(event)
			{
			var
				keyCode                = event.keyCode,
				$input                 = $(this),
				$searchBlockItem       = $input.parent(),
				$seacrhResultBlockItem = $seacrhResultBlock.filter("[data-search-id=\""+$searchBlockItem.attr("data-search-id")+"\"]"),
				$selectedItem          = $seacrhResultBlockItem.find("a.active"),
				inputValue             = $input.val().length >= 2 ? $input.val() : "";
			if(!$seacrhResultBlockItem.length) return;
			/* ---------------------------- */
			/* -------- navigation -------- */
			/* ---------------------------- */
			if((keyCode == 38 || keyCode == 40) && $seacrhResultBlockItem.is(":visible"))
				{
				var elementsLinks = [];

				$selectedItem.removeClass("active");
				$seacrhResultBlockItem.find("a").each(function() {elementsLinks.push($(this).attr("href"))});
				if(!elementsLinks.length) return;

				var selectIndex = elementsLinks.indexOf($selectedItem.attr("href"));
				if(selectIndex != -1)
					{
					if(keyCode == 40) selectIndex++;
					if(keyCode == 38) selectIndex--;
					}
				if(!elementsLinks[selectIndex])
					{
					if(keyCode == 40) selectIndex = 0;
					if(keyCode == 38) selectIndex = elementsLinks.length - 1;
					}

				$seacrhResultBlockItem.find("a[href=\""+elementsLinks[selectIndex]+"\"]").addClass("active");
				}
			/* ---------------------------- */
			/* -------- item select ------- */
			/* ---------------------------- */
			else if(keyCode == 13 && $selectedItem.length)
				{
				$selectedItem[0].click();
				AvWaitingScreen("on");
				}
			/* ---------------------------- */
			/* ------- form submit -------- */
			/* ---------------------------- */
			else if(keyCode == 13 && inputValue)
				{
				window.location.replace($searchBlockItem.attr("data-search-page").replace("#SEACRH#", inputValue));
				AvWaitingScreen("on");
				}
			/* ---------------------------- */
			/* ---------- search ---------- */
			/* ---------------------------- */
			else if(inputValue && $input.attr("data-search_value") != inputValue)
				BX.ajax.post
					(
					"/",
						{
						"ajax_call": "y",
						"q"        : inputValue
						},
					function(result)
						{
						$input.attr("data-search_value", inputValue);
						if(result)
							$seacrhResultBlockItem
								.html(result)
								.attr("data-empty", "N")
								.showAvShopSearchTitleResult();
						else
							$seacrhResultBlockItem
								.html("<div class=\"empty-result\">"+$searchBlockItem.attr("data-empty-result-title")+"</div>")
								.attr("data-empty", "N")
								.showAvShopSearchTitleResult()
								.attr("data-empty", "Y");
						}
					);
			});
	/* ------------------------------------------- */
	/* -------------- scroll/resize -------------- */
	/* ------------------------------------------- */
	$(window)
		.scroll(function()
			{
			$seacrhResultBlock.filter(":visible").positionAvShopSearchTitle();
			})
		.resize(function()
			{
			$seacrhResultBlock.filter(":visible").showAvShopSearchTitleResult();
			$searchBlock.prepareAvShopSearchTitle();
			});
	});