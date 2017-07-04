$(function()
	{
	$(document)
		.on("focus",    '.av-form-input-corp-learning-search input',          function() {$(this).parent().addClass("active")})
		.on("focusout", '.av-form-input-corp-learning-search input',          function() {$(this).parent().removeClass("active")})
		.on("vclick",   '.av-form-input-corp-learning-search .search-button', function() {$(this).closest('form').submit()});
	});