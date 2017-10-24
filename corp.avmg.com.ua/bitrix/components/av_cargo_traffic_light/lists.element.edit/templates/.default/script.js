$(function()
	{
	$(document)
		/* ------------------------------------------- */
		/* ------------------- tabs ------------------ */
		/* ------------------------------------------- */
		.on("vclick", '.av-cargo-traffic-light-item-form .tabs > *',  function()
			{
			var
				$editPage   = $(this).closest('.av-cargo-traffic-light-item-form'),
				$form       = $editPage.find('.form').eq($(this).index()),
				$buttonsRow = $editPage.find('.buttons-row');
			if(!$form.length) return;

			$(this).parent().children().removeClass("active");
			$editPage.find('.form').hide();

			$(this).addClass("active");
			$form.show();

			if($(this).is('.history')) $buttonsRow.hide();
			else                       $buttonsRow.show();
			})
		/* ------------------------------------------- */
		/* ------------------ submit ----------------- */
		/* ------------------------------------------- */
		.onFirst("submit", '.av-cargo-traffic-light-item-form', function()
			{
			if($(this).checkFormValidation())
				{
				$(this).find('input, select').removeAttr("disabled");
				AvWaitingScreen("on");
				}
			else
				{
				CreateAvAlertPopup(BX.message("AVCTL_FORM_VALIDATION_ALERT"), "alert")
					.positionCenter(1000, 'Y')
					.onClickout(function() {$(this).remove()});
				return false;
				}
			})
		/* ------------------------------------------- */
		/* ---------------- delete form -------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-cargo-traffic-light-item-form .delete-link',  function()
			{
			AvBlurScreen("on", 1000);
			$('.av-cargo-traffic-light-item-form-delete')
				.show()
				.positionCenter(1100, 'Y')
				.onClickout(function()
					{
					$(this).hide();
					AvBlurScreen("off");
					});
			});
	});