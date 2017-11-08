/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameInputAvStyled     = function()      {return this.find(":text").attr("name")};
	jQuery.fn.setFormElememtNameInputAvStyled     = function(value) {this.find(":text").attr("name", value)};
	jQuery.fn.getFormElememtValueInputAvStyled    = function()      {return this.find(":text").val()};
	jQuery.fn.setFormElememtValueInputAvStyled    = function(value)
		{
		this.find(":text").attr("value", value).val(value);
		if(!this.hasClass("has-placeholder")) return;

		if(value) this.removeClass("on");
		else      this.addClass("on");
		};
	jQuery.fn.getFormElememtRequiredInputAvStyled = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredInputAvStyled = function(value)
		{
		if(value == "on")  this.addClass("required");
		if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertInputAvStyled    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertInputAvStyled    = function(value)
		{
		if(value == "on")  this.addClass("alert-input");
		if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-styled", "input", "getFormElememtName",     "getFormElememtNameInputAvStyled");
SetFormElementsFunction("av-styled", "input", "setFormElememtName",     "setFormElememtNameInputAvStyled");
SetFormElementsFunction("av-styled", "input", "getFormElememtValue",    "getFormElememtValueInputAvStyled");
SetFormElementsFunction("av-styled", "input", "setFormElememtValue",    "setFormElememtValueInputAvStyled");
SetFormElementsFunction("av-styled", "input", "getFormElememtRequired", "getFormElememtRequiredInputAvStyled");
SetFormElementsFunction("av-styled", "input", "setFormElememtRequired", "setFormElememtRequiredInputAvStyled");
SetFormElementsFunction("av-styled", "input", "getFormElememtAlert",    "getFormElememtAlertInputAvStyled");
SetFormElementsFunction("av-styled", "input", "setFormElememtAlert",    "setFormElememtAlertInputAvStyled");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", ".av-form-styled-input.has-placeholder.on label", function()
			{
			var $inputBlock = $(this).parent();

			$inputBlock.removeClass("on");
			setTimeout(function()
				{
				$inputBlock.find(":text").focus();
				}, 300);
			})
		.on("focus", ".av-form-styled-input.has-placeholder.on :text", function()
			{
			$(this).parent().removeClass("on");
			})
		.on("focusout", ".av-form-styled-input.has-placeholder:not(.on) :text", function()
			{
			if(!$(this).val())
				$(this).parent().addClass("on");
			});
	});