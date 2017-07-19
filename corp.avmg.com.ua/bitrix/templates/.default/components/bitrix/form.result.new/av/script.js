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
				CreateAvAlertPopup(BX.message("AV_FORM_FORM_VALIDATION_ALERT"), "alert")
					.positionCenter(1000, 'Y')
					.hideOnClickout("remove");
				return false;
				}
			});
	});