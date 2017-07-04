/* -------------------------------------------------------------------- */
/* -------------------- diactivate select function -------------------- */
/* -------------------------------------------------------------------- */
function AvFormLinksList()
	{
	$('.av-links-list')
		.removeClass("active")
		.children('.list').slideUp();
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$('.av-links-list .list').mCustomScrollbar({"theme": 'dark'});

	$(document)
		/* ------------------------------------------- */
		/* ------------ select drop down ------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-links-list .title-label', function()
			{
			var
				$select      = $(this).closest('.av-links-list'),
				$optionsList = $select.find('.list');

			if($optionsList.is(':visible'))
				AvFormLinksList();
			else
				{
				AvFormLinksList();
				$select.addClass("active");
				$optionsList
					.css("width", $select[0].getBoundingClientRect().width)
					.slideDown()
					.focus();
				}
			})
		/* ------------------------------------------- */
		/* -------------- hide selector -------------- */
		/* ------------------------------------------- */
		.on("vclick", function(event)
			{
			if(!$(event.target).closest('.av-links-list').length)
				AvFormLinksList();
			});

	$(window)
		.resize(function()
			{
			AvFormLinksList();
			});
	});