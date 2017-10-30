/* -------------------------------------------------------------------- */
/* ----------------------------- methods ------------------------------ */
/* -------------------------------------------------------------------- */
(function($)
	{
	/* ------------------------------------------- */
	/* ---------- search set need mode ----------- */
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
				$(document)
					.trigger("avShopSearchTitleNormolize");
				$searchBlock
					.removeClass("active")
					.removeClass("run");
				$seacrhResultBlock
					.hide();

				if(transformed)
					{
					$searchBlock.find(":text").hide();
					$searchBlock.find(".placeholder").hide();
					}
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
					.css("overflow", "hidden")
					.addClass("run");
				$input
					.css
						({
						"display"     : "block",
						"margin-right": "-"+$input.css("width")
						})
					.animate({"margin-right": 0}, 800, function()
						{
						$searchBlock.addClass("active").removeAttr("style");
						$input.removeAttr("style").show().focus();
						if(callback) callback.call($searchBlock);
						});
				}
			else
				{
				$input.show();
				$placeholder.hide();
				$searchBlock.addClass("active");
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
						$searchBlock.removeClass("active").removeClass("run").removeAttr("style");
						$input.removeAttr("style").hide();
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
					"position": "absolute",
					"top"     : $searchBlock.offset().top + $searchBlock.height() + 10,
					"left"    : $searchBlock.offset().left,
					"width"   : $searchBlock.width()
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
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(".av-shop-search-title").prepareAvShopSearchTitle();
	$(".av-shop-search-title-result").appendTo("body");

	$(document)
		/* ------------------------------------------- */
		/* ----------------- behavior ---------------- */
		/* ------------------------------------------- */
		.on("vclick", ".av-shop-search-title .placeholder, .av-shop-search-title .icon", function()
			{
			$(this)
				.closest(".av-shop-search-title")
				.find(":text").focus();
			})
		.on("focus", ".av-shop-search-title :text", function()
			{
			var
				$searchBlock       = $(this).closest(".av-shop-search-title"),
				$seacrhResultBlock = $(".av-shop-search-title-result[data-search-id=\""+$searchBlock.attr("data-search-id")+"\"]");

			$searchBlock.activateAvShopSearchTitle(function()
				{
				$seacrhResultBlock.showAvShopSearchTitleResult();
				});
			})
		.on("vclick", function()
			{
			$(".av-shop-search-title.active").each(function()
				{
				var
					$searchBlock       = $(this),
					$seacrhResultBlock = $(".av-shop-search-title-result[data-search-id=\""+$searchBlock.attr("data-search-id")+"\"]");
				if($searchBlock.isClicked() || $seacrhResultBlock.isClicked()) return;

				$seacrhResultBlock.hideAvShopSearchTitleResult(function()
					{
					$searchBlock.diactivateAvShopSearchTitle();
					});
				});
			})
		/* ------------------------------------------- */
		/* ------------------ keyup ------------------ */
		/* ------------------------------------------- */
		.on("keyup", ".av-shop-search-title :text", function(event)
			{
			var
				keyCode            = event.keyCode,
				$input             = $(this),
				$searchBlock       = $input.closest(".av-shop-search-title"),
				$seacrhResultBlock = $(".av-shop-search-title-result[data-search-id=\""+$searchBlock.attr("data-search-id")+"\"]"),
				$selectedItem      = $seacrhResultBlock.find("a.active"),
				inputValue         = $input.val().length >= 2 ? $input.val() : "";
			if(!$seacrhResultBlock.length) return;
			/* ---------------------------- */
			/* -------- navigation -------- */
			/* ---------------------------- */
			if((keyCode == 38 || keyCode == 40) && $seacrhResultBlock.is(":visible"))
				{
				var elementsLinks = [];

				$selectedItem.removeClass("active");
				$seacrhResultBlock.find("a").each(function() {elementsLinks.push($(this).attr("href"))});
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

				$seacrhResultBlock.find("a[href=\""+elementsLinks[selectIndex]+"\"]").addClass("active");
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
				window.location.replace($searchBlock.attr("data-search-page").replace("#SEACRH#", inputValue));
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
							$seacrhResultBlock
								.html(result)
								.attr("data-empty", "N")
								.showAvShopSearchTitleResult();
						else
							$seacrhResultBlock
								.html("<div class=\"empty-result\">"+$searchBlock.attr("data-empty-result-title")+"</div>")
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
			$(".av-shop-search-title-result:visible").showAvShopSearchTitleResult();
			})
		.resize(function()
			{
			$(".av-shop-search-title-result:visible").showAvShopSearchTitleResult();
			$(".av-shop-search-title").prepareAvShopSearchTitle();
			});
	});