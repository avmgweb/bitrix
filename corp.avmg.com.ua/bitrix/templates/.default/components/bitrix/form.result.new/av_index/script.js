$(function()
	{
	SetFormElementsCurrentLibrary("av_site");

	$(document)
		.on("vclick", '.av-form-index [type="submit"]', function()
			{
			if($(this).closest('form').checkFormValidation())
				return true;
			else
				{
				CreateAvAlertPopup(BX.message("AV_FORM_INDEX_FORM_VALIDATION_ALERT"), "alert")
					.positionCenter(1000, 'Y')
					.onClickout(function() {$(this).remove()});
				return false;
				}
			});
	});