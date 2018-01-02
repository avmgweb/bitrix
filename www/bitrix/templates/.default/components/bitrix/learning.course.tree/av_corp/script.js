$(function()
	{
	$(document)
		.on("vclick", '.av-learning-course-tree .arrow', function()
			{
			var
				$chapter = $(this).closest('.chapter'),
				$subMenu = $chapter.children('ul');

			if($subMenu.is(':visible'))
				{
				$subMenu.slideUp();
				$chapter.removeClass("open");
				}
			else
				{
				$subMenu.slideDown();
				$chapter.addClass("open");
				}
			});
	});