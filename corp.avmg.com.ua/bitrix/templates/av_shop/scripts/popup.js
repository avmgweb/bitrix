/* -------------------------------------------------------------------- */
/* ----------------------------- methods ------------------------------ */
/* -------------------------------------------------------------------- */
(function($)
	{
	/* ------------------------------------------- */
	/* -------------- position popup ------------- */
	/* ------------------------------------------- */
	jQuery.fn.positionAvPopup = function()
		{
		return this.each(function()
			{
			var
				$form          = $(this),
				$formArrow     = $form.find(".arrow"),
				$callBlock     = $(".av-shop-popup-call-block[data-type=\""+$form.attr("data-type")+"\"]"),
				$callButton    = $callBlock.find(".call-button"),
				screenWidth    = $(window).width(),
				callBlockLeft  = $callBlock.offset().left,
				callButtonLeft = $callButton.length ? $callButton.offset().left : 0,
				formWidth      = 0,
				arrowWidth     = 0,
				formLeft       = 10;
			if(!$callBlock.length) return;
			/* ---------------------------- */
			/* ------ form width calc ----- */
			/* ---------------------------- */
			$form.css
				({
				"top"  : "",
				"left" : "",
				"width": ""
				});
			if($form.is(":visible"))
				{
				formWidth  = $form.width();
				arrowWidth = parseInt($formArrow.css("width"));
				$form.show();
				}
			else
				{
				$form.css("position", "absolute").show();
				formWidth  = $form.width();
				arrowWidth = parseInt($formArrow.css("width"));
				$form.hide();
				}
			if(formWidth > screenWidth - 50) formWidth = screenWidth;
			/* ---------------------------- */
			/* ------ form left calc ------ */
			/* ---------------------------- */
			formLeft = callBlockLeft - arrowWidth;
			if(callButtonLeft > callBlockLeft)     formLeft = callButtonLeft + $callButton.width() + arrowWidth - formWidth;
			if(formLeft + formWidth > screenWidth) formLeft = callBlockLeft  + $callBlock.width()  + arrowWidth - formWidth;
			if(formLeft + formWidth > screenWidth) formLeft  = screenWidth - formWidth;
			if(formLeft < 0)                       formLeft  = 0;
			/* ---------------------------- */
			/* ----------- end ------------ */
			/* ---------------------------- */
			$form.css
				({
				"position": "absolute",
				"top"     : $callBlock.height() + $callBlock.offset().top,
				"left"    : formLeft,
				"width"   : formWidth
				});
			$formArrow.css
				(
				"left",
				$callButton.length
					? callButtonLeft + ($callButton.width() / 2) - formLeft - (arrowWidth / 2)
					: arrowWidth
				);
			});
		};
	/* ------------------------------------------- */
	/* ---------------- show popup --------------- */
	/* ------------------------------------------- */
	jQuery.fn.showAvPopup = function()
		{
		return this.each(function()
			{
			$(".av-shop-popup-call-block[data-type=\""+$(this).attr("data-type")+"\"]").addClass("checked");
			$(this).slideDown(600, function()
				{
				$(this).css("overflow", "visible").show();
				});
			});
		};
	/* ------------------------------------------- */
	/* ---------------- hide popup --------------- */
	/* ------------------------------------------- */
	jQuery.fn.hideAvPopup = function()
		{
		return this.each(function()
			{
			$(this).slideUp(600);
			$(".av-shop-popup-call-block[data-type=\""+$(this).attr("data-type")+"\"]").removeClass("checked");
			});
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(".av-shop-popup")
		.each(function()
			{
			$(this).html
				(
				"<div class=\"arrow\">"+
					"<div></div>"+
				"</div>"+
				"<div class=\"content\">"+
					$(this).html()+
				"</div>"
				);
			})
		.appendTo("body");

	$(document)
		.on("vclick", ".av-shop-popup-call-block[data-call-type=\"onclick\"]", function()
			{
			var $form = $(".av-shop-popup[data-type=\""+$(this).attr("data-type")+"\"]");
			if(!$form.length) return;

			if($form.is(":visible")) $form.hideAvPopup();
			else                     $form.positionAvPopup().showAvPopup();
			})
		.on("vclick", function()
			{
			$(".av-shop-popup:visible").each(function()
				{
				if(!$(this).isClicked() && !$(".av-shop-popup-call-block[data-type=\""+$(this).attr("data-type")+"\"]").isClicked())
					$(this).hideAvPopup();
				});
			});

	$(window)
		.scroll(function()
			{
			$(".av-shop-popup:visible").positionAvPopup();
			})
		.resize(function()
			{
			$(".av-shop-popup:visible").hideAvPopup();
			});
	});