function avSocAuth(params)
	{
	var userParams = $.extend
		(
			{
			"service_type": '', "token"     : '', "expires"  : '',
			"id"          : '', "first_name": '', "last_name": '',
			"email"       : '', "gender"    : '', "birthday" : '', "photo" : ''
			},
		params
		);

	AvWaitingScreen("on");
	$.ajax
		({
		type    : 'POST',
		url     : AvSocAuthAjaxFile,
		data    : userParams,
		success : function(scriptResult)
			{
			var
				scriptResultObj     = $.parseJSON(scriptResult),
				scriptResultStatus  = scriptResultObj && scriptResultObj.status  ? scriptResultObj.status  : 'error',
				scriptResultMessage = scriptResultObj && scriptResultObj.message ? scriptResultObj.message : BX.message("AV_SOC_AUTH_ERROR_TEXT_DEFAULT");

			if(scriptResultStatus == 'success')
				location.reload();
			else if(scriptResultStatus == 'error')
				CreateAvAlertPopup('<b>'+BX.message("AV_SOC_AUTH_ERROR_TITLE")+'</b><br>'+scriptResultMessage, "alert")
					.positionCenter(3000, 'Y')
					.onClickout(function() {$(this).remove()});
			},
		complete: function() {AvWaitingScreen("off")}
		});
	}