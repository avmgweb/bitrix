/* -------------------------------------------------------------------- */
/* ------------------------ preloader function ------------------------ */
/* -------------------------------------------------------------------- */
function AvWaitingScreen(value)
	{
	var $body = $('body');
	     if(value == 'on')  $body.setAvWaitingScreenOn("fixed");
	else if(value == 'off') $body.setAvWaitingScreenOff();
	}
/* -------------------------------------------------------------------- */
/* ----------------------- blur screen function ----------------------- */
/* -------------------------------------------------------------------- */
function AvBlurScreen(value, zIndex)
	{
	var $blurScreen = $('#av-blur-screen');

	if(value == 'on' && !$blurScreen.length)
		setTimeout(function()
			{
			$('<div id="av-blur-screen"></div>')
				.css("z-index", zIndex ? zIndex : '100')
				.appendTo('body')
				.fadeTo(500, 0.7);
			}, 50);
	else if(value == 'off')
		$blurScreen.fadeTo(500, 0, function() {$blurScreen.remove()});
	}
/* -------------------------------------------------------------------- */
/* ----------------------- alert popup function ----------------------- */
/* -------------------------------------------------------------------- */
function CreateAvAlertPopup(alertText, type, options)
	{
	return $
		(
		'<div class="av-alert-popup" type="'+(type ? type : 'simple')+'">'+
			'<div class="content">'+
				'<div class="image"></div>'+
				'<div class="text">'+alertText+'</div>'+
			'</div>'+
			'<div class="close-form-button"></div>'+
		'</div>'
		)
		.appendTo('body')
		.on("vclick", '.close-form-button', function() {$(this).getAvAlertPopup().remove()});
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
	/* ------------ preloader behavior ----------- */
	/* ------------------------------------------- */
	jQuery.fn.setAvWaitingScreenOn = function(type)
		{
		var $obj = this;

		$obj.css
	        ({
	        "position"   : 'relative',
	        "min-height" : '100px',
	        "min-width"  : '100px'
	        });
		setTimeout(function()
			{
			$('<div id="av-waiting-screen" class="'+(type == 'fixed' ? 'fixed' : 'simple')+'"><div></div></div>').appendTo($obj);
			}, 10);
		};
	jQuery.fn.setAvWaitingScreenOff = function()
		{
		this.find('#av-waiting-screen').remove();
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
			currentZIndex = this.css("z-index"),
			screenWidth   = $(window).width(),
			screenHeight  = $(window).height(),
			scrollTop     = $(window).scrollTop(),
			scrollLeft    = $(window).scrollLeft(),
			formWidth     = this.css("position", 'absolute').outerWidth(),
			formHeight    = this                            .outerHeight(),
			formOffset    = this.offset(),
		    paramsArray   =
				{
				"z-index": currentZIndex && currentZIndex > 1 ? currentZIndex  : parseInt(zIndex ? zIndex : 100),
				"top"    : formHeight     > screenHeight      ? scrollTop + 50 : scrollTop  + (screenHeight - formHeight) / 2,
				"left"   : screenWidth   <= formWidth + 5     ? 0              : scrollLeft + (screenWidth  - formWidth)  / 2,
				"right"  : screenWidth   <= formWidth + 5     ? 0              : ''
				};
		if(!formOffset) return this;

		if(smooth == 'Y')
			{
			     if(formOffset.top < scrollTop && formOffset.top + formHeight > scrollTop + screenHeight) paramsArray.top = 'auto';
			else if(formOffset.top + formHeight < scrollTop + screenHeight && formHeight > screenHeight)  paramsArray.top = scrollTop + screenHeight - 50 - formHeight;
			this.width(this.width());
			return this.animate(paramsArray, 300);
			}
		else
			return this.css(paramsArray);
		};
	/* ------------------------------------------- */
	/* --------- object hide on clickout --------- */
	/* ------------------------------------------- */
	jQuery.fn.hideOnClickout = function(functionType, callback)
		{
		var
			behaviorType   = functionType == 'remove' ? 'remove' : 'hide',
			$currentObject = this,
			$popUpHider    =
				$('<div class="av-alert-popup-hider"></div>')
					.css
						({
						"position": 'fixed',
						"top"     : '0',
						"bottom"  : '0',
						"left"    : '0',
						"right"   : '0',
						"z-index" : (parseInt($(this).css("z-index")) - 1)
						})
					.appendTo('body');

		setTimeout(function()
			{
			$popUpHider.on("vclick", function()
				{
				if(behaviorType == 'hide') $currentObject.hide();
				else                       $currentObject.remove();
				if(callback && typeof callback == 'function') callback();
				});
			$currentObject.on(behaviorType, function()
				{
				$popUpHider.remove();
				});
			}, 300);

		return $currentObject;
		};
	/* ------------------------------------------- */
	/* --------------- flood image --------------- */
	/* ------------------------------------------- */
	jQuery.fn.floodImage = function()
        {
		return this.each(function()
            {
			var
				$img       = $(this).find('img'),
				$imgParent = $img.parent();

			$imgParent.css
				({
				"align-items"    : 'center',
				"display"        : 'flex',
				"justify-content": 'center',
				"overflow"       : 'hidden'
				});

			if($imgParent.width()/$imgParent.height() >= $img.width()/$img.height()) $img.css({width: '100%', height: 'auto'});
			else                                                                     $img.css({width: 'auto', height: '100%'});
            });
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