/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameRadioAvCorp     = function()      {return this.find('input').attr("name")};
	jQuery.fn.setFormElememtNameRadioAvCorp     = function(value) {this.find('input').attr("name", value)};
	jQuery.fn.getFormElememtValueRadioAvCorp    = function()
		{
		return this
			.closest('form')
			.find('input[type="radio"][name="'+this.find('input').attr("name")+'"]:checked')
			.length;
		};
	jQuery.fn.setFormElememtValueRadioAvCorp    = function(value)
		{
		var $input = this.find('input');
		this
			.closest('form')
			.find('input[type="radio"][name="'+$input.attr("name")+'"]')
			.each(function()
				{
				$(this)
					.attr("checked", false)
					.prop("checked", false);
				});

		$input
			.attr("checked", !!value)
			.prop("checked", !!value)
			.trigger("change");
		};
	jQuery.fn.getFormElememtRequiredRadioAvCorp = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredRadioAvCorp = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertRadioAvCorp    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertRadioAvCorp    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av_corp", "radio", "getFormElememtName",     "getFormElememtNameRadioAvCorp");
SetFormElementsFunction("av_corp", "radio", "setFormElememtName",     "setFormElememtNameRadioAvCorp");
SetFormElementsFunction("av_corp", "radio", "getFormElememtValue",    "getFormElememtValueRadioAvCorp");
SetFormElementsFunction("av_corp", "radio", "setFormElememtValue",    "setFormElememtValueRadioAvCorp");
SetFormElementsFunction("av_corp", "radio", "getFormElememtRequired", "getFormElememtRequiredRadioAvCorp");
SetFormElementsFunction("av_corp", "radio", "setFormElememtRequired", "setFormElememtRequiredRadioAvCorp");
SetFormElementsFunction("av_corp", "radio", "getFormElememtAlert",    "getFormElememtAlertRadioAvCorp");
SetFormElementsFunction("av_corp", "radio", "setFormElememtAlert",    "setFormElememtAlertRadioAvCorp");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	SetFormElementsCurrentLibrary("av_corp");
	$(document).on("vclick", '.av-form-radio-corp label', function()
		{
		$(this).parent().setFormElememtValueRadioAvCorp(true);
		});
	});