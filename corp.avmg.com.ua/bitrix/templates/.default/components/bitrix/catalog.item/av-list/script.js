$(function()
	{
	$(document)
		.on("vclick", '.av-ctatalog-item-list', function()
			{
			$(this).find('a')[0].click();
			});
	});