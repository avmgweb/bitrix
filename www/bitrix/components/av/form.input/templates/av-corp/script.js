/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameInputAvCorp     = function()      {return this.find(":text").attr("name")};
	jQuery.fn.setFormElememtNameInputAvCorp     = function(value) {this.find(":text").attr("name", value)};
	jQuery.fn.getFormElememtValueInputAvCorp    = function()      {return this.find(":text").val()};
	jQuery.fn.setFormElememtValueInputAvCorp    = function(value)
		{
		this.find(":text").attr("value", value).val(value);
		this.behaviorFormElememtInputAvCorp();
		};
	jQuery.fn.getFormElememtRequiredInputAvCorp = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredInputAvCorp = function(value)
		{
		if(value == "on")  this.addClass("required");
		if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertInputAvCorp    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertInputAvCorp    = function(value)
		{
		if(value == "on")  this.addClass("alert-input");
		if(value == "off") this.removeClass("alert-input");
		};
	jQuery.fn.behaviorFormElememtInputAvCorp    = function(value)
		{
		var
			$input       = this.find(":text"),
			$placeholder = this.find("label");
		if(!$placeholder.length) return;

		if($input.val() || value == "on")
			{
			$input.show();
			$placeholder.hide();
			}
		else
			{
			$input.hide();
			$placeholder.show();
			}
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-corp", "input", "getFormElememtName",     "getFormElememtNameInputAvCorp");
SetFormElementsFunction("av-corp", "input", "setFormElememtName",     "setFormElememtNameInputAvCorp");
SetFormElementsFunction("av-corp", "input", "getFormElememtValue",    "getFormElememtValueInputAvCorp");
SetFormElementsFunction("av-corp", "input", "setFormElememtValue",    "setFormElememtValueInputAvCorp");
SetFormElementsFunction("av-corp", "input", "getFormElememtRequired", "getFormElememtRequiredInputAvCorp");
SetFormElementsFunction("av-corp", "input", "setFormElememtRequired", "setFormElememtRequiredInputAvCorp");
SetFormElementsFunction("av-corp", "input", "getFormElememtAlert",    "getFormElememtAlertInputAvCorp");
SetFormElementsFunction("av-corp", "input", "setFormElememtAlert",    "setFormElememtAlertInputAvCorp");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick",   ".av-form-input-corp",       function() {$(this).parent().find(":text").focus()})
		.on("focus",    ".av-form-input-corp :text", function() {$(this).parent().addClass("active")   .behaviorFormElememtInputAvCorp("on")})
		.on("focusout", ".av-form-input-corp :text", function() {$(this).parent().removeClass("active").behaviorFormElememtInputAvCorp()});
	});