$(function()
	{
	$(document)
		.on("submit", '.av-edu-login-forgotpass-form', function()
			{
			if($(this).checkFormValidation())
				{
				AvWaitingScreen("on");
				return true;
				}
			else
				{
				CreateAvAlertPopup
					(
					BX.message("AV_EDU_LOGIN_FORGOTPASS_VALIDATION_ALERT"),
					"alert",
						{
						"hide_on_clickout" : 'Y',
						"centering"        : 'Y',
						"z_index"          : 1000
						}
					);
				$(this).find('[name="USER_EMAIL"]').val($(this).find('[name="USER_LOGIN"]').val());
				return false;
				}
			});
	});