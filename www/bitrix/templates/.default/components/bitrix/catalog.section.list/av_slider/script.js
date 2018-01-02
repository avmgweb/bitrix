$(function()
	{
	var $slider = $('.av-catalog-section-list-slider');

	$slider
		.setAvSlider()
		.setAvSliderParams
			({
			slidesCount      : 3,
			slidesBreakpoints:
				{
				991: 2,
				767: 1
				}
			});
	$slider.find(".navigation.prev").setAvSliderNavigationItem("back");
	$slider.find(".navigation.next").setAvSliderNavigationItem("forward");
	$slider.find(".slider-block")   .setAvSliderSlidesBlock();
	$slider                         .buildAvSlider();
	});