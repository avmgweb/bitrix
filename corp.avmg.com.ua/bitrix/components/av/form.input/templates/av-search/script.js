/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameSearchAv     = function()      {return this.find(":text").attr("name")};
	jQuery.fn.setFormElememtNameSearchAv     = function(value) {this.find(":text").attr("name", value)};
	jQuery.fn.getFormElememtValueSearchAv    = function()      {return this.find(":text").val()};
	jQuery.fn.setFormElememtValueSearchAv    = function(value)
		{
		this.find(":text").attr("value", value).val(value);

		if(value) this.addClass("active");
		else      this.removeClass("active");

		if(this.hasClass("has-placeholder"))
			{
			if(value) this.removeClass("on").addClass("active");
			else      this.addClass("on").removeClass("active");
			}
		};
	jQuery.fn.getFormElememtRequiredSearchAv = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredSearchAv = function(value)
		{
		if(value == "on")  this.addClass("required");
		if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertSearchAv    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertSearchAv    = function(value)
		{
		if(value == "on")  this.addClass("alert-input");
		if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av", "search", "getFormElememtName",     "getFormElememtNameSearchAv");
SetFormElementsFunction("av", "search", "setFormElememtName",     "setFormElememtNameSearchAv");
SetFormElementsFunction("av", "search", "getFormElememtValue",    "getFormElememtValueSearchAv");
SetFormElementsFunction("av", "search", "setFormElememtValue",    "setFormElememtValueSearchAv");
SetFormElementsFunction("av", "search", "getFormElememtRequired", "getFormElememtRequiredSearchAv");
SetFormElementsFunction("av", "search", "setFormElememtRequired", "setFormElememtRequiredSearchAv");
SetFormElementsFunction("av", "search", "getFormElememtAlert",    "getFormElememtAlertSearchAv");
SetFormElementsFunction("av", "search", "setFormElememtAlert",    "setFormElememtAlertSearchAv");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", ".av-form-input-search label, .av-form-input-search .icon", function()
			{
			$(this).parent().find(":text").focus();
			})
		.on("focus", ".av-form-input-search :text", function()
			{
			$(this).parent()
				.removeClass("on")
				.addClass("active");
			})
		.on("focusout", ".av-form-input-search.has-placeholder:not(.on) :text", function()
			{
			if(!$(this).val())
				$(this).parent()
					.addClass("on")
					.removeClass("active");
			});
	});