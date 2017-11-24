/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameSelectAvShopNoscroll     = function()      {return this.find("select").attr("name")};
	jQuery.fn.setFormElememtNameSelectAvShopNoscroll     = function(value) {this.find("select").attr("name", value)};
	jQuery.fn.getFormElememtValueSelectAvShopNoscroll    = function()      {return this.find("select option:selected").attr("value")};
	jQuery.fn.setFormElememtValueSelectAvShopNoscroll    = function(value)
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
	jQuery.fn.getFormElememtRequiredSelectAvShopNoscroll = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredSelectAvShopNoscroll = function(value)
		{
		if(value == "on")  this.addClass("required");
		else if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertSelectAvShopNoscroll    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertSelectAvShopNoscroll    = function(value)
		{
		if(value == "on")  this.addClass("alert-input");
		else if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-shop-noscroll", "select", "getFormElememtName",     "getFormElememtNameSelectAvShopNoscroll");
SetFormElementsFunction("av-shop-noscroll", "select", "setFormElememtName",     "setFormElememtNameSelectAvShopNoscroll");
SetFormElementsFunction("av-shop-noscroll", "select", "getFormElememtValue",    "getFormElememtValueSelectAvShopNoscroll");
SetFormElementsFunction("av-shop-noscroll", "select", "setFormElememtValue",    "setFormElememtValueSelectAvShopNoscroll");
SetFormElementsFunction("av-shop-noscroll", "select", "getFormElememtRequired", "getFormElememtRequiredSelectAvShopNoscroll");
SetFormElementsFunction("av-shop-noscroll", "select", "setFormElememtRequired", "setFormElememtRequiredSelectAvShopNoscroll");
SetFormElementsFunction("av-shop-noscroll", "select", "getFormElememtAlert",    "getFormElememtAlertSelectAvShopNoscroll");
SetFormElementsFunction("av-shop-noscroll", "select", "setFormElememtAlert",    "setFormElememtAlertSelectAvShopNoscroll");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", ".av-form-select-shop-noscroll .title-block", function()
			{
			var
				$selectBlock = $(this).closest(".av-form-select-shop-noscroll"),
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
		.on("vclick", ".av-form-select-shop-noscroll .list .list-item", function()
			{
			var $selectBlock = $(this).closest(".av-form-select-shop-noscroll");
		
			$selectBlock
				.setFormElememtValueSelectAvShopNoscroll($(this).attr("data-list-value"));
			$selectBlock
				.removeClass("active")
				.children(".list").slideUp();
			})
		.on("vclick", function()
			{
			$(".av-form-select-shop-noscroll").each(function()
				{
				if(!$(this).isClicked())
					$(this)
						.removeClass("active")
						.children(".list").slideUp();
				});
			});
	
	$(window).resize(function()
		{
		$(".av-form-select-shop-noscroll")
			.removeClass("active")
			.children(".list").slideUp();
		});
	});