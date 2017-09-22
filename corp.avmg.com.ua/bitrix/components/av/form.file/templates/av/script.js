/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameFileAv     = function()      {return this.find(':file').attr("name")};
	jQuery.fn.setFormElememtNameFileAv     = function(value) {this.find(':file').attr("name", value)};
	jQuery.fn.getFormElememtValueFileAv    = function()      {return this.find(':file').val()};
	jQuery.fn.setFormElememtValueFileAv    = function(value) {};
	jQuery.fn.getFormElememtRequiredFileAv = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredFileAv = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertFileAv    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertFileAv    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av", "file", "getFormElememtName",     "getFormElememtNameFileAv");
SetFormElementsFunction("av", "file", "setFormElememtName",     "setFormElememtNameFileAv");
SetFormElementsFunction("av", "file", "getFormElememtValue",    "getFormElememtValueFileAv");
SetFormElementsFunction("av", "file", "setFormElememtValue",    "setFormElememtValueFileAv");
SetFormElementsFunction("av", "file", "getFormElememtRequired", "getFormElememtRequiredFileAv");
SetFormElementsFunction("av", "file", "setFormElememtRequired", "setFormElememtRequiredFileAv");
SetFormElementsFunction("av", "file", "getFormElememtAlert",    "getFormElememtAlertFileAv");
SetFormElementsFunction("av", "file", "setFormElememtAlert",    "setFormElememtAlertFileAv");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", '.av-form-file .default, .av-form-file .new-value .title', function()
			{
			$(this).closest('.av-form-file').find(':file').click();
			})
		.on("change", '.av-form-file :file', function()
			{
			var
				value       = $(this).val(),
				$inputBlock = $(this).closest('.av-form-file');

			if(value)
				$inputBlock
					.addClass("active")
					.find('.new-value .title')
						.text(value.split('\\').pop());
			else
				$inputBlock
					.removeClass("active");
			})
		.on("vclick", '.av-form-file .new-value .delete', function()
			{
			$(this).closest('.av-form-file').removeClass("active");
			})
		.on("vclick", '.av-form-file .current-value .delete', function()
			{
			$(this).closest('.av-form-file')
				.removeClass("uploaded")
				.find(':checkbox')
					.attr("checked", true)
					.prop("checked", true);
			});
	});