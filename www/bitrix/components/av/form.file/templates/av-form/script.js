/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameFileAvStyled     = function()      {return this.find(":file").attr("name")};
	jQuery.fn.setFormElememtNameFileAvStyled     = function(value) {this.find(":file").attr("name", value)};
	jQuery.fn.getFormElememtValueFileAvStyled    = function()      {return this.find(":file").val()};
	jQuery.fn.setFormElememtValueFileAvStyled    = function(value) {};
	jQuery.fn.getFormElememtRequiredFileAvStyled = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredFileAvStyled = function(value)
		{
		     if(value == "on")  this.addClass("required");
		else if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertFileAvStyled    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertFileAvStyled    = function(value)
		{
		     if(value == "on")  this.addClass("alert-input");
		else if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-styled", "file", "getFormElememtName",     "getFormElememtNameFileAvStyled");
SetFormElementsFunction("av-styled", "file", "setFormElememtName",     "setFormElememtNameFileAvStyled");
SetFormElementsFunction("av-styled", "file", "getFormElememtValue",    "getFormElememtValueFileAvStyled");
SetFormElementsFunction("av-styled", "file", "setFormElememtValue",    "setFormElememtValueFileAvStyled");
SetFormElementsFunction("av-styled", "file", "getFormElememtRequired", "getFormElememtRequiredFileAvStyled");
SetFormElementsFunction("av-styled", "file", "setFormElememtRequired", "setFormElememtRequiredFileAvStyled");
SetFormElementsFunction("av-styled", "file", "getFormElememtAlert",    "getFormElememtAlertFileAvStyled");
SetFormElementsFunction("av-styled", "file", "setFormElememtAlert",    "setFormElememtAlertFileAvStyled");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", ".av-form-styled-file .title, .av-form-styled-file .new-file-name", function()
			{
			$(this).closest(".av-form-styled-file").find(":file").click();
			})
		.on("change", ".av-form-styled-file :file", function()
			{
			var
				value       = $(this).val(),
				$inputBlock = $(this).closest(".av-form-styled-file");

			if(value)
				$inputBlock
					.addClass("new-file")
					.find(".new-file-name")
						.text(value.split("\\").pop());
			else
				$inputBlock.find(".delete").click();
			})
		.on("vclick", ".av-form-styled-file .delete", function()
			{
			$(this).closest(".av-form-styled-file")
				.removeClass("new-file")
				.removeClass("uploaded-file")
				.find(":checkbox")
					.attr("checked", true)
					.prop("checked", true);
			});
	});