$(function()
	{
	$(document)
		.on("vclick", '.av-form-select-alt [data-label-value]', function()
			{
			var
				$block  = $(this).closest('.av-form-select-alt'),
				$select = $block.find('select'),
				value   = $(this).attr("data-label-value");

			$select.find('option').prop("selected", false);
			$block.find('[data-label-value]').removeClass("selected");

			if(value)
				{
				$select.find('option[value="'+value+'"]').prop("selected", true);
				$(this).addClass("selected");
				}

			$select.trigger("change");
			});
	});