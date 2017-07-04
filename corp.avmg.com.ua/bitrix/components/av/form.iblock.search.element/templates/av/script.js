/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameIblockElementSearchAv     = function()      {return this.find('.input-native').attr("name")};
	jQuery.fn.setFormElememtNameIblockElementSearchAv     = function(value) {this.find('.input-native').attr("name", value)};
	jQuery.fn.getFormElememtValueIblockElementSearchAv    = function()      {return this.find('.input-native').val()};
	jQuery.fn.setFormElememtValueIblockElementSearchAv    = function(value)
		{

		};
	jQuery.fn.getFormElememtRequiredIblockElementSearchAv = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredIblockElementSearchAv = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertIblockElementSearchAv    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertIblockElementSearchAv    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
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
	SetFormElementsCurrentLibrary("av");
	$(document)
		/* ------------------------------------------- */
		/* ----------- input focus/focusout ---------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-form-iblock-search-element .input-label', function()
			{
			$(this).find('input').focus();
			})
		.on("focus", '.av-form-iblock-search-element .input-label input', function()
			{
			var
				$inputBlock        = $(this).closest('.av-form-iblock-search-element'),
				$seacrhResultBlock = $inputBlock.find('.list');

			$(this).show()
				.parent().find('.placeholder').hide();

			$inputBlock.controlFormSubmit("off").addClass("active");
			if($seacrhResultBlock.children().length) $seacrhResultBlock.slideDown();
			})
		.on("focusout", '.av-form-iblock-search-element .input-label input', function()
			{
			$(this).closest('.av-form-iblock-search-element')
				.controlFormSubmit("on")
				.removeClass("active")
					.find('.list').slideUp()
					.find('.list-item').removeClass("selected");

			if(!$(this).val())
				$(this).hide()
					.parent().find('.placeholder').show();
			})
		/* ------------------------------------------- */
		/* --------------- input keyup --------------- */
		/* ------------------------------------------- */
		.on("keyup", '.av-form-iblock-search-element .input-label input', function(event)
			{
			var
				$searchInput       = $(this),
				keyCode            = event.keyCode,
				$inputBlock        = $searchInput.closest('.av-form-iblock-search-element'),
				$nativeInput       = $inputBlock.find('.input-native'),
				$seacrhResultBlock = $inputBlock.find('.list'),
				$selectedElement   = $seacrhResultBlock.find('.list-item.selected'),
				elementsValue = [], selectIndex = '', $newSelectedElement = '';
			/* ------------------------------------------- */
			/* ------------- no search value ------------- */
			/* ------------------------------------------- */
			if(!$searchInput.val())
				$seacrhResultBlock.slideUp().find('.list-item').remove();
			/* ------------------------------------------- */
			/* ------------------ submit ----------------- */
			/* ------------------------------------------- */
			else if(keyCode == 13 && $nativeInput.attr("value"))
				$searchInput.submitForm();
			/* ------------------------------------------- */
			/* ---------------- navigation --------------- */
			/* ------------------------------------------- */
			else if(keyCode == 38 || keyCode == 40)
				{
				$selectedElement.removeClass("selected");
				$seacrhResultBlock.find('.list-item').each(function()
					{
					var value = $(this).attr("value");
					if(value) elementsValue.push(value);
					});
				if(!elementsValue.length) return;

				selectIndex = elementsValue.indexOf($selectedElement.attr("value"));
				if(selectIndex != -1)
					{
					if(keyCode == 40) selectIndex++;
					if(keyCode == 38) selectIndex--;
					}
				if(!elementsValue[selectIndex])
					{
					if(keyCode == 40) selectIndex = 0;
					if(keyCode == 38) selectIndex = elementsValue.length - 1;
					}

				$newSelectedElement = $seacrhResultBlock.find('[value="'+elementsValue[selectIndex]+'"]');
				if(!$newSelectedElement.length) return;

				$newSelectedElement.addClass("selected");
				$searchInput.val($newSelectedElement.text());
				$nativeInput.attr("value", $newSelectedElement.attr("value"));
				}
			/* ------------------------------------------- */
			/* ------------------ search ----------------- */
			/* ------------------------------------------- */
			else if(keyCode != 37 && keyCode != 39 && keyCode != 13)
				{
				$nativeInput.attr("value", '');
				setTimeout(function()
					{
					var searchString = $searchInput.val();
					if($searchInput.attr("searching") == searchString) return;
					$searchInput.attr("searching", searchString);
					$.ajax
						({
						type    : 'POST',
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
							if(!$seacrhResultBlock.is(':visible'))
								$seacrhResultBlock.slideDown();
							},
						complete: function() {AvWaitingScreen("off")}
						});
					AvWaitingScreen("on");
					}, 1500);
				}
			})
		/* -------------------------------------------------------------------- */
		/* ----------------------- select item by click ----------------------- */
		/* -------------------------------------------------------------------- */
		.on("vclick", '.av-form-iblock-search-element .list .list-item', function()
			{
			var
				value        = $(this).attr("value"),
				$inputBlock  = $(this).closest('.av-form-iblock-search-element');

			if(!value) return;
			$inputBlock.find('.input-native')     .attr("value", value);
			$inputBlock.find('.input-label input').val($(this).text()).submitForm();
			});
	});