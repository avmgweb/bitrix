/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameInputDateCorp     = function()      {return this.find('input').attr("name")};
	jQuery.fn.setFormElememtNameInputDateCorp     = function(value) {this.find('input').attr("name", value)};
	jQuery.fn.getFormElememtValueInputDateCorp    = function()      {return this.find('input').val()};
	jQuery.fn.setFormElememtValueInputDateCorp    = function(value)
		{
		this.find('input').val(value).attr("value", value);
		this.behaviorFormElememtInputDateCorp();
		};
	jQuery.fn.getFormElememtRequiredInputDateCorp = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredInputDateCorp = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertInputDateCorp    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertInputDateCorp    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	jQuery.fn.behaviorFormElememtInputDateCorp    = function(value)
		{
		var
			inputValue   = this.find('input').val(),
			$placeholder = this.find('.placeholder'),
			$valueLabel  = this.find('.value'),
			$pickerIcon  = this.find('.picker'),
			$clearIcon   = this.find('.clear-value');

		$valueLabel.text(inputValue);
		if(inputValue || value == 'on')
			{
			$placeholder.add($pickerIcon).hide();
			$valueLabel.add($clearIcon).show();
			}
		else
			{
			$placeholder.add($pickerIcon).show();
			$valueLabel.add($clearIcon).hide();
			}
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av_corp", "date", "getFormElememtName",     "getFormElememtNameInputDateCorp");
SetFormElementsFunction("av_corp", "date", "setFormElememtName",     "setFormElememtNameInputDateCorp");
SetFormElementsFunction("av_corp", "date", "getFormElememtValue",    "getFormElememtValueInputDateCorp");
SetFormElementsFunction("av_corp", "date", "setFormElememtValue",    "setFormElememtValueInputDateCorp");
SetFormElementsFunction("av_corp", "date", "getFormElememtRequired", "getFormElememtRequiredInputDateCorp");
SetFormElementsFunction("av_corp", "date", "setFormElememtRequired", "setFormElememtRequiredInputDateCorp");
SetFormElementsFunction("av_corp", "date", "getFormElememtAlert",    "getFormElememtAlertInputDateCorp");
SetFormElementsFunction("av_corp", "date", "setFormElememtAlert",    "setFormElememtAlertInputDateCorp");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	SetFormElementsCurrentLibrary("av_corp");
	$(document)
		.on("vclick", '.av-form-input-date-corp > *:not(.clear-value)', function()
			{
			BX.calendar
				({
				node     : this,
				field    : $(this).parent().find('input').attr("name"),
				bTime    : false,
				bHideTime: false
				});
			})
		.on("propertychange change paste", '.av-form-input-date-corp input',        function() {$(this).parent().behaviorFormElememtInputDateCorp()})
		.on("vclick",                      '.av-form-input-date-corp .clear-value', function() {$(this).parent().setFormElememtValueInputDateCorp()});
	});