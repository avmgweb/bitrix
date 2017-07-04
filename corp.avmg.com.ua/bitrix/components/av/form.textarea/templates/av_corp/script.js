/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameTextareaAvCorp     = function()      {return this.attr("name")};
	jQuery.fn.setFormElememtNameTextareaAvCorp     = function(value) {this.attr("name", value)};
	jQuery.fn.getFormElememtValueTextareaAvCorp    = function()      {return this.val()};
	jQuery.fn.setFormElememtValueTextareaAvCorp    = function(value) {this.text(value)};
	jQuery.fn.getFormElememtRequiredTextareaAvCorp = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredTextareaAvCorp = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertTextareaAvCorp    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertTextareaAvCorp    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av_corp", "textarea", "getFormElememtName",     "getFormElememtNameTextareaAvCorp");
SetFormElementsFunction("av_corp", "textarea", "setFormElememtName",     "setFormElememtNameTextareaAvCorp");
SetFormElementsFunction("av_corp", "textarea", "getFormElememtValue",    "getFormElememtValueTextareaAvCorp");
SetFormElementsFunction("av_corp", "textarea", "setFormElememtValue",    "setFormElememtValueTextareaAvCorp");
SetFormElementsFunction("av_corp", "textarea", "getFormElememtRequired", "getFormElememtRequiredTextareaAvCorp");
SetFormElementsFunction("av_corp", "textarea", "setFormElememtRequired", "setFormElememtRequiredTextareaAvCorp");
SetFormElementsFunction("av_corp", "textarea", "getFormElememtAlert",    "getFormElememtAlertTextareaAvCorp");
SetFormElementsFunction("av_corp", "textarea", "setFormElememtAlert",    "setFormElememtAlertTextareaAvCorp");