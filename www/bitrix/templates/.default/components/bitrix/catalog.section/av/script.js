/* -------------------------------------------------------------------- */
/* ----------------------------- functions ---------------------------- */
/* -------------------------------------------------------------------- */
function AvCatalogSectionChangeViewType(type)
	{
	var
		$catalogSection = $(".av-catalog-section"),
		$sectionRoot    = $catalogSection.find(".section"),
		elements        = [];

	$sectionRoot.children().each(function()
		{
		var elementId = $(this).attr("data-element-id");
		if(elementId) elements.push(elementId);
		});

	AvWaitingScreen("on");
	$.ajax
		({
		type    : "POST",
		url     : AvCatalogSectionChangeViewTypeFile,
		data    :
			{
			"elements": elements,
			"pageType": type,
			"params"  : $catalogSection.attr("data-section-params")
			},
		success : function(result)
			{
			if(!result) return;

			var sectionClassArray = ["section"];
			     if(type == "tablet") sectionClassArray.push("tablet");
			else if(type == "list")   sectionClassArray.push("list");

			$sectionRoot
				.html(result)
				.attr("class", sectionClassArray.join(" "));
			},
		complete: function() {AvWaitingScreen("off")}
		});
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("avCatalogSectionViewTypeChangeTablet", function() {AvCatalogSectionChangeViewType("tablet")})
		.on("avCatalogSectionViewTypeChangeList",   function() {AvCatalogSectionChangeViewType("list")});
	});