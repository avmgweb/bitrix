/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameInputNumberAvCorp     = function()      {return this.find('input').attr("name")};
	jQuery.fn.setFormElememtNameInputNumberAvCorp     = function(value) {this.find('input').attr("name", value)};
	jQuery.fn.getFormElememtValueInputNumberAvCorp    = function()      {return this.find('input').val()};
	jQuery.fn.setFormElememtValueInputNumberAvCorp    = function(value)
		{
		this.find('input').attr("value", value).val(value);
		this.behaviorFormElememtInputNumberAvCorp();
		};
	jQuery.fn.getFormElememtRequiredInputNumberAvCorp = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredInputNumberAvCorp = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertInputNumberAvCorp    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertInputNumberAvCorp    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	jQuery.fn.behaviorFormElememtInputNumberAvCorp    = function(value)
		{
		var
			$input       = this.find('input'),
			$placeholder = this.find('label');
		if(!$placeholder.length) return;

		if($input.val() || value == 'on')
			{
			$input.show();
			$placeholder.hide();
			}
		else
			{
			$input.hide();
			$placeholder.show();
			}
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av_corp", "number", "getFormElememtName",     "getFormElememtNameInputNumberAvCorp");
SetFormElementsFunction("av_corp", "number", "setFormElememtName",     "setFormElememtNameInputNumberAvCorp");
SetFormElementsFunction("av_corp", "number", "getFormElememtValue",    "getFormElememtValueInputNumberAvCorp");
SetFormElementsFunction("av_corp", "number", "setFormElememtValue",    "setFormElememtValueInputNumberAvCorp");
SetFormElementsFunction("av_corp", "number", "getFormElememtRequired", "getFormElememtRequiredInputNumberAvCorp");
SetFormElementsFunction("av_corp", "number", "setFormElememtRequired", "setFormElememtRequiredInputNumberAvCorp");
SetFormElementsFunction("av_corp", "number", "getFormElememtAlert",    "getFormElememtAlertInputNumberAvCorp");
SetFormElementsFunction("av_corp", "number", "setFormElememtAlert",    "setFormElememtAlertInputNumberAvCorp");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	SetFormElementsCurrentLibrary("av_corp");
	$(document)
		.on("vclick",                   '.av-form-input-number-corp',       function() {$(this).parent().find('input').focus()})
		.on("focus",                    '.av-form-input-number-corp input', function() {$(this).parent().addClass("active")   .behaviorFormElememtInputNumberAvCorp("on")})
		.on("focusout",                 '.av-form-input-number-corp input', function() {$(this).parent().removeClass("active").behaviorFormElememtInputNumberAvCorp()})
		.on("change keyup input click", '.av-form-input-number-corp input', function()
			{
			this.value = this.value
				.replace(/[^\d,.]*/g, '')
				.replace(/([,.])[,.]+/g, '$1')
				.replace(/^[^\d]*(\d+([.,]\d{0,5})?).*$/g, '$1');
			});
	});