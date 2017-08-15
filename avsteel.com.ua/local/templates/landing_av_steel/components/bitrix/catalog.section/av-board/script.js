$(function()
{
	// AJAX
	$('.av-steel-catalog-wrap .catalog-btn').on('click', function()
			{
			AvWaitingScreen("on");
			$.ajax
				({
				type    : 'POST',
				url     : AvSteelCSAjaxElement2,
				data    :
					{
					"element_id"   : $(this).closest('.av-steel-catalog-wrap').attr("data-element-id"),
					"element_name" : $(this).closest('.av-steel-catalog-wrap').attr("data-element-name")
					},
				success : function(scriptResult)
					{
					AvBlurScreen("on", 9999);
					CreateAvAlertPopup4(scriptResult)
						.positionCenter(99999)
						.on('remove', function() {AvBlurScreen("off")});
					},
				complete: function() {AvWaitingScreen("off")}
				});

			});

});





function CreateAvAlertPopup4(html, type)
	{
	$('.av-alert-popup').remove();

	return $('<div class="av-alert-popup flex-menu" id="alertpopup4">'+ html +'<div close-form4></div>'+'</div>')
			.appendTo('body')
			.on('click', '[close-form4]', function()
				{
				$(this).closest('.av-alert-popup').remove();
				$('[form-input-error-123]').removeClass("show");

				AvBlurScreen("off");
				});
	}