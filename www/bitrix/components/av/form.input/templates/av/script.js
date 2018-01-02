/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameInputAv     = function()      {return this.find(":text").attr("name")};
	jQuery.fn.setFormElememtNameInputAv     = function(value) {this.find(":text").attr("name", value)};
	jQuery.fn.getFormElememtValueInputAv    = function()      {return this.find(":text").val()};
	jQuery.fn.setFormElememtValueInputAv    = function(value)
		{
		this.find(":text").attr("value", value).val(value);
		this.behaviorFormElememtInputAvPlaceholder();
		};
	jQuery.fn.getFormElememtRequiredInputAv = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredInputAv = function(value)
		{
		if(value == "on")  this.addClass("required");
		if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertInputAv    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertInputAv    = function(value)
		{
		if(value == "on")  this.addClass("alert-input");
		if(value == "off") this.removeClass("alert-input");
		};
	jQuery.fn.behaviorFormElememtInputAvPlaceholder    = function(value)
		{
		this.removeClass("placeholder-on placeholder-off");
		if(!this.find("label").length) return;

		if(this.find(":text").val() || value == "on") this.addClass("placeholder-off");
		else                                          this.addClass("placeholder-on");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av", "input", "getFormElememtName",     "getFormElememtNameInputAv");
SetFormElementsFunction("av", "input", "setFormElememtName",     "setFormElememtNameInputAv");
SetFormElementsFunction("av", "input", "getFormElememtValue",    "getFormElememtValueInputAv");
SetFormElementsFunction("av", "input", "setFormElememtValue",    "setFormElememtValueInputAv");
SetFormElementsFunction("av", "input", "getFormElememtRequired", "getFormElememtRequiredInputAv");
SetFormElementsFunction("av", "input", "setFormElememtRequired", "setFormElememtRequiredInputAv");
SetFormElementsFunction("av", "input", "getFormElememtAlert",    "getFormElememtAlertInputAv");
SetFormElementsFunction("av", "input", "setFormElememtAlert",    "setFormElememtAlertInputAv");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick",   ".av-form-input",       function() {$(this).parent().find(":text").focus()})
		.on("focus",    ".av-form-input :text", function() {$(this).parent().addClass("active")   .behaviorFormElememtInputAvPlaceholder("on")})
		.on("focusout", ".av-form-input :text", function() {$(this).parent().removeClass("active").behaviorFormElememtInputAvPlaceholder()});
	});