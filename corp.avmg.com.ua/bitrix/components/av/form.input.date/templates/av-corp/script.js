/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameInputDateAvCorp     = function()      {return this.find('input').attr("name")};
	jQuery.fn.setFormElememtNameInputDateAvCorp     = function(value) {this.find('input').attr("name", value)};
	jQuery.fn.getFormElememtValueInputDateAvCorp    = function()      {return this.find('input').val()};
	jQuery.fn.setFormElememtValueInputDateAvCorp    = function(value)
		{
		this.find('input').val(value).attr("value", value);
		this.behaviorFormElememtInputDateAvCorp();
		};
	jQuery.fn.getFormElememtRequiredInputDateAvCorp = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredInputDateAvCorp = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertInputDateAvCorp    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertInputDateAvCorp    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	jQuery.fn.behaviorFormElememtInputDateAvCorp    = function(value)
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
SetFormElementsFunction("av-corp", "date", "getFormElememtName",     "getFormElememtNameInputDateAvCorp");
SetFormElementsFunction("av-corp", "date", "setFormElememtName",     "setFormElememtNameInputDateAvCorp");
SetFormElementsFunction("av-corp", "date", "getFormElememtValue",    "getFormElememtValueInputDateAvCorp");
SetFormElementsFunction("av-corp", "date", "setFormElememtValue",    "setFormElememtValueInputDateAvCorp");
SetFormElementsFunction("av-corp", "date", "getFormElememtRequired", "getFormElememtRequiredInputDateAvCorp");
SetFormElementsFunction("av-corp", "date", "setFormElememtRequired", "setFormElememtRequiredInputDateAvCorp");
SetFormElementsFunction("av-corp", "date", "getFormElememtAlert",    "getFormElememtAlertInputDateAvCorp");
SetFormElementsFunction("av-corp", "date", "setFormElememtAlert",    "setFormElememtAlertInputDateAvCorp");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
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
		.on("propertychange change paste", '.av-form-input-date-corp input',        function() {$(this).parent().behaviorFormElememtInputDateAvCorp()})
		.on("vclick",                      '.av-form-input-date-corp .clear-value', function() {$(this).parent().setFormElememtValueInputDateAvCorp()});
	});