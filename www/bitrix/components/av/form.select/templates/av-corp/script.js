/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameSelectAvCorp     = function()      {return this.find('select').attr("name")};
	jQuery.fn.setFormElememtNameSelectAvCorp     = function(value) {this.find('select').attr("name", value)};
	jQuery.fn.getFormElememtValueSelectAvCorp    = function()      {return this.find('select option:selected').attr("value")};
	jQuery.fn.setFormElememtValueSelectAvCorp    = function(value)
		{
		this.find('select option')                   .prop("selected", false);
		this.find('select option[value="'+value+'"]').prop("selected", true);
		this.behaviorFormElememtSelectAvCorp();
		};
	jQuery.fn.getFormElememtRequiredSelectAvCorp = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredSelectAvCorp = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertSelectAvCorp    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertSelectAvCorp    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	jQuery.fn.behaviorFormElememtSelectAvCorp    = function(value)
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
SetFormElementsFunction("av-corp", "select", "getFormElememtName",     "getFormElememtNameSelectAvCorp");
SetFormElementsFunction("av-corp", "select", "setFormElememtName",     "setFormElememtNameSelectAvCorp");
SetFormElementsFunction("av-corp", "select", "getFormElememtValue",    "getFormElememtValueSelectAvCorp");
SetFormElementsFunction("av-corp", "select", "setFormElememtValue",    "setFormElememtValueSelectAvCorp");
SetFormElementsFunction("av-corp", "select", "getFormElememtRequired", "getFormElememtRequiredSelectAvCorp");
SetFormElementsFunction("av-corp", "select", "setFormElememtRequired", "setFormElememtRequiredSelectAvCorp");
SetFormElementsFunction("av-corp", "select", "getFormElememtAlert",    "getFormElememtAlertSelectAvCorp");
SetFormElementsFunction("av-corp", "select", "setFormElememtAlert",    "setFormElememtAlertSelectAvCorp");
/* -------------------------------------------------------------------- */
/* -------------------- diactivate select function -------------------- */
/* -------------------------------------------------------------------- */
function AvFormElementsCorpSelectDiactivate()
	{
	$('.av-form-select-corp')
		.removeClass("active")
		.children('.list').slideUp();
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(".av-form-select-corp .list").mCustomScrollbar({"theme": "dark"});

	$(document)
		/* ------------------------------------------- */
		/* ------------ select drop down ------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-form-select-corp:not(.disabled) .title-label', function()
			{
			var
				$selectBlock = $(this).closest('.av-form-select-corp'),
				$optionsList = $selectBlock.find('.list');

			if($optionsList.is(':visible'))
				AvFormElementsCorpSelectDiactivate();
			else
				{
				AvFormElementsCorpSelectDiactivate();
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
		.on("vclick", '.av-form-select-corp:not(.disabled) .list [data-list-value]', function()
			{
			$(this).closest('.av-form-select-corp').setFormElememtValueSelectAvCorp($(this).attr("data-list-value"));
			AvFormElementsCorpSelectDiactivate();
			})
		/* ------------------------------------------- */
		/* -------------- hide selector -------------- */
		/* ------------------------------------------- */
		.on("vclick", function(event)
			{
			if(!$(event.target).closest('.av-form-select-corp').length)
				AvFormElementsCorpSelectDiactivate();
			});

	$(window)
		.resize(function()
			{
			AvFormElementsCorpSelectDiactivate();
			});
	});