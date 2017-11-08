/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameTextareaAvStyled     = function()      {return this.find("textarea").attr("name")};
	jQuery.fn.setFormElememtNameTextareaAvStyled     = function(value) {this.find("textarea").attr("name", value)};
	jQuery.fn.getFormElememtValueTextareaAvStyled    = function()      {return this.find("textarea").val()};
	jQuery.fn.setFormElememtValueTextareaAvStyled    = function(value)
		{
		this.find("textarea").val(value);
		if(!this.hasClass("has-placeholder")) return;

		if(value) this.removeClass("on");
		else      this.addClass("on");
		};
	jQuery.fn.getFormElememtRequiredTextareaAvStyled = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredTextareaAvStyled = function(value)
		{
		if(value == "on")  this.addClass("required");
		if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertTextareaAvStyled    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertTextareaAvStyled    = function(value)
		{
		if(value == "on")  this.addClass("alert-input");
		if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-styled", "textarea", "getFormElememtName",     "getFormElememtNameTextareaAvStyled");
SetFormElementsFunction("av-styled", "textarea", "setFormElememtName",     "setFormElememtNameTextareaAvStyled");
SetFormElementsFunction("av-styled", "textarea", "getFormElememtValue",    "getFormElememtValueTextareaAvStyled");
SetFormElementsFunction("av-styled", "textarea", "setFormElememtValue",    "setFormElememtValueTextareaAvStyled");
SetFormElementsFunction("av-styled", "textarea", "getFormElememtRequired", "getFormElememtRequiredTextareaAvStyled");
SetFormElementsFunction("av-styled", "textarea", "setFormElememtRequired", "setFormElememtRequiredTextareaAvStyled");
SetFormElementsFunction("av-styled", "textarea", "getFormElememtAlert",    "getFormElememtAlertTextareaAvStyled");
SetFormElementsFunction("av-styled", "textarea", "setFormElememtAlert",    "setFormElememtAlertTextareaAvStyled");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", ".av-form-styled-textarea.has-placeholder.on label", function()
			{
			var $inputBlock = $(this).parent();

			$inputBlock.removeClass("on");
			setTimeout(function()
				{
				$inputBlock.find("textarea").focus();
				}, 300);
			})
		.on("focus", ".av-form-styled-textarea.has-placeholder.on textarea", function()
			{
			$(this).parent().removeClass("on");
			})
		.on("focusout", ".av-form-styled-textarea.has-placeholder:not(.on) textarea", function()
			{
			if(!$(this).val())
				$(this).parent().addClass("on");
			});
	});