/* -------------------------------------------------------------------- */
/* ----------------------- header behavior func ----------------------- */
/* -------------------------------------------------------------------- */
function AvHeaderBehavior()
	{
	var $head = $('#page-header');

	if(!$head.attr("offset-position"))
		$head.attr("offset-position", $head.offset().top);

	if($head.attr("offset-position") < $(window).scrollTop())
		$head
			.addClass("fixed")
			.next().css("margin-top", $head.height());
	else
		$head
			.removeClass("fixed")
			.next().removeAttr("style");
	}
/* -------------------------------------------------------------------- */
/* --------------------- up button behavior func ---------------------- */
/* -------------------------------------------------------------------- */
function AvUpButtonBehavior()
	{
	var $upButton = $('#page-up-button');
	if($(window).scrollTop() > $('#page-workarea').offset().top) $upButton.fadeIn();
	else                                                         $upButton.fadeOut();
	}
/* -------------------------------------------------------------------- */
/* ----------------- activate/diactivate search func ------------------ */
/* -------------------------------------------------------------------- */
function AvSiteSearchFieldBehavior(workType)
	{
	var
		$gadgetsRow       = $('#page-header').find('.second-row-desktop .gadgets-row'),
        $searchInput      = $gadgetsRow.find('.search-cell input[type=text]'),
		$hideElements     = $gadgetsRow.children().filter(":not(.search-cell):not(.user-cell)"),
        searchInputActive = !!$searchInput.attr("activate"),
		workSpeed         = 400;

	if(workType == 'activate' && !searchInputActive)
		{
		$hideElements
			.css("visibility", 'hidden')
			.hide(workSpeed);
		$searchInput
            .attr("activate", true)
			.animate({"width": '400px'}, workSpeed);
		}
	if(workType == 'diactivate' && searchInputActive)
		{
		$hideElements
			.show(workSpeed, function()
				{
				$hideElements.css("visibility", 'visible');
				});
		$searchInput
            .removeAttr("activate")
			.animate({"width": '25px'}, workSpeed, function()
				{
				$searchInput.closest('form').diactivateAvSearchField();
				});
		}
	}
/* -------------------------------------------------------------------- */
/* -------------- activate/diactivate mobile search func -------------- */
/* -------------------------------------------------------------------- */
function AvSiteSearchFieldMobileBehavior(workType)
	{
	var
		$gadgetsRow       = $('#page-header').find('.second-row-mobile'),
        $searchCell       = $gadgetsRow.find('.search-cell'),
		$hideElements     = $gadgetsRow.children().filter(':not(.search-cell)'),
        searchInputActive = !!$searchCell.attr("activate"),
		workSpeed         = 400;

	if(workType == 'activate' && !searchInputActive)
		{
		$hideElements
            .css("visibility", 'hidden')
			.hide(workSpeed);
		$searchCell
			.attr("activate", true)
			.animate({"width": '100%'}, workSpeed);
		}
	if(workType == 'diactivate' && searchInputActive)
		{
		$hideElements
			.show(workSpeed, function()
				{
				$hideElements.css("visibility", 'visible');
				});
		$searchCell
			.removeAttr("activate")
			.animate({"width": '48px'}, workSpeed, function()
				{
				$searchCell.find('form').diactivateAvSearchFieldMobile();
				});
		}
	}
/* -------------------------------------------------------------------- */
/* ------------------ spoiler activity behavior func ------------------ */
/* -------------------------------------------------------------------- */
function AvSpoileActivityBehavior()
	{
	$('.av-spoiler-header[data-work-breakpoint]').each(function()
		{
		var $body = $(this).next('.av-spoiler-body');
		if($(window).width() <= $(this).attr("data-work-breakpoint"))
			$(this).add($body).removeClass("disabled");
		else
			{
			$(this).add($body).addClass("disabled");
			$body.show();
			}
		});
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	/* ------------------------------------------- */
	/* -------------- search fields -------------- */
	/* ------------------------------------------- */
	$('#page-header')
		.on("focus",    '.second-row-desktop .search-cell input', function() {AvSiteSearchFieldBehavior("activate")})
		.on("focus",    '.second-row-mobile  .search-cell input', function() {AvSiteSearchFieldMobileBehavior("activate")})
		.on("focusout", '.second-row-desktop .search-cell input', function()
			{
			var $input = $(this);

			if($input.val())
				setTimeout(function()
					{
					if(!$input.is(':focus')) AvSiteSearchFieldBehavior("diactivate");
					}, 2000);
			else
				AvSiteSearchFieldBehavior("diactivate");
			})
		.on("focusout", '.second-row-mobile  .search-cell input', function()
			{
			var $input = $(this);

			if($input.val())
				setTimeout(function()
					{
					if(!$input.is(':focus')) AvSiteSearchFieldMobileBehavior("diactivate");
					}, 2000);
			else
				AvSiteSearchFieldMobileBehavior("diactivate");
			});
	/* ------------------------------------------- */
	/* --------------- "UP" button --------------- */
	/* ------------------------------------------- */
	$('#page-up-button')
		.click(function()
			{
			$('html, body')
				.stop()
				.animate({scrollTop: 0}, 300);
			});
	/* ------------------------------------------- */
	/* ---------------- spoilers ----------------- */
	/* ------------------------------------------- */
	$(document)
		.on("vclick", '.av-spoiler-header:not(.disabled)', function()
			{
			var $body = $(this).next('.av-spoiler-body');

			if($(this).is('.open'))
				{
				$(this).removeClass("open");
				$body  .slideUp();
				}
			else
				{
				$(this).addClass("open");
				$body  .slideDown();
				}
			})
		.find('.av-spoiler-header.open').each(function()
			{
			$(this).next('.av-spoiler-body').show();
			});
	/* ------------------------------------------- */
	/* -------------- scroll/resize -------------- */
	/* ------------------------------------------- */
	AvSpoileActivityBehavior();
	$(window)
		.resize(function()
			{
			AvHeaderBehavior();
			AvSpoileActivityBehavior();
			})
		.scroll(function()
			{
			AvHeaderBehavior();
			AvUpButtonBehavior();
			});
	});