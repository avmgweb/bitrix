$(function()
	{
	$(document)
		.on("vclick", '.av-ctatalog-item-tablet', function()
			{
			$(this).find('a')[0].click();
			});
	});