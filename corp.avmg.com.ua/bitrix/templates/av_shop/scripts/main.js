/* -------------------------------------------------------------------- */
/* ----------------------- header behavior func ----------------------- */
/* -------------------------------------------------------------------- */
function AvHeaderBehavior(workType)
	{
	var $head = $('#av-shop').find('header');

	if(workType == 'lock' || !workType && AV_VST_HEAD_START_POSITION < $(window).scrollTop())
		$head
			.addClass("fixed")
			.next().css("margin-top", $head.height());
	else if(workType == 'unlock' || !workType)
		$head
			.removeClass("fixed")
			.next().removeAttr("style");
	}
/* -------------------------------------------------------------------- */
/* ----------------- activate/diactivate search func ------------------ */
/* -------------------------------------------------------------------- */
function AvSiteSearchFieldBehavior(workType)
	{
	var
		$head             = $('#av-shop').find('header'),
        $searchInput      = $head.find('.desktop-search-cell input[type=text]'),
		$hideElements     = $head.find('.desktop-phone-cell'),
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
        $head             = $('#av-shop').find('header'),
        $searchCell       = $head.find('.mobile-search-cell'),
		$hideElements     = $head.find('.mobile-second-row').children().filter(':not(.mobile-search-cell)'),
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
	var seacrhFieldEmptyTimeout = 2000;
	AV_VST_HEAD_START_POSITION  = $('#av-shop').find('header').offset().top;

	$(document)
		// search fields
		.on("focus",    '#av-shop header .desktop-search-cell input', function() {AvSiteSearchFieldBehavior("activate")})
		.on("focus",    '#av-shop header .mobile-search-cell  input', function() {AvSiteSearchFieldMobileBehavior("activate")})
		.on("focusout", '#av-shop header .desktop-search-cell input', function()
			{
			var $input = $(this);

			if($input.val())
				setTimeout(function()
					{
					if(!$input.is(':focus')) AvSiteSearchFieldBehavior("diactivate");
					}, seacrhFieldEmptyTimeout);
			else
				AvSiteSearchFieldBehavior("diactivate");
			})
		.on("focusout", '#av-shop header .mobile-search-cell input', function()
			{
			var $input = $(this);

			if($input.val())
				setTimeout(function()
					{
					if(!$input.is(':focus')) AvSiteSearchFieldMobileBehavior("diactivate");
					}, seacrhFieldEmptyTimeout);
			else
				AvSiteSearchFieldMobileBehavior("diactivate");
			})
		// spoilers
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
			});

	AvSpoileActivityBehavior();

	$(document)
		.find('.av-spoiler-header.open').each(function()
			{
			$(this).next('.av-spoiler-body').show();
			});

	$(window)
		.resize(function()
			{
			AvHeaderBehavior();
			AvSpoileActivityBehavior();
			})
		.scroll(function()
			{
			AvHeaderBehavior();
			});
	});