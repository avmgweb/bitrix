/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameRadioAvCorp     = function()      {return this.find(":radio").attr("name")};
	jQuery.fn.setFormElememtNameRadioAvCorp     = function(value) {this.find(":radio").attr("name", value)};
	jQuery.fn.getFormElememtValueRadioAvCorp    = function()
		{
		return this
			.closest("form")
			.find(":radio[name=\""+this.find(":radio").attr("name")+"\"]:checked")
			.length;
		};
	jQuery.fn.setFormElememtValueRadioAvCorp    = function(value)
		{
		var $input = this.find(":radio");

		this
			.closest("form")
			.find(":radio[name=\""+$input.attr("name")+"\"]")
				.attr("checked", false)
				.prop("checked", false);
		$input
			.attr("checked", !!value)
			.prop("checked", !!value)
			.trigger("change");
		};
	jQuery.fn.getFormElememtRequiredRadioAvCorp = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredRadioAvCorp = function(value)
		{
		     if(value == "on")  this.addClass("required");
		else if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertRadioAvCorp    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertRadioAvCorp    = function(value)
		{
		     if(value == "on")  this.addClass("alert-input");
		else if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-corp", "radio", "getFormElememtName",     "getFormElememtNameRadioAvCorp");
SetFormElementsFunction("av-corp", "radio", "setFormElememtName",     "setFormElememtNameRadioAvCorp");
SetFormElementsFunction("av-corp", "radio", "getFormElememtValue",    "getFormElememtValueRadioAvCorp");
SetFormElementsFunction("av-corp", "radio", "setFormElememtValue",    "setFormElememtValueRadioAvCorp");
SetFormElementsFunction("av-corp", "radio", "getFormElememtRequired", "getFormElememtRequiredRadioAvCorp");
SetFormElementsFunction("av-corp", "radio", "setFormElememtRequired", "setFormElememtRequiredRadioAvCorp");
SetFormElementsFunction("av-corp", "radio", "getFormElememtAlert",    "getFormElememtAlertRadioAvCorp");
SetFormElementsFunction("av-corp", "radio", "setFormElememtAlert",    "setFormElememtAlertRadioAvCorp");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", ".av-form-radio-corp label", function()
			{
			$(this).parent().setFormElememtValueRadioAvCorp(true);
			});
	});