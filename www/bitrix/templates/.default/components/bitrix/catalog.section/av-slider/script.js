$(function()
	{
	var $slider = $(".av-catalog-section-slider");

	$slider
		.setAvSlider()
		.setAvSliderParams
			({
			cyclicity        : true,
			slidesCount      : 3,
			slidesBreakpoints:
				{
				1199: 2,
				991 : 1
				}
			});
	$slider.find(".navigation.prev").setAvSliderNavigationItem("back");
	$slider.find(".navigation.next").setAvSliderNavigationItem("forward");
	$slider.find(".slider-block")   .setAvSliderSlidesBlock();
	$slider                         .buildAvSlider();

	$slider.find(".slider-block")
		.hover(function()
			{
			$(this).closest(".av-catalog-section-slider").slideAutoAvSlider("forward", 2000);
			})
		.mouseleave(function()
			{
			$(this).closest(".av-catalog-section-slider").stopSlideAutoAvSlider();
			});
	});