$(function()
	{
	var
		$googleMap  = $('.av-bases-detail .map-col .google-map'),
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

	$(document)
		.on("vclick", '.av-bases-detail .streams-info-col .item:not(.no-info) .title', function()
			{
			if($(window).width() >= 768) return;
			$(this).closest('.item')
				.toggleClass("open")
				.find('.body').slideToggle();
			});

	$(window)
		.resize(function()
			{
			var screenWidth = $(window).width();
			$('.av-bases-detail .streams-info-col .item').each(function()
				{
				if(screenWidth >= 768)        $(this).find('.body').show();
				else if(!$(this).is('.open')) $(this).find('.body').hide();
				});
			});
	});