$(function()
	{


$('.av-form-wrap-2  input,.av-form-wrap-2 textarea').each(function() {
	if($(this).val()) {$(this).prev(".av-form-wrap-2 span[title]").attr("up", true)}
});

$('body').on('focus', '.av-form-wrap-2  input, .av-form-wrap-2 textarea', function() { 
$(this).prev(".av-form-wrap-2 span[title]").attr("up", true); 
});

		$('body').on('focusout', '.av-form-wrap-2 input, .av-form-wrap textarea', function() { 
if(!$(this).val()){ $(this).prev(".av-form-wrap-2 span[title]").removeAttr("up")}});


// проверка формы на заполненность////////
	$('body').on('click', '.av-form-wrap-2 [name=web_form_submit]', function(event)
	{
		$('[data-form-input-error]').remove();
		var
			$form     = $(this).closest('form'),
			formError = false,
			t = 0;
		$form.find('[form-error]').removeAttr("form-error");
		$form.find('.required input[type=text], .required textarea ').each(function()
			{
			if(!$(this).val())
				{
				$(this).attr("form-error","true" );
				formError = true;
				}
			});

		if(formError != false){
			event.preventDefault();
			$('[data-form-input-error-123]').addClass("show");
			}
			else  $(this).attr("disable", true);
	});


//---------------------------УДАЛЕНИЕ КРАСНЫХ ПОЛЕЙ ПРИ ВВОДЕ В INPUT-------------------------// 
$('body').on('input', '.av-form-wrap-2 .required input, .av-form-wrap-2 form .required textarea', function()
		{
		if($(this).val().length > 0 ) $(this).removeAttr("form-error");
		else                          $(this).attr("form-error", true);
		});
//---------------------------ОТМЕНА ВВОДА КИРИЛЛИЦИ В ПОЛЕ ЕMAIL-------------------------// 
$('body').on('input', '.av-form-wrap-2 .required[field-types=email] input', function()
		{
  var reg = /[а-яА-ЯёЁ]/g;
    if (this.value.search(reg) !=  -1) {
        this.value  =  this.value.replace(reg, '');
    }
});

	function changeUrl() {
var stateObj = { foo: "bar" };
history.pushState(stateObj, "page 1", "http://avsteel.com.ua/");
	};




		if($('[av_steel_form_callBack] .errortext')){

		//AvBlurScreen("on","999"),CreateAvAlertPopup2($("[call-back-form]").html(),"").positionCenter(99999).on("remove",function(){AvBlurScreen("off"),$("body").removeClass("stop-scrolling")})

		}
// blur screen
function AvBlurScreen(value, zIndex)
	{
	var $blurScreen = $('#av-blur-screen');
	if(!zIndex) zIndex = '100';

	if(value == 'on' && !$blurScreen.length)
		setTimeout(function()
			{
			$('<div id="av-blur-screen"></div>')
				.css("z-index", zIndex)
				.appendTo('body')
				.fadeTo(500, 0.7);
			}, 50);
	else if(value == 'off')
		$blurScreen.fadeTo(500, 0, function() {$blurScreen.remove()});
	}

});