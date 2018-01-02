/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameIblockElementSearchAv     = function()      {return this.find(".value-input").attr("name")};
	jQuery.fn.setFormElememtNameIblockElementSearchAv     = function(value) {this.find(".value-input").attr("name", value)};
	jQuery.fn.getFormElememtValueIblockElementSearchAv    = function()      {return this.find(".value-input").val()};
	jQuery.fn.setFormElememtValueIblockElementSearchAv    = function(value)
		{

		};
	jQuery.fn.getFormElememtRequiredIblockElementSearchAv = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredIblockElementSearchAv = function(value)
		{
		     if(value == "on")  this.addClass("required");
		else if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertIblockElementSearchAv    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertIblockElementSearchAv    = function(value)
		{
		     if(value == "on")  this.addClass("alert-input");
		else if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av", "iblock_element_search", "getFormElememtName",     "getFormElememtNameIblockElementSearchAv");
SetFormElementsFunction("av", "iblock_element_search", "setFormElememtName",     "setFormElememtNameIblockElementSearchAv");
SetFormElementsFunction("av", "iblock_element_search", "getFormElememtValue",    "getFormElememtValueIblockElementSearchAv");
SetFormElementsFunction("av", "iblock_element_search", "setFormElememtValue",    "setFormElememtValueIblockElementSearchAv");
SetFormElementsFunction("av", "iblock_element_search", "getFormElememtRequired", "getFormElememtRequiredIblockElementSearchAv");
SetFormElementsFunction("av", "iblock_element_search", "setFormElememtRequired", "setFormElememtRequiredIblockElementSearchAv");
SetFormElementsFunction("av", "iblock_element_search", "getFormElememtAlert",    "getFormElememtAlertIblockElementSearchAv");
SetFormElementsFunction("av", "iblock_element_search", "setFormElememtAlert",    "setFormElememtAlertIblockElementSearchAv");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		/* ------------------------------------------- */
		/* ----------- input focus/focusout ---------- */
		/* ------------------------------------------- */
		.on("vclick", ".av-form-iblock-search-element .title-block", function()
			{
			$(this).find(".search-input").focus();
			})
		.on("focus", ".av-form-iblock-search-element .title-block .search-input", function()
			{
			var
				$inputBlock        = $(this).closest(".av-form-iblock-search-element"),
				$seacrhResultBlock = $inputBlock.find(".list");

			$(this).show()
				.parent().find(".title")
					.hide();

			$inputBlock.controlFormSubmit("off").addClass("active");
			if($seacrhResultBlock.children().length) $seacrhResultBlock.slideDown();
			})
		.on("focusout", ".av-form-iblock-search-element .title-block .search-input", function()
			{
			$(this).closest(".av-form-iblock-search-element")
				.controlFormSubmit("on")
				.removeClass("active")
					.find(".list").slideUp()
					.find(".list-item").removeClass("selected");

			if(!$(this).val())
				$(this).hide()
					.parent().find(".title").show();
			})
		/* ------------------------------------------- */
		/* --------------- input keyup --------------- */
		/* ------------------------------------------- */
		.on("keyup", ".av-form-iblock-search-element .title-block .search-input", function(event)
			{
			var
				$searchInput       = $(this),
				keyCode            = event.keyCode,
				$inputBlock        = $searchInput.closest(".av-form-iblock-search-element"),
				$valueInput        = $inputBlock.find(".value-input"),
				$seacrhResultBlock = $inputBlock.find(".list"),
				$selectedItem      = $seacrhResultBlock.find(".list-item.selected"),
				itemsValueArray = [], selectIndex = "", $newSelectedItem = "";
			/* ---------------------------- */
			/* ------ no search value ----- */
			/* ---------------------------- */
			if(!$searchInput.val())
				$seacrhResultBlock.slideUp().find(".list-item").remove();
			/* ---------------------------- */
			/* ---------- submit ---------- */
			/* ---------------------------- */
			else if(keyCode == 13 && $valueInput.val())
				$searchInput.submitForm();
			/* ---------------------------- */
			/* -------- navigation -------- */
			/* ---------------------------- */
			else if(keyCode == 38 || keyCode == 40)
				{
				$selectedItem.removeClass("selected");
				$seacrhResultBlock.find(".list-item").each(function()
					{
					var value = $(this).attr("data-value");
					if(value) itemsValueArray.push(value);
					});
				if(!itemsValueArray.length) return;

				selectIndex = itemsValueArray.indexOf($selectedItem.attr("data-value"));
				if(selectIndex != -1)
					{
					if(keyCode == 40) selectIndex++;
					if(keyCode == 38) selectIndex--;
					}
				if(!itemsValueArray[selectIndex])
					{
					if(keyCode == 40) selectIndex = 0;
					if(keyCode == 38) selectIndex = itemsValueArray.length - 1;
					}

				$newSelectedItem = $seacrhResultBlock.find(".list-item[data-value=\""+itemsValueArray[selectIndex]+"\"]");
				if(!$newSelectedItem.length) return;

				$newSelectedItem.addClass("selected");
				$searchInput.val($newSelectedItem.text());
				$valueInput.attr("value", $newSelectedItem.attr("data-value"));
				}
			/* ---------------------------- */
			/* ---------- search ---------- */
			/* ---------------------------- */
			else if(keyCode != 37 && keyCode != 39 && keyCode != 13)
				{
				$valueInput.attr("value", "");
				setTimeout(function()
					{
					var searchString = $searchInput.val();
					if($searchInput.attr("searching") == searchString) return;
					$searchInput.attr("searching", searchString);
					$.ajax
						({
						type    : "POST",
						url     : AvFormIblockSearchElement,
						data    :
							{
							"iblock_id"  : $inputBlock.attr("data-iblock-id"),
							"empty_value": $inputBlock.attr("data-empty-value-text"),
							"value"      : searchString
							},
						success : function(result)
							{
							$seacrhResultBlock.html(result);
							if(!$seacrhResultBlock.is(":visible"))
								$seacrhResultBlock.slideDown();
							},
						complete: function() {AvWaitingScreen("off")}
						});
					AvWaitingScreen("on");
					}, 1500);
				}
			})
		/* ------------------------------------------- */
		/* ----------- select item by click ---------- */
		/* ------------------------------------------- */
		.on("vclick", ".av-form-iblock-search-element .list .list-item", function()
			{
			var
				value        = $(this).attr("data-value"),
				$inputBlock  = $(this).closest(".av-form-iblock-search-element");

			if(!value) return;
			$inputBlock.find(".value-input")              .attr("value", value);
			$inputBlock.find(".title-block .search-input").val($(this).text()).submitForm();
			});
	});