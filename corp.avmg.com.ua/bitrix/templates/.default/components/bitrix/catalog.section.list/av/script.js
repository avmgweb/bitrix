$(function()
	{
	$(document)
		.on("vclick", '.av-catalog-section-list > .item', function()
			{
			$(this).find('a')[0].click();
			});
	});