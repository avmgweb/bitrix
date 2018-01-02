/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameSelectAvCorpLearning     = function()      {return this.find('select').attr("name")};
	jQuery.fn.setFormElememtNameSelectAvCorpLearning     = function(value) {this.find('select').attr("name", value)};
	jQuery.fn.getFormElememtValueSelectAvCorpLearning    = function()      {return this.find('select option:selected').attr("value")};
	jQuery.fn.setFormElememtValueSelectAvCorpLearning    = function(value)
		{
		this.find('select option')                   .prop("selected", false);
		this.find('select option[value="'+value+'"]').prop("selected", true);
		this.behaviorFormElememtSelectAvCorpLearning();
		};
	jQuery.fn.getFormElememtRequiredSelectAvCorpLearning = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredSelectAvCorpLearning = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertSelectAvCorpLearning    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertSelectAvCorpLearning    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	jQuery.fn.behaviorFormElememtSelectAvCorpLearning    = function(value)
		{
		var
			$select       = this.find('select'),
			$selectedItem = $select.find('option:selected'),
			$titleLable   = this.find('.title-label > *:nth-child(1)'),
			$defaultLabel = this.find('.list [data-list-value]').first();
		if(!$selectedItem.length) $selectedItem  = $select.find('option').first();

		this.find('.list [data-list-value]').removeClass("selected");
		$titleLable.text($selectedItem.text());
		this.find('.list [data-list-value="'+$selectedItem.attr("value")+'"]').addClass("selected");

		if($selectedItem.attr("value")) $defaultLabel.show();
		else                            $defaultLabel.hide();
		$select.trigger("change");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-corp-learning", "select", "getFormElememtName",     "getFormElememtNameSelectAvCorpLearning");
SetFormElementsFunction("av-corp-learning", "select", "setFormElememtName",     "setFormElememtNameSelectAvCorpLearning");
SetFormElementsFunction("av-corp-learning", "select", "getFormElememtValue",    "getFormElememtValueSelectAvCorpLearning");
SetFormElementsFunction("av-corp-learning", "select", "setFormElememtValue",    "setFormElememtValueSelectAvCorpLearning");
SetFormElementsFunction("av-corp-learning", "select", "getFormElememtRequired", "getFormElememtRequiredSelectAvCorpLearning");
SetFormElementsFunction("av-corp-learning", "select", "setFormElememtRequired", "setFormElememtRequiredSelectAvCorpLearning");
SetFormElementsFunction("av-corp-learning", "select", "getFormElememtAlert",    "getFormElememtAlertSelectAvCorpLearning");
SetFormElementsFunction("av-corp-learning", "select", "setFormElememtAlert",    "setFormElememtAlertSelectAvCorpLearning");
/* -------------------------------------------------------------------- */
/* -------------------- diactivate select function -------------------- */
/* -------------------------------------------------------------------- */
function AvFormElementsCorpLearningSelectDiactivate()
	{
	$('.av-form-select-corp-learning')
		.removeClass("active")
		.children('.list').slideUp();
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		/* ------------------------------------------- */
		/* ------------ select drop down ------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-form-select-corp-learning:not(.disabled) .title-label', function()
			{
			var
				$selectBlock = $(this).closest('.av-form-select-corp-learning'),
				$optionsList = $selectBlock.find('.list');

			if($optionsList.is(':visible'))
				AvFormElementsCorpLearningSelectDiactivate();
			else
				{
				AvFormElementsCorpLearningSelectDiactivate();
				$selectBlock.addClass("active");
				$optionsList
					.css("width", $(this)[0].getBoundingClientRect().width - 1)
					.slideDown()
					.focus();
				}
			})
		/* ------------------------------------------- */
		/* --------------- check value --------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-form-select-corp-learning:not(.disabled) .list [data-list-value]', function()
			{
			$(this).closest('.av-form-select-corp-learning').setFormElememtValueSelectAvCorpLearning($(this).attr("data-list-value"));
			AvFormElementsCorpLearningSelectDiactivate();
			})
		/* ------------------------------------------- */
		/* -------------- hide selector -------------- */
		/* ------------------------------------------- */
		.on("vclick", function(event)
			{
			if(!$(event.target).closest('.av-form-select-corp-learning').length)
				AvFormElementsCorpLearningSelectDiactivate();
			});

	$(window)
		.resize(function()
			{
			AvFormElementsCorpLearningSelectDiactivate();
			});
	});