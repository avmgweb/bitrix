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
		var
			$select            = this.find("select"),
			$titleBlock        = this.find(".title-block"),
			$selectedItem      = $select.find("option[value=\""+value+"\"]"),
			$selectedItemLabel = this.find(".list .list-item[data-list-value=\""+value+"\"]");

		$select.find("option")
		    .removeAttr("selected")
		    .prop("selected", false);
		$selectedItem
			.attr("selected", true)
			.prop("selected", true);

		this.find(".list .list-item")
		    .removeClass("selected");
		$selectedItemLabel
			.addClass("selected", true);

		$titleBlock.find(".title").text($selectedItemLabel.length ? $selectedItemLabel.text() : $titleBlock.attr("data-default-title"));
		if($selectedItem.length) this.addClass("value-seted");
		else                     this.removeClass("value-seted");

		$select.trigger("change");
		};
	jQuery.fn.getFormElememtRequiredSelectAv = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredSelectAv = function(value)
		{
		     if(value == "on")  this.addClass("required");
		else if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertSelectAv    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertSelectAv    = function(value)
		{
		     if(value == "on")  this.addClass("alert-input");
		else if(value == "off") this.removeClass("alert-input");
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
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(".av-form-select .list").mCustomScrollbar({"theme": "dark"});

	$(document)
		.on("vclick", ".av-form-select .title-block", function()
			{
			var
				$selectBlock = $(this).closest(".av-form-select"),
				$optionsList = $selectBlock.find(".list");

			if($optionsList.is(":visible"))
				{
				$selectBlock.removeClass("active");
				$optionsList.slideUp();
				}
			else
				{
				$selectBlock.addClass("active");
				$optionsList
					.css("width", $selectBlock[0].getBoundingClientRect().width)
					.slideDown();
				}
			})
		.on("vclick", ".av-form-select .list .list-item", function()
			{
			var $selectBlock = $(this).closest(".av-form-select");

			$selectBlock
				.setFormElememtValueSelectAv($(this).attr("data-list-value"));
			$selectBlock
				.removeClass("active")
				.children(".list").slideUp();
			})
		.on("vclick", function()
			{
			$(".av-form-select").each(function()
				{
				if(!$(this).isClicked())
					$(this)
						.removeClass("active")
						.children(".list").slideUp();
				});
			});

	$(window).resize(function()
		{
		$(".av-form-select")
			.removeClass("active")
			.children(".list").slideUp();
		});
	});