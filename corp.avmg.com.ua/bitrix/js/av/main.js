/* -------------------------------------------------------------------- */
/* ------------------------ preloader function ------------------------ */
/* -------------------------------------------------------------------- */
function AvWaitingScreen(value)
	{
	var
		waitingScreenId = 'av-waiting-screen',
	    $waitingScreen  = $('#'+waitingScreenId);

	if(value == 'on' && !$waitingScreen.length)
		setTimeout(function()
			{
			$('<div></div>')
				.attr("id", waitingScreenId)
				.append('<div></div>')
				.appendTo('body');
			}, 50);
	else if(value == 'off' && $waitingScreen.length)
		$waitingScreen.remove();
	}
/* -------------------------------------------------------------------- */
/* ----------------------- blur screen function ----------------------- */
/* -------------------------------------------------------------------- */
function AvBlurScreen(value, zIndex)
	{
	var
		blurScreenZIndex = parseInt(zIndex) ? parseInt(zIndex) : 100,
		fadeSpeed        = 500,
		blurScreenId     = 'av-blur-screen',
		$blurScreen      = $('#'+blurScreenId);

	if(value == 'on' && !$blurScreen.length)
		setTimeout(function()
			{
			$('<div></div>')
				.attr("id", blurScreenId)
				.css("z-index", blurScreenZIndex)
				.appendTo('body')
				.fadeTo(fadeSpeed, 0.7);
			}, 50);
	else if(value == 'off' && $blurScreen.length)
		$blurScreen.fadeTo(fadeSpeed, 0, function()
			{
			$blurScreen.remove();
			});
	}
/* -------------------------------------------------------------------- */
/* ----------------------- alert popup function ----------------------- */
/* -------------------------------------------------------------------- */
function CreateAvAlertPopup(alertText, type)
	{
	var
		$popUp       = $('<div></div>').addClass("av-alert-popup"),
		$content     = $('<div></div>').addClass("content"),
		$closeButton = $('<div></div>').addClass("close-form-button"),
		$image       = $('<div></div>').addClass("image"),
		$text        = $('<div></div>').addClass("text");

	$popUp
		.addClass(type ? type : "simple")
		.append($content)
		.append($closeButton)
		.appendTo('body');
	$content
		.append($image)
		.append($text);
	$text
		.html(alertText);
	$closeButton
		.click(function()
			{
			$popUp.remove();
			});

	return $popUp;
	}
/* ------------------------------------------------------------------- */
/* ----------------------------- methods ----------------------------- */
/* ------------------------------------------------------------------- */
(function($)
	{
	/* ------------------------------------------- */
	/* ----------------- events ------------------ */
	/* ------------------------------------------- */
	$.each(["hide", "show", "remove"], function(key, value)
        {
		var orig = $.fn[value];
		$.fn[value] = function()
			{
			$(this).trigger(new $.Event(value));
			return orig.apply(this, arguments);
			};
        });
	/* ------------------------------------------- */
	/* ---------- object is clicked Y/N ---------- */
	/* ------------------------------------------- */
	jQuery.fn.isClicked = function()
		{
		var $objectDate = this.data();
		return !!($objectDate && $objectDate.clicked);
		};
	/* ------------------------------------------- */
	/* ---------------- get popup ---------------- */
	/* ------------------------------------------- */
	jQuery.fn.getAvAlertPopup = function()
		{
		return this.closest('.av-alert-popup');
		};
	/* ------------------------------------------- */
	/* --------- object position center ---------- */
	/* ------------------------------------------- */
	jQuery.fn.positionCenter = function(zIndex, centering, smooth)
		{
		var $currentObject = this;

		$currentObject.objectCentering(zIndex);

		if(centering == 'Y')
			$(window).on("scroll resize", function()
				{
				if(smooth == 'Y')
					{
					clearTimeout($.data(this, 'scrollTimer'));
					$.data(this, 'scrollTimer', setTimeout(function()
						{
						$currentObject.objectCentering(zIndex, smooth);
						}, 250));
					}
				else
					$currentObject.objectCentering(zIndex);
				});

		return this;
		};
	jQuery.fn.objectCentering = function(zIndex, smooth)
		{
		var
			currentZIndex = parseInt(this.css("z-index")) ? parseInt(this.css("z-index")) : 0,
			needZIndex    = parseInt(zIndex)              ? parseInt(zIndex)              : 0,
			screenWidth   = $(window).width(),
			screenHeight  = $(window).height(),
			scrollTop     = $(window).scrollTop(),
			scrollLeft    = $(window).scrollLeft(),
			formWidth     = this.css("position", 'absolute').outerWidth(),
			formHeight    = this                            .outerHeight(),
			formOffset    = this.offset(),
		    paramsArray   =
				{
				"z-index": currentZIndex > 1             ? currentZIndex  : needZIndex,
				"top"    : formHeight    > screenHeight  ? scrollTop + 50 : scrollTop  + (screenHeight - formHeight) / 2,
				"left"   : screenWidth  <= formWidth + 5 ? 0              : scrollLeft + (screenWidth  - formWidth)  / 2,
				"right"  : screenWidth  <= formWidth + 5 ? 0              : ''
				};
		if(!formOffset) return this;

		if(smooth == 'Y')
			{
			     if(formOffset.top < scrollTop && formOffset.top + formHeight > scrollTop + screenHeight) paramsArray.top = 'auto';
			else if(formOffset.top + formHeight < scrollTop + screenHeight && formHeight > screenHeight)  paramsArray.top = scrollTop + screenHeight - 50 - formHeight;
			return this.animate(paramsArray, 300);
			}
		else
			return this.css(paramsArray);
		};
	/* ------------------------------------------- */
	/* --------------- on clickout --------------- */
	/* ------------------------------------------- */
	jQuery.fn.onClickout = function(callback)
		{
		if(!callback || typeof callback != 'function') return this;
		var
			$object     = this,
			zIndex      = parseInt($(this).css("z-index")) ? parseInt($(this).css("z-index")) : 0,
			$popUpHider =
				$('<div class="av-alert-popup-hider"></div>')
					.css
						({
						"position": 'fixed',
						"top"     : '0',
						"bottom"  : '0',
						"left"    : '0',
						"right"   : '0'
						})
					.appendTo('body');

		if(zIndex < 10)
			{
			zIndex = 10;
			this.css("z-index", 10);
			}
		$popUpHider.css("z-index", zIndex - 1);

		setTimeout(function()
			{
			$popUpHider.on("vclick", function()
				{
				$popUpHider.remove();
				callback.call($object);
				});
			$object.on("remove hide", function()
				{
				$popUpHider.remove();
				});
			}, 300);

		return this;
		};
	/* ------------------------------------------- */
	/* --------------- flood image --------------- */
	/* ------------------------------------------- */
	jQuery.fn.floodImage = function()
        {
		return this.each(function()
            {
			var
				$img           = $(this).find("img"),
			    getNaturalSize = function()
					{
					$img
						.attr("data-natural-width",  $img.prop("naturalWidth"))
						.attr("data-natural-height", $img.prop("naturalHeight"))
						.floodImageSetSize();
					};
			if(!$img.length) return;

			if(!$img.attr("data-natural-width") || !$img.attr("data-natural-height"))
				{
				if(window.loaded)
					getNaturalSize();
				else
					$(window).load(function()
						{
						getNaturalSize();
						window.loaded = true;
						});
				}

            $img.floodImageSetSize();
            });
        };
	jQuery.fn.floodImageSetSize = function()
		{
		var
			$img       = this.filter("img"),
			$imgParent = $img.parent(),
			imgWidth   = $img.attr("data-natural-width"),
			imgHeight  = $img.attr("data-natural-height");
		if(!$img.length || !imgWidth || !imgHeight) return;

		$imgParent
			.css("overflow", "hidden")
			.removeAttr("data-image-flooded-by-width")
			.removeAttr("data-image-flooded-by-height");

		if(imgWidth * $imgParent.height() > $imgParent.width() * imgHeight)
			{
			$imgParent
				.css
					({
					"align-items"    : "",
					"display"        : "",
					"justify-content": ""
					})
				.attr("data-image-flooded-by-height", true);
			$img.css
			    ({
			    "margin-left": "50%",
			    "transform"  : "translateX(-50%)",
			    "width"      : "auto",
			    "height"     : "100%"
			    });
			}
		else
			{
			$imgParent
				.css
					({
					"align-items"    : "center",
					"display"        : "flex",
					"justify-content": "center"
					})
				.attr("data-image-flooded-by-width", true);
			$img.css
				({
				"margin-left": "",
				"transform"  : "",
				"width"      : "100%",
				"height"     : "auto"
				});
			}
		};
	/* ------------------------------------------- */
	/* ----------- form submit control ----------- */
	/* ------------------------------------------- */
	jQuery.fn.controlFormSubmit = function(value)
		{
		return this.each(function()
			{
			var $form = $(this).is('form') ? $(this) : $(this).closest('form');

			     if(value == 'off') $form.addClass("form-submit-cancel");
			else if(value == 'on')  $form.removeClass("form-submit-cancel");
			});
		};
	jQuery.fn.submitForm = function()
		{
		var
			$form         = this.is('form') ? this : this.closest('form'),
			$submitButton = $form.find('input[type="submit"]');

		this.controlFormSubmit("on");
		if($submitButton.length) $submitButton.click();
		else                     $form.submit();
		};
	})(jQuery);
/* ------------------------------------------------------------------- */
/* ---------------------------- handlers ----------------------------- */
/* ------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("keyup", "[tabindex]:not(a, input, button)", function(event)
			{
			if(event.keyCode == 13) $(this).click();
			})
		.onFirst("vclick", function(event)
			{
			var $object = $(event.target);
			$('*')           .each(function() {$(this).data("clicked", false)});
			$object.parents().each(function() {$(this).data("clicked", true)});
			$object.data("clicked", true);
			})
		.onFirst("submit", 'form.form-submit-cancel', function(event)
			{
			event.preventDefault();
			event.stopImmediatePropagation();
			})
	});