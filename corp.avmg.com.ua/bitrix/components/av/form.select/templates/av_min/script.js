/* -------------------------------------------------------------------- */
/* -------------------- diactivate select function -------------------- */
/* -------------------------------------------------------------------- */
function AvFormSelectMinDiactivate()
	{
	$('.av-form-select-min')
		.removeClass("active")
		.children('.list').slideUp();
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	SetFormElementsCurrentLibrary("av");

	$(document)
		/* ------------------------------------------- */
		/* ------------ select drop down ------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-form-select-min:not(.disabled) .title-label', function()
			{
			var
				$selectBlock = $(this).closest('.av-form-select-min'),
				$optionsList = $selectBlock.find('.list');

			if($optionsList.is(':visible'))
				AvFormSelectMinDiactivate();
			else
				{
				AvFormSelectMinDiactivate();
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
		.on("vclick", '.av-form-select-min:not(.disabled) .list [data-list-value]', function()
			{
			$(this).closest('.av-form-select-min').setFormElememtValueSelectAv($(this).attr("data-list-value"));
			AvFormSelectMinDiactivate();
			})
		/* ------------------------------------------- */
		/* -------------- hide selector -------------- */
		/* ------------------------------------------- */
		.on("vclick", function(event)
			{
			if(!$(event.target).closest('.av-form-select-min').length)
				AvFormSelectMinDiactivate();
			});

	$(window)
		.resize(function()
			{
			AvFormSelectMinDiactivate();
			});
	});