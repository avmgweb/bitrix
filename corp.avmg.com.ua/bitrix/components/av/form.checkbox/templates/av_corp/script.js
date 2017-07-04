/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameCheckboxAvCorp     = function()      {return this.find('input').attr("name")};
	jQuery.fn.setFormElememtNameCheckboxAvCorp     = function(value) {this.find('input').attr("name", value)};
	jQuery.fn.getFormElememtValueCheckboxAvCorp    = function()      {return this.find('input').is('[checked]')};
	jQuery.fn.setFormElememtValueCheckboxAvCorp    = function(value) {this.find('input').prop("checked", !!value)};
	jQuery.fn.getFormElememtRequiredCheckboxAvCorp = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredCheckboxAvCorp = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertCheckboxAvCorp    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertCheckboxAvCorp    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av_corp", "checkbox", "getFormElememtName",     "getFormElememtNameCheckboxAvCorp");
SetFormElementsFunction("av_corp", "checkbox", "setFormElememtName",     "setFormElememtNameCheckboxAvCorp");
SetFormElementsFunction("av_corp", "checkbox", "getFormElememtValue",    "getFormElememtValueCheckboxAvCorp");
SetFormElementsFunction("av_corp", "checkbox", "setFormElememtValue",    "setFormElememtValueCheckboxAvCorp");
SetFormElementsFunction("av_corp", "checkbox", "getFormElememtRequired", "getFormElememtRequiredCheckboxAvCorp");
SetFormElementsFunction("av_corp", "checkbox", "setFormElememtRequired", "setFormElememtRequiredCheckboxAvCorp");
SetFormElementsFunction("av_corp", "checkbox", "getFormElememtAlert",    "getFormElememtAlertCheckboxAvCorp");
SetFormElementsFunction("av_corp", "checkbox", "setFormElememtAlert",    "setFormElememtAlertCheckboxAvCorp");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	SetFormElementsCurrentLibrary("av_corp");
	$(document).on("vclick", '.av-form-checkbox-corp label', function()
		{
		var
			$fullBlock = $(this).parent(),
			$input     = $fullBlock.find('input');

		if($input.is('[checked]')) $input.removeAttr("checked");
		else                       $input.attr("checked", true);
		$input.add($fullBlock).trigger("change");
		});
	});