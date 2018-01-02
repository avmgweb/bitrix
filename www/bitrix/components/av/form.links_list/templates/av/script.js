/* -------------------------------------------------------------------- */
/* ----------------------------- methods ------------------------------ */
/* -------------------------------------------------------------------- */
(function($)
	{
	/* ------------------------------------------- */
	/* ---------------- active on ---------------- */
	/* ------------------------------------------- */
	jQuery.fn.avLinksListActiveOn = function()
		{
		return this.each(function()
			{
			var
				$inputBlock = $(this).filter(".av-links-list"),
				$list       = $inputBlock.children(".list");

			if($inputBlock.length && !$list.is(":visible"))
				{
				if(!$inputBlock.hasClass("scroll-seted"))
					$inputBlock.children(".list").mCustomScrollbar({"theme": "dark"});
				$inputBlock
					.addClass("active");
				$list
					.css("width", $inputBlock[0].getBoundingClientRect().width)
					.slideDown();
				}
			});
		};
	/* ------------------------------------------- */
	/* ---------------- active off --------------- */
	/* ------------------------------------------- */
	jQuery.fn.avLinksListActiveOff = function()
		{
		return this.each(function()
			{
			$(this).filter(".av-links-list")
				.removeClass("active")
				.children(".list")
					.slideUp()
					.removeClass("navigation-on")
					.find(".list-item")
						.removeClass("active");
			});
		};
	/* ------------------------------------------- */
	/* --------------- navigation ---------------- */
	/* ------------------------------------------- */
	jQuery.fn.avLinksListNavigation = function(navigationType)
		{
		return this.each(function()
			{
			var
				navigationUp   = navigationType == "UP",
				navigationDown = navigationType == "DOWN",
				$inputBlock    = $(this).filter(".av-links-list"),
				$listItems     = $inputBlock.children(".list").find(".list-item"),
				$selectedItem  = $listItems.filter(".active"),
				itemsValueArray = [], selectIndex = 0;
			if(!$inputBlock.length) return;

			$listItems
				.removeClass("active")
				.each(function()
					{
					itemsValueArray.push($(this).attr("href"));
					});
			if(!itemsValueArray.length) return;

			selectIndex = itemsValueArray.indexOf($selectedItem.attr("href"));
			if(selectIndex != -1)
				{
				     if(navigationDown) selectIndex++;
				else if(navigationUp)   selectIndex--;
				}
			if(!itemsValueArray[selectIndex])
				{
				     if(navigationDown) selectIndex = 0;
				else if(navigationUp)   selectIndex = itemsValueArray.length - 1;
				}

			$listItems.filter("[href=\""+itemsValueArray[selectIndex]+"\"]")
				.addClass("active")
				.closest(".list")
					.addClass("navigation-on")
					.mCustomScrollbar("scrollTo", ".list-item[href=\""+itemsValueArray[selectIndex]+"\"]");
			});
		};
	/* ------------------------------------------- */
	/* --------------- go selected --------------- */
	/* ------------------------------------------- */
	jQuery.fn.avLinksListGoSelected = function()
		{
		this.each(function()
			{
			$(this)
				.filter(".av-links-list")
				.children(".list").find(".list-item.active")[0]
				.click();
			});
		};
	/* ------------------------------------------- */
	/* --------------- search item --------------- */
	/* ------------------------------------------- */
	jQuery.fn.avLinksListSearchItem = function(value)
		{
		return this.each(function()
			{
			var
				searchValue = value.toLowerCase().trim(),
				$inputBlock = $(this).filter(".av-links-list"),
			    $list       = $inputBlock.children(".list");
			if(!searchValue || !$inputBlock.length) return;

			$inputBlock
				.addClass("search-failed");
			$list
				.find(".list-item").each(function()
					{
					var linkText = $(this).text().toLowerCase().trim();
					if(linkText && linkText.indexOf(searchValue) === 0)
						{
						$inputBlock
							.removeClass("search-failed");
						$list
							.addClass("navigation-on")
							.mCustomScrollbar("scrollTo", $(this))
							.find(".list-item")
								.removeClass("active");
						$(this)
							.addClass("active");
						return false;
						}
					});
			});
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", ".av-links-list .title-block", function()
			{
			$(this).find(".search-input").focus();
			})
		.on("focus", ".av-links-list .search-input", function()
			{
			$(this).closest(".av-links-list")
				.controlFormSubmit("off")
				.avLinksListActiveOn();
			})
		.on("focusout", ".av-links-list .search-input", function()
			{
			$(this).closest(".av-links-list")
				.controlFormSubmit("on")
				.avLinksListActiveOff();
			})
		.on("keyup", ".av-links-list .search-input", function(event)
			{
			var
				keyCode     = event.keyCode,
				$inputBlock = $(this).closest(".av-links-list");

			     if(keyCode == 38) $inputBlock.avLinksListNavigation("UP");
			else if(keyCode == 40) $inputBlock.avLinksListNavigation("DOWN");
			else if(keyCode == 13) $inputBlock.avLinksListGoSelected();
			else                   $inputBlock.avLinksListSearchItem($(this).val());
			});
	});