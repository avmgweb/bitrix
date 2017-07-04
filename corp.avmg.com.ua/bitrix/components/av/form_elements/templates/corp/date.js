/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameCorpDate     = function()      {return this.find('input').attr("name")};
	jQuery.fn.setFormElememtNameCorpDate     = function(value) {this.find('input').attr("name", value)};
	jQuery.fn.getFormElememtValueCorpDate    = function()      {return this.find('input').val()};
	jQuery.fn.setFormElememtValueCorpDate    = function(value)
		{
		this.find('input').val(value).attr("value", value);
		this.behaviorFormElememtCorpDate();
		};
	jQuery.fn.behaviorFormElememtCorpDate    = function(value)
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
	jQuery.fn.getFormElememtRequiredCorpDate = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredCorpDate = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertCorpDate    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertCorpDate    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("corp", "date", "getFormElememtName",     "getFormElememtNameCorpDate");
SetFormElementsFunction("corp", "date", "setFormElememtName",     "setFormElememtNameCorpDate");
SetFormElementsFunction("corp", "date", "getFormElememtValue",    "getFormElememtValueCorpDate");
SetFormElementsFunction("corp", "date", "setFormElememtValue",    "setFormElememtValueCorpDate");
SetFormElementsFunction("corp", "date", "getFormElememtRequired", "getFormElememtRequiredCorpDate");
SetFormElementsFunction("corp", "date", "setFormElememtRequired", "setFormElememtRequiredCorpDate");
SetFormElementsFunction("corp", "date", "getFormElememtAlert",    "getFormElememtAlertCorpDate");
SetFormElementsFunction("corp", "date", "setFormElememtAlert",    "setFormElememtAlertCorpDate");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", '.av-form-elements-corp-date > *:not(.clear-value)', function()
			{
			BX.calendar
				({
				node     : this,
				field    : $(this).parent().find('input').attr("name"),
				bTime    : false,
				bHideTime: false
				});
			})
		.on("propertychange change paste", '.av-form-elements-corp-date input',        function() {$(this).parent().behaviorFormElememtCorpDate()})
		.on("vclick",                      '.av-form-elements-corp-date .clear-value', function() {$(this).parent().setFormElememtValueCorpDate()});
	});