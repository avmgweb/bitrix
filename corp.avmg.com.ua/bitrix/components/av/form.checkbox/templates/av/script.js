/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameCheckboxAv     = function()      {return this.find('input').attr("name")};
	jQuery.fn.setFormElememtNameCheckboxAv     = function(value) {this.find('input').attr("name", value)};
	jQuery.fn.getFormElememtValueCheckboxAv    = function()      {return this.find('input').is('[checked]')};
	jQuery.fn.setFormElememtValueCheckboxAv    = function(value)
		{
		var $checkbox = this.find('input');
		if(value) $checkbox.attr("checked", true).prop("checked", true);
		else      $checkbox.removeAttr("checked").prop("checked", false);
		$checkbox.trigger("change");
		};
	jQuery.fn.getFormElememtRequiredCheckboxAv = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredCheckboxAv = function(value)
		{
		     if(value == 'on')  this.addClass("required");
		else if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertCheckboxAv    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertCheckboxAv    = function(value)
		{
		     if(value == 'on')  this.addClass("alert-input");
		else if(value == 'off') this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av", "checkbox", "getFormElememtName",     "getFormElememtNameCheckboxAv");
SetFormElementsFunction("av", "checkbox", "setFormElememtName",     "setFormElememtNameCheckboxAv");
SetFormElementsFunction("av", "checkbox", "getFormElememtValue",    "getFormElememtValueCheckboxAv");
SetFormElementsFunction("av", "checkbox", "setFormElememtValue",    "setFormElememtValueCheckboxAv");
SetFormElementsFunction("av", "checkbox", "getFormElememtRequired", "getFormElememtRequiredCheckboxAv");
SetFormElementsFunction("av", "checkbox", "setFormElememtRequired", "setFormElememtRequiredCheckboxAv");
SetFormElementsFunction("av", "checkbox", "getFormElememtAlert",    "getFormElememtAlertCheckboxAv");
SetFormElementsFunction("av", "checkbox", "setFormElememtAlert",    "setFormElememtAlertCheckboxAv");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	SetFormElementsCurrentLibrary("av");
	$(document)
		.on("vclick", '.av-form-checkbox label', function()
			{
			var $inputBlock = $(this).closest('.av-form-checkbox');
			$inputBlock.setFormElememtValueCheckboxAv(!$inputBlock.find('input').is(':checked'));
			});
	});