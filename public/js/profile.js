$(document).ready(
	function() 
	{
		$("#gallery").unitegallery(
		{
			tiles_type:"justified",
			tile_enable_icons:false,
		}
		);

		//avatarUpdate
		$(".fa-plus-square").click(
			function ()
			{
				$("#avatarInput").click();
				$("#button").click();
			}
		);

		// edits
		$(".edit-ctrl").click(
			function ()
			{
				$(".edits").toggle();
			}
		);

			// { popup modal }
		$(".fa-camera").click(
			function()
			{
				$(".fa-camera").addClass("nav-selector-active");				
				$("#shots").modal(
				{
				  showClose: false,
				}
				);
			}
		);
		$(".fa-grip-vertical").click(
			function()
			{
				$(".fa-grip-vertical").addClass("nav-selector-active");
			}
		);

			//end of popup modal

			//Following button
		$(".follow").click(
			function() 
			{
				$(".follow").removeClass("follow").addClass("following");
				$(".following").html("following");
			}
		);

		//setting
		$(".fa-cog").click(
			function()
			{
				$(".list").fadeIn(200);
				$(".list").hover(
					function()
					{},
					function()
					{
						$(this).fadeOut(200);
					}
				);
			}
		);

	}
);
