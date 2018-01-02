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
SetFormElementsFunction("av-corp", "textarea", "getFormElememtName",     "getFormElememtNameTextareaAvCorp");
SetFormElementsFunction("av-corp", "textarea", "setFormElememtName",     "setFormElememtNameTextareaAvCorp");
SetFormElementsFunction("av-corp", "textarea", "getFormElememtValue",    "getFormElememtValueTextareaAvCorp");
SetFormElementsFunction("av-corp", "textarea", "setFormElememtValue",    "setFormElememtValueTextareaAvCorp");
SetFormElementsFunction("av-corp", "textarea", "getFormElememtRequired", "getFormElememtRequiredTextareaAvCorp");
SetFormElementsFunction("av-corp", "textarea", "setFormElememtRequired", "setFormElememtRequiredTextareaAvCorp");
SetFormElementsFunction("av-corp", "textarea", "getFormElememtAlert",    "getFormElememtAlertTextareaAvCorp");
SetFormElementsFunction("av-corp", "textarea", "setFormElememtAlert",    "setFormElememtAlertTextareaAvCorp");