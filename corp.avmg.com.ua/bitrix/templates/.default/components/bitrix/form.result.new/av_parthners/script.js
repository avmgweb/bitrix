$(function()
	{
	SetFormElementsCurrentLibrary("av_site");

	$(document)
		.on("vclick", function(event)
			{
			if
				(
				$(event.target).closest('.av-form-parthners-work-button.authorize:not(.unactive)').length
				&&
				typeof GetAvAuthForm !== 'undefined'
				&&
				$.isFunction(GetAvAuthForm)
				)
				GetAvAuthForm().activateAvAuthForm();
			})
		.on("vclick", '.av-form-parthners-work-button.form-link:not(.unactive)', function()
			{
			$('html, body').animate({scrollTop: $('.av-form-parthners > h3').offset().top - 120}, 1100);
			})
		.on("vclick", '.av-form-parthners [submit-button]', function()
			{
			if($(this).closest('form').checkFormValidation())
				return true;
			else
				{
				CreateAvAlertPopup
					(
					BX.message("AV_FORM_PARTHNERS_FORM_VALIDATION_ALERT"),
					"alert",
						{
						"hide_on_clickout" : 'Y',
						"centering"        : 'Y',
						"z_index"          : 1000
						}
					);
				return false;
				}
			});
	});