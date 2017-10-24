$(function()
	{
	$(document)
		.on("change", '.av-catalog.section > .page-controller-cell select', function()
			{
			document.cookie = 'avCatalogPageSize='+$(this).val()+';domain='+document.domain+';path=/';
			location.reload();
			})
		.on("vclick", '.av-catalog.section > .page-controller-cell .type-selector > *:not(.selected)', function()
			{
			var type = $(this).attr("data-type");

			$(this).closest('.type-selector').children().removeClass("selected");
			$(this).addClass("selected");

			document.cookie = 'avCatalogPageType='+type+';domain='+document.domain+';path=/';
			     if(type == 'tablet') $(document).trigger("avCatalogSectionViewTypeChangeTablet");
			else if(type == 'list')   $(document).trigger("avCatalogSectionViewTypeChangeList");
			});
	});