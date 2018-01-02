$(function()
	{
	$(".av-user-profile")
		.on("vclick", "[submit-button]", function()
			{
			if($(this).closest("form").checkFormValidation())
				{
				AvWaitingScreen("on");
				return true;
				}
			else
				{
				CreateAvAlertPopup(BX.message("AV_MAIN_PROFILE_FORM_VALIDATION_ALERT"), "alert")
					.positionCenter(1000, "Y")
					.onClickout(function() {$(this).remove()});
				return false;
				}
			})
		.on("vclick", ".image-block [data-upload-photo-button]", function()
			{
			$(this).parent().find(".photo-upload-input").click();
			})
		.on("change", ".image-block .photo-upload-input", function()
			{
			if($(this).val())
				$(this).closest(".av-user-profile").find("[submit-button]").click();
			})
		.on("vclick", ".image-block .delete-link", function()
			{
			$(this).parent().find(".photo-delete-input")
				.attr("checked", true)
				.prop("checked", true)
				.closest(".av-user-profile").find("[submit-button]").click();
			});
	});