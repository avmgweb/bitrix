/* -------------------------------------------------------------------- */
/* ----------------------------- methods ------------------------------ */
/* -------------------------------------------------------------------- */
(function($)
	{
	/* ------------------------------------------- */
	/* ---------------- integrity ---------------- */
	/* ------------------------------------------- */
	jQuery.fn.getAvCatalogElementSliderIntegrity = function()
		{
		var
			$sliderBlock = this.children('.slider-block'),
		    $slides      = $sliderBlock.children('.slider-image');
		return $sliderBlock.length && $slides.length;
		};
	/* ------------------------------------------- */
	/* -------------- workavailable -------------- */
	/* ------------------------------------------- */
	jQuery.fn.getAvCatalogElementSliderWorkavailable = function()
		{
		return !(this.hasClass("turned-off") || this.hasClass("in-process"));
		};
	jQuery.fn.setAvCatalogElementSliderWorkavailable = function(value, close)
		{
		     if(value === true)  this.removeClass("in-process");
		else if(value === false) this.addClass("in-process");

		     if(close === true)  this.addClass("turned-off");
		else if(close === false) this.removeClass("turned-off");

		return this;
		};
	/* ------------------------------------------- */
	/* ----------------- autoplay ---------------- */
	/* ------------------------------------------- */
	jQuery.fn.getAvCatalogElementSliderAllowAutoplay = function()
		{
		return this.hasClass("allow-autoplay");
		};
	jQuery.fn.setAvCatalogElementSliderAllowAutoplay = function(value)
		{
		     if(value === true)  this.addClass   ("allow-autoplay");
		else if(value === false) this.removeClass("allow-autoplay");
		return this;
		};
	/* ------------------------------------------- */
	/* ------------------ slides ----------------- */
	/* ------------------------------------------- */
	jQuery.fn.getAvCatalogElementSliderSlides = function()
		{
		return this.getAvCatalogElementSliderIntegrity()
			? this.find('.slider-block').children('.slider-image')
			: $();
		};
	jQuery.fn.getAvCatalogElementSliderSlide = function(imageSrc)
		{
		return this.getAvCatalogElementSliderIntegrity()
			? this.getAvCatalogElementSliderSlides().find('img[src="'+imageSrc+'"]').parent('.slider-image')
			: $();
		};
	/* ------------------------------------------- */
	/* ---------------- run slider --------------- */
	/* ------------------------------------------- */
	jQuery.fn.runAvCatalogElementSlider = function(direction)
		{
		var
			runDirection = $.inArray(direction, ["back", "forward", "top", "bottom"]) == -1 ? 'forward' : direction,
			$slider      = this,
			slidesCount  = $slider.attr("data-slides-count-current"),
			$sliderBlock = $slider.find('.slider-block'),
			slideWidth   = parseFloat($sliderBlock.width()  / slidesCount),
			slideHeight  = parseFloat($sliderBlock.height() / slidesCount),
			$needSlide   = $(),
			$newSlide    = $();
		if(!$slider.getAvCatalogElementSliderIntegrity() || !$slider.getAvCatalogElementSliderWorkavailable()) return $slider;
		/* ---------------------------- */
		/* -------- preparing --------- */
		/* ---------------------------- */
		$sliderBlock
			.css("position", 'relative')
			.width($sliderBlock.width())
			.height($sliderBlock.height());
		$slider
			.setAvCatalogElementSliderWorkavailable(false)
			.getAvCatalogElementSliderSlides()
	            .show()
	            .each(function()
					{
					if(runDirection == 'back' || runDirection == 'forward') $(this).css("left", (slideWidth  * $(this).index())+'px');
					else                                                    $(this).css("top",  (slideHeight * $(this).index())+'px');
					$(this).css("position", 'absolute');
					});
		/* ---------------------------- */
		/* ------- slide types -------- */
		/* ---------------------------- */
		switch(runDirection)
			{
			case 'forward':
				$needSlide = $slider.getAvCatalogElementSliderSlides().first();
				$newSlide  = $needSlide.clone();

				$newSlide
					.appendTo($sliderBlock)
					.css("left", (slideWidth * $slider.getAvCatalogElementSliderSlides().length)+'px');

				$slider.getAvCatalogElementSliderSlides().each(function()
					{
					$(this).animate({"left": (slideWidth * $(this).index() - slideWidth)+'px'}, 600);
					});
				break;
			case 'back':
				$needSlide = $slider.getAvCatalogElementSliderSlides().last();
				$newSlide  = $needSlide.clone();

				$newSlide
					.prependTo($sliderBlock)
					.css("left", '-'+slideWidth+'px');

				$slider.getAvCatalogElementSliderSlides().each(function()
					{
					$(this).animate({"left": (slideWidth * $(this).index())+'px'}, 600);
					});
				break;
			case 'top':
				$needSlide = $slider.getAvCatalogElementSliderSlides().last();
				$newSlide  = $needSlide.clone();

				$newSlide
					.prependTo($sliderBlock)
					.css("top", '-'+slideHeight+'px');

				$slider.getAvCatalogElementSliderSlides().each(function()
					{
					$(this).animate({"top": (slideHeight * $(this).index())+'px'}, 600);
					});
				break;
			case 'bottom':
				$needSlide = $slider.getAvCatalogElementSliderSlides().first();
				$newSlide  = $needSlide.clone();

				$newSlide
					.appendTo($sliderBlock)
					.css("top", (slideHeight * $slider.getAvCatalogElementSliderSlides().length)+'px');

				$slider.getAvCatalogElementSliderSlides().each(function()
					{
					$(this).animate({"top": (slideHeight * $(this).index() - slideHeight)+'px'}, 600);
					});
				break;
			default:
				break;
			}
		/* ---------------------------- */
		/* ------------ end ----------- */
		/* ---------------------------- */
		setTimeout(function()
			{
			$needSlide.remove();
			$sliderBlock.removeAttr("style");
			$slider
				.setAvCatalogElementSliderWorkavailable(true)
				.getAvCatalogElementSliderSlides()
					.css("position", 'static')
					.filter(':not(:lt('+slidesCount+'))').hide();
			}, 1000);
		return $slider;
		};
	/* ------------------------------------------- */
	/* --------------- jump slider --------------- */
	/* ------------------------------------------- */
	jQuery.fn.jumpAvCatalogElementSlider = function(imageSrc)
		{
		var
			$slider      = this,
			slidesCount  = $slider.attr("data-slides-count-current"),
			$sliderBlock = $slider.find('.slider-block'),
		    $needSlide   = $slider.getAvCatalogElementSliderSlide(imageSrc);

		if
			(
			!$slider.getAvCatalogElementSliderIntegrity()
			||
			!$slider.getAvCatalogElementSliderWorkavailable()
			||
			!$needSlide.length
			) return $slider;

		$slider.getAvCatalogElementSliderSlides().each(function()
			{
			if($(this).index() == $needSlide.index()) return false;
			$sliderBlock.append($(this).remove());
			});
		$slider.getAvCatalogElementSliderSlides()
			.show()
			.filter(':not(:lt('+slidesCount+'))').hide();

		return $slider;
		};
	/* ------------------------------------------- */
	/* --------------- fade slider --------------- */
	/* ------------------------------------------- */
	jQuery.fn.fadeAvCatalogElementSlider = function(imageSrc)
		{
		var
			$slider      = this,
			$sliderBlock = $slider.find('.slider-block'),
			$firstSlide  = $slider.getAvCatalogElementSliderSlides().first().clone(),
			$needSlide   = $slider.getAvCatalogElementSliderSlide(imageSrc);

		if
			(
			!$slider.getAvCatalogElementSliderIntegrity()
			||
			!$slider.getAvCatalogElementSliderWorkavailable()
			||
			!$needSlide.length
			||
			$slider.attr("data-slides-count-current") != 1
			||
			$firstSlide.find('img').attr("src") == imageSrc
			) return $slider;

		$slider
			.jumpAvCatalogElementSlider(imageSrc)
			.setAvCatalogElementSliderWorkavailable(false);
		$sliderBlock
			.css("position", 'relative');
		$needSlide
			.hide();
		$firstSlide
			.prependTo($sliderBlock)
			.show()
			.css("position", 'absolute');

		$firstSlide.fadeOut(700, function()
			{
			$firstSlide.remove();
			$slider.setAvCatalogElementSliderWorkavailable(true);
			});
		$needSlide.fadeIn(700);

		return $slider;
		};
	/* ------------------------------------------- */
	/* -------------- prepare slider ------------- */
	/* ------------------------------------------- */
	jQuery.fn.prepareAvCatalogElementSlider = function(type)
		{
		var
			$slider       = this,
			preparingType = $.inArray(type, ["horizontal", "vertical"]) == -1 ? 'horizontal'    : type,
			mode          = $(window).width() <= 767 ? 'mobile'                                 : 'desktop',
		    slidesCount   = mode == 'mobile'         ? $slider.attr("data-slides-count-mobile") : $slider.attr("data-slides-count"),
			$sliderBlock  = $slider.find('.slider-block'),
			$firstSlide   = $slider.getAvCatalogElementSliderSlides().first(),
			slideSize     = preparingType == 'horizontal'
				?
					(
					$sliderBlock.width()
					-
					(parseFloat($firstSlide.css("margin-left")) + parseFloat($firstSlide.css("margin-right"))) * slidesCount
					) / slidesCount
				:
					(
					$sliderBlock.height()
					-
					(parseFloat($firstSlide.css("margin-top")) + parseFloat($firstSlide.css("margin-bottom"))) * slidesCount
					) / slidesCount;
		if(!$slider.getAvCatalogElementSliderIntegrity()) return $slider;

		$slider.getAvCatalogElementSliderSlides().each(function()
			{
			     if(preparingType == 'horizontal') $(this).width(slideSize);
			else if(preparingType == 'vertical')   $(this).height(slideSize);

			if($(this).index() >= slidesCount) $(this).hide();
			else                               $(this).show();
			});

		$slider
			.setAvCatalogElementSliderWorkavailable
				(
				true,
				$slider.getAvCatalogElementSliderSlides().length <= slidesCount
				)
			.setAvCatalogElementSliderAllowAutoplay(mode == 'desktop')
			.attr("data-slides-count-current", slidesCount)
			.find('.navigation').css
				(
				"visibility",
				$slider.getAvCatalogElementSliderSlides().length <= slidesCount ? 'hidden' : 'visible'
				);

		return $slider;
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	var
		$imageBlock                = $('.av-catalog-element .images-block'),
		$mainImage                 = $imageBlock.find('.main-image-wraper img'),
		$mainSlider                = $imageBlock.children('.slider'),
		$imageViewer               = $('body').append($('.av-catalog-element-image-viewer').remove()).find('.av-catalog-element-image-viewer'),
		$imageViewerMainSlider     = $imageViewer.find('.slider-main'),
		$imageViewerVerticalSlider = $imageViewer.find('.slider-vertical');
	/* ------------------------------------------- */
	/* ------------- slider handlers ------------- */
	/* ------------------------------------------- */
	$mainSlider
		.prepareAvCatalogElementSlider("horizontal")
		.on("vclick", '.navigation', function()
			{
			$mainSlider.runAvCatalogElementSlider($(this).hasClass("prev") ? 'back' : 'forward');
			});
	$imageBlock
		.on("vclick", 'img', function()
			{
			AvBlurScreen("on", 1000);
			$imageViewer
				.show()
				.positionCenter(1100, 'Y', 'Y')
				.hideOnClickout("hide", function() {AvBlurScreen("off")})
				.on("vclick", '.close', function() {AvBlurScreen("off");$imageViewer.hide()});

			$imageViewerMainSlider    .prepareAvCatalogElementSlider("horizontal").jumpAvCatalogElementSlider($(this).attr("src"));
			$imageViewerVerticalSlider.prepareAvCatalogElementSlider("vertical")  .jumpAvCatalogElementSlider($(this).attr("src"));
			});
	$imageViewerMainSlider.on("vclick", '.navigation', function()
		{
		var $nextSlide = $(this).hasClass("prev")
			? $imageViewerMainSlider.getAvCatalogElementSliderSlides().last()
			: $imageViewerMainSlider.getAvCatalogElementSliderSlides().eq(1);

		$imageViewerMainSlider.fadeAvCatalogElementSlider($nextSlide.find('img').attr("src"));
		});
	$imageViewerVerticalSlider
		.on("vclick", 'img', function()
			{
			$imageViewerMainSlider.fadeAvCatalogElementSlider($(this).attr("src"));
			})
		.on("vclick", '.navigation', function()
			{
			$imageViewerVerticalSlider.runAvCatalogElementSlider($(this).hasClass("prev") ? 'top' : 'bottom');
			});
	/* ------------------------------------------- */
	/* ------------- slider autoplay ------------- */
	/* ------------------------------------------- */
	if($mainSlider.length)
		setInterval(function()
			{
			var $nextSlideImage = $mainSlider.getAvCatalogElementSliderSlides().eq(1).find('img');

			if
				(
				!$mainSlider.is(':hover')
				&&
				!$mainImage.is(':hover')
				&&
				!$imageViewer.is(':visible')
				&&
				$mainSlider.getAvCatalogElementSliderAllowAutoplay()
				)
				{
				$mainSlider.runAvCatalogElementSlider();
				$mainImage
					.attr("src",   $nextSlideImage.attr("src"))
					.attr("alt",   $nextSlideImage.attr("alt"))
					.attr("title", $nextSlideImage.attr("title"));
				}
			}, 5000);
	/* ------------------------------------------- */
	/* -------------- scroll/resize -------------- */
	/* ------------------------------------------- */
	$(window)
		.resize(function()
			{
			$mainSlider.prepareAvCatalogElementSlider("horizontal");

			if($imageViewer.is(':visible'))
				{
				$imageViewerMainSlider    .prepareAvCatalogElementSlider("horizontal");
				$imageViewerVerticalSlider.prepareAvCatalogElementSlider("vertical");
				}
			});
	});