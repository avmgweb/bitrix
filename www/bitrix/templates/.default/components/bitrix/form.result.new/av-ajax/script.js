$(function()
	{
	$(document)
		.on("vclick", ".av-form-ajax [data-submit-button]", function()
			{
			var
				$formBlock = $(this).closest(".av-form-ajax"),
				$form      = $formBlock.find("form"),
			    formZindex = 0,
				$parent    = $form;

			if($form.checkFormValidation())
				{
				AvWaitingScreen("on");
				$.ajax
					({
					type    : "POST",
					url     : AvFormAjaxHandler,
					data    : $form.serialize(),
					success : function(result)
						{
						$formBlock.html("<div class=\"result-ok\">"+BX.message("AV_FORM_AJAX_RESULT_OK_MESSAGE")+"</div>");
						},
					complete: function()
						{
						AvWaitingScreen("off");
						}
					});
				}
			else
				{
				while(!formZindex && $parent.prop("tagName") != "BODY")
					{
					formZindex = $parent.css("z-index");
					if(formZindex == "auto") formZindex = 0;
					$parent = $parent.parent();
					}

				CreateAvAlertPopup(BX.message("AV_FORM_AJAX_FORM_VALIDATION_ALERT"), "alert")
					.positionCenter(formZindex + 50, "Y")
					.onClickout(function() {$(this).remove()});
				}
			});
	});