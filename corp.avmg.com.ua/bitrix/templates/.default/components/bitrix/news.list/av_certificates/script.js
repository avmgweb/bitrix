$(function()
	{
	$(document)
		.on("vclick", '.av-certificates-list > div', function()
			{
			var
				elementId     = $(this).attr("data-element-id"),
				$elementPopup = $('.av-certificates-list-element-popup[data-element-id="'+elementId+'"]');

			if($elementPopup.length)
				{
				AvBlurScreen("on", 1000);
				$elementPopup.show();
				return;
				}

			AvWaitingScreen("on");
			$.ajax
				({
				type    : 'POST',
				url     : AvVsCertifitacesListElementFile,
				data    :
					{
					"COMPONENT_PARAMS": $('.av-certificates-list').attr("data-component-params"),
					"ELEMENT_ID"      : elementId,
					"CLOSE_FORM_ATTR" : 'data-close-form'
					},
				success : function(scriptResult)
					{
					$('<div class="av-certificates-list-element-popup" data-element-id="'+elementId+'"></div>')
						.appendTo('body')
						.html(scriptResult)
						.show();
					},
				complete: function() {AvWaitingScreen("off")}
				});
			})
		.on("show", '.av-certificates-list-element-popup', function()
			{
			AvBlurScreen("on", 1000);
			$(this)
				.positionCenter(1100, 'Y')
				.onClickout(function()
					{
					$(this).hide();
					AvBlurScreen("off");
					});
			})
		.on("vclick", '.av-certificates-list-element-popup [data-close-form]', function()
			{
			$(this).closest('.av-certificates-list-element-popup').hide();
			AvBlurScreen("off");
			});
	});