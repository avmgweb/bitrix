/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameSelectAvAlt     = function()      {return this.find("select").attr("name")};
	jQuery.fn.setFormElememtNameSelectAvAlt     = function(value) {this.find("select").attr("name", value)};
	jQuery.fn.getFormElememtValueSelectAvAlt    = function()      {return this.find("select option:selected").attr("value")};
	jQuery.fn.setFormElememtValueSelectAvAlt    = function(value)
		{
		var $select = this.find("select");

		$select.find("option")
			.removeAttr("selected")
			.prop("selected", false)
			.filter("[value=\""+value+"\"]")
				.attr("selected", true)
				.prop("selected", true);

		this.find(".list-item")
		    .removeClass("selected")
		    .filter("[data-list-value=\""+value+"\"]")
				.addClass("selected", true);

		$select.trigger("change");
		};
	jQuery.fn.getFormElememtRequiredSelectAvAlt = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredSelectAvAlt = function(value)
		{
		if(value == "on")  this.addClass("required");
		else if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertSelectAvAlt    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertSelectAvAlt    = function(value)
		{
		if(value == "on")  this.addClass("alert-input");
		else if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-alt", "select", "getFormElememtName",     "getFormElememtNameSelectAvAlt");
SetFormElementsFunction("av-alt", "select", "setFormElememtName",     "setFormElememtNameSelectAvAlt");
SetFormElementsFunction("av-alt", "select", "getFormElememtValue",    "getFormElememtValueSelectAvAlt");
SetFormElementsFunction("av-alt", "select", "setFormElememtValue",    "setFormElememtValueSelectAvAlt");
SetFormElementsFunction("av-alt", "select", "getFormElememtRequired", "getFormElememtRequiredSelectAvAlt");
SetFormElementsFunction("av-alt", "select", "setFormElememtRequired", "setFormElememtRequiredSelectAvAlt");
SetFormElementsFunction("av-alt", "select", "getFormElememtAlert",    "getFormElememtAlertSelectAvAlt");
SetFormElementsFunction("av-alt", "select", "setFormElememtAlert",    "setFormElememtAlertSelectAvAlt");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", ".av-form-select-alt .list-item", function()
			{
			$(this)
				.closest(".av-form-select-alt")
				.setFormElememtValueSelectAvAlt($(this).attr("data-list-value"));
			});
	});