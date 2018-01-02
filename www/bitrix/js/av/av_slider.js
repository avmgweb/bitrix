/* -------------------------------------------------------------------- */
/* --------------------------- params info ---------------------------- */
/* -------------------------------------------------------------------- */
avSliderParamsInfo =
	[
		{
		"name"         : "slidesCount",
		"attributeName": "data-slides-count",
		"type"         : "integer",
		"defaultValue" : 1
		},
		{
		"name"         : "slidesPerIteration",
		"attributeName": "data-slides-per-iteration",
		"type"         : "integer",
		"defaultValue" : 1
		},
		{
		"name"         : "slideAnimation",
		"attributeName": "data-slide-animation",
		"type"         : "array",
		"values"       : ["slide", "fade"],
		"defaultValue" : "slide"
		},
		{
		"name"         : "direction",
		"attributeName": "data-direction",
		"type"         : "array",
		"values"       : ["horizontal", "vertical"],
		"defaultValue" : "horizontal"
		},
		{
		"name"         : "cyclicity",
		"attributeName": "data-cyclicity",
		"type"         : "boolean",
		"defaultValue" : false
		}
	];
/* -------------------------------------------------------------------- */
/* ----------------------------- methods ------------------------------ */
/* -------------------------------------------------------------------- */
(function($)
	{
	/* =========================================== */
	/* =============== set slider ================ */
	/* =========================================== */
	$.fn.setAvSlider = function()
		{
		return this.each(function()
			{
			$(this).addClass("av-slider");
			});
		};
	/* =========================================== */
	/* =========== set navigation item =========== */
	/* =========================================== */
	$.fn.setAvSliderNavigationItem = function(direction)
		{
		var slideDirection = $.inArray(direction, ["back", "forward"]) == -1 ? "forward" : direction;

		return this.each(function()
			{
			var $slider = $(this).closest(".av-slider");
			if(!$slider.length) return;

			$(this)
				.addClass("av-slider-navigation-item-"+slideDirection)
				.on("vclick", function()
					{
					$slider.slideAvSlider(slideDirection);
					});
			});
		};
	/* =========================================== */
	/* ============ set slides block ============= */
	/* =========================================== */
	$.fn.setAvSliderSlidesBlock = function()
		{
		return this.each(function()
			{
			var $slider = $(this).closest(".av-slider");
			if(!$slider.length) return;

			$(this)
				.addClass("av-slider-slides-block")
				.children()
					.addClass("av-slider-slide");
			});
		};
	/* =========================================== */
	/* ================ set params =============== */
	/* =========================================== */
	$.fn.setAvSliderParams = function(params)
		{
		var
			sliderParams            = typeof params                         === "object" ? params                         : {},
			slidesBreakpoints       = typeof sliderParams.slidesBreakpoints === "object" ? sliderParams.slidesBreakpoints : {},
			slidesBreakpointsArray  = [],
			result                  = [];
		/* ---------------------------- */
		/* --------- checking --------- */
		/* ---------------------------- */
		avSliderParamsInfo.forEach(function(paramInfo)
			{
			if(typeof paramInfo != "object" || !paramInfo.name || !paramInfo.attributeName) return;
			var value = sliderParams[paramInfo.name];

			switch(paramInfo.type)
				{
				case "integer":
					value = parseInt(value);
					if(!value) value = paramInfo.defaultValue;
					if(!value) value = 1;
					break;
				case "array":
					if(Array.isArray(paramInfo.values) && $.inArray(value, paramInfo.values) == -1) value = paramInfo.defaultValue;
					if(!value)                                                                      value = "";
					break;
				case "boolean":
					value = value === true ? "Y" : "N";
					break;
				default:
					break;
				}

			result.push
				({
				"attr" : paramInfo.attributeName,
				"value": value
				});
			});
		/* ---------------------------- */
		/* ----- breakpoints param ---- */
		/* ---------------------------- */
		$.each(slidesBreakpoints, function(index, value)
			{
			slidesBreakpointsArray.push(index+":"+value);
			});
		result.push
			({
			"attr" : "data-slides-breakpoints",
			"value": slidesBreakpointsArray.join(";")
			});
		/* ---------------------------- */
		/* --------- setting ---------- */
		/* ---------------------------- */
		return this.each(function()
			{
			var $slider = $(this).filter(".av-slider");
			if(!$slider.length) return;

			result.forEach(function(attrInfo)
				{
				$slider.attr(attrInfo.attr, attrInfo.value);
				});
			});
		};
	/* =========================================== */
	/* ================ get params =============== */
	/* =========================================== */
	$.fn.getAvSliderParams = function()
		{
		var
			$slider                 = this.filter(".av-slider"),
			result                  = {"slidesBreakpoints": {}},
			windowWidth             = $(window).width(),
			slidesBreakpointsArray  = [],
			breakpointsValues       = $slider.attr("data-slides-breakpoints").split(";");
		/* ---------------------------- */
		/* --------- checking --------- */
		/* ---------------------------- */
		avSliderParamsInfo.forEach(function(paramInfo)
			{
			if(typeof paramInfo != "object" || !paramInfo.name || !paramInfo.attributeName || !paramInfo.type) return;
			var
				value           = $slider.attr(paramInfo.attributeName),
			    values          = Array.isArray(paramInfo.values) ? paramInfo.values : [],
				defaultValue    = paramInfo.defaultValue;

			switch(paramInfo.type)
				{
				case "integer":
					value = parseInt(value);
					if(!value) value = defaultValue;
					if(!value) value = 1;
					break;
				case "array":
					if($.inArray(value, values) == -1) value = defaultValue;
					if(!value)                         value = "";
					break;
				case "boolean":
					value = value == "Y";
					break;
				default:
					break;
				}

			result[paramInfo.name] =
				{
				"value"       : value,
				"values"      : values,
				"defaultValue": defaultValue
				};
			});
		/* ---------------------------- */
		/* ----- breakpoints param ---- */
		/* ---------------------------- */
		if(!Array.isArray(breakpointsValues)) breakpointsValues = [];
		breakpointsValues.forEach(function(value)
			{
			var
				valueExplode            = value.split(":"),
				breakpouintValue        = parseInt(valueExplode[0]),
				breakpouintSlidesCount  = parseInt(valueExplode[1]);
			if(!breakpouintValue || !breakpouintSlidesCount) return;

			result.slidesBreakpoints[breakpouintValue] = breakpouintSlidesCount;
			});
		$.each(result.slidesBreakpoints, function(index)
			{
			slidesBreakpointsArray.push(index);
			});
		slidesBreakpointsArray
			.sort(function(a, b) {return b - a})
			.forEach(function(value)
				{
				if(windowWidth <= value)
					result.slidesCount.value = result.slidesBreakpoints[value];
				});
		/* ---------------------------- */
		/* ---------- result ---------- */
		/* ---------------------------- */
		return result;
		};
	/* =========================================== */
	/* ============= prepare slider ============== */
	/* =========================================== */
	$.fn.buildAvSlider = function()
		{
		return this.each(function()
			{
			var
				$slider         = $(this).filter(".av-slider"),
				$slidesBlock    = $slider.find(".av-slider-slides-block"),
			    $slides         = $slider.find(".av-slider-slide"),
				randomString    = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);

			$slidesBlock.css
				({
				"display"   : "flex",
				"overflow"  : "hidden"
				});
			if($slider.getAvSliderParams().direction.value == "vertical")
				$slidesBlock.css("flex-direction", "column");

			$slides
				.each(function()
					{
					$(this).attr("data-slide-id", $(this).index() + 1);
					});
			$slidesBlock
				.attr("data-slides-display-type", $slides.css("display"));
			$slider
				.attr("data-slider-id", randomString)
				.setAvSliderSlidesCount();
			});
		};
	/* =========================================== */
	/* ============= set slides count ============ */
	/* =========================================== */
	$.fn.setAvSliderSlidesCount = function(value)
		{
		var valueSeted = parseInt(value);

		return this.each(function()
			{
			var
				$slider             = $(this).filter(".av-slider"),
				$slidesBlock        = $slider.find(".av-slider-slides-block"),
				$slides             = $slider.find(".av-slider-slide"),
				$slideFirstActive   = $slides.filter(".slide-active").length ? $slides.filter(".slide-active").first() : $slides.first(),
				slideDisplayType    = $slidesBlock.attr("data-slides-display-type"),
				sliderParams        = $slider.getAvSliderParams(),
				slidesCount         = valueSeted ? valueSeted : sliderParams.slidesCount.value,
				slideWidth          = 0,
				slideHeight         = 0,
				slideWidthArray     = [],
				slideHeightArray    = [],
				slidesActiveNew     = [];
			if($slider.attr("data-in-process") == "Y" || !$slider.is(":visible")) return;
			/* ---------------------------- */
			/* ---------- start ----------- */
			/* ---------------------------- */
			$slides
				.css
					({
					"display": slideDisplayType,
					"width"  : "",
					"height" : ""
					})
				.each(function()
					{
					slideWidthArray .push($(this).width());
					slideHeightArray.push($(this).height());
					});
			/* ---------------------------- */
			/* ----- slide size calc ------ */
			/* ---------------------------- */
			if(sliderParams.direction.value == "horizontal")
				{
				slideWidth  = ($slidesBlock.width()  - (parseFloat($slideFirstActive.css("margin-left")) + parseFloat($slideFirstActive.css("margin-right")))  * slidesCount) / slidesCount;
				slideHeight = Math.max.apply(Math, slideHeightArray);
				}
			else
				{
				slideHeight = ($slidesBlock.height() - (parseFloat($slideFirstActive.css("margin-top"))  + parseFloat($slideFirstActive.css("margin-bottom"))) * slidesCount) / slidesCount;
				slideWidth  = Math.max.apply(Math, slideWidthArray);
				}
			/* ---------------------------- */
			/* -- new active slides calc -- */
			/* ---------------------------- */
			var $currentSlide = $slideFirstActive;

			while(slidesActiveNew.length < slidesCount && $currentSlide.length)
				{
				slidesActiveNew.push($currentSlide.attr("data-slide-id"));
				$currentSlide = $currentSlide.next();
				if(!$currentSlide.length) $currentSlide = $slideFirstActive.prev();
				}
			/* ---------------------------- */
			/* ----------- end ------------ */
			/* ---------------------------- */
			$slides
				.css
					({
					"width" : slideWidth,
					"height": slideHeight
					})
				.addClass("slide-active")
				.each(function()
					{
					if($.inArray($(this).attr("data-slide-id"), slidesActiveNew) == -1)
						$(this)
							.hide()
							.removeClass("slide-active");
					});
			$slider
				.controlAvSliderNavigationItemActivity();
			});
		};
	/* =========================================== */
	/* ==== control navigation item activity ===== */
	/* =========================================== */
	$.fn.controlAvSliderNavigationItemActivity = function()
		{
		return this.each(function()
			{
			var
				$slider             = $(this).filter(".av-slider"),
				$slides             = $slider.find(".av-slider-slide"),
				$slidesActive       = $slides.filter(".slide-active"),
				sliderParams        = $slider.getAvSliderParams(),
			    lastSlideReached    = !sliderParams.cyclicity.value && $slidesActive.last() .next().length <= 0,
			    firstSlideReached   = !sliderParams.cyclicity.value && $slidesActive.first().prev().length <= 0,
			    notEnoughSlides     = $slides.length < sliderParams.slidesCount.value;
			if(!$slider.length) return;

			$slider.find(".av-slider-navigation-item-forward")
				.css ("visibility", lastSlideReached  || notEnoughSlides ? "hidden" : "visible");
			$slider.find(".av-slider-navigation-item-back")
				.css ("visibility", firstSlideReached || notEnoughSlides ? "hidden" : "visible");
			$slider
				.attr("data-last-slide-reached",  lastSlideReached  || notEnoughSlides ? "Y" : "N")
				.attr("data-first-slide-reached", firstSlideReached || notEnoughSlides ? "Y" : "N");
			});
		};
	/* =========================================== */
	/* ================== slide ================== */
	/* =========================================== */
	$.fn.slideAvSlider = function(direction, animation, count, autoplay)
		{
		var
			slideDirection  = $.inArray(direction, ["back", "forward"]) == -1 ? "forward" : direction,
			slidesCount     = parseInt(count),
			caledByAutoplay = autoplay === true;

		return this.each(function()
			{
			var
				$slider                 = $(this).filter(".av-slider"),
				$slidesBlock            = $slider.find(".av-slider-slides-block"),
				$slides                 = $slider.find(".av-slider-slide"),
				$slidesActive           = $slides.filter(".slide-active"),
				slideDisplayType        = $slidesBlock.attr("data-slides-display-type"),
				sliderParams            = $slider.getAvSliderParams(),
				slidesPerIteration      = slidesCount ? slidesCount : sliderParams.slidesPerIteration.value,
				slideAnimationType      = $.inArray(animation, sliderParams.slideAnimation.values) == -1
					? sliderParams.slideAnimation.value
					: animation,
				slideSize               = sliderParams.direction.value == "horizontal"
					? parseFloat($slidesBlock.width())  / sliderParams.slidesCount.value
					: parseFloat($slidesBlock.height()) / sliderParams.slidesCount.value,
				newActiveSlidesArray    = [],
				triggerNameStart        = "",
				triggerNameEnd          = "";
			/* ---------------------------- */
			/* ------ breaking action ----- */
			/* ---------------------------- */
			if(!$slider.length || !$slides.length || $slider.attr("data-in-process") == "Y")
				return;
			if(!sliderParams.cyclicity.value && $slides.length < sliderParams.slidesCount.value)
				return;
			if(slideDirection == "forward" && $slider.attr("data-last-slide-reached") == "Y")
				{
				$slider.trigger("last-slide-reached");
				return;
				}
			if(slideDirection == "back" && $slider.attr("data-first-slide-reached") == "Y")
				{
				$slider.trigger("first-slide-reached");
				return;
				}
			/* ---------------------------- */
			/* -------- action name ------- */
			/* ---------------------------- */
			if(slideDirection == "forward" && !caledByAutoplay)
				{
				triggerNameStart   = "sliding-forward-start";
				triggerNameEnd     = "sliding-forward-end";
				}
			else if(slideDirection == "forward" &&  caledByAutoplay)
				{
				triggerNameStart   = "sliding-forward-autoplay-start";
				triggerNameEnd     = "sliding-forward-autoplay-end";
				}
			else if(slideDirection == "back"    && !caledByAutoplay)
				{
				triggerNameStart   = "sliding-back-start";
				triggerNameEnd     = "sliding-back-end";
				}
			else if(slideDirection == "back"    &&  caledByAutoplay)
				{
				triggerNameStart   = "sliding-back-autoplay-start";
				triggerNameEnd     = "sliding-back-autoplay-end";
				}
			/* ---------------------------- */
			/* ------ cyclicity case ------ */
			/* ---------------------------- */
			if(sliderParams.cyclicity.value)
				{
				var $currentSlide = slideDirection == "forward" ? $slides.first() : $slides.last();

				for(var $i = 1;$i <= slidesPerIteration;$i++)
					{
					var $newSlide = $currentSlide.clone();

					$newSlide.hide().removeClass("slide-active");
					if(slideDirection == "forward") $newSlide.appendTo($slidesBlock);
					else                            $newSlide.prependTo($slidesBlock);

					$currentSlide.addClass("av-slider-slide-temp");
					$currentSlide = slideDirection == "forward" ? $currentSlide.next() : $currentSlide.prev();
					}

				$slides = $slider.find(".av-slider-slide");
				}
			/* ---------------------------- */
			/* -- new active slides calc -- */
			/* ---------------------------- */
			var
				newActiveSlideFirstIndex = slideDirection == "forward"
					? $slidesActive.first().index() + slidesPerIteration
					: $slidesActive.last() .index() - slidesPerIteration - sliderParams.slidesCount.value + 1,
				newActiveSlideLastIndex  = slideDirection == "forward"
					? $slidesActive.first().index() + slidesPerIteration + sliderParams.slidesCount.value
					: $slidesActive.last() .index() - slidesPerIteration + 1;

			if(newActiveSlideFirstIndex < 0)
				{
				newActiveSlideFirstIndex = 0;
				newActiveSlideLastIndex  = sliderParams.slidesCount.value;
				slidesPerIteration       = $slidesActive.first().index();
				}
			if(newActiveSlideLastIndex > $slides.last().index())
				{
				newActiveSlideFirstIndex = $slides.last().index() - sliderParams.slidesCount.value + 1;
				newActiveSlideLastIndex  = $slides.last().index() + 1;
				slidesPerIteration       = $slides.last().index() - $slidesActive.last().index();
				}

			$slides
				.slice(newActiveSlideFirstIndex, newActiveSlideLastIndex)
				.each(function()
					{
					newActiveSlidesArray.push($(this).attr("data-slide-id"));
					});
			/* ---------------------------- */
			/* ----------- start ---------- */
			/* ---------------------------- */
			$slider
				.attr("data-in-process", "Y")
				.trigger(triggerNameStart);
			$slidesBlock
				.css
					({
					"position": "relative",
					"width"   : $slidesBlock.width(),
					"height"  : $slidesBlock.height()
					});
			/* ---------------------------- */
			/* ------ animation slide ----- */
			/* ---------------------------- */
			if(slideAnimationType == "slide")
				$slides.each(function()
					{
					var
						cssParamType    = sliderParams.direction.value == "horizontal" ? "left" : "top",
						valueStart      = slideSize * ($(this).index() - $slidesActive.first().index()),
						valueEnd        = valueStart,
						startCss        =
							{
							"display" : slideDisplayType,
							"position": "absolute"
							},
						animateCss      = {};

					for($i = 1;$i <= slidesPerIteration;$i++)
						{
						if(slideDirection == "forward") valueEnd -= slideSize;
						else                            valueEnd += slideSize;
						}

					startCss  [cssParamType] = valueStart+"px";
					animateCss[cssParamType] = valueEnd  +"px";

					$(this)
						.css(startCss)
						.animate(animateCss, 600);
					});
			/* ---------------------------- */
			/* ------ animation fade ------ */
			/* ---------------------------- */
			if(slideAnimationType == "fade")
				{
				var $slidesToShow = $();

				newActiveSlidesArray.forEach(function(slideId, index)
					{
					var
						$newSlide       = $slides.filter("[data-slide-id=\""+slideId+"\"]").clone(),
						cssParamType    = sliderParams.direction.value == "horizontal" ? "left" : "top",
						cssParams       =
							{
							"display" : slideDisplayType,
							"opacity" : 0,
							"position": "absolute"
							};
					cssParams[cssParamType] = slideSize * index;

					$newSlide
						.css(cssParams)
						.addClass("av-slider-slide-temp")
						.appendTo($slidesBlock);
					$slidesToShow = $slidesToShow.add($newSlide);
					});

				$slides = $slider.find(".av-slider-slide");
				$slidesActive.animate({"opacity": 0}, 600);
				$slidesToShow.animate({"opacity": 1}, 600);
				}
			/* ---------------------------- */
			/* ----------- end ------------ */
			/* ---------------------------- */
			setTimeout(function()
				{
				$slides.filter(".av-slider-slide-temp")
					.remove();
				$slides
					.removeClass("slide-active")
					.css
						({
						"display" : "none",
						"opacity" : "",
						"position": "",
						"top"     : "",
						"left"    : ""
						})
					.each(function()
						{
						if($.inArray($(this).attr("data-slide-id"), newActiveSlidesArray) != -1)
							$(this)
								.css("display", slideDisplayType)
								.addClass("slide-active");
						});
				$slidesBlock
					.css
						({
						"position": "",
						"width"   : "",
						"height"  : ""
						});
				$slider
					.controlAvSliderNavigationItemActivity()
					.removeAttr("data-in-process")
					.trigger(triggerNameEnd);
				}, 700);
			});
		};
	/* =========================================== */
	/* ============== jump to slide ============== */
	/* =========================================== */
	$.fn.jumpToSlideAvSlider = function($slide, animation)
		{
		var $slideNeed = $slide instanceof jQuery ? $slide.filter(".av-slider-slide") : $();
		if(!$slideNeed.length) return this;

		return this.each(function()
			{
			var
				$slider                 = $(this).filter(".av-slider"),
				slideActiveFirstIndex   = $slider.find(".av-slider-slide").filter(".slide-active").first().index(),
				slideNeedIndex          = $slideNeed.index(),
				slideDirection          = slideActiveFirstIndex < slideNeedIndex ? "forward" : "back",
				slidesCount             = Math.abs(slideActiveFirstIndex - slideNeedIndex);

			if(slideActiveFirstIndex !== slideNeedIndex)
				$slider.slideAvSlider(slideDirection, animation, slidesCount);
			});
		};
	/* =========================================== */
	/* ================ autoslide ================ */
	/* =========================================== */
	$.fn.slideAutoAvSlider = function(direction, delay)
		{
		var
			slideDirection  = $.inArray(direction, ["back", "forward"]) == -1 ? "forward" : direction,
		    autoSlideDelay  = parseInt(delay);

		if(!autoSlideDelay || autoSlideDelay < 100) autoSlideDelay = 100;
		if(!window.avSlideresInterval) avSlideresInterval = {};

		return this.each(function()
			{
			var
				$slider  = $(this).filter(".av-slider"),
			    sliderId = $slider.attr("data-slider-id");
			if(!$slider.length || $slider.attr("data-autoslide-enable") == "Y" || !sliderId) return;

			$slider.attr("data-autoslide-enable", "Y");
			avSlideresInterval[sliderId] = setInterval(function()
				{
				$slider
					.slideAvSlider(slideDirection, "", 0, true)
					.on("first-slide-reached last-slide-reached", function()
						{
						$(this).stopSlideAutoAvSlider();
						});
				}, autoSlideDelay);
			});
		};
	/* =========================================== */
	/* ============= autoslide stop ============== */
	/* =========================================== */
	$.fn.stopSlideAutoAvSlider = function()
		{
		return this.each(function()
			{
			var $slider = $(this).filter(".av-slider");

			$slider.removeAttr("data-autoslide-enable");
			if(window.avSlideresInterval)
				clearInterval(avSlideresInterval[$slider.attr("data-slider-id")]);
			});
		};
	/* =========================================== */
	/* ================ get slide ================ */
	/* =========================================== */
	$.fn.getAvSliderSlide = function(value)
		{
		var
			$slider         = $(this).filter(".av-slider"),
			$slides         = $slider.find(".av-slider-slide"),
			showFirst       = value == "first",
		    showFirstActive = value == "first-active",
			showLast        = value == "last",
			showLastActive  = value == "first-active",
		    slideIndex      = parseInt(value),
			$result         = $();

		if(!slideIndex) slideIndex = 1;

		     if(showFirst)       $result = $slides.first();
		else if(showFirstActive) $result = $slides.filter(".slide-active").first();
		else if(showLast)        $result = $slides.last();
		else if(showLastActive)  $result = $slides.filter(".slide-active").last();
		else                     $result = $slides.filter("[data-slide-id=\""+slideIndex+"\"]");

		return $result;
		};
	})($);
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(window).resize(function()
		{
		$(".av-slider").setAvSliderSlidesCount();
		});
	});