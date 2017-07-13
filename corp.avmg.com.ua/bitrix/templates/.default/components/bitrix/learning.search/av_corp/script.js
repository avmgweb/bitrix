$(function()
	{
	$(document)
		.on("vclick", '.av-learning-search-list > .item', function()
			{
			$(this).find('a')[0].click();
			});
	});