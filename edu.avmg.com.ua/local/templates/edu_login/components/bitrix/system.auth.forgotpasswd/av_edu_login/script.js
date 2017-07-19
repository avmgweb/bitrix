$(function()
	{
	$(document)
		.on("submit", '.av-edu-login-forgotpass-form', function()
			{
			if($(this).checkFormValidation())
				{
				AvWaitingScreen("on");
				$(this).find('[name="USER_EMAIL"]').val($(this).find('[name="USER_LOGIN"]').val());
				return true;
				}
			else
				{
				CreateAvAlertPopup(BX.message("AV_EDU_LOGIN_FORGOTPASS_VALIDATION_ALERT"), "alert")
					.positionCenter(1000, 'Y')
					.hideOnClickout("remove");
				return false;
				}
			});
	});