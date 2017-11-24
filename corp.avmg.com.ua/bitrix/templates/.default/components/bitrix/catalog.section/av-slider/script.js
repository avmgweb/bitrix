/* -------------------------------------------------------------------- */
/* ----------------------------- methods ------------------------------ */
/* -------------------------------------------------------------------- */
(function($)
	{
	/* ------------------------------------------- */
	/* ---------------- run slider --------------- */
	/* ------------------------------------------- */
	jQuery.fn.runAvCatalogSectionSlider = function(direction)
		{
		var
			runDirection    = $.inArray(direction, ["back", "forward"]) == -1 ? "forward" : direction,
			$slider         = this,
			$sliderBlock    = $slider.find(".slider-block"),
			$slides         = $sliderBlock.children(),
			$activeSlides   = $slides.filter(":visible"),
			$prevSlide      = $activeSlides.first().prev(),
			$nextSlide      = $activeSlides.last() .next(),
			$prevNav        = $slider.find(".navigation.prev"),
			$nextNav        = $slider.find(".navigation.next"),
			slideWidth      = parseFloat($sliderBlock.width() / $activeSlides.length),
		    slidePosition   = 0;
		if($slider.hasClass("in-process")) return $slider;
		/* ---------------------------- */
		/* -------- preparing --------- */
		/* ---------------------------- */
		$slider
			.addClass("in-process");
		$sliderBlock
			.css("position", "relative")
			.width($sliderBlock.width())
			.height($sliderBlock.height());
		$slides
			.css("position", "absolute")
			.addClass("to-hide");
		$activeSlides
			.removeClass("to-hide")
			.each(function()
				{
				$(this).css("left", slidePosition+"px");
				slidePosition += slideWidth;
				});
		$prevSlide.show().css("left", "-"+slideWidth+"px");
		$nextSlide.show().css("left", (slideWidth * $activeSlides.length)+"px");
		/* ---------------------------- */
		/* ------- slide types -------- */
		/* ---------------------------- */
		switch(runDirection)
			{
			case "forward":
				$activeSlides.first().addClass("to-hide");
				$nextSlide.removeClass("to-hide");
				$activeSlides
					.add($nextSlide)
					.each(function()
						{
						$(this).animate({"left": (parseFloat($(this).css("left")) - slideWidth)+"px"}, 900);
						});

				$prevNav.removeClass("unactive");
				if($nextSlide.next().length) $nextNav.removeClass("unactive");
				else                         $nextNav   .addClass("unactive");
				break;
			case "back":
				$activeSlides.last().addClass("to-hide");
				$prevSlide.removeClass("to-hide");
				$activeSlides
					.add($prevSlide)
					.each(function()
						{
						$(this).animate({"left": (parseFloat($(this).css("left")) + slideWidth)+"px"}, 900);
						});

				$nextNav.removeClass("unactive");
				if($prevSlide.prev().length) $prevNav.removeClass("unactive");
				else                         $prevNav   .addClass("unactive");
				break;
			default:
				break;
			}
		/* ---------------------------- */
		/* ------------ end ----------- */
		/* ---------------------------- */
		setTimeout(function()
			{
			$slider
				.removeClass("in-process");
			$sliderBlock.css
				({
				"position": "",
				"width"   : "",
				"height"  : ""
				});
			$slides
				.css("position", "")
				.css("left",     "")
				.filter(".to-hide")
					.hide()
					.removeClass("to-hide");
			}, 1200);
		return $slider;
		};
	/* ------------------------------------------- */
	/* -------------- prepare slider ------------- */
	/* ------------------------------------------- */
	jQuery.fn.prepareAvCatalogSectionSlider = function()
		{
		var
			$slider      = this,
			$sliderBlock = $slider.find(".slider-block"),
			$slides      = $sliderBlock.children(),
			$prevNav     = $slider.find(".navigation.prev"),
			$nextNav     = $slider.find(".navigation.next"),
			windowWidth  = $(window).width(),
			slidesCount = 0, slideWidth = 0, slidesHeightArray = [];
		/* ---------------------------- */
		/* ------ mode difference ----- */
		/* ---------------------------- */
		     if(windowWidth <= 767)  slidesCount = $slider.attr("data-slides-count-767");
		else if(windowWidth <= 991)  slidesCount = $slider.attr("data-slides-count-991");
		else if(windowWidth <= 1199) slidesCount = $slider.attr("data-slides-count-1199");
		else                         slidesCount = $slider.attr("data-slides-count");
		slidesCount = parseInt(slidesCount);
		/* ---------------------------- */
		/* ----- slide width calc ----- */
		/* ---------------------------- */
		if(slidesCount)
			slideWidth  =
				(
				$sliderBlock.width()
				-
				(parseFloat($slides.css("margin-left")) + parseFloat($slides.css("margin-right"))) * slidesCount
				) / slidesCount;
		/* ---------------------------- */
		/* -------- preparing --------- */
		/* ---------------------------- */
		$slider
			.removeClass("unactive");
		$slides
			.css("width", "")
			.show();
		$prevNav.add($nextNav)
			.addClass("unactive");

		if(slidesCount && $slides.length > slidesCount)
			$nextNav.removeClass("unactive");

		if(slidesCount)
			$slides
				.each(function()
					{
					$(this).css("width", slideWidth+"px");
					slidesHeightArray.push($(this).height());
					if($(this).index() >= slidesCount) $(this).hide();
					})
				.height(Math.max.apply(Math, slidesHeightArray));
		else
			$slider.addClass("unactive");

		return $slider;
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(".av-catalog-section-slider")
		.prepareAvCatalogSectionSlider()
		.on("vclick", ".navigation", function()
			{
			$(this).closest(".av-catalog-section-slider").runAvCatalogSectionSlider($(this).hasClass("prev") ? "back" : "forward");
			});

	setInterval(function()
		{
		$(".av-catalog-section-slider").each(function()
			{
			var $nextButton = $(this).find(".navigation.next");
			if($(this).is(":hover") && $nextButton.is(":visible") && !$nextButton.is(".unactive"))
				$nextButton.click();
			});
		}, 2000);

	$(window).resize(function()
		{
		$(".av-catalog-section-slider").prepareAvCatalogSectionSlider();
		});
	});