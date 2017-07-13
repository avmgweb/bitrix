$(function()
	{
	$(document)
		.on("submit", '.av-filter', function()
			{
			AvWaitingScreen("on");
			})
		.on("change", '.av-filter select, .av-filter :checkbox', function()
			{
			$(this).closest('form').find('input[type="submit"]').click();
			});
	});