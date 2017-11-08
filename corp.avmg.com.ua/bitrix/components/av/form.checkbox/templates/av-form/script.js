/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameCheckboxAvStyled     = function()      {return this.find(":checkbox").attr("name")};
	jQuery.fn.setFormElememtNameCheckboxAvStyled     = function(value) {this.find(":checkbox").attr("name", value)};
	jQuery.fn.getFormElememtValueCheckboxAvStyled    = function()
		{
		return this
			.closest("form")
			.find(":checkbox[name=\""+this.find(":checkbox").attr("name")+"\"]:checked")
			.length;
		};
	jQuery.fn.setFormElememtValueCheckboxAvStyled    = function(value)
		{
		var $checkbox = this.find(":checkbox");
		if(value) $checkbox.attr("checked", true).prop("checked", true);
		else      $checkbox.removeAttr("checked").prop("checked", false);
		$checkbox.trigger("change");
		};
	jQuery.fn.getFormElememtRequiredCheckboxAvStyled = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredCheckboxAvStyled = function(value)
		{
		     if(value == "on")  this.addClass("required");
		else if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertCheckboxAvStyled    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertCheckboxAvStyled    = function(value)
		{
		     if(value == "on")  this.addClass("alert-input");
		else if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-styled", "checkbox", "getFormElememtName",     "getFormElememtNameCheckboxAvStyled");
SetFormElementsFunction("av-styled", "checkbox", "setFormElememtName",     "setFormElememtNameCheckboxAvStyled");
SetFormElementsFunction("av-styled", "checkbox", "getFormElememtValue",    "getFormElememtValueCheckboxAvStyled");
SetFormElementsFunction("av-styled", "checkbox", "setFormElememtValue",    "setFormElememtValueCheckboxAvStyled");
SetFormElementsFunction("av-styled", "checkbox", "getFormElememtRequired", "getFormElememtRequiredCheckboxAvStyled");
SetFormElementsFunction("av-styled", "checkbox", "setFormElememtRequired", "setFormElememtRequiredCheckboxAvStyled");
SetFormElementsFunction("av-styled", "checkbox", "getFormElememtAlert",    "getFormElememtAlertCheckboxAvStyled");
SetFormElementsFunction("av-styled", "checkbox", "setFormElememtAlert",    "setFormElememtAlertCheckboxAvStyled");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", ".av-form-checkbox label", function()
			{
			var $inputBlock = $(this).closest(".av-form-checkbox");
			$inputBlock.setFormElememtValueCheckboxAvStyled(!$inputBlock.find(":checkbox").is(":checked"));
			});
	});