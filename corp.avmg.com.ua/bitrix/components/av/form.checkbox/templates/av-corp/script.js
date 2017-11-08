/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameCheckboxAvCorp     = function()      {return this.find(":ckeckbox").attr("name")};
	jQuery.fn.setFormElememtNameCheckboxAvCorp     = function(value) {this.find(":ckeckbox").attr("name", value)};
	jQuery.fn.getFormElememtValueCheckboxAvCorp    = function()
		{
		return this
			.closest("form")
			.find(":checkbox[name=\""+this.find(":checkbox").attr("name")+"\"]:checked")
			.length;
		};
	jQuery.fn.setFormElememtValueCheckboxAvCorp    = function(value)
		{
		var $checkbox = this.find(":checkbox");
		if(value) $checkbox.attr("checked", true).prop("checked", true);
		else      $checkbox.removeAttr("checked").prop("checked", false);
		$checkbox.trigger("change");
		};
	jQuery.fn.getFormElememtRequiredCheckboxAvCorp = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredCheckboxAvCorp = function(value)
		{
		     if(value == "on")  this.addClass("required");
		else if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertCheckboxAvCorp    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertCheckboxAvCorp    = function(value)
		{
		     if(value == "on")  this.addClass("alert-input");
		else if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-corp", "checkbox", "getFormElememtName",     "getFormElememtNameCheckboxAvCorp");
SetFormElementsFunction("av-corp", "checkbox", "setFormElememtName",     "setFormElememtNameCheckboxAvCorp");
SetFormElementsFunction("av-corp", "checkbox", "getFormElememtValue",    "getFormElememtValueCheckboxAvCorp");
SetFormElementsFunction("av-corp", "checkbox", "setFormElememtValue",    "setFormElememtValueCheckboxAvCorp");
SetFormElementsFunction("av-corp", "checkbox", "getFormElememtRequired", "getFormElememtRequiredCheckboxAvCorp");
SetFormElementsFunction("av-corp", "checkbox", "setFormElememtRequired", "setFormElememtRequiredCheckboxAvCorp");
SetFormElementsFunction("av-corp", "checkbox", "getFormElememtAlert",    "getFormElememtAlertCheckboxAvCorp");
SetFormElementsFunction("av-corp", "checkbox", "setFormElememtAlert",    "setFormElememtAlertCheckboxAvCorp");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", ".av-form-checkbox-corp label", function()
			{
			var $inputBlock = $(this).closest(".av-form-checkbox-corp");
			$inputBlock.setFormElememtValueCheckboxAvStyled(!$inputBlock.find(":checkbox").is(":checked"));
			});
	});