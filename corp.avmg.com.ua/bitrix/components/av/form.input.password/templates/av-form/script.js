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
		if(!this.hasClass("has-placeholder")) return;

		if(value) this.removeClass("on");
		else      this.addClass("on");
		};
	jQuery.fn.getFormElememtRequiredPasswordAvStyled = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredPasswordAvStyled = function(value)
		{
		if(value == "on")  this.addClass("required");
		if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertPasswordAvStyled    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertPasswordAvStyled    = function(value)
		{
		if(value == "on")  this.addClass("alert-input");
		if(value == "off") this.removeClass("alert-input");
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
		.on("vclick", ".av-form-styled-password.has-placeholder.on label", function()
			{
			var $inputBlock = $(this).parent();

			$inputBlock.removeClass("on");
			setTimeout(function()
				{
				$inputBlock.find(":password").focus();
				}, 300);
			})
		.on("focus", ".av-form-styled-password.has-placeholder.on :password", function()
			{
			$(this).parent().removeClass("on");
			})
		.on("focusout", ".av-form-styled-password.has-placeholder:not(.on) :password", function()
			{
			if(!$(this).val())
				$(this).parent().addClass("on");
			});
	});