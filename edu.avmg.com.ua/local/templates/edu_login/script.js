/* -------------------------------------------------------------------- */
/* ------------------- background control function -------------------- */
/* -------------------------------------------------------------------- */
function avEduLoginBGControl()
	{
	var
		$background    = $('#av-edu-login').find('.background'),
		bottomPosition = $(window).scrollTop() + $(window).height();

	if(bottomPosition > $background.offset().top + $background.height())
		$background.animate({"height": (bottomPosition + 50)+'px'}, 10);
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	avEduLoginBGControl();
	/* ------------------------------------------- */
	/* -------------- form handlers -------------- */
	/* ------------------------------------------- */
	$('#av-edu-login')
		.on("vclick", '.main-window [data-call-form]', function()
			{
			var
				formType        = $(this).attr("data-call-form"),
				$mainWindow     = $(this).closest('.main-window'),
				$formsBlock     = $mainWindow.find('.forms-block'),
				$currentForm    = $formsBlock.children(':visible'),
				$calledForm     = formType ? $formsBlock.children('.'+formType) : $(),
				$forgotpassLink = $mainWindow.find('[data-call-form="forgotpass"]').parent(),
				$callFormBlockShow, $callFormBlockHide;
			if(!$calledForm.length || $calledForm.is(':visible')) return;

			$formsBlock.css
				({
				"position": 'relative',
				"height"  : $formsBlock.height()+'px',
				"overflow": 'hidden'
				});
			$currentForm.add($calledForm).css
				({
				"background": '#FFF',
				"position"  : 'absolute',
				"width"     : $formsBlock.width()+'px'
				});
			$currentForm.css
				({
				"left"   : '0',
				"z-index": '100'
				});
			$calledForm.css
				({
				"display": 'block',
				"left"   : $formsBlock.width()+'px',
				"z-index": '110'
				});

			$currentForm.animate({"left" : '-'+$formsBlock.width()+'px'}, 500);
			$calledForm .animate({"left" : '0'},                          500, function()
				{
				if(formType == 'registration')
					{
					$callFormBlockShow = $mainWindow.find('.call-form-block.auth');
					$callFormBlockHide = $mainWindow.find('.call-form-block.registration');
					}
				else if(formType == 'auth')
					{
					$callFormBlockShow = $mainWindow.find('.call-form-block.registration');
					$callFormBlockHide = $mainWindow.find('.call-form-block.auth');
					}
				else if(formType == 'forgotpass')
					{
					$callFormBlockShow = $mainWindow.find('.call-form-block.auth');
					$callFormBlockHide = $mainWindow.find('.call-form-block.registration');
					}

				if((!$callFormBlockHide.is(':visible') || !$callFormBlockShow.length) && $mainWindow.find('.info-block').is(':visible'))
					{
					$callFormBlockHide.slideUp();
					$callFormBlockShow.slideDown();
					}
				else
					{
					$callFormBlockHide.hide();
					$callFormBlockShow.show();
					}

				$currentForm
					.add($mainWindow.find('[data-call-form]:not([data-call-form="forgotpass"])'))
					.add($mainWindow.find('[data-submit-form]'))
					.hide();

				if(formType == 'registration')
					$mainWindow.find('[data-call-form="auth"]')
						.add($mainWindow.find('[data-submit-form="registration"]'))
						.show();
				else if(formType == 'auth')
					$mainWindow.find('[data-call-form="registration"]')
						.add($mainWindow.find('[data-submit-form="auth"]'))
						.show();
				else if(formType == 'forgotpass')
					$mainWindow.find('[data-call-form="auth"]')
						.add($mainWindow.find('[data-submit-form="forgotpass"]'))
						.show();

					 if(formType == 'forgotpass')        $forgotpassLink.slideUp(500);
				else if(!$forgotpassLink.is(':visible')) $forgotpassLink.slideDown(500);

				$formsBlock.animate({"height": $calledForm.height()+'px'}, 500, function()
					{
					$formsBlock.add($currentForm).add($calledForm).removeAttr("style");
					$formsBlock.children().hide();
					$calledForm.show();
					});
				});
			})
		.on("vclick", '.main-window [data-submit-form]', function()
			{
			var
				formType      = $(this).attr("data-submit-form"),
				$form         = $(this).closest('.main-window').find('.forms-block > .'+formType),
				$submitButton = $form.find('[type="submit"]');
			if(!$form.length) return;

			if($submitButton.length) $submitButton.click();
			else                     $form.find('form').submit();
			Cookies.set("AV_EDU_LOGIN_LAST_TAB", formType);
			})
		.find('.background').waitForImages(function()
			{
			setTimeout(function()
				{
				var
					$mainWindow = $('#av-edu-login').find('.main-window'),
					lastTab     = Cookies.get("AV_EDU_LOGIN_LAST_TAB");

				$mainWindow
					.css
						({
						"display": 'flex',
						"opacity": '0'
						})
					.animate({"opacity": '1'}, 500);

				if
					(
					$mainWindow.find('.top-block').length
					&&
					lastTab && lastTab != 'auth'
					&&
					$mainWindow.find('.forms-block .'+lastTab).length
					)
					$mainWindow.find('[data-call-form="'+lastTab+'"]:visible').click();
				}, 500);
			});
	/* ------------------------------------------- */
	/* -------------- scroll/resize -------------- */
	/* ------------------------------------------- */
	$(window)
		.scroll(function() {avEduLoginBGControl()})
		.resize(function() {avEduLoginBGControl()});
	});