$(function()
	{
	SetFormElementsCurrentLibrary("av_site");

	$(document)
		.on("vclick", '.av-form [type="submit"]', function()
			{
			if($(this).closest('form').checkFormValidation())
				return true;
			else
				{
				CreateAvAlertPopup
					(
					BX.message("AV_FORM_FORM_VALIDATION_ALERT"),
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