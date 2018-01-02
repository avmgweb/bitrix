$(function()
	{
	$(document)
		.on("vclick", '.av-learning-list > div', function()
			{
			$(this).find('a')[0].click();
			});
	});