/* -------------------------------------------------------------------- */
/* -------------------- diactivate select function -------------------- */
/* -------------------------------------------------------------------- */
function AvFormLinksListShopDiactivate()
	{
	$('.av-links-list-shop')
		.removeClass("active")
		.children('.list').slideUp();
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$('.av-links-list-shop .list').mCustomScrollbar({"theme": 'dark'});

	$(document)
		/* ------------------------------------------- */
		/* ------------ select drop down ------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-links-list-shop .title-label', function()
			{
			var
				$select      = $(this).closest('.av-links-list-shop'),
				$optionsList = $select.find('.list');

			if($optionsList.is(':visible'))
				AvFormLinksListShopDiactivate();
			else
				{
				AvFormLinksListShopDiactivate();
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
			if(!$(event.target).closest('.av-links-list-shop').length)
				AvFormLinksListShopDiactivate();
			});

	$(window)
		.resize(function()
			{
			AvFormLinksListShopDiactivate();
			});
	});