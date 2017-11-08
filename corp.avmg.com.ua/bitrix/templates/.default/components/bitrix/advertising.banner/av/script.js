/* ------------------------------------------------------------------- */
/* ----------------------------- methods ----------------------------- */
/* ------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.showSlide = function(index)
		{
		var
			needIndex      = parseInt(index - 1),
			$pager         = this  .find(".pager"),
			$currentSlide  = this  .children(".item:visible"),
		    $needSlide     = this  .children(".item").eq(needIndex),
			$needPagerPage = $pager.children()       .eq(needIndex);

		if
			(
			needIndex == parseInt($currentSlide.index())
			||
			!$needSlide.length || !$needPagerPage.length
			) return this;

		$currentSlide
			.fadeOut(700);
		$needSlide
			.fadeIn(700)
			.floodImage();

		$pager.children().removeClass("selected");
		$needPagerPage.addClass("selected");

		return this;
		};
	})(jQuery);
/* ------------------------------------------------------------------- */
/* ---------------------------- handlers ----------------------------- */
/* ------------------------------------------------------------------- */
$(function()
	{
	$(".av-banner")
		.on("vclick", ".pager > *", function()
			{
			$(this).closest(".av-banner")
				.showSlide($(this).index() + 1);
			})
		.each(function()
			{
			var
				$banner = $(this),
				$pager  = $banner.find(".pager");

			setInterval(function()
				{
				if($banner.filter(":hover").length) return;
				var currentIndex = $pager.children(".selected").index() + 1;

				$banner.showSlide(currentIndex == $pager.children().length ? 1 : currentIndex + 1);
				}, 5000);
			})
		.children(".item:visible")
			.floodImage();

	$(window)
		.resize(function()
			{
			$(".av-banner").children(".item:visible").floodImage();
			});
	});