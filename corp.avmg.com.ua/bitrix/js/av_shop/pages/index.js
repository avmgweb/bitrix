$(function()
	{
	$(".av-shop-index-images-block .item").floodImage();

	$(window).resize(function()
		{
		$(".av-shop-index-images-block .item").floodImage();
		});
	});