/* ------------------------------------------------------------------- */
/* ----------------------------- methods ----------------------------- */
/* ------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.showSlide = function(index)
		{
		var
			$pager            = this.find('.pager'),
			$currentSlide     = this  .children('.item:visible'),
			$currentPagerPage = $pager.children('.selected'),
			needIndex         = parseInt(index - 1),
		    currentIndex      = parseInt($currentPagerPage.index()),
		    $needSlide, $needPagerPage;

		if(needIndex == currentIndex) return;
		$needSlide     = this  .children('.item').eq(needIndex);
		$needPagerPage = $pager.children()       .eq(needIndex);
		if(!$needSlide.length || !$needPagerPage.length) return;

		$currentSlide.fadeOut(700);
		$needSlide.fadeIn(700);
		$needSlide.find('.image').floodImage();

		$pager.children().removeClass("selected");
		$needPagerPage.addClass("selected");
		};
	})(jQuery);
/* ------------------------------------------------------------------- */
/* ---------------------------- handlers ----------------------------- */
/* ------------------------------------------------------------------- */
$(function()
	{
	$('.av-banner > .item .image').floodImage();

	$(document)
		.on("vclick", '.av-banner .pager > *', function()
			{
			$(this).closest('.av-banner').showSlide($(this).index() + 1);
			});

	$(window)
		.resize(function()
			{
			$('.av-banner > .item .image').floodImage();
			});

	$('.av-banner').each(function()
		{
		var $banner = $(this);
		setInterval(function()
			{
			if($banner.filter(':hover').length) return;
			var
				$pager       = $banner.find('.pager'),
				currentIndex = $pager.children('.selected').index() + 1;

			$banner.showSlide(currentIndex == $pager.children().length ? 1 : currentIndex + 1);
			}, 5000);
		});
	});