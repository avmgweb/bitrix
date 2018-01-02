$(function()
	{
	/* -------------------------------------------------------------------- */
	/* ---------------------------- google map ---------------------------- */
	/* -------------------------------------------------------------------- */
	var
		$googleMap  = $(".av-bases-detail .map-col .google-map"),
		coordinateX = parseFloat($googleMap.attr("data-cordinate-x")),
		coordinateY = parseFloat($googleMap.attr("data-cordinate-y")),
		map;

	if($googleMap.length)
		{
		map = new google.maps.Map
			(
			$googleMap[0],
				{
				zoom     : 12,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				center   : new google.maps.LatLng(coordinateX, coordinateY)
				}
			);

		new google.maps.Marker
			({
			map     : map,
			position: {lat: coordinateX, lng: coordinateY},
			title   : $googleMap.attr("data-store-name")
			});
		}
	/* -------------------------------------------------------------------- */
	/* ---------------------------- price list ---------------------------- */
	/* -------------------------------------------------------------------- */
	$(".av-bases-detail .info-col")
		.on("vclick", ".price-links-list [data-price-link-multiple]", function()
			{
			var
				$callButton = $(this),
				$linksList  = $callButton.closest(".price-links-list").find(".list");

			if($linksList.is(":visible"))
				{
				$callButton.removeClass("active");
				$linksList.slideUp();
				}
			else
				{
				$callButton.addClass("active");
				$linksList
					.css("margin-left", "20px")
					.slideDown();
				}
			})
		.on("vclick", "[data-price-link], .price-links-list .list > a", function()
			{
			if(typeof(ga) == "function")
				ga
					(
					"send", "event",
						{
						eventCategory: "AV bases prices",
						eventAction  : "click",
						eventLabel   : $(this).attr("href"),
						transport    : "beacon"
						}
					);
			});
	/* -------------------------------------------------------------------- */
	/* --------------------------- streams info --------------------------- */
	/* -------------------------------------------------------------------- */
	$(".av-bases-detail .streams-info-col")
		.on("vclick", ".item:not(.no-info) .title-block", function()
			{
			if($(window).width() >= 768) return;

			$(this).closest(".item")
				.toggleClass("open")
				.find(".body").slideToggle();
			});
	/* -------------------------------------------------------------------- */
	/* --------------------------- scroll/resize -------------------------- */
	/* -------------------------------------------------------------------- */
	$(window).resize(function()
		{
		var screenWidth = $(window).width();
		$(".av-bases-detail .streams-info-col .item").each(function()
			{
			if(screenWidth >= 768)        $(this).find(".body").show();
			else if(!$(this).is(".open")) $(this).find(".body").hide();
			});
		});
	});