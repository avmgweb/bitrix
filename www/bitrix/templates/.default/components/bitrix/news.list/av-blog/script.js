$(function()
	{
	$(".av-news-list-blog")
		.on("vclick", ".item", function(event)
			{
			if(!$(event.target).closest(".rating").length)
				$(this).find("a")[0].click();
			});
	});