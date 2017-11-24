/* -------------------------------------------------------------------- */
/* ----------------------------- methods ------------------------------ */
/* -------------------------------------------------------------------- */
(function($)
	{
	/* ------------------------------------------- */
	/* ---------------- run slider --------------- */
	/* ------------------------------------------- */
	jQuery.fn.runAvCatalogSectionListSlider = function(direction)
		{
		var
			runDirection    = $.inArray(direction, ["back", "forward"]) == -1 ? 'forward' : direction,
			$slider         = this,
			$sliderBlock    = $slider.find('.slider-block'),
			$slides         = $sliderBlock.children(),
			$activeSlides   = $slides.filter(':visible'),
			$prevSlide      = $activeSlides.first().prev(),
			$nextSlide      = $activeSlides.last() .next(),
			$prevNav        = $slider.find('.navigation.prev'),
			$nextNav        = $slider.find('.navigation.next'),
			slideWidth      = parseFloat($sliderBlock.width() / $activeSlides.length),
		    slidePosition   = 0;
		if($slider.hasClass("in-process")) return $slider;
		/* ---------------------------- */
		/* -------- preparing --------- */
		/* ---------------------------- */
		$slider
			.addClass("in-process");
		$sliderBlock
			.css("position", 'relative')
			.width($sliderBlock.width());
		$slides
			.css("position", 'absolute')
			.addClass("to-hide");
		$activeSlides
			.removeClass("to-hide")
			.each(function()
				{
				$(this).css("left", slidePosition+'px');
				slidePosition += slideWidth;
				});
		$prevSlide.show().css("left", '-'+slideWidth+'px');
		$nextSlide.show().css("left", (slideWidth * $activeSlides.length)+'px');
		/* ---------------------------- */
		/* ------- slide types -------- */
		/* ---------------------------- */
		switch(runDirection)
			{
			case 'forward':
				$activeSlides.first().addClass("to-hide");
				$nextSlide.removeClass("to-hide");
				$activeSlides
					.add($nextSlide)
					.each(function()
						{
						$(this).animate({"left": (parseFloat($(this).css("left")) - slideWidth)+'px'}, 600);
						});

				$prevNav.removeClass("unactive");
				if($nextSlide.next().length) $nextNav.removeClass("unactive");
				else                         $nextNav   .addClass("unactive");
				break;
			case 'back':
				$activeSlides.last().addClass("to-hide");
				$prevSlide.removeClass("to-hide");
				$activeSlides
					.add($prevSlide)
					.each(function()
						{
						$(this).animate({"left": (parseFloat($(this).css("left")) + slideWidth)+'px'}, 600);
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
				"width"   : ""
				});
			$slides
				.css("position", "")
				.css("left",     "")
				.filter('.to-hide')
					.hide()
					.removeClass("to-hide");
			}, 1000);
		return $slider;
		};
	/* ------------------------------------------- */
	/* -------------- prepare slider ------------- */
	/* ------------------------------------------- */
	jQuery.fn.prepareAvCatalogSectionListSlider = function()
		{
		var
			$slider      = this,
			$sliderBlock = $slider.find('.slider-block'),
			$slides      = $sliderBlock.children(),
			$prevNav     = $slider.find('.navigation.prev'),
			$nextNav     = $slider.find('.navigation.next'),
			windowWidth  = $(window).width(),
			slidesCount = 0, slideWidth = 0;
		/* ---------------------------- */
		/* ------ mode difference ----- */
		/* ---------------------------- */
		     if(windowWidth <= 767) slidesCount = $slider.attr("data-slides-count-mobile");
		else if(windowWidth <= 991) slidesCount = $slider.attr("data-slides-count-tablet");
		else                        slidesCount = $slider.attr("data-slides-count");

		slidesCount = parseInt(slidesCount);
		slideWidth  =
			(
			$sliderBlock.width()
			-
			(parseFloat($slides.css("margin-left")) + parseFloat($slides.css("margin-right"))) * slidesCount
			) / slidesCount;
		/* ---------------------------- */
		/* -------- preparing --------- */
		/* ---------------------------- */
		$slides
			.show()
			.each(function()
				{
				$(this).css("width", slideWidth+"px");
				if($(this).index() >= slidesCount) $(this).hide();
				});

		$prevNav.addClass("unactive");
		if($slides.eq(slidesCount).length) $nextNav.removeClass("unactive");
		else                               $nextNav   .addClass("unactive");

		return $slider;
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	var $slider = $('.av-catalog-section-list-slider');

	$slider
		.prepareAvCatalogSectionListSlider()
		.on("vclick", '.navigation', function()
			{
			$slider.runAvCatalogSectionListSlider($(this).hasClass("prev") ? 'back' : 'forward');
			});

	$(window)
		.resize(function()
			{
			$slider.prepareAvCatalogSectionListSlider();
			});
	});