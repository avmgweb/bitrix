/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameInputAvSearch     = function()      {return this.find('input').attr("name")};
	jQuery.fn.setFormElememtNameInputAvSearch     = function(value) {this.find('input').attr("name", value)};
	jQuery.fn.getFormElememtValueInputAvSearch    = function()      {return this.find('input').val()};
	jQuery.fn.setFormElememtValueInputAvSearch    = function(value)
		{
		this.find('input').attr("value", value).val(value);
		this.behaviorFormElememtInputAvSearch();
		};
	jQuery.fn.getFormElememtRequiredInputAvSearch = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredInputAvSearch = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertInputAvSearch    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertInputAvSearch    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	jQuery.fn.behaviorFormElememtInputAvSearch    = function(value)
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
SetFormElementsFunction("av", "input", "getFormElememtName",     "getFormElememtNameInputAvSearch");
SetFormElementsFunction("av", "input", "setFormElememtName",     "setFormElememtNameInputAvSearch");
SetFormElementsFunction("av", "input", "getFormElememtValue",    "getFormElememtValueInputAvSearch");
SetFormElementsFunction("av", "input", "setFormElememtValue",    "setFormElememtValueInputAvSearch");
SetFormElementsFunction("av", "input", "getFormElememtRequired", "getFormElememtRequiredInputAvSearch");
SetFormElementsFunction("av", "input", "setFormElememtRequired", "setFormElememtRequiredInputAvSearch");
SetFormElementsFunction("av", "input", "getFormElememtAlert",    "getFormElememtAlertInputAvSearch");
SetFormElementsFunction("av", "input", "setFormElememtAlert",    "setFormElememtAlertInputAvSearch");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	SetFormElementsCurrentLibrary("av");
	$(document)
		.on("vclick",   '.av-form-input-search',       function() {$(this).parent().find('input').focus()})
		.on("focus",    '.av-form-input-search input', function() {$(this).parent().addClass("active")   .behaviorFormElememtInputAvSearch("on")})
		.on("focusout", '.av-form-input-search input', function() {$(this).parent().removeClass("active").behaviorFormElememtInputAvSearch()});
	});