/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNamePasswordAv     = function()      {return this.find(":text").attr("name")};
	jQuery.fn.setFormElememtNamePasswordAv     = function(value) {this.find(":text").attr("name", value)};
	jQuery.fn.getFormElememtValuePasswordAv    = function()      {return this.find(":text").val()};
	jQuery.fn.setFormElememtValuePasswordAv    = function(value)
		{
		this.find(":text").attr("value", value).val(value);
		this.behaviorFormElememtPasswordAv();
		};
	jQuery.fn.getFormElememtRequiredPasswordAv = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredPasswordAv = function(value)
		{
		if(value == "on")  this.addClass("required");
		if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertPasswordAv    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertPasswordAv    = function(value)
		{
		if(value == "on")  this.addClass("alert-input");
		if(value == "off") this.removeClass("alert-input");
		};
	jQuery.fn.behaviorFormElememtPasswordAv    = function(value)
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
SetFormElementsFunction("av", "password", "getFormElememtName",     "getFormElememtNamePasswordAv");
SetFormElementsFunction("av", "password", "setFormElememtName",     "setFormElememtNamePasswordAv");
SetFormElementsFunction("av", "password", "getFormElememtValue",    "getFormElememtValuePasswordAv");
SetFormElementsFunction("av", "password", "setFormElememtValue",    "setFormElememtValuePasswordAv");
SetFormElementsFunction("av", "password", "getFormElememtRequired", "getFormElememtRequiredPasswordAv");
SetFormElementsFunction("av", "password", "setFormElememtRequired", "setFormElememtRequiredPasswordAv");
SetFormElementsFunction("av", "password", "getFormElememtAlert",    "getFormElememtAlertPasswordAv");
SetFormElementsFunction("av", "password", "setFormElememtAlert",    "setFormElememtAlertPasswordAv");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick",   ".av-form-input-password",       function() {$(this).parent().find(":text").focus()})
		.on("focus",    ".av-form-input-password :text", function() {$(this).parent().addClass("active")   .behaviorFormElememtPasswordAv("on")})
		.on("focusout", ".av-form-input-password :text", function() {$(this).parent().removeClass("active").behaviorFormElememtPasswordAv()});
	});