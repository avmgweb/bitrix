/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameSelectAv     = function()      {return this.find("select").attr("name")};
	jQuery.fn.setFormElememtNameSelectAv     = function(value) {this.find("select").attr("name", value)};
	jQuery.fn.getFormElememtValueSelectAv    = function()      {return this.find("select option:selected").attr("value")};
	jQuery.fn.setFormElememtValueSelectAv    = function(value)
		{
		this.find("select option")                     .prop("selected", false);
		this.find("select option[value=\""+value+"\"]").prop("selected", true);
		this.behaviorFormElememtSelectAv();
		};
	jQuery.fn.getFormElememtRequiredSelectAv = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredSelectAv = function(value)
		{
		if(value == "on")  this.addClass("required");
		if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertSelectAv    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertSelectAv    = function(value)
		{
		if(value == "on")  this.addClass("alert-input");
		if(value == "off") this.removeClass("alert-input");
		};
	jQuery.fn.behaviorFormElememtSelectAv    = function(value)
		{
		var
			$select       = this.find("select"),
			$selectedItem = $select.find("option:selected"),
			$defaultLabel = this.find(".list [data-list-value]").first();
		if(!$selectedItem.length) $selectedItem  = this.find("select option").first();

		this.find(".title-label > *:nth-child(1)")                              .text($selectedItem.text());
		this.find(".list [data-list-value]")                                    .removeClass("selected");
		this.find(".list [data-list-value=\""+$selectedItem.attr("value")+"\"]").addClass("selected");

		if($selectedItem.attr("value") && $defaultLabel.text()) $defaultLabel.show();
		else                                                    $defaultLabel.hide();

		$select.trigger("change");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av", "select", "getFormElememtName",     "getFormElememtNameSelectAv");
SetFormElementsFunction("av", "select", "setFormElememtName",     "setFormElememtNameSelectAv");
SetFormElementsFunction("av", "select", "getFormElememtValue",    "getFormElememtValueSelectAv");
SetFormElementsFunction("av", "select", "setFormElememtValue",    "setFormElememtValueSelectAv");
SetFormElementsFunction("av", "select", "getFormElememtRequired", "getFormElememtRequiredSelectAv");
SetFormElementsFunction("av", "select", "setFormElememtRequired", "setFormElememtRequiredSelectAv");
SetFormElementsFunction("av", "select", "getFormElememtAlert",    "getFormElememtAlertSelectAv");
SetFormElementsFunction("av", "select", "setFormElememtAlert",    "setFormElememtAlertSelectAv");
/* -------------------------------------------------------------------- */
/* -------------------- diactivate select function -------------------- */
/* -------------------------------------------------------------------- */
function AvFormSelectDiactivate()
	{
	$(".av-form-select")
		.removeClass("active")
		.children(".list").slideUp();
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(".av-form-select .list").mCustomScrollbar({"theme": "dark"});

	$(document)
		/* ------------------------------------------- */
		/* ------------ select drop down ------------- */
		/* ------------------------------------------- */
		.on("vclick", ".av-form-select:not(.disabled) .title-label", function()
			{
			var
				$selectBlock = $(this).closest(".av-form-select"),
				$optionsList = $selectBlock.find(".list");

			if($optionsList.is(":visible"))
				AvFormSelectDiactivate();
			else
				{
				AvFormSelectDiactivate();
				$selectBlock.addClass("active");
				$optionsList
					.css("width", $(this)[0].getBoundingClientRect().width)
					.slideDown()
					.focus();
				}
			})
		/* ------------------------------------------- */
		/* --------------- check value --------------- */
		/* ------------------------------------------- */
		.on("vclick", ".av-form-select:not(.disabled) .list [data-list-value]", function()
			{
			$(this).closest(".av-form-select").setFormElememtValueSelectAv($(this).attr("data-list-value"));
			AvFormSelectDiactivate();
			})
		/* ------------------------------------------- */
		/* -------------- hide selector -------------- */
		/* ------------------------------------------- */
		.on("vclick", function(event)
			{
			if(!$(event.target).closest(".av-form-select").length)
				AvFormSelectDiactivate();
			});

	$(window)
		.resize(function()
			{
			AvFormSelectDiactivate();
			});
	});