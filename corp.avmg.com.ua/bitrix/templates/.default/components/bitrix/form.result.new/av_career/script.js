$(function()
	{
	SetFormElementsCurrentLibrary("av_site");

	$(document)
		.on("change", '.av-form-career [name="comments-trigger"]', function()
			{
			var
				$form            = $(this).closest('form'),
				$commentsTrigger = $form.getFormElememt({"name": 'comments-trigger'}),
				$textareaBlock   = $form.find('.comments-field');

			if($commentsTrigger.getFormElememtParam("value")) $textareaBlock.slideDown();
			else                                              $textareaBlock.slideUp();
			})
		.on("vclick", '.av-form-career [type="submit"]', function()
			{
			var $form = $(this).closest('form');

			if($form.checkFormValidation())
				{
				if(!$form.getFormElememt({"name": 'comments-trigger'}).getFormElememtParam("value"))
					$form.find('.comments-field').getFormElememt().setFormElememtParam("value", '');
				return true;
				}
			else
				{
				CreateAvAlertPopup(BX.message("AV_FORM_CAREER_FORM_VALIDATION_ALERT"), "alert")
					.positionCenter(1000, 'Y')
					.hideOnClickout("remove");
				return false;
				}
			});
	});