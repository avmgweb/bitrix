$(function()
	{
	$(document)
		.on("vclick", ".av-form [type=\"submit\"]", function()
			{
			if($(this).closest("form").checkFormValidation())
				return true;
			else
				{
				CreateAvAlertPopup(BX.message("AV_FORM_FORM_VALIDATION_ALERT"), "alert")
					.positionCenter(1000, "Y")
					.onClickout(function() {$(this).remove()});
				return false;
				}
			});
	});