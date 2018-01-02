/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNamePhoneAvStyled     = function()      {return this.find(":text").attr("name")};
	jQuery.fn.setFormElememtNamePhoneAvStyled     = function(value) {this.find(":text").attr("name", value)};
	jQuery.fn.getFormElememtValuePhoneAvStyled    = function()      {return this.find(":text").val()};
	jQuery.fn.setFormElememtValuePhoneAvStyled    = function(value)
		{
		this.find(":text").attr("value", value).val(value);

		if(value)
			this
				.removeClass("placeholder-on")
				.addClass("placeholder-off");
		else
			this
				.removeClass("placeholder-off")
				.addClass("placeholder-on");
		};
	jQuery.fn.getFormElememtRequiredPhoneAvStyled = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredPhoneAvStyled = function(value)
		{
		     if(value == "on")  this.addClass("required");
		else if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertPhoneAvStyled    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertPhoneAvStyled    = function(value)
		{
		     if(value == "on")  this.addClass("alert-input");
		else if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-styled", "phone", "getFormElememtName",     "getFormElememtNamePhoneAvStyled");
SetFormElementsFunction("av-styled", "phone", "setFormElememtName",     "setFormElememtNamePhoneAvStyled");
SetFormElementsFunction("av-styled", "phone", "getFormElememtValue",    "getFormElememtValuePhoneAvStyled");
SetFormElementsFunction("av-styled", "phone", "setFormElememtValue",    "setFormElememtValuePhoneAvStyled");
SetFormElementsFunction("av-styled", "phone", "getFormElememtRequired", "getFormElememtRequiredPhoneAvStyled");
SetFormElementsFunction("av-styled", "phone", "setFormElememtRequired", "setFormElememtRequiredPhoneAvStyled");
SetFormElementsFunction("av-styled", "phone", "getFormElememtAlert",    "getFormElememtAlertPhoneAvStyled");
SetFormElementsFunction("av-styled", "phone", "setFormElememtAlert",    "setFormElememtAlertPhoneAvStyled");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", ".av-form-styled-phone label", function()
			{
			var $inputBlock = $(this).parent();
			setTimeout(function()
				{
				$inputBlock.find(":text").focus();
				}, 50);
			})
		.on("focus", ".av-form-styled-phone :text", function()
			{
			$(this).parent()
				.removeClass("placeholder-on")
				.addClass("placeholder-off");
			})
		.on("focusout", ".av-form-styled-phone :text", function()
			{
			var value = $(this).val();
			if(!value || value.indexOf("_") != -1)
				$(this).parent()
					.removeClass("placeholder-off")
					.addClass("placeholder-on");
			})
		.on("focus", ".av-form-styled-phone:not(.masked) :text", function()
			{
			$(this)
				.mask("+380(99) 999-99-99")
				.parent().addClass("masked");
			});
	});