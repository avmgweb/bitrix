$(function()
	{
	$(document)
		.on("vclick", ".av-shop-subscribe-form .title", function()
			{
			$(this)
				.hide()
				.closest(".av-shop-subscribe-form").find("input")
				.show().focus();
			})
		.on("focusout", ".av-shop-subscribe-form input", function()
			{
			if(!$(this).val())
				$(this)
					.hide()
					.closest(".av-shop-subscribe-form").find(".title")
					.show();
			});
	});