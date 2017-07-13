/* -------------------------------------------------------------------- */
/* ------------------------ preloader function ------------------------ */
/* -------------------------------------------------------------------- */
function AvWaitingScreen(value)
	{
	if(value != 'on' && value != 'off') return;
	$('#av-waiting-screen').remove();

	if(value == 'on')
		setTimeout(function()
			{
			$('<div id="av-waiting-screen"><div></div></div>').appendTo('body');
			}, 10);
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
	var
		$popUpHider = $('<div class="av-alert-popup-hider"></div>'),
		$popUp      = $
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
			.on("vclick", '.close-form-button', function() {$(this).getAvAlertPopup().remove()})
			.on("remove",                       function() {$popUpHider.remove()}),
		popUpOptions =
			{
			"hide_on_clickout": 'N',
			"centering"       : 'N',
			"z_index"         : 1000
			};

	$.extend(popUpOptions, options);
	popUpOptions.z_index = parseInt(popUpOptions.z_index);

	if(popUpOptions.centering == 'Y')
		{
		$popUp.positionCenter(popUpOptions.z_index);
		$(window)
			.scroll(function() {$popUp.positionCenter()})
			.resize(function() {$popUp.positionCenter()});
		}

	if(popUpOptions.hide_on_clickout == 'Y')
		{
		$popUpHider
			.css
				({
				"position": 'fixed',
				"top"     : '0',
				"bottom"  : '0',
				"left"    : '0',
				"right"   : '0',
				"z-index" : (popUpOptions.z_index - 1)
				})
			.appendTo('body');
		setTimeout(function()
			{
			$popUpHider.on("vclick", function() {$popUp.remove()});
			}, 300);
		}

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
	jQuery.fn.positionCenter = function(zIndex)
		{
		var
			currentZIndex = this.css("z-index"),
			setedZIndex   = parseInt(zIndex ? zIndex : 100),
			screenWidth   = $(window).width(),
			screenHeight  = $(window).height(),
			scrollTop     = $(window).scrollTop(),
			scrollLeft    = $(window).scrollLeft(),
			formWidth     = this.css("position", 'absolute').outerWidth(),
			formHeight    = this                            .outerHeight();

		return this.css
			({
			"z-index": currentZIndex && currentZIndex > 1 ? currentZIndex  : setedZIndex,
			"top"    : formHeight    >  screenHeight      ? scrollTop + 50 : scrollTop  + (screenHeight - formHeight) / 2,
			"left"   : screenWidth   <= formWidth + 5     ? 0              : scrollLeft + (screenWidth  - formWidth)  / 2,
			"right"  : screenWidth   <= formWidth + 5     ? 0              : ''
			});
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