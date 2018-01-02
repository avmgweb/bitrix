/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNamePasswordAvStyled     = function()      {return this.find(":password").attr("name")};
	jQuery.fn.setFormElememtNamePasswordAvStyled     = function(value) {this.find(":password").attr("name", value)};
	jQuery.fn.getFormElememtValuePasswordAvStyled    = function()      {return this.find(":password").val()};
	jQuery.fn.setFormElememtValuePasswordAvStyled    = function(value)
		{
		this.find(":password").attr("value", value).val(value);

		if(value)
			this
				.removeClass("placeholder-on")
				.addClass("placeholder-off");
		else
			this
				.removeClass("placeholder-off")
				.addClass("placeholder-on");
		};
	jQuery.fn.getFormElememtRequiredPasswordAvStyled = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredPasswordAvStyled = function(value)
		{
		     if(value == "on")  this.addClass("required");
		else if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertPasswordAvStyled    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertPasswordAvStyled    = function(value)
		{
		     if(value == "on")  this.addClass("alert-input");
		else if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-styled", "password", "getFormElememtName",     "getFormElememtNamePasswordAvStyled");
SetFormElementsFunction("av-styled", "password", "setFormElememtName",     "setFormElememtNamePasswordAvStyled");
SetFormElementsFunction("av-styled", "password", "getFormElememtValue",    "getFormElememtValuePasswordAvStyled");
SetFormElementsFunction("av-styled", "password", "setFormElememtValue",    "setFormElememtValuePasswordAvStyled");
SetFormElementsFunction("av-styled", "password", "getFormElememtRequired", "getFormElememtRequiredPasswordAvStyled");
SetFormElementsFunction("av-styled", "password", "setFormElememtRequired", "setFormElememtRequiredPasswordAvStyled");
SetFormElementsFunction("av-styled", "password", "getFormElememtAlert",    "getFormElememtAlertPasswordAvStyled");
SetFormElementsFunction("av-styled", "password", "setFormElememtAlert",    "setFormElememtAlertPasswordAvStyled");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", ".av-form-styled-password label", function()
			{
			var $inputBlock = $(this).parent();
			setTimeout(function()
				{
				$inputBlock.find(":password").focus();
				}, 50);
			})
		.on("focus", ".av-form-styled-password :password", function()
			{
			$(this).parent()
				.removeClass("placeholder-on")
				.addClass("placeholder-off");
			})
		.on("focusout", ".av-form-styled-password :password", function()
			{
			if(!$(this).val())
				$(this).parent()
					.removeClass("placeholder-off")
					.addClass("placeholder-on");
			});
	});